<?php

namespace Src\Connections;

use Xenus\Connection;

class Mongo
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection('mongodb://mongodb:27017', 'test');
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }
}