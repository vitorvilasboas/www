<?php
	session_start();//Inicia sessões

	echo $_SESSION["nome"]; 

	echo $_SESSION["sobrenome"]; 
	

?>

<a href="descartar.php">Descartar Sessoes</a>