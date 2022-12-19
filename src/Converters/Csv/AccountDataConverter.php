<?php

namespace Src\Converters\Csv;

use ParseCsv\Csv;
use Src\Converters\DataConverterInterface;

class AccountDataConverter implements DataConverterInterface
{
    public function get(array $data): array
    {
        $dataToReturn = [];

        $dataToReturn['name'] = $data['Name'];
        $dataToReturn['code'] = $data['Account_Code'];
        $dataToReturn['balance'] = $this->getBalance($data['Account_Code']);

        return $dataToReturn;
    }

    private function getBalance($account_code)
    {
        $csv = new Csv();
        $csv->parseFile('data/journals_lines.csv');

        $balance = 0;

        foreach ($csv->data as $data) {
            if ($data['Account_code'] == $account_code) {
                $debit = strpos($data['Debit'], '$') !== false ? substr($data['Debit'],1) : $data['Debit'];
                $credit = strpos($data['Credit'], '$') !== false ? substr($data['Credit'],1) : $data['Credit'];
                $balance += $credit - $debit;
            }
        }

        return $balance;
    }
}