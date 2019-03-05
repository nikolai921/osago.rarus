<?php

/*
 *Обработка данных полученых из формы
 */

function formDataSend($link)
{

    if(!empty($_POST))
    {
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
    $violations = mysqli_real_escape_string($link, $_POST['violations'])
    ];


    $select = [
      "SELECT id FROM type_ts_table WHERE short_name = $type_ts",
      "SELECT id FROM Engine_power_table WHERE short_name = $engine_power",
      "SELECT id FROM City_registration_table WHERE short_name = $city_registration",
      "SELECT id FROM User_options_table WHERE number_drivers_limited = $number_drivers",
      "SELECT id FROM Insurance_period_table WHERE short_name = $insurance_period",
      "SELECT id FROM KBM_table WHERE short_name = $KBM",
      "SELECT id FROM Age_drivers_table WHERE short_name = $age_drivers",
      "SELECT id FROM Experience_drivers_table WHERE short_name = $experience_drivers",
      "SELECT id FROM User_options_table WHERE foreigner = $foreigner",
      "SELECT id FROM User_options_table WHERE legal_form = $legal_form",
      "SELECT id FROM Period_use_table WHERE short_name = $period_use",
      "SELECT id FROM User_options_table WHERE violations = $violations",
    ];

    foreach ($select as $elem)
    {
        $result = mysqli_query($link, $elem) or die(mysqli_error($link));
        $index[] = mysqli_fetch_assoc($result);
    }

    $query = "INSERT INTO main_table SET 
    engine_power='$index[0]',
    city_registration='$index[1]',
    number_drivers='$index[2]',
    insurance_period='$index[3]',
    KBM='$index[4]',
    KPt='$index[5]',
    age_drivers='$index[6]',
    experience_drivers='$index[7]',
    foreigner='$index[8]',
    legal_form='$index[9]',
    period_use='$index[10]',
    violations='$index[11]'";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
}
}

