<?php

namespace Src\Documents;

use Xenus\Document;

class Company extends Document
{
    protected $withId = true;

    protected string $name;

    protected string $email;

    protected string $address;

    protected string $type;
}