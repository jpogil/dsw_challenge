<?php

namespace Src\Types\Transaction;


enum Type: string
{
    case JOURNAL = 'J';

    case INVOICE = 'I';
}