<!DOCTYPE html>
<html>
<head>
    <title>Auth</title>
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href=
          "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity=
          "sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
          crossorigin="anonymous">
</head>
<body>
    <form method="post" action="index2.php">
        <div>
            <pre>
            <h3>Sign in</h3><br>
            <input type="text" name="login" placeholder="Login"><br>
            <input type="password" name="pass" placeholder="Password"><br>
            <input type="submit" name="submit" value="Sign in"
                   class="btn btn-primary" required><br>
        </div>
        <?php
        /**
         * User: student
         * Date: 08.07.16
         * Time: 12:40
         * PHP version 7.0
         */
        //$login = "Liza";
        //$pass = "123";

        $auth = new Authenticate();

        if ($_COOKIE[session_name()]) {
            session_start();
        }
        if ($_POST['submit'] && $_POST['login'] && $_POST['pass']) {
            if ($auth->auth($_POST['login'], $_POST['pass'])) {
                echo "You are logged in as " . $auth->login;
            } else {
                echo "Wrong login or password!";
            }
        }
        if (isset($_POST['logout'])) {
            $auth->logOut();
        }
        if ($auth->isAuth()) {
            echo "You are logged in as " . $auth->login;?>
            <br>
            <pre>
            <input type="submit" name="logout" value="Log out"
                   class="btn btn-primary" required><br>
            <?php
        }
        ?>
    </form>
</body>
</html>

<?php
/**
 * PHP version 7.0
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * PHP version 7.0
 */
class Authenticate
{
    public $login = 'Liza';
    public $pass = 123;

    /**
     * Check if user is logged in
     */
    public function isAuth() //
    {
        if (isset($_SESSION['login'])) {
            return true;
        } return false;
    }
    /**
     * PHP version 7.0
     */
    public function auth($login, $pass)
    {
        if (($login == $this->login) && ($pass == $this->pass)) {
            session_start();
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }
    /*public function getLogin()
    {
        return true;
    }*/
    /**
     * PHP version 7.0
     */
    public function logOut()
    {
        session_unset();
        session_destroy();
        return true;
    }
}
?>
