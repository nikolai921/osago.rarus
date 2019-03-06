<?php

/*
 *Запрос для вывода данных из БД
 * данные в основном для форм и списков
 */

function DataFromForm($link, $name, $table)
{
    $input = mysqli_real_escape_string($link, $name);
    $input_table = mysqli_real_escape_string($link, $table);
    $query = "SELECT $input FROM $input_table";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row){};
    return $data;
}


/*
 *Авто создание вплывающего списка по параметрам
 * Имя списка
 * Имя в массиве $_POST
 * Имя массива полученого из БД
 * Ключ поиска по массиву
 */

function selectForm($name_select, $name_data, $name_array, $name_key_array)
{
    $string =
        '<br>'.$name_select.'<br>
		 <p><select name='.$name_data.'>';
    foreach($name_array as $elem)
    {
        $param = $elem[$name_key_array];
        $string .= '<option>'.$param.'</option>';

    }
    $string .= '</select></p>';

    return $string;

}

/*
 *Обработка данных полученых из формы, задача записать в главную таблицу БД
 * индексы по всем основным параметрам.
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
      "SELECT id FROM user_options_table WHERE violations = '$violations'"
    ];

    foreach ($select as $elem)
    {
        $result = mysqli_query($link, $elem) or die(mysqli_error($link));
        $index[] = mysqli_fetch_assoc($result);
    }

 /*
 *получаем id
 */
        $type_ts=$index[0]['id'];
        $engine_power=$index[1]['id'];
        $city_registration=$index[2]['id'];
        $number_drivers=$index[3]['id'];
        $insurance_period=$index[4]['id'];
        $KBM=$index[5]['id'];
        $age_drivers=$index[6]['id'];
        $experience_drivers=$index[7]['id'];
        $foreigner=$index[8]['id'];
        $legal_form=$index[9]['id'];
        $period_use=$index[10]['id'];
        $violations=$index[11]['id'];




        if($type_ts == 1 && $legal_form == 'Юр. лицо')
        {
            $KPt = 1;
        } elseif ($type_ts == 4)
        {
            $KPt = 2;
        } elseif ($type_ts == 5)
        {
            $KPt = 3;
        } elseif ($type_ts == 7)
        {
            $KPt = 4;
        } else
        {
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
            'violations'
        ];

        $index_comb = array_combine($index_array, $index);
        $index_comb['KPt'] = $KPt;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    return $index_comb;
}
}


