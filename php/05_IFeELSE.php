<html>
	<head>
		<title>Curso de PHP - Estruturas de condição IF e ELSE</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		
		<!-- Capturando dados do usuário atraves de um formulário -->
		<form method="post">
			<p>Informe o valor 1: <input type="number" name="valor1" /></p>
			<p>Informe a valor 2: <input type="number" name="valor2" /></p>
			<p><input type="submit" value="Calcular" name="calculo"></p>
		</form>
		
		<?php
		
			if( isset($_POST['calculo']) ) // Verificando se calculo foi inicializado
			{
								
				$valor1=$_POST['valor1'];
				$valor2=$_POST['valor2'];
				
				if( $valor1 > $valor2 ) 
				{ // Se valor1 for maior o trecho abaixo será executado
				
					$resultado=$valor1*$valor2;
					echo "Se valor1 > valor2, então multiplique-os: ";
					echo $resultado;
				}	
				else
				{ // se o valor2 for maior o trehco abaixo será executado
					
					$resultado=$valor1 + $valor2;
					echo "Se valor1 < valor 2, então some-os: ";
					echo $resultado;
				}
			}
		?>
				
	</body>

</html>

