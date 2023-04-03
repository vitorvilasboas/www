<?php

$HOST='localhost';
$DB='acao_solidaria';
$USER='root';
$PASS='';

try{
	$conecta = new PDO('mysql:host='.$HOST.';dbname='.$DB, "$USER","$PASS",
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOexception $error_conecta){
	  'Erro ao conectar, favor informe no email contato@vilsonsoares.com';
	}

?>

