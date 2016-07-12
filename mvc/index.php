<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 12.07.16
 * Time: 16:36
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'components/Router.php';
$app = new Router();
$app->route();