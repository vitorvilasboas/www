<?php
	@session_start();
	if(!isset($_SESSION['cpf']) and !isset($_SESSION['senha'])and !isset($_SESSION['nome'])){
	header("Location:index.php");
	//exit;
	}
?>

