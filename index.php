<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'treatment.php';

$title = 'Калькулятор ОСАГО';

$stringHTML = '<!DOCTYPE html>
	<html lang="ru">
		<head>
		    <title> ' . $title . ' </title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="css/styles.css">
		</head>
		<body>
			<div id="wrapper">
				<header>
				        <legend>Параметры страхового полиса ОСАГО</legend>
						<form action="" method="POST">';

/*
* Использование функции selectForm для реализации, блока всплывающих списков
*/
$stringHTML .= bonus_received($premium) . '</br>';

$stringHTML .= '<p><legend>Параметры для ввода</legend></p>';

$stringHTML .= selectForm('Тип ТС и категория:',
    'type_ts', $name_type, 'short_name');
$stringHTML .= selectForm('Мощность двигателя (лошадиных сил):',
    'engine_power', $name_engine_power, 'short_name');
$stringHTML .= selectForm('Город регистрации:',
    'city_registration', $name_city_registration, 'short_name');
$stringHTML .= selectForm('Количество водителей:',
    'number_drivers', $name_number_drivers, 'number_drivers_limited');
$stringHTML .= selectForm('Период страховки (для иностранных агентов):',
    'insurance_period', $name_insurance_period, 'short_name');
$stringHTML .= selectForm('Коэффициент КБМ:',
    'KBM', $name_KBM, 'short_name');
$stringHTML .= selectForm('Возраст водителя (количество полных лет):',
    'age_drivers', $name_age_drivers, 'short_name');
$stringHTML .= selectForm('Водительский стаж (период в годовом интервале):',
    'experience_drivers', $name_experience_drivers, 'short_name');
$stringHTML .= selectForm('Период использования (для резидентов РФ):',
    'period_use', $name_period_use, 'short_name');
$stringHTML .= radioForm('Юридическая форма:',
    'legal_form', $name_legal_form, "legal_form");
$stringHTML .= radioForm('Зарегистрировано ли ТС в иностранном государстве:',
    'foreigner', $name_foreigner, 'foreigner');
$stringHTML .= radioForm('Участие в ДТП:',
    'violations', $name_violations, 'violations');

$stringHTML .=
    '<p><br><input type="submit" class="btn btn-info btn-block" value="Рассчитать премию"></p>
	 				</form>
				</header>
			</div>
		</body>
	</html>';

echo $stringHTML;

/*
 * Переносим значение переданных методом POST в SESSION
 */

$_SESSION['post'] = $_POST;
$_SESSION['post']['premium'] = $premium;


/*
 * Запись файл логов с использованием компонентов monolog.
 */

require_once __DIR__ . '/vendor/autoload.php';


$current = implode(', ', $_SESSION['post']);

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/test.txt', Logger::INFO));

$log->info($current);
