<?php

namespace Src\Sources\Csv;

use Src\Collections\Accounts;
use Src\Collections\CompanyInfo;
use Src\Collections\TransactionLines;
use Src\Collections\Transactions;
use Src\Converters\Csv\AccountDataConverter;
use Src\Converters\Csv\CompanyDataConverter;
use Src\Converters\Csv\JournalDataConverter;
use Src\Converters\Csv\JournalLineDataConverter;
use Src\Documents\Account;
use Src\Documents\Company;
use Src\Documents\Transaction;
use Src\Documents\TransactionLine;
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
            case 'journals.csv':
                return new Transactions($connection);
            case 'journals_lines.csv':
                return new TransactionLines($connection);
        }
    }

    public function getDocument($fileName, $data)
    {
        switch (strtolower($fileName)) {
            case 'accounts.csv':
                return new Account($data);
            case 'company.csv':
                return new Company($data);
            case 'journals.csv':
                return new Transaction($data);
            case 'journals_lines.csv':
                return new TransactionLine($data);
        }
    }

    public function getConverter($fileName, $data)
    {
        switch (strtolower($fileName)) {
            case 'accounts.csv':
                return new AccountDataConverter();
            case 'company.csv':
                return new CompanyDataConverter();
            case 'journals.csv':
                return new JournalDataConverter();
            case 'journals_lines.csv':
                return new JournalLineDataConverter();
        }
    }
}