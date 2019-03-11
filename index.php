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
						$stringHTML .= selectForm('Мощность двигателя:',
                            'engine_power', $name_engine_power, 'short_name');
						$stringHTML .= selectForm('Город регистрации:',
                            'city_registration', $name_city_registration, 'short_name');
						$stringHTML .= selectForm('Количество водителей:',
                            'number_drivers', $name_number_drivers, 'number_drivers_limited');
						$stringHTML .= selectForm('Период страховки (для иностранных агентов):',
                            'insurance_period', $name_insurance_period, 'short_name');
						$stringHTML .= selectForm('Коэффициент КБМ:',
                            'KBM', $name_KBM, 'short_name');
						$stringHTML .= selectForm('Возраст водителя:',
                            'age_drivers', $name_age_drivers, 'short_name');
						$stringHTML .= selectForm('Водительский стаж:',
                            'experience_drivers', $name_experience_drivers, 'short_name');
						$stringHTML .= selectForm('ТС зарегестрировано в иностранном государстве:',
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

/*
 * Переносим значение переданных методом POST в SESSION
 */

$_SESSION['post'] = $_POST;
$_SESSION['post']['premium'] = $premium;

/*
 * Запись истории отправки данных формы HTML - реализация одного из вариантов логирования
 */

if (!empty($_POST))
{
    $file = 'logPost.txt';
    $current = file_get_contents($file);
    $current .= PHP_EOL . date('d.m.Y  H:i:s', time()) . ' ' . implode(', ', $_POST);
    file_put_contents($file, $current);
}

/*
 * Запись файл логов с использованием компонентов monolog.
 */

require_once __DIR__ . '/vendor/autoload.php';


$current = implode(', ', $_SESSION['post']);

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/test.txt', Logger::INFO));

$log->info($current);

