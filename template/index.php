<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "template.php";
$header = template('header.phtml', ['title' => 'Hello World!']);
$content = template('content.phtml', ['content' => "Lorem ipsum", 'meta' => 'Author info']);
$footer = template('footer.phtml', ['copy' => "Copyright ". date('Y')]);
echo $header, $content, $footer;