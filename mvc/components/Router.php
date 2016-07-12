<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 12.07.16
 * Time: 16:39
 */
class Router
{
    public function route()
    {
        // get url
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        print_r($url);
        // check if such controller file exists
        $file = './controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            throw new Exception("The file " . $file . " does not exists.");
        }
        // creating an object
        $controller = new $url[0];
        // check if isset function with parameters or not
        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } elseif (isset($url[1])) {
            $controller->{$url[1]}();
        }
        //$controller->hello();
    }
}

