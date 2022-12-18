<?php

namespace Src\Sources;

use Xenus\Connection;

interface MappingInterface
{
    public function getCollection(string $fileName, Connection $connection);
    public function getDocument(string $fileName, array $data);
    public function getConverter(string $fileName, array $data);
}