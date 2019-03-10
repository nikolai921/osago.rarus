<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

//print_r($current);
print_r($_SESSION);
//$current = implode(', ', $_SESSION['post']);


require_once __DIR__ . '/vendor/autoload.php';


$current = implode(', ', $_SESSION['post']);

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//
// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/test.txt', Logger::WARNING));
//
//// add records to the log
$log->warning('Foo');
$log->error('Bar');
//$log->info($current);

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/test.txt', Logger::INFO));
$log->info('Отправка формы', $current);


//require_once 'index.php';



