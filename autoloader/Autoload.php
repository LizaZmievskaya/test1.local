<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 11.07.16
 * Time: 12:59
 */

spl_autoload_register('load');

function load($name) {

    $path = "src/";
    $ar = explode("\\", $name);

    include $path.$ar[2].".php";
    //echo $name."<br>";
    //include "src/MyLogger.php";
}