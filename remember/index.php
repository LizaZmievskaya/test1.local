<!DOCTYPE html>
<html>
<head>
    <title>Auth</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<form method="post" action="index2.php">
    <div>
            <pre>
            <h3>Sign in</h3><br>
            <input type="text" name="login" placeholder="Login"><br>
            <input type="password" name="pass" placeholder="Password"><br>
            <input type="submit" name="submit" value="Sign in" class="btn btn-primary" required><br>
            <input type="checkbox" name="remember"> Remember me<br>
    </div>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "Cookies.php";
$cook = new Cookies();
$auth = new Authenticate();

?><pre><?php
    var_dump($cook->checkCookies());
    /*if ($_COOKIE[session_name()]) {
        session_start();
    }*/
if ($_POST['submit'] && $_POST['login'] && $_POST['pass']) {
    if ($_POST['remember']) {
        if ($auth->auth($_POST['login'], $_POST['pass'])) {
                var_dump($cook->setCookies());
                echo "You are logged in as " . $_POST['login'];
        } else  echo "Wrong login or password!";
    }
}
        if (isset($_POST['logout'])) {
            $auth->logOut();
        }
        if ($auth->isAuth())
        {
        echo "You are logged in as " . $_POST['login']; ?>
        <br><pre>
        <input type="submit" name="logout" value="Log out" class="btn btn-primary" required><br>
            <?php
            }
            ?>
</form>
</body>
</html>

<?php

/**
 * Created by PhpStorm.
 * User: student
 * Date: 08.07.16
 * Time: 12:40
 */
class Authenticate
{
    public function isAuth() //check if user is logged in
    {
        if (isset($_SESSION['login'])) {
            return true;
        }
        return false;
    }

    public function auth($login, $pass)
    {
        $db = new PDO('mysql:host=localhost; port=3306; dbname=users', 'root', '123kjubrf');
        $db->exec("SET NAMES utf8");
        $stmt = $db->prepare("SELECT * FROM reg WHERE login='$login' AND password='$pass'");
        $stmt->execute();
        /*if (($login == $this->login) && ($pass == $this->pass)) {*/
        if ($stmt->execute()) {
            session_start();
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function getLogin()
    {
        if ($this->isAuth())
            return $_SESSION['login'];
        return "";
    }

    public function logOut()
    {
        session_unset();
        session_destroy();
        return true;
    }
}

?>
