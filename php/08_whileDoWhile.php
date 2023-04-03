<html>
	<head>
		<title> PHP - Loop While e Do while</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		
		<p>Criar um codigo que liste os 100 primeiros numeros</p>
		
		<?php // Inicio do bloco de codio PHP
			
			$contador = 1; // Variavel contador
			
			while($contador < 101)
			{
				echo $contador."<br>";	// Exibir a variavel contador e adicionar <br>			
			
				$contador++; // incrementando contador em +1
				
				if($contador == 20)
				{
					$contador++;
					continue;
				}
				
				echo ".... ";
				
				if($contador == 50) // Se o contador chegar em 50, interrompemos o laço de repetição
				{
					echo "A variavel contador está em ".$contador;
					break;
				}				
			}
			
			echo "<hr />";
			
			$contador = 0;
			do {
				echo "Do- While: ".$contador;
				$contador++;
			}while( $contador < 0 );
		
		?>
		
	</body>
</html>