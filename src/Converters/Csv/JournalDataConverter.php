<?php

namespace Src\Converters\Csv;

use ParseCsv\Csv;
use Src\Converters\DataConverterInterface;

class JournalDataConverter implements DataConverterInterface
{
    public function get(array $data): array
    {
        $dataToReturn = [];

        $dataToReturn['ref'] = $data['Id'];
        $dataToReturn['description'] = $data['Description'];
        $dataToReturn['type'] = $this->checkIfInvoice($data['Id']) ? 'I' : 'J';

        return $dataToReturn;
    }

    private function checkIfInvoice($journalId)
    {
        $csv = new Csv();
        $csv->parseFile('data/invoices.csv');

        if (in_array($journalId, array_column($csv->data, 'Journal_id'))) {
            return true;
        }
        return false;
    }
}