<?php
session_start();// Inicia sess�es
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sess�o de login
{
    // Usu�rio n�o logado! Redireciona para a p�gina de login
    header("Location: form_login.php");
    exit;
} else {
	session_destroy();
}

?>