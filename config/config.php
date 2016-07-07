<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$PROJECT_PHP_SERVER="production";
$config = array();
$econfig = array();
foreach (glob('default/*.php') as $filename)
{
    $name = explode("/", $filename);
    $fname = strstr($name[1], ".", true);
    $config[$fname] = include $filename;
}
if ($PROJECT_PHP_SERVER){
    foreach (glob($PROJECT_PHP_SERVER .'/*.php') as $filename)
    {
        $name = explode("/", $filename);
        $fname = strstr($name[1], ".", true);
        $econfig[$fname] = include $filename;
    }
}
echo '<pre>';
print_r(array_merge_recursive($config, $econfig)); //need to fix
echo '<pre>';