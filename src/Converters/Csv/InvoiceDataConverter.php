<?php

namespace Src\Converters\Csv;

use Src\Converters\DataConverterInterface;

class InvoiceDataConverter implements DataConverterInterface
{
    public function get(array $data): array
    {
        $dataToReturn = [];

        $dataToReturn['ref'] = $data['Id'];
        $dataToReturn['description'] = $data['Description'];
        $dataToReturn['type'] = 'I';

        return $dataToReturn;
    }
}