<?php

namespace Src;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ParseCsv\Csv;
use Src\Connections\Mongo;
use Src\Sources\SourceMapping;

class Importer
{
    protected $connection;

    protected $map;

    protected $log;

    public function __construct()
    {
        $conn = new Mongo();
        $this->connection = $conn->getConnection();
        $map = new SourceMapping();
        $this->map = $map->get('csv');
        $this->log = new Logger('Dataswitcher Tech Challenge');
        $this->log->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
    }

    public function import($source)
    {
        if (is_dir($source)) {
            foreach(glob($source.'/*.csv') as $file) {
                $this->importFile($file);
            }
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
                $this->log->info($fileName . ' imported!');
            }
        }
    }
}