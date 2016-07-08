<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 08.07.16
 * Time: 10:19
 */
session_start();
var_dump(session_name());

/*ini_set('session.use_cookies', 0);
ini_set('session.use_only_cookies', 0);
ini_set('session.use_trans_sid', 1);*/

/*
var_dump(session_save_path());
session_save_path('/home/student/sessions');*/

/*$lifeTime = 600;
session_set_cookie_params($lifeTime, null, null, true);*/



//var_dump(session_get_cookie_params());


/*$_SESSION['test'] = 'car';
$_SESSION['foo'] = 'bmw';

$_SESSION[] = array();
session_destroy();*/


/*if (!isset($_SESSION['time'])) {
    $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
    $_SESSION['time'] = date("H:i:s");
}
if ($_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT']) {
    die('Wrong browser');
}*/


/*if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = date("H:i:s");
}
echo $_SESSION['time'];*/


/*echo "<pre>";
var_dump($_SESSION);
var_dump(session_name());
var_dump(session_id());
var_dump(session_save_path());*/
