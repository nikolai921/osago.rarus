<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.03.19
 * Time: 18:22
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('vendor/autoload.php');

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer\Pdf;

$oReader = new Xlsx();
$oSpreadsheet = $oReader->load('out.xlsx');
$oWriter = IOFactory::createWriter($oSpreadsheet, 'Mpdf');

$oWriter->save('out.pdf');

header('location: out.pdf');