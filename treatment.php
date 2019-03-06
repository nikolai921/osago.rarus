<?php
/*
 * Подгружаем основные функции от файла function
 */
include 'function.php';

/*
 * Вывод ошибок в браузере
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/*
 * Устанавливаем доступы к базе данных:
 */
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = '13579'; //пароль, по умолчанию пустой
$db_name = 'osago.rarus'; //имя базы данных

$link = mysqli_connect($host, $user, $password, $db_name);

//Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
mysqli_query($link, "SET NAMES 'utf8'");

/*
 * Отправка данных в БД
 */

$index_comb = formDataSend($link);

/*
 * Вводим статические переменные
 */

$entity = 1.8;
$not_limit_number_drivers = 1.87;
$limit_number_drivers = 1;
$coeff_violations = 1.5;

/*
 * Выборка данных для форм из БД
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

/*
 * Основная логика вычисления, формируем показатели
 */

if(!empty($index_comb)) {
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
        $K0 = $not_limit_number_drivers;
    }

    /*
     * Коэффициент КВС
     */
    if ($index_comb['foreigner']['id'] == 1 && $index_comb['legal_form']['id'] == 1) {
//    иностранец и физ. лицо
        $KBC = 1.7;
    } elseif ($index_comb['foreigner']['id'] == 1 && $index_comb['legal_form']['id'] == 2) {
//    иностранец и юр. лицо
        $KBC = 1;
    } else {

        $ageKBC = $index_comb['age_drivers']['id'];
        $experienceKBC = $index_comb['experience_drivers']['id'];
        print_r($experienceKBC);

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
        if ($index_comb['foreigner']['id'] == 2 && $index_comb['legal_form']['id'] == 1) {
//    физ. лицо
            $premium = $TB * $KT * $KBM * $KBC * $KO * $KM * $KC * $KH;
        } elseif ($index_comb['foreigner']['id'] == 2 && $index_comb['legal_form']['id'] == 2) {
//    юр. лицо
            $premium = $TB * $KT * $KBM * $KO * $KM * $KC * $KH * $KPt;
        } elseif ($index_comb['foreigner']['id'] == 1 && $index_comb['legal_form']['id'] == 1) {
//    физ. лицо иностранец
            $premium = $TB * $KT * $KBM * $KBC * $KO * $KM * $KP * $KH;
        } elseif ($index_comb['foreigner']['id'] == 1 && $index_comb['legal_form']['id'] == 2) {
//    юр. лицо иностранец
            $premium = $TB * $KT * $KBM * $KO * $KM * $KP * $KH * $KPt;
        } else {
            $premium = 0;
        }
    } else {
        if ($index_comb['foreigner']['id'] == 2 && $index_comb['legal_form']['id'] == 1) {
//    физ. лицо
            $premium = $TB * $KT * $KBM * $KBC * $KO * $KC * $KH * $KPt;
        } elseif ($index_comb['foreigner']['id'] == 2 && $index_comb['legal_form']['id'] == 2) {
//    юр. лицо
            $premium = $TB * $KT * $KBM * $KO * $KC * $KH * $KPt;
        } elseif ($index_comb['foreigner']['id'] == 1 && $index_comb['legal_form']['id'] == 1) {
//    физ. лицо иностранец
            $premium = $TB * $KT * $KBM * $KBC * $KO * $KP * $KH * $KPt;
        } elseif ($index_comb['foreigner']['id'] == 1 && $index_comb['legal_form']['id'] == 2) {
//    юр. лицо иностранец
            $premium = $TB * $KT * $KBM * $KO * $KP * $KH * $KPt;
        } else {
            $premium = 0;
        }
    }

}



print_r($premium);
//
//
//
//
//print_r($TB);
//echo '</br>';
//print_r($KT);
//echo '</br>';
//print_r($KBM);
//echo '</br>';
//print_r($KO);
//echo '</br>';
//print_r($KBC);
//echo '</br>';
//print_r($KM);
//echo '</br>';
//print_r($KPt);
//echo '</br>';
//print_r($KC);
//echo '</br>';
//print_r($KP);
//echo '</br>';




//print_r($_POST);





