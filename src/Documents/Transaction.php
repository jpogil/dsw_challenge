<?php

namespace Src\Documents;

use Src\Types\Transaction\Type;
use Xenus\Document;

class Transaction extends Document
{
    protected $withId = true;

    protected int $ref;

    protected string $description;

    protected Type $type;
}