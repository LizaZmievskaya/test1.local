<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_error_handler("errorHandler", E_ALL);
function errorHandler($errno, $errstr, $errfile='', $errline=null, $errcontext=[]) //необязательные аргументы инициализируем
{
    /*require_once "template.php";
    $header = template('header.phtml', ['title' => 'Hello World!']);
    $content = template('content.phtml', ['content' => "Lorem ipsum", 'meta' => 'Author info']);
    $footer = template('footer.phtml', ['copy' => "Copyright ". date('Y')]);
    echo $header, $content, $footer;
    nonexistingFunction();*/
    if (error_reporting())
    {
        throw new Exception('Error', 111);
    }
}
try
{
    echo $foo;
    //nonexistingFunction();
} catch (Exception $e) {
    echo "<pre>";
    var_dump($e);
    echo $e->getMessage(), "\n";
} finally {
    echo "\r\n Hello!";
}
