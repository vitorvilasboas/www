<?php
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