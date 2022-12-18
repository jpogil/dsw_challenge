<?php

namespace Src\Converters\Csv;

use Src\Converters\DataConverterInterface;

class AccountDataConverter implements DataConverterInterface
{
    public function get(array $data): array
    {
        $dataToReturn = [];

        $dataToReturn['name'] = $data['Name'];
        $dataToReturn['code'] = $data['Account_Code'];

        return $dataToReturn;
    }
}