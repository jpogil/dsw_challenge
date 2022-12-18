<?php

namespace Src\Collections;

use Src\Documents\Account;
use Xenus\Collection;

class Accounts extends Collection
{
    protected string $name = 'accounts';

    protected $document = Account::class;
}