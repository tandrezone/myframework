<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
include_once(ROOT.DS."core".DS."autoload.php");
$url = $_GET['url'];
echo $url;
