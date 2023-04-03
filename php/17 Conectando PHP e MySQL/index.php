<?php
	// ---------------------------------- SEÇÃO 1 --------------------------------------------------
	/*
		O administrador da rede, informou que os ip's abaixo realizam ataques 
		com certa frequencia ao site, por isso vamos impedir que eles acessem
		o site
	*/
	
	// IP's com acesso bloqueados na página
	$ips_bloqueados = array("10.0.0.1");
	
	/* OBSERVAÇÃO PARA OS ALUNOS
		EM NOSSO AMBIENTE VOCÊS DEVERÃO ESCOLHER 5 IP'S ENTRE A FAIXA
		10.0.3.1 A 10.0.3.21
	*/
	
	foreach($ips_bloqueados as $ip)
	{		 
			// Se o IP que for acessar o site for igual a algum IP da lista de ips_bloqueados
			// então o site redirecionará o usuário e encerrará a aplicação PHP
		if($ip == $_SERVER['REMOTE_ADDR'])
		{	
			// A instrução header() deve ser invocada antes de qualquer instrução ser enviada para o navegador do cliente 
			header("Location:view/acesso_negado.php");
			exit(); 
			// Finalizando a execução do PHP neste ponto
			// nada abaixo disto será executado
		}
	}
	// ----------------------------------- FIM DA SEÇÃO 1 ------------------------------------------------------------
	
	
	// ---------------------------------------- SEÇÃO 2 -------------------------------------------------------
	
	/* Previnindo o cache nas páginas
	   fazendo com que todo o conteúdo seja baixado novamente
	   do site cada vez que o usuário entrar ou atualizar a página.
	*/
	
	// Determinando uma data limite para o arquivo ficar em cache
	header("Expires: Mon, 21 Out 1999 00:00:00 GMT");
	
	// Determinando o não cacheamento de documentos
	/*
	  o uso do pragma:no-cache é importante caso pretenda-se usar o cache-control:no-cache, 
	  isso porque ambos tem o mesmo efeito mas não se sabe se o servidor é ou não compatível com o HTTP 1.1, 
	  por isso o uso de ambos é importante
	*/
	header("Cache-control: no-cache");
	header("Pragma: no-cache");
	
	
	// verificar se o log.txt já existe, senão, criar este arquivo
	
	/* OBSERVAÇÃO IMPORTANTE
	 Famílias de sistemas operacionais diferentes têm convenções de delimitação de linhas diferentes. 
	 Quando você escreve um arquivo texto e quer inserir uma quebra de linha, você precisa utilizar 
	 o(s) caractere(s) de fim de linha adequado(s) ao seu sistema operacional. 
	 
	 Sistemas baseados no Unix utilizam \n como caractere de final de linha, 
	 sistemas baseados no Windows utilizam \r\n e sistemas baseados no Macintosh utilizam \r. 
	*/
	// ----------------------------------------- FIM DA SEÇÃO 2 ----------------------------------------------------------
	
	
	// --------------------------------------------- SEÇÃO 3 ------------------------------------------------------
	
	// definir uma constante para o nome do nosso arquivo de log
	define("ARQUIVO_DE_LOG","model/log.txt");
	
	/* Se o arquivo de log existe:
			então vamos abrir o arquivo e posicionar o ponteiro no final do mesmo
	   Se o arquivo não existir
			então vamos criar o arquivo e posicionar o ponteiro no começo do arquivo */
	if(file_exists(ARQUIVO_DE_LOG) == true)
	{	
		// o parametro "a" abre o arquivo e posiciona o ponteiro no final do mesmo
		$log = fopen(ARQUIVO_DE_LOG,"a");
	}
	else
	{
		// o @ serve para ignorar a mensagem de alerta enviado no casos em que fopen executar e o arquivo já existir
		// O parametro x+ cria e abre o arquivo para escrita e leitura
		$log = fopen(ARQUIVO_DE_LOG,"x+");
		fwrite($log, "DATA"."       "."HORARIO"."  "."IP"."        "."USUARIO"." "."\r\n");
	}
	// --------------------------------------------- FIM DA SEÇÃO 3 ---------------------------------------------------------------
	
	// ------------------------------------------------ SEÇÃO 4 ------------------------------------------------------------------
	// vamos declarar os dados do nosso banco de dados
	
	$db_host = "localhost"; 		// Host onde está o nosso banco de dados
	$db_usuario = "equipe0";       	// Usuario utilizador do banco de dados
	$db_senha = "123456";          		// Senha de acesso do usuario ao banco de dados
	$db_nome_do_banco = "equipe0";  // nome do banco de dados

	// ---------------------------------------------- FIM DA SEÇÃO 4 ------------------------------------------------------------
	
	// --------------------------------------------- SEÇÃO 5 ---------------------------------------------------------------------
	require_once("controller/funcoes.php");
	require_once("controller/controller.php");
	// A invocação aos arquivos da pertencentes a camada view foi removida
    // Os arquivos serão invocados na camada controller

/* Necessidade do index !
	
	O index.php é a página padrão dentro dos diretórios nos servidores de websites que é carregada sempre
	que uma pasta seja solicitada e não seja especificado o nome de um arquivo específico,
	neste caso o próprio servidor se encarrega de procurar pelo arquivo index.php e entregar para o visitante.

	Por ser um comportamento padrão do servidores web, o endereço da página index.php não precisa aparecer na barra
	de endereços de seu navegador. 
*/	

 // -------------------------------------------------- FIM DA SEÇÃO 5 ---------------------------------------------------------------