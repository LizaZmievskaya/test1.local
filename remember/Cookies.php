<?php
/**
 * Created by PhpStorm.
 * User: Elizaveta
 * Date: 11.07.2016
 * Time: 23:54
 */
class Cookies
{
    private $key = 'die';
    private $lifeTime = 1440;

    public function checkCookies()
    {
        if (isset($_COOKIE['UserId']) && isset($_COOKIE['Token'])) {
            $userId = $_COOKIE['UserId'];
            $db = new PDO('mysql:host=localhost; port=3306; dbname=users', 'root', '123kjubrf');
            $db->exec("SET NAMES utf8");
            $stmt = $db->prepare("SELECT * FROM users WHERE userId = $userId");
            $stmt->execute();
            $result = $stmt->fetchAll();
//            echo time()."<br>".$dbResult["expired"];
//            if (time() > $dbResult["expired"])
//                return false;
//            $password = md5($dbResult['tockenSecret'] + $_COOKIE['Token']);
//            if ($password != $dbResult['password'])
//                return false;
//            session_start();
//            $_SESSION['login'] = $dbResult["login"];
            return $result;
        } else {
            return false;
        }
        //return $result;
    }
    public function setCookies()
    {
        $password = $_POST['pass'];
        $login = $_POST['login'];
        $time = time() + $this->lifeTime;
        $hash = md5($time);
        $tokenSecret = md5($password, $this->key);
        $newPass = md5($tokenSecret . $hash);
        $db = new PDO('mysql:host=localhost; port=3306; dbname=users', 'root', '123kjubrf');
        $db->exec("SET NAMES utf8");
        $stmt = $db->prepare("INSERT
            INTO users (
                    login
                   , password
                   , tokenSecret
                   , expired
            )
            VALUES (
                     '$login'
                    ,'$newPass'
                    ,'$tokenSecret'
                    , $time
            )");
        $stmt->execute();
        $stmt = $db->prepare("SELECT userId
            FROM users WHERE login='$login'");
        $userId = $stmt->execute();
        setcookie("Token", "$hash", "$time");
        setcookie("UserId", "$userId", "$time");
        return $_COOKIE;
    }
}