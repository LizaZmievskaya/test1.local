<?php
/*     namespace auth;
     include "Db.php";

*/?>
<!DOCTYPE html>
<html>
<head>
    <title>Reg</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <form method="post">
        <div>
            <pre>
            <h3>Sign up</h3><br>
            <input type="text" name="login" placeholder="Login"><br>
            <input type="password" name="pass" placeholder="Password"><br>
            <input type="submit" name="submit" value="Sign up" class="btn btn-primary" required><br>
        </div>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $reg = new Registration();

        /*if ($_COOKIE[session_name()]){
            session_start();
        }*/
        if ($_POST['submit'] && $_POST['login'] && $_POST['pass']) {
            if ($reg->checkLogin($_POST['login']) == null) {
                if ($reg->reg($_POST['login'], $_POST['pass'])) {
                    echo "You are successfully registered. Click \"Sign in\"."; ?>
                    <a href="index2.php">Sign in</a><?php
                }
            } else  echo "User with such login already exists. Please try another login.";
        }?>
    </form>
    </body>
    </html>

<?php
/**
 * Created by PhpStorm.
 * User: Elizaveta
 * Date: 11.07.2016
 * Time: 22:00
 */


    class Registration
    {
        public function reg($login, $pass)
        {
            /*$time = 1440;
            $expired = time() + $time;
            $hash = md5($time);
            $tokenSecret = md5(userId.'die');
            $password = md5($pass + $tokenSecret + $hash);*/
            $db = new PDO('mysql:host=localhost; port=3306; dbname=users', 'root', '123kjubrf');
            $db->exec("SET NAMES utf8");
            //$conn = $this->connectDB();
            $stmt = $db->prepare("INSERT INTO reg VALUES('$login','$pass')");
            $result = $stmt->execute();
            /*if (($login == $this->login) && ($pass == $this->pass)){
                session_start();
                $_SESSION['login'] = $login;
                return true;
            }
            return false;*/
            return $result;
        }
        public function checkLogin($login)
        {
            $db = new PDO('mysql:host=localhost; port=3306; dbname=users', 'root', '123kjubrf');
            $db->exec("SET NAMES utf8");
            $stmt = $db->prepare("SELECT * FROM reg WHERE login = '$login'");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
    ?>
