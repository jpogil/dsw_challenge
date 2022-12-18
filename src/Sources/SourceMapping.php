<?php

namespace Src\Sources;

use Src\Sources\Csv\Mapping as CsvMapping;
use Src\Sources\Xml\Mapping as XmlMapping;

class SourceMapping
{
    public function get($sourceType)
    {
        switch (strtolower($sourceType)) {
            case 'csv':
                return new CsvMapping();
            case 'xml':
                return new XmlMapping();
        }
    }
}