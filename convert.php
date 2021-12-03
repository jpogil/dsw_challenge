<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('Dataswitcher Tech Challenge');
$log->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
$log->info('Running Conversion');

// CALL YOUR CODE HERE



// END YOUR CALL HERE

$log->info('Conversion Finished');
echo "\n Conversion Finished! \n";
