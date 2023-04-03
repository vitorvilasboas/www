<!DOCTYPE html>
<html>
<head>
	<title>Exercicio 8</title>	
	<meta charset="UTF-8">
</head>
<body>

<?php

	$num = $_POST["numero"];	//recebendo valor do formulário

	// comentário em linha
	/* comentário em bloco
	$cont = 1;	//inicializando contador utilizado no for
	for($cont;$cont<=$num;$cont++){	//laço de repetição
		echo $cont."&nbsp;&nbsp;&nbsp;"; 	//imprimindo o contador atual
		echo $cont*$num."<br><br>";	//imprimindo o produto
	}	//fecha o bloco do for
	*/
	$num = 0;
	
	$cont = 1; //inicialização do contador
	
	/* Enquanto... faça */
	while( $cont <= $num ){ //laço de repetição
		echo $cont."&nbsp;&nbsp;&nbsp;"; //exibe o valor atual do contador
		echo $cont*$num."<br><br>";
		$cont++; //incrementa o contador para análise na próxima iteração
	}

	/* Faça... enquanto */
	do{
		
		echo $cont."&nbsp;&nbsp;&nbsp;";
		$cont++;
	}while($cont<=$num);

	if (1 != 0){
		//header('location:index.php');
		


		?>
			<script type="text/javascript">
				alert("Os nomes são diferentes");
				require "index.php";
			</script>
		<?php
		


		//
		//header('location:index.php');
	}	
	
?>


	</body>
</html>