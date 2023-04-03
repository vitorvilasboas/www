<?php

	// se o usuário não estiver logado, vamos abrir o formulário de login
	// mas, se o usuário estiver logado, vamos mostrar uma mensagem de boas vindas
	// e mostrar também o seu nome de usuário
	
	// notem que é a camada de controller vai definir qual arquivo da camada view será aberta
	
	// iniciar o uso de sessão
	session_start();
	
	$titulo = "Utilizando sessões em PHP";
	
	// Codigo que verifica se o usuario deseja fazer logout
	if( (isset($_GET['logout']) && $_GET['logout'] == "sim" ) && isset($_SESSION['usuario']))
		{
			unset($_SESSION['usuario']); // Encerrar sessão
		}
	
	// Codigo que verifica se o usuário informou os dados de login corretamente
	// Para logar o campo usuário deve ser igual a admin e a senha deve ser 12345 
	// Futuramente implementaremos essa parte com banco de dados
	
	if( (isset($_POST['usuario']) && $_POST['usuario'] == "admin" ) && (isset($_POST['senha']) && $_POST['senha'] == "12345") )
		{
			$_SESSION['usuario'] = $_POST['usuario']; // A sessão usuário passará a existir e receberá
													  //o valor do campo usuário que servirá para identificar
		}											  // a sessão deste usuário
	
	// verificando se o campo usuario na tela de login foi inicializado
	// isset é uma função que verifica se uma variavel existe ou não
	if(isset($_SESSION['usuario']))
		{
		// Quando o usuário estiver logado, exibir seus dados por meio da camada view
		require_once("view/usuario_logado.php");
		} 
	else
		{
		// Quando o usuário não está logado, invocar a tela de login na camada view
		require_once("view/tela_de_login.php");
		}
	