<?php

namespace Src;

use ParseCsv\Csv;
use Src\Connections\Mongo;
use Src\Sources\SourceMapping;

class Importer
{
    protected $connection;

    protected $map;

    public function __construct()
    {
        $conn = new Mongo();
        $this->connection = $conn->getConnection();
        $map = new SourceMapping();
        $this->map = $map->get('csv');
    }

    public function import($source)
    {
        if (is_dir($source)) {
            foreach(glob($source.'/*.*') as $file) {
                $this->importFile($file);
            }
        } elseif (is_file($source)) {
            $this->importFile($source);
        }
    }

    private function importFile($filePath)
    {
        $fileName = explode('//', $filePath)[1];

        $collection = $this->map->getCollection($fileName, $this->connection);

        if ($collection) {
            $csv = new Csv();
            $csv->parseFile($filePath);

            if ($csv->data) {
                foreach ($csv->data as $data) {
                    $converter = $this->map->getConverter($fileName, $data);
                    $document = $this->map->getDocument($fileName, $converter->get($data));
                    $collection->insert($document);
                }
            }
        }
    }
}