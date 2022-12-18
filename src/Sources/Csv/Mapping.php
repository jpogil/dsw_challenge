<?php

namespace Src\Sources\Csv;

use Src\Collections\Accounts;
use Src\Collections\CompanyInfo;
use Src\Converters\Csv\AccountDataConverter;
use Src\Converters\Csv\CompanyDataConverter;
use Src\Documents\Account;
use Src\Documents\Company;
use Src\Sources\MappingInterface;

class Mapping implements MappingInterface
{
    public function getCollection($fileName, $connection)
    {
        switch (strtolower($fileName)) {
            case 'accounts.csv':
                return new Accounts($connection);
            case 'company.csv':
                return new CompanyInfo($connection);
                break;
        }
    }

    public function getDocument($fileName, $data)
    {
        switch (strtolower($fileName)) {
            case 'accounts.csv':
                return new Account($data);
            case 'company.csv':
                return new Company($data);
        }
    }

    public function getConverter($fileName, $data)
    {
        switch (strtolower($fileName)) {
            case 'accounts.csv':
                return new AccountDataConverter();
            case 'company.csv':
                return new CompanyDataConverter();
        }
    }
}