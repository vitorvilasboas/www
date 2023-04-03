<?php

	session_start();//Inicia sessões
	
	$_SESSION["nome"] = "Vitor";

	$_SESSION["sobrenome"] = "Vilas Boas";

	echo 'Sessoes criadas'.'<br>';
?>

	<a href="mostrar.php">Imprimir valor Sessoes</a>