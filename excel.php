<?php

session_start();

require_once('vendor/autoload.php');

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

//use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$sOutFile = 'out.xlsx';

$oSpreadsheet_Out = new Spreadsheet();

$oSpreadsheet_Out->getProperties()->setCreator('Maarten Balliauw')
    ->setLastModifiedBy('Maarten Balliauw')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file')
;

// Add some data
$oSpreadsheet_Out->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Тип ТС и категория:')
    ->setCellValue('A2', 'Мощность двигателя:')
    ->setCellValue('A3', 'Город регистрации:')
    ->setCellValue('A4', 'Количество водителей:')
    ->setCellValue('A5', 'Период страховки (для иносранных агентов):')
    ->setCellValue('A6', 'Коэффициент КБМ:')
    ->setCellValue('A7', 'Возраст водителя:')
    ->setCellValue('A8', 'Водительский стаж:')
    ->setCellValue('A9', 'Является ли иностранным агентом:')
    ->setCellValue('A10', 'Юр. лицо или физ. лицо:')
    ->setCellValue('A11', 'Период использования (для резидентов РФ):')
    ->setCellValue('A12', 'Участие в ДТП:')
    ->setCellValue('A13', 'Рассчетная премия')
    ->setCellValue('B1', $_SESSION['post']['type_ts'])
    ->setCellValue('B2', $_SESSION['post']['engine_power'])
    ->setCellValue('B3', $_SESSION['post']['city_registration'])
    ->setCellValue('B4', $_SESSION['post']['number_drivers'])
    ->setCellValue('B5', $_SESSION['post']['insurance_period'])
    ->setCellValue('B6', $_SESSION['post']['KBM'])
    ->setCellValue('B7', $_SESSION['post']['age_drivers'])
    ->setCellValue('B8', $_SESSION['post']['experience_drivers'])
    ->setCellValue('B9', $_SESSION['post']['foreigner'])
    ->setCellValue('B10', $_SESSION['post']['legal_form'])
    ->setCellValue('B11', $_SESSION['post']['period_use'])
    ->setCellValue('B12', $_SESSION['post']['violations'])
    ->setCellValue('B13', $_SESSION['post']['premium'])
;

$oWriter = IOFactory::createWriter($oSpreadsheet_Out, 'Xlsx');
$oWriter->save($sOutFile);
//$oWriter->save('php://output');


header('location: out.xlsx');
