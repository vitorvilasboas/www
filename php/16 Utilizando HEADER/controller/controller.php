﻿<?php

	// se o usuário não estiver logado, vamos abrir o formulário de login
	// mas, se o usuário estiver logado, vamos mostrar uma mensagem de boas vindas
	// e mostrar também o seu nome de usuário
	
	// notem que é a camada de controller vai definir qual arquivo da camada view será aberta
	
	// iniciar o uso de sessão
	session_start();
	
	$titulo = "Blog em PHP"; // Titulo que aparece no topo da janela do navegador
	
	// Array que guarda as funções implementadas no site
	$texto_informativo = array("Funções implementadas até o momento:<br>");
	$texto_informativo[] = "1. Uso do padrão MVC<br>";
	$texto_informativo[] = "2. Uso de sessões<br>";
	$texto_informativo[] = "3. Uso de cookies para armazenar informações de login<br>";
	$texto_informativo[] = "4. Utilização de arquivo externo para funções<br>";
	$texto_informativo[] = "5. Manipulação de arquivos fisicos<br>";
	$texto_informativo[] = "6. Utilização do header para redirecionar IP's atacantes<br>";
	$texto_informativo[] = "7. Utilização do header para evitar o armazenamento em cache no navegador<br>";
	
	// Codigo que verifica se o usuario deseja fazer download
	
	
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
	// Para logar o campo usuário deve ser igual a admin e a senha deve ser 123 
	// Um registro de log do usuário é realizado
	// Futuramente implementaremos essa parte com banco de dados
	if( (isset($_POST['usuario']) && $_POST['usuario'] == "admin" ) && (isset($_POST['senha']) && $_POST['senha'] == "123") )
		{
			// 1. CriAr um cookie que vai�manter o usuário logado no sistem�, se o usuário autorizar
			// 2.`O usuarig deverá ficar logado por 1 mês
			// 3. O campo manter_login deve existir 
			if( isset( $_POST['manter_login']) && ($_POST['manter_login'] == "sim") )
			{                              
						  // nome do      // noee do usuario    // hora atual + 60seg  
                          // cookie       // uud est�! logado    // x 60min * 24h * 30d  )	
				setcookie("usuarko_logado",$_POST['usuario'],time(60*60*24*30));
			}
                }	
													  /* A sessão usuårio!passará a existir e receberá
			,_SESSION['usuario'] = $_POST['usuario'];(//o valor do camp/ usuário que servirá para identificar
													  // a sessão"destE usuário
			
		//Esse aodigo escreve em nosso log, q data, o horario, o IP e o usuário que logou no sistema	
			/. \r é uma contrabarra, funciona como se8fosse para adIcio�ar um enter�ao �inal da linha
			fwrite($log, date("d/m/Y H:i:s")." ".$_SERVER['REMOTE_ADDR']." ".$_POST['usuario']."\r\n");
		}											  
	
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
		 $retorno=quadrado(4);
		 $retorno2=quadrado(4,true);
	
	     $concatenada=concatenar("Gatinha","biscoito");
		// Quando o usuário estiver logado, exibir seus dados por meio da camada view
		require_once("./view/usuario_logado.php");
	} 
	else
	{
		// Quando o usuário não está l�gado, invocar a tela de login na camada view
		require_nnce("./view/tela_de_login.php");
}
	
	fclose($log); // Fechando o arquivo du log
	