<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.03.19
 * Time: 18:22
 */

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('vendor/autoload.php');

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

//use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer\Pdf;

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
    ->setCellValue('A1', 'Результаты расчета')
    ->setCellValue('A2', 'Тип ТС и категория:')
    ->setCellValue('A3', 'Мощность двигателя (лошадиные силы):')
    ->setCellValue('A4', 'Город регистрации:')
    ->setCellValue('A5', 'Количество водителей:')
    ->setCellValue('A6', 'Период страховки (для иностранных агентов):')
    ->setCellValue('A7', 'Коэффициент КБМ:')
    ->setCellValue('A8', 'Возраст водителя (период в годовом выражение):')
    ->setCellValue('A9', 'Водительский стаж (количество полных лет):')
    ->setCellValue('A10', 'ТС зарегестрировано в иностраном государстве:')
    ->setCellValue('A11', 'Юридическая форма:')
    ->setCellValue('A12', 'Период использования (для резидентов РФ):')
    ->setCellValue('A13', 'Участие в ДТП:')
    ->setCellValue('A14', 'Рассчетная премия')
    ->setCellValue('B2', $_SESSION['post']['type_ts'])
    ->setCellValue('B3', $_SESSION['post']['engine_power'])
    ->setCellValue('B4', $_SESSION['post']['city_registration'])
    ->setCellValue('B5', $_SESSION['post']['number_drivers'])
    ->setCellValue('B6', $_SESSION['post']['insurance_period'])
    ->setCellValue('B7', $_SESSION['post']['KBM'])
    ->setCellValue('B8', $_SESSION['post']['age_drivers'])
    ->setCellValue('B9', $_SESSION['post']['experience_drivers'])
    ->setCellValue('B10', $_SESSION['post']['foreigner'])
    ->setCellValue('B11', $_SESSION['post']['legal_form'])
    ->setCellValue('B12', $_SESSION['post']['period_use'])
    ->setCellValue('B13', $_SESSION['post']['violations'])
    ->setCellValue('B14', $_SESSION['post']['premium'])
;

$oSpreadsheet_Out->getActiveSheet()->getColumnDimension('A')->setWidth(60);
$oSpreadsheet_Out->getActiveSheet()->getColumnDimension('B')->setWidth(60);

$oSpreadsheet_Out->getActiveSheet()->getStyle('A1:B14')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

$oSpreadsheet_Out->getActiveSheet()->getStyle('A1')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$oSpreadsheet_Out->getActiveSheet()->getStyle('A1')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A2')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A3')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A4')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A8')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A9')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A10')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A11')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A12')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A13')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A14')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


$oSpreadsheet_Out->getActiveSheet()->getStyle('A2')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A3')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A4')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A8')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A9')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A10')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A11')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A12')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A13')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A14')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$oSpreadsheet_Out->getActiveSheet()->getStyle('A1')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A2')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A3')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A4')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A8')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A9')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A10')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A11')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A12')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A13')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A14')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$oSpreadsheet_Out->getActiveSheet()->getStyle('B1')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$oSpreadsheet_Out->getActiveSheet()->getStyle('B1')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B2')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B3')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B4')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B8')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B9')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B10')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B11')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B12')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B13')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B14')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$oSpreadsheet_Out->getActiveSheet()->getStyle('B1')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B2')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B3')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B4')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B8')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B9')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B10')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B11')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B12')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B13')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$oSpreadsheet_Out->getActiveSheet()->getStyle('B14')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$oSpreadsheet_Out->getActiveSheet()->getStyle('A14:B14')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
$oSpreadsheet_Out->getActiveSheet()->getStyle('A1:B1')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);

$oWriter = IOFactory::createWriter($oSpreadsheet_Out, 'Xlsx');
$oWriter->save($sOutFile);
//$oWriter->save('php://output');

$oReader = new Xlsx();
$Spreadsheet = $oReader->load('out.xlsx');
$oWriter = IOFactory::createWriter($Spreadsheet, 'Mpdf');

$oWriter->save('out.pdf');

header('location: out.pdf');