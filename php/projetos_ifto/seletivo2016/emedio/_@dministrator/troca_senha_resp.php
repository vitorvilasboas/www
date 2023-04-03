<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
	require "../config/conectaBanco.php";

	$SQL = "select senha from usuarios where login='".$_SESSION["nome_usuario"]."'";

	$result = mysql_query($SQL, $conectar);
	$senha = mysql_fetch_array($result);

	if ($senha["senha"] != md5($_POST["senha_atual"])){
		header ("Location: troca_senha.php?erro=1");
		exit;
	}

	if ($_POST["senha_nova"] != $_POST["senha_nova_confirmacao"]){
		header ("Location: troca_senha.php?erro=2");
		exit;
	}

	$SQL = "update usuarios set senha='".md5($_POST["senha_nova"])."' where login='".$_SESSION["nome_usuario"]."'";

	mysql_query($SQL, $conectar);
	header ("Location: troca_senha.php?erro=-1");
}
?>