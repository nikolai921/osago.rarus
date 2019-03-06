<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require 'function.php';
$title = 'Калькулятор ОСАГО';

    $stringHTML = '<!DOCTYPE html>
	<html lang="ru">
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="css/styles.css">
		</head>
		<body>
			<div id="wrapper">
				<header>
						<form action="treatment.php" method="POST">';

						$stringHTML .= selectForm('Тип ТС и категория (на примере Указа ЦБ):', 'type_ts', $name_type, 'short_name');
						$stringHTML .= selectForm('Мощность двигателя:', 'engine_power', $name_engine_power, 'short_name');
						$stringHTML .= selectForm('Город регистрации (ТПИ на примере Указа ЦБ):', 'city_registration', $name_city_registration, 'short_name');
						$stringHTML .= selectForm('Ограничение по количество водителей:', 'number_drivers', $name_number_drivers, 'number_drivers_limited');
						$stringHTML .= selectForm('Период страховки:', 'insurance_period', $name_insurance_period, 'short_name');
						$stringHTML .= selectForm('Коэффициент КБМ:', 'KBM', $name_KBM, 'short_name');
						$stringHTML .= selectForm('Возраст водителя (количество полных лет):', 'age_drivers', $name_age_drivers, 'short_name');
						$stringHTML .= selectForm('Водительский стаж (количество полных лет):', 'experience_drivers', $name_experience_drivers, 'short_name');
						$stringHTML .= selectForm('Является ли иностранным агентом:', 'foreigner', $name_foreigner, 'foreigner');
						$stringHTML .= selectForm('Юр. лицо или физ. лицо:', 'legal_form', $name_legal_form, 'legal_form');
						$stringHTML .= selectForm('Период использования:', 'period_use', $name_period_use, 'short_name');
						$stringHTML .= selectForm('Способствовал ли водитель ДТП, участиe ДТП:', 'violations', $name_violations, 'violations');

$stringHTML .=
                        '<p><input type="submit" class="btn btn-info btn-block" value="Insert"></p>
	 				</form>
				</header>
			</div>
		</body>
		<title> '.$title.' </title>
	</html>';

echo $stringHTML;


