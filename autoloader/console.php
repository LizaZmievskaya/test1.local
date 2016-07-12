<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 11.07.16
 * Time: 12:59
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require "Autoload.php";
require_once '../vendor/autoload.php';
use Liza\MyLogger\MyLogger;



$test = new MyLogger();
$test->fun();