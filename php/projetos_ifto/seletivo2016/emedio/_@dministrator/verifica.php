<?php
session_start();// Inicia sessões
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{
    // Usuário não logado! Redireciona para a página de login
    header("Location: form_login.php");
    exit;
} else {
	session_destroy();
}

?>