<?php

namespace Src\Documents;

use Xenus\Document;

class Account extends Document
{
    protected $withId = true;

    protected string $name;

    protected string $code;

    protected float $balance;
}