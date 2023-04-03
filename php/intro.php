<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hello World PHP</title>
</head>
<body>
	<!-- 
		PHP - Hypertext Preprocessor:
			Rasmus Lerdof (1994)
			Dev. Web server-side (ou script S.O. - automatizar processos)
			Interpretada, Free, open source, estruturado + OO 
	
		Por convenção, o index.php é o primeiro arquivo buscado pelo navegador em aplicações PHP
		Trechos de código PHP podem ser inseridos junto ao HTML envolto pelas tags <?php ?> ou <?=''?>.
		Esses trechos serão interpretados/renderizados em tempo de execução pelo servidor (server-side) e o resultado volta ao browser cliente de forma dinâmica 
	-->

	<?php
		//phpinfo();
	?>

	<!-- <?php
		echo "<h3>Olá Mundo</h3>"; 

		// Comandos em PHP devem encerrar com ; (obrigatório)
	?> -->

	<!-- <?= "<h3>Olá Mundo</h3>" ?> -->
	<!-- tag de impressão -->

	<!-- <?php
		echo 'Utilizando a tag padrão';
	?>
	<br/> -->
	
	<!-- <?= 'Utilizando a tag impressão' ?>
	<br/> -->

	<!-- <? echo 'Utilizando a tag curta'; ?> -->
	<!-- desabilitada por padrão -->

	<?php 
		// echo 'Comando echo<br/>'; //construtor da linguagem

		// print ("Comando print<hr/>"); // era uma função para saída de strings

		// echo print ("Comando print<hr/>"); //retorna 1 se verdade.
	?>

	<!-- Comentário -->
	<?php
		// Comentário de uma linha

		# Comentário de uma linha

		/* 
			Comentário de multiplas linhas (bloco).
			Este tipo de comentário permite que várias
			linhas sejam comentadas ao mesmo tempo.
		*/
	?>

	<?php
	 	// Variaveis em PHP devem iniciar com $ e possuem tipagem fraca (tipo não explicito na declaração)
		// $idade = 34; 	// inteiro (int)
		// $peso = 98.5;  // real (float)
		// $nome = 'Vitor'; // cadeia de caracteres (string)
		// $sobrenome = "Vilas Boas";
		// $casado = true; // booleno (bool) :: (true = 1) ou (false = vazio)
		// $fumante = false; // tbm são considerados FALSO: 0  0.0  ""  "0"  array()  NULL

		// // Nomes de variáveis devem ser: 
		// //	# Curtos, significativos e iniciar com uma letra
		// //	# Preferencialmente escritos em minusculo
		// // 	#	Não usar espaços ou caracteres especiais ( ! ç @ # $ % ^ ~ & * / [ ] { } )
		// // 	#	Substituir espaços por _ ou CammelCase

		// echo "<h3>Ficha cadastral:</h3><p>Nome: $nome $sobrenome</p><p>Idade: $idade anos</p><p>Peso: $peso</p><p>Casado: $casado</p><p>Fumante: $fumante</p>";

		// echo '<br>';

		// print("<h3>Ficha cadastral:</h3><p>Nome: $nome $sobrenome</p><p>Idade: $idade anos</p><p>Peso: $peso</p><p>Casado: $casado</p><p>Fumante: $fumante</p>");
	?>

	<!-- <br>
	<h3>Ficha cadastral</h3>
	<p>Nome: <?= $nome . ' ' . $sobrenome ?></p>
	<p>Idade: <?= $idade ?></p>
	<p>Peso: <?= $peso ?></p>
	<p>Casado: <?= $casado ?></p>
	<p>Fumante: <?= $fumante ?></p> -->

	<!-- Concatenação -->
	<?php
		// //operador .
		// echo 'Olá ' . $nome . ', vi que seu peso é ' . $peso . 'kg e que você possui ' . $idade . ' anos.';

		// echo '<br>';
		
		// // aspas duplas (saída interpolada)
		// // inteporlação é a escrita do valor de uma ou mais variáveis dentro de uma string
		// echo "Olá $nome, vi que seu peso é $pesokg e que você possui $idade anos.";

		// echo 'Olá $nome, vi que seu peso é $pesokg e que você possui $idade anos.';

		// echo "<h3>$nome $sobrenome </h3>"; 

		// print("<h3>$nome $sobrenome</h3>");

		// echo '<br>';

		// // saída de múltiplos parâmetros
		// echo $nome , " " , $sobrenome;	
		
		// echo "<h3>" , $nome , " " , $sobrenome , "</h3>"; 
  ?>

	<!-- <?= "<h3>" , $nome , " " , $sobrenome , "</h3>" ?> -->

	<!-- <p>Ola, me chamo <?= $nome ?> e tenho <?= $idade ?> anos.</p> -->

	<!-- Declaração de constantes -->
	<?php
		// // Valores em CONSTANTES permanecem fixos/imutáveis durante toda execução. Definidas sem $ e em miúsculo.
		// define("PESO_MAXIMO", 1000); 
		// echo "<h4>Peso máximo é ", PESO_MAXIMO, ".</h4>";

		// // tente mudar o valor de uma constante e veja o que acontece
		// // define("PESO_MAXIMO", 400); 		// ops... erro!
		// // PESO_MAXIMO = 400; 						// ops... erro!

		// define('BD_URL', 'endereco_bd_dev');
		// define('BD_USUARIO', 'usuario_dev');
		// define('BD_SENHA', 'senha_dev');

		// echo BD_URL . '<br>';
		// echo BD_USUARIO . '<br>';
		// echo BD_SENHA . '<br>';
  ?>

	<?php
		// // Também são considerados valores numéricos...
		// $num = 0123;  # base octal - 0 à esquerda
		// echo "octal: $num <br>";   	# [ (1 * 8^2) + (2 * 8^1) + (3 * 8^0) ] = 83

		// $num = 0x1A;  # base hexadecimal - 0x à esquerda
		// echo "hexa: $num <br>";   	# [ (1 * 16^1) + (10 * 16^0) ] = 26

		// $num = 4e11;  # notação científica - base e 10^expoente
		// echo "exp: $num <br>";   		# 4 * 10^11 == 400000000000
  ?>

	<?php
		// // OPERADORES
		// // 	aritméticos: +   -   *   /   %   -   ++   -- 
		// // 	atribuição:	 =   +=  -=  *=  %=  /= 
		// // 	relacionais: ==  !=  <>  >   <   >=  <=   ===  !==
		// // 	lógicos:     !   &&  ||

		// // 	!= 		é o mesmo que <> (diferente de)
		// // 	===  	iguais no valor e no tipo?
		// // 	!==  	diferentes no valor e no tipo?

		// $calculo = 1+2+3+4+5;
		// $resultado = $calculo / 2;
	?>

	<!-- 
	<p>1+2+3+4+5 = <?=$calculo?></p>
	<p>Metade: <?=$resultado?></p>
	<p><?=$calculo?> + 10 = <?php echo $calculo + 10 ?></p> 
	-->

	<!-- Conversão entre tipos de variáveis -->
	<?php 
		/*
		Conversores:
			(int),(integer) - converte para inteiro
			(real),(float),(double) - converte p ponto flutuante
			(string) - converte em string
			(array) - converte em vetor
			(object) - converte em objeto
		*/

		$x = 40;
		$y = 10.7;

		$soma = (int)$y + $x;
		echo "Soma: ".$soma."<br>";

		$soma = (float)($x + $y);
		echo "Soma: ".$soma."<br>";
	?>

	
	<!-- Condicionais -->
	<?php
		// if(2 === 2){
		// 	echo 'Verdadeiro';
		// } else {
		// 	echo 'Falso';
		// }
	?>


	<!-- Arrays e funções de strings -->
	<?php 
	
		// $array = array();

		// $titulo = "Exemplos de funções que trabalham com string";
		
		// $var1 = "ESTA é alguma frase";
		// $var2 = "Esta é outra frase";
		// $var3 = "ABCDEfghij";
		
		// // transformando a string em minusculo
		// $array[] = "VAR1 em minusculo = ".strtolower($var1);
		
		// // transformando uma string em maiúsculo
		// $array[] = "VAR2 em maiúsculo = ".strtoupper($var2);
		
		// // exibindo a posição de um elemento em uma string
		// $array[] = "Posição do elemento 'é' na variável VAR2 = ".strpos('é', $var2);
		
		// $str_split = str_split($var3);
		
		// $explode = explode(" ",$var2);
		
		// $implode = implode("_",$explode);
		
		// $array[] = str_replace("Esta","Aquela",$var2);
	?>
	
	<!-- Percorrendo vetores/strings com loop foreach -->
	<!-- <?php 
		foreach($array as $linha){ 
	?>
			<p>
				<?= $linha ?>
			</p>
	<?php 
		} 
	?> -->

	<!-- funções de saída para vetores (uso comum em debug) -->

	<!-- <p><?php var_dump($str_split); ?></p> -->

	<!-- <p><?php print_r($str_split); ?></p> -->

	<!-- <p><?php print_r($explode); ?></p> -->

	<!-- <p><?php echo $implode; ?></p> -->

	<?php 
		/* Utilizando a função Nativa Date */
		echo "Hoje é dia " . date('d/m/Y');
		echo " agora são " . date('H:i:s');
	?>

	
	<!-- Escopo de variáveis 	 -->
	<?php 
		$num = 5000;
		function teste_escopo1(){
			global $num; 	// comente esta linha e veja o resultado
			$num += 5; 		// $num = $num + 5;
			echo $num."<br>";
		}

		echo $num."<br>";
		teste_escopo1();
		echo $num."<br>";

		// usando array $GLOBALS</h1> -->
		$num = 5000;
		function teste_escopo2(){
			echo $GLOBALS['num']."<br>"; 
			$GLOBALS['num']++;
		}
														
		teste_escopo2();
		echo $num."<br>";
	?>

	<!-- <?php require_once("funcoes.php"); ?> -->
	<!-- 
	<?php 
		$retorno = quadrado(4);
		echo $retorno;
	?> 
	-->

</body>
</html>