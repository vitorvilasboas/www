<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
<?php 
require "confGlobais.php";
$conectar = @mysql_connect($servidor, $usuario, $pass) or die("N&atilde;o foi poss&iacute;vel conectar com o servidor de dados!"); 
mysql_select_db ($db, $conectar) or die("Banco de dados n&atilde;o localizado!");
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>