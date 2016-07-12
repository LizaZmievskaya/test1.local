<?php
/**
 * Created by PhpStorm.
 * User: Elizaveta
 * Date: 11.07.2016
 * Time: 22:03
 */
/*namespace auth;
use \PDO;
use \Exception;*/
class Db
{
    protected $db;
    public function connectDB()
    {
        $db = new PDO('mysql:host=localhost; dbname=users', 'root', '123kjubrf');
        $db->exec("SET NAMES utf8");
        if (!$db) {
            throw new Exception('Не удалось подключиться к базе данных.');
        } else {
            return $db;
        }
    }
}