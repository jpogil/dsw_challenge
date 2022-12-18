<?php

namespace Src\Documents;

use Xenus\Document;

class TransactionLine extends Document
{
    protected $withId = true;

    protected int $transaction_ref;

    protected string $account_code;

    protected float $debit;

    protected float $credit;
}