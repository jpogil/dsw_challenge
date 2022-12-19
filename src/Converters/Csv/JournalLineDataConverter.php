<?php

namespace Src\Converters\Csv;

use Src\Converters\DataConverterInterface;

class JournalLineDataConverter implements DataConverterInterface
{
    public function get(array $data): array
    {
        $dataToReturn = [];

        $dataToReturn['transaction_ref'] = $data['Journal_id'];
        $dataToReturn['account_code'] = $data['Account_code'];
        $dataToReturn['debit'] = strpos($data['Debit'], '$') !== false ? substr($data['Debit'],1) : $data['Debit'];
        $dataToReturn['credit'] = strpos($data['Credit'], '$') !== false ? substr($data['Credit'],1) : $data['Credit'];

        return $dataToReturn;
    }
}