<?php 
//<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
require "confGlobais.php";
$conectar = @mysql_connect($servidor, $usuario, $pass) or die("Não foi possível conectar com o servidor de dados!"); 
mysql_select_db ($db, $conectar) or die("Banco de dados não localizado!"); 
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>