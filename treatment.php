<?php

/**
 * Вывод ошибок в браузере
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Устанавливаем доступ к базе данных:
 */
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = '13579'; //пароль, по умолчанию пустой
$db_name = 'osago.rarus'; //имя базы данных

$link = mysqli_connect($host, $user, $password, $db_name);

//Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
mysqli_set_charset($link, "utf8");

/**
 * Авто создание всплывающего списка по параметрам
 * @param $name_select - Имя списка
 * @param $name_data - Имя в массиве $_POST
 * @param $name_array - Имя массива полученного из БД
 * @param $name_key_array - Ключ поиска по массиву
 *
 * @return string
 */

function selectForm($name_select, $name_data, $name_array, $name_key_array)
{
    $string =
        '<br>' . $name_select . '<br>
		 <p><select name=' . $name_data . '>';
    foreach ($name_array as $elem) {
        $param = $elem[$name_key_array];
        if (!empty($_POST)) {
            $varPost = $_POST[$name_data];
            if ($varPost === $param) {
                $string .= '<option selected>' . $param . '</option>';
            } else {
                $string .= '<option>' . $param . '</option>';
            }

        } else {
            $string .= '<option>' . $param . '</option>';
        }
    }
    $string .= '</select></p>';

    return $string;

}

/**
 * Функция для формирования таблицы результатов
 * @param $premium
 *
 * @return string
 */

function bonus_received($premium)
{

    $content = '<table>
			<tr>
				<th>Результаты расчета</th>
			</tr>';

    if (empty($_POST)) {
        $content .= "<tr>
				<thead><tr><td>Для расчета укажите параметры в форме ниже </td></tr></thead>";
    } else {
        $content .= "<tr>
				<tr><td>Тип ТС и категория:</td><td>{$_POST['type_ts']}</td></tr>
				<tr><td>Мощность двигателя:</td><td>{$_POST['engine_power']}</td></tr>
				<tr><td>Город регистрации:</td><td>{$_POST['city_registration']}</td></tr>
				<tr><td>Ограничение по количеству водителей:</td><td>{$_POST['number_drivers']}</td></tr>
				<tr><td>Период страховки:</td><td>{$_POST['insurance_period']}</td></tr>
				<tr><td>Коэффициент КБМ:</td><td>{$_POST['KBM']}</td></tr>
				<tr><td>Возраст водителя:</td><td>{$_POST['age_drivers']}</td></tr>
				<tr><td>Водительский стаж:</td><td>{$_POST['experience_drivers']}</td></tr>
				<tr><td>Водитель иностранный агент:</td><td>{$_POST['foreigner']}</td></tr>
				<tr><td>Юр. лицо или физ. лицо:</td><td>{$_POST['legal_form']}</td></tr>
				<tr><td>Период использования:</td><td>{$_POST['period_use']}</td></tr>
				<tr><td>Участие в ДТП:</td><td>{$_POST['violations']}</td></tr>
				<tr><td>Расчетная премия:</td><td> {$premium}</td></tr>
				<tr><td>Файл .xlsx</td><td><a href='excel.php'>Скачать</a></td></tr>
				<tr><td>Файл .pdf</td><td><a href='pdf.php'>Скачать</a></td></tr>
				<tr><td>Обновить расчетные данные:</td><td><a href='logout.php'>Обновить</a></td></tr>";
    }

    $content .= '</table>';

    return $content;
}

/**
 * Функция формирует запрос к БД
 * @param $link
 * @param $name
 * @param $table
 *
 * @return array
 */

function DataFromForm($link, $name, $table)
{
    $input = mysqli_real_escape_string($link, $name);
    $input_table = mysqli_real_escape_string($link, $table);
    $query = <<<SQL
SELECT $input FROM $input_table
SQL;
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) {
    };
    return $data;
}

/**
 * Обработка данных полученных из формы, задача записать в главную таблицу БД
 * индексы по всем основным параметрам.
 *
 * @param $link
 *
 * @return array|false
 */

function formDataSend($link)
{

    if (!empty($_POST)) {
        $dataForm = [
            $type_ts = mysqli_real_escape_string($link, $_POST['type_ts']),
            $engine_power = mysqli_real_escape_string($link, $_POST['engine_power']),
            $city_registration = mysqli_real_escape_string($link, $_POST['city_registration']),
            $number_drivers = mysqli_real_escape_string($link, $_POST['number_drivers']),
            $insurance_period = mysqli_real_escape_string($link, $_POST['insurance_period']),
            $KBM = mysqli_real_escape_string($link, $_POST['KBM']),
            $age_drivers = mysqli_real_escape_string($link, $_POST['age_drivers']),
            $experience_drivers = mysqli_real_escape_string($link, $_POST['experience_drivers']),
            $foreigner = mysqli_real_escape_string($link, $_POST['foreigner']),
            $legal_form = mysqli_real_escape_string($link, $_POST['legal_form']),
            $period_use = mysqli_real_escape_string($link, $_POST['period_use']),
            $violations = mysqli_real_escape_string($link, $_POST['violations']),
        ];

        $select = [
            "SELECT id, base_rate FROM type_ts_table WHERE short_name = '$type_ts'",
            "SELECT id, base_rate FROM engine_power_table WHERE short_name = '$engine_power'",
            "SELECT id, type1, type2 FROM city_registration_table WHERE short_name = '$city_registration'",
            "SELECT id FROM user_options_table WHERE number_drivers_limited = '$number_drivers'",
            "SELECT id, base_rate FROM insurance_period_table WHERE short_name = '$insurance_period'",
            "SELECT id, base_rate FROM KBM_table WHERE short_name = '$KBM'",
            "SELECT id FROM age_drivers_table WHERE short_name = '$age_drivers'",
            "SELECT id FROM experience_drivers_table WHERE short_name = '$experience_drivers'",
            "SELECT id FROM user_options_table WHERE foreigner = '$foreigner'",
            "SELECT id FROM user_options_table WHERE legal_form = '$legal_form'",
            "SELECT id, base_rate FROM period_use_table WHERE short_name = '$period_use'",
            "SELECT id FROM user_options_table WHERE violations = '$violations'",
        ];

        foreach ($select as $elem) {
            $result = mysqli_query($link, $elem) or die(mysqli_error($link));
            $index[] = mysqli_fetch_assoc($result);
        }

        /*
        *получаем id
        */
        $type_ts = $index[0]['id'];
        $engine_power = $index[1]['id'];
        $city_registration = $index[2]['id'];
        $number_drivers = $index[3]['id'];
        $insurance_period = $index[4]['id'];
        $KBM = $index[5]['id'];
        $age_drivers = $index[6]['id'];
        $experience_drivers = $index[7]['id'];
        $foreigner = $index[8]['id'];
        $legal_form = $index[9]['id'];
        $period_use = $index[10]['id'];
        $violations = $index[11]['id'];

        if ($type_ts === 1 && $legal_form === 'Юр. лицо') {
            $KPt = 1;
        } elseif ($type_ts === 4) {
            $KPt = 2;
        } elseif ($type_ts === 5) {
            $KPt = 3;
        } elseif ($type_ts === 7) {
            $KPt = 4;
        } else {
            $KPt = 5;
        }

        $query = "INSERT INTO main_table SET
    type_ts='$type_ts',
    engine_power='$engine_power',
    city_registration='$city_registration',
    number_drivers='$number_drivers',
    insurance_period='$insurance_period',
    KBM='$KBM',
    age_drivers='$age_drivers',
    experience_drivers='$experience_drivers',
    foreigner='$foreigner',
    legal_form='$legal_form',
    period_use='$period_use',
    violations='$violations', 
    KPt='$KPt'";

        $index_array = [
            'type_ts',
            'engine_power',
            'city_registration',
            'number_drivers',
            'insurance_period',
            'KBM',
            'age_drivers',
            'experience_drivers',
            'foreigner',
            'legal_form',
            'period_use',
            'violations',
        ];

        $index_comb = array_combine($index_array, $index);
        $index_comb['KPt'] = $KPt;

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        return $index_comb;
    }
}

/**
 * Отправка данных в БД (вызов функции)
 */

$index_comb = formDataSend($link);


/**
 * Выборка данных для форм (HTML), из БД
 */

$name_type = DataFromForm($link, 'short_name', 'type_ts_table');
$name_engine_power = DataFromForm($link, 'short_name', 'engine_power_table');
$name_city_registration = DataFromForm($link, 'short_name', 'city_registration_table');
$name_number_drivers = DataFromForm($link, 'number_drivers_limited', 'user_options_table');
$name_insurance_period = DataFromForm($link, 'short_name', 'insurance_period_table');
$name_KBM = DataFromForm($link, 'short_name', 'KBM_table');
$name_age_drivers = DataFromForm($link, 'short_name', 'age_drivers_table');
$name_experience_drivers = DataFromForm($link, 'short_name', 'experience_drivers_table');
$name_foreigner = DataFromForm($link, 'foreigner', 'user_options_table');
$name_legal_form = DataFromForm($link, 'legal_form', 'user_options_table');
$name_period_use = DataFromForm($link, 'short_name', 'period_use_table');
$name_violations = DataFromForm($link, 'violations', 'user_options_table');

/**
 * Основная логика вычисления, формируем показатели стоимости премии округленный до 2 знаков после запятой
 * @param $index_comb
 * @param $link
 *
 * @return string
 */

function premium($index_comb, $link)
{
    /*
     * Вводим переменные которые описывают показатели, но не вошли в структуру БД
     */

    $entity = 1.8; // коэффициент КО для юр. лиц
    $not_limit_number_drivers = 1.87; // коэффициент КО без ограничений по количеству водителей
    $limit_number_drivers = 1; // коэффициент КО при ограниченном количестве водителей
    $coeff_violations = 1.5; // коэффициент КН - при наличие нарушений

    $foreigner = $index_comb['foreigner']['id'];
    $legal_form = $index_comb['legal_form']['id'];

    /*
     * Вводим переменные которые описывают показатели, но не вошли в структуру БД
     */
    if (!empty($index_comb)) {

        /*
         * Коэффициент ТБ
         */

        $TB = $index_comb['type_ts']['base_rate'];

        /*
         * Коэффициент КТ
         */

        if ($index_comb['type_ts']['id'] !== 10) {
            $KT = $index_comb['city_registration']['type1'];
        } else {
            $KT = $index_comb['city_registration']['type2'];
        }

        $KBM = $index_comb['KBM']['base_rate'];

        /*
         * Коэффициент КО
         */

        if ($index_comb['number_drivers']['id'] == 1) {
            $KO = $limit_number_drivers;
        } elseif ($index_comb['legal_form']['id'] == 2) {
            $KO = $entity;
        } else {
            $KO = $not_limit_number_drivers;
        }

        /*
         * Коэффициент КВС
         */

        if ($foreigner == 1 && $legal_form == 1) {
//    иностранец и физ. лицо
            $KBC = 1.7;
        } elseif ($foreigner == 1 && $legal_form == 2) {
//    иностранец и юр. лицо
            $KBC = 1;
        } else {

            $ageKBC = $index_comb['age_drivers']['id'];
            $experienceKBC = $index_comb['experience_drivers']['id'];


            $queryKBC = "SELECT base_rate FROM age_experience_table WHERE id_age = '$ageKBC' AND id_experience = '$experienceKBC'";
            $resultKBC = mysqli_query($link, $queryKBC) or die(mysqli_error($link));
            for ($dataKBC = []; $rowKBC = mysqli_fetch_assoc($resultKBC); $dataKBC[] = $rowKBC) {
            };

            $KBC = $dataKBC[0]['base_rate'];
        }

        /*
         * Коэффициент КМ
         */

        $KM = $index_comb['engine_power']['base_rate'];

        /*
         * Коэффициент КПр
         */

        $number_KPt = $index_comb['KPt'];

        $queryKPt = "SELECT base_rate FROM KPt_table WHERE id = '$number_KPt' ";
        $resultKPt = mysqli_query($link, $queryKPt) or die(mysqli_error($link));
        for ($dataKPt = []; $rowKPt = mysqli_fetch_assoc($resultKPt); $dataKPt[] = $rowKPt) {
        };

        $KPt = $dataKPt[0]['base_rate'];

        /*
         * Коэффициент КС
         */

        $KC = $index_comb['period_use']['base_rate'];

        /*
         * Коэффициент КР
         */

        $KP = $index_comb['insurance_period']['base_rate'];

        /*
         * Коэффициент КН
         */

        if ($index_comb['age_drivers']['id'] == 1) {
            $KH = $coeff_violations;
        } else {
            $KH = 1;
        }

        $type_TS = $index_comb['type_ts']['id'];

        if ($type_TS == 2 || $type_TS == 3 || $type_TS == 4) {
            if ($foreigner == 2 && $legal_form == 1) {
//    физ. лицо
                $premium = $TB * $KT * $KBM * $KBC * $KO * $KM * $KC * $KH;
            } elseif ($foreigner == 2 && $legal_form == 2) {
//    юр. лицо
                $premium = $TB * $KT * $KBM * $KO * $KM * $KC * $KH * $KPt;
            } elseif ($foreigner == 1 && $legal_form == 1) {
//    физ. лицо иностранец
                $premium = $TB * $KT * $KBM * $KBC * $KO * $KM * $KP * $KH;
            } elseif ($foreigner == 1 && $legal_form == 2) {
//    юр. лицо иностранец
                $premium = $TB * $KT * $KBM * $KO * $KM * $KP * $KH * $KPt;
            } else {
                $premium = 0;
            }
        } else {
            if ($foreigner == 2 && $legal_form == 1) {
//    физ. лицо
                $premium = $TB * $KT * $KBM * $KBC * $KO * $KC * $KH * $KPt;
            } elseif ($foreigner == 2 && $legal_form == 2) {
//    юр. лицо
                $premium = $TB * $KT * $KBM * $KO * $KC * $KH * $KPt;
            } elseif ($foreigner == 1 && $legal_form == 1) {
//    физ. лицо иностранец
                $premium = $TB * $KT * $KBM * $KBC * $KO * $KP * $KH * $KPt;
            } elseif ($foreigner == 1 && $legal_form == 2) {
//    юр. лицо иностранец
                $premium = $TB * $KT * $KBM * $KO * $KP * $KH * $KPt;
            } else {
                $premium = 0;
            }
        }

    } else {
        $premium = 0;
    }

    return round($premium, 2) . ' ' . 'p.';
}

/**
 * вызов функции по раcчету премии
 */
$premium = premium($index_comb, $link);







