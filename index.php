<?php

    echo '<!DOCTYPE html>
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
						<form action="treatment.php" method="POST">
		 				<br>Тип ТС и категория (на примере Указа ЦБ):<br>
		 				<p><select name="type_ts">
							<option>Транспортные средства категории В Е</option>
							<option>Belarus</option>
							<option>Kazakhstan</option>
							<option>England</option>
						</select></p>
						
						<br>Мощность двигателя:<br>
		 				<p><select name="engine_power">
							<option>122</option>
							<option>150</option>
							<option>Kazakhstan</option>
							<option>England</option>
						</select></p>
					
		 				<br>Город регистрации (ТПИ на примере Указа ЦБ):<br>
						<p><select name="city_registration">
							<option>Республика Адегея</option>
							<option>Belarus</option>
							<option>Kazakhstan</option>
							<option>England</option>
						</select></p>
					
						<br>Ограниченное количество водителей:<br>
						<p><select name="number_drivers">
							<option>Ограниченое количество лиц допущеных к управлению ТС</option>
							<option>Не ограниченое количество лиц допущеных к управлению ТС</option>
						</select></p>
						
						<br>Период страховки:<br>
						<p><select name="insurance_period">
							<option>15 дней</option>
							<option>1 год</option>
							<option>Kazakhstan</option>
							<option>England</option>
						</select></p>
						
						<br>Коэффициент КБМ:<br>
						<p><select name="KBM">
							<option>2.45</option>
							<option>2.3</option>
							<option>1.4</option>
							<option>1.5</option>
						</select></p>
												
						<br>Возраст водителя (количество полных лет):<br>
						<p><select name="age_drivers">
							<option>16-21</option>
							<option>22-24</option>
							<option>25-29</option>
						</select></p>
						
						<br>Водительский стаж (количество полных лет):<br>
						<p><select name="experience_drivers">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3-4</option>
						</select></p>
						
						<br>Является ли иностранным агентом:<br>
						<p><select name="foreigner">
							<option>Да</option>
							<option>Нет</option>
						</select></p>
						
						<br>Юр. лицо или физ. лицо:<br>
						<p><select name="legal_form">
							<option>Юр. лицо</option>
							<option>Физ. лицо</option>
						</select></p>
						
						<br>Период использования:<br>
						<p><select name="period_use">
							<option>3 месяца</option>
							<option>4 месяца</option>
							<option>5 месяца</option>
							<option>6 месяца</option>
						</select></p>
						
						<br>Способствовал ли водитель ДТП, участиe ДТП:<br>
						<p><select name="violations">
							<option>Да</option>
							<option>Нет</option>
						</select></p>
						
		 				<p><input type="submit" class="btn btn-info btn-block" value="Insert"></p>
	 				</form>
				</header>
			</div>
		</body>
		<title> '.$title.' </title>
	</html>';

print_r($_POST);
