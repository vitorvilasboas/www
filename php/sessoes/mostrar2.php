<?php
	session_start();

	echo 'Nome: '.$_SESSION["nome"].'<br>'; 

	echo 'Nome: '.$_SESSION["sobrenome"].'<br>'; 
	

?>

<a href="criar.php">Recriar Sessoes</a>