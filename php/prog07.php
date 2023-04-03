<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> PHP: Arrays e Funções String</title>
	</head>
	<body>
		<?php 
			// Exemplos de funções nativas do PHP com string
			$array = array();
	
			$titulo = "Exemplos de funções que trabalham com string";
			
			$var1 = "ESTA é alguma frase";
			$var2 = "Esta é outra frase";
			$var3 = "ABCDEfghij";
			
			// transformando a string em minusculo
			$array[] = "VAR1 em minusculo = ".strtolower($var1);
			
			// transformando uma string em maiúsculo
			$array[] = "VAR2 em maiúsculo = ".strtoupper($var2);
			
			// exibindo a posição de um elemento em uma string
			$array[] = "Posição do elemento 'é' na variável VAR2 = ".strpos("3",$var2);

			// utilizando str_replace - substitui um elemento em uma string
			$array[] = str_replace("Esta","Aquela",$var2);
			
			// utilizando str_split - transforma uma string em array
			$str_split = str_split($var3); 
			
			// utilizando explode - identifica caractere a ser substituido na string
			$explode = explode(" ",$var2);

			// utilizando implode - substitui caractere identificado pela função explode na na string 
			$implode = implode("-",$explode);
			
				
		?>
		
		<!-- Impressão do vetor com print_r -->
		<p><?php print_r($str_split); ?></p>

		<!-- Impressão do vetor com print_r -->
		<p><?php print_r($explode); ?></p>

		<!-- Impressão do vetor com print_r -->
		<p><?php echo "Explode/Implode: ". $implode; ?></p>
		
		<hr>

		<!-- Exibindo os resultados com Foreach -->
		<?php foreach($array as $linha)	{ 	?>
				<p><?=$linha?></p>
		<?php } ?>

	</body>
</html>