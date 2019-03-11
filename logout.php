<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.03.19
 * Time: 19:43
 */

session_start();

session_destroy();

header('location: index.php');

