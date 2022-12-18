<?php

namespace Src\Converters\Csv;

use Src\Converters\DataConverterInterface;

class CompanyDataConverter implements DataConverterInterface
{
    public function get(array $data): array
    {
        $dataToReturn = [];

        $dataToReturn['name'] = $data['Name'];
        $dataToReturn['email'] = $data['Email'];
        $dataToReturn['address'] = $data['Location'];

        return $dataToReturn;
    }
}