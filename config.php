<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL",  "http://localhost/Hamburgueria/");
	$config['dbname'] = 'hamburgueria';
	$config['host']   = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL",  "");
	$config['dbname'] = '';
	$config['host']   = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8".";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(Throwable  $e) {
	echo "ERRO: ".$e->getMessage()."<br/>";
	echo "ERRO: ".$e->getLine()."<br/>";
/*	echo "ERRO: ".$e->getCode()."<br/>";
	echo "ERRO: ".$e->getFile()."<br/>";
	echo "ERRO: ".$e->getTraceAsString()."<br/>";
	echo "ERRO: ".$e->getPrevious()."<br/>";
	echo "ERRO: ".$e->__toString()."<br/>";

	echo "<pre>";
	print_r($e->getTrace());
	echo "</pre>";
*/
	exit;
}