<?php
function template($filename, $array)
{
    ob_start();
    {
        require "$filename";
    }
    return ob_get_clean();
}