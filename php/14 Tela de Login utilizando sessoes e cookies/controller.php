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
			// Apagando o cookie 						// Informar valor do cookie vazio
			setcookie("usuario_logado","",time()-3600); // informar um tempo negativo
														// Informa ao servidor para deletar o cookie
			
			unset($_SESSION['usuario']);
			unset($_COOKIE['usuario_logado']); // Destruindo a variavel de cookie da memoria do servidor
		}
	
	// Codigo que verifica se o usuário informou os dados de login corretamente
	// Para logar o campo usuário deve ser igual a admin e a senha deve ser 12345 
	// Futuramente implementaremos essa parte com banco de dados
	
	if( (isset($_POST['usuario']) && $_POST['usuario'] == "admin" ) && (isset($_POST['senha']) && $_POST['senha'] == "123") )
		{
			// 1. Criar um cookie que vai manter o usuário logado no sistema, se o usuário autorizar
			// 2. O usuario deverá ficar logado por 1 mês
			// 3. O campo manter_login deve existir 
			if( isset( $_POST['manter_login']) && ($_POST['manter_login'] == "sim") )
			{                              
						   // nome do      // nome do usuario    // hora atual + 60seg  
                           // cookie       // que está logado    // x 60min * 24h * 30d  		
				setcookie("usuario_logado",$_POST['usuario'], time()+60*60*24*30);
			}
			
			$_SESSION['usuario'] = $_POST['usuario']; // A sessão usuário passará a existir e receberá
													  //o valor do campo usuário que servirá para identificar
		}											  // a sessão deste usuário
	
	// 1. verificando se o campo usuario na tela de login foi inicializado
	// 2. isset é uma função que verifica se uma variavel existe ou não
	// 3. Se o usuário já tiver feito o login uma vez, a variavel $_COOKIE['usuariologado'],
	//    existirá, informando ao servidor que o usuário já fez algum login anteriormente
	if(isset($_SESSION['usuario']) || isset($_COOKIE['usuario_logado']) )
	{
		if(isset($_COOKIE['usuario_logado']))
		{													// A sessão receberá o valor do cookie
		 $_SESSION['usuario'] = $_COOKIE['usuario_logado']; // caso, o usuário ja tenha feito algum
		}													// login anterior
		 
		// Quando o usuário estiver logado, exibir seus dados por meio da camada view
		require_once("view/usuario_logado.php");
	} 
	else
	{
		// Quando o usuário não está logado, invocar a tela de login na camada view
		require_once("view/tela_de_login.php");
	}
	