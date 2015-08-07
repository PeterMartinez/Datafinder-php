<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('vendor/autoload.php');
require_once('src/Datafinder/Datafinder.php');

$search = array();
	$search['d_first']  = "";
	$search['d_last']  = "";
	$search['d_zip'] = "";
	$search['d_fulladdr'] = "";
	$search['d_city']  = "";
	$search['d_state'] = "";
$dataFinder = new Datafinder\Datafinder("APIKEY");
$results = $dataFinder->contactAppend("email",$search);
echo "<pre>";
print_R($results);