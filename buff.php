<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 06.07.16
 * Time: 16:43
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
$size = ini_get("output_buffering");
for ($i = 1; $i <= 10; $i++) {
    echo $i;
    echo str_repeat(" ", $size);
    flush();
    sleep(1);
}
die;

ob_start();
{
    ob_start();
    {
        echo ob_get_level();
    }
    //echo str_repeat("1", 4000);
    header("MyHeader:ABC");
}
$content = ob_get_contents();
/*ob_end_clean();
var_dump($content);
ob_end_flush();
echo ini_get("output_buffering");*/
while (ob_get_level())
{
    ob_end_clean();
}

