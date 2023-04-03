<?php
	// verificar se o log.txt já existe, senão, criar este arquivo

	/* OBSERVAÇÃO IMPORTANTE
	 Famílias de sistemas operacionais diferentes têm convenções de delimitação de linhas diferentes. 
	 Quando você escreve um arquivo texto e quer inserir uma quebra de linha, você precisa utilizar 
	 o(s) caractere(s) de fim de linha adequado(s) ao seu sistema operacional. 
	 
	 Sistemas baseados no Unix utilizam \n como caractere de final de linha, 
	 sistemas baseados no Windows utilizam \r\n e sistemas baseados no Macintosh utilizam \r. 
	*/
	
	
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
		fwrite($log, "DATA"."     "."HORARIO"."  "."IP"."        "."USUARIO"." "."\r\n");
	}
	
	require_once("controller.php");
	// A invocação aos arquivos da pertencentes a camada view foi removida
    // Os arquivos serão invocados na camada controller

/* Necessidade do index !
	
	O index.php é a página padrão dentro dos diretórios nos servidores de websites que é carregada sempre
	que uma pasta seja solicitada e não seja especificado o nome de um arquivo específico,
	neste caso o próprio servidor se encarrega de procurar pelo arquivo index.php e entregar para o visitante.

	Por ser um comportamento padrão do servidores web, o endereço da página index.php não precisa aparecer na barra
	de endereços de seu navegador. 
*/	