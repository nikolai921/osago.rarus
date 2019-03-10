<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'treatment.php';

$title = 'Калькулятор ОСАГО';

    $stringHTML = '<!DOCTYPE html>
	<html lang="ru">
		<head>
		    <title> '.$title.' </title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="css/styles.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
			<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
		</head>
		<body>
			<div id="wrapper">
				<header>
				        <legend>Параметры страхового полиса ОСАГО</legend>
						<form action="" method="POST">';
                        $stringHTML .= bonus_received($premium) . '</br>';

                        $stringHTML .= '<p><legend>Параметры для ввода</legend></p>';

                        $stringHTML .= selectForm('Тип ТС и категория:',
                            'type_ts', $name_type, 'short_name');
						$stringHTML .= selectForm('Мощность двигателя:',
                            'engine_power', $name_engine_power, 'short_name');
						$stringHTML .= selectForm('Город регистрации:',
                            'city_registration', $name_city_registration, 'short_name');
						$stringHTML .= selectForm('Количество водителей:',
                            'number_drivers', $name_number_drivers, 'number_drivers_limited');
						$stringHTML .= selectForm('Период страховки (для иносранных агентов):',
                            'insurance_period', $name_insurance_period, 'short_name');
						$stringHTML .= selectForm('Коэффициент КБМ:',
                            'KBM', $name_KBM, 'short_name');
						$stringHTML .= selectForm('Возраст водителя:',
                            'age_drivers', $name_age_drivers, 'short_name');
						$stringHTML .= selectForm('Водительский стаж:',
                            'experience_drivers', $name_experience_drivers, 'short_name');
						$stringHTML .= selectForm('Является ли иностранным агентом:',
                            'foreigner', $name_foreigner, 'foreigner');
						$stringHTML .= selectForm('Юр. лицо или физ. лицо:',
                            'legal_form', $name_legal_form, 'legal_form');
						$stringHTML .= selectForm('Период использования (для резидентов РФ):',
                            'period_use', $name_period_use, 'short_name');
						$stringHTML .= selectForm('Участие в ДТП:',
                            'violations', $name_violations, 'violations');

                        $stringHTML .=
                        '<p><input type="submit" class="btn btn-info btn-block" value="Рассчитать премию"></p>
	 				</form>
				</header>
			</div>
		</body>
	</html>';

echo $stringHTML;

$_SESSION['post'] = $_POST;
$_SESSION['post']['premium'] = $premium;


if (!empty($_POST))
{
    $file = 'logPost.txt';
    $current = file_get_contents($file);
    $current .= PHP_EOL . date('d.m.Y  H:i:s', time()) . ' ' . implode(', ', $_POST);
    file_put_contents($file, $current);
}

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
