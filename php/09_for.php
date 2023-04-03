
<html>
	<head>
		<title>PHP - Estrtura de repetição FOR </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>

	<body>
		
		<p>Criar um codigo que liste os 100 primeiros numeros</p>
		
		<?php
			// inicialização; condição e incremento
			
			/* Comentário de várias linhas 
			for($x=1; $x <= 100; $x++){
				echo $x." ";
			}
			*/
		
		?>
		
		<table width="100%" border="1">
			<tr> <!-- Criando uma linha -->
				<td><h3>Codigo</h3></td> 	<!-- 1º Coluna -->
				<td><h3>Nome</h3></td> 		<!-- 2º Coluna -->
				<td><h3>Endereco</h3></td> 	<!-- 3º Coluna-->
			</tr> <!-- Fechando uma linha -->
			
			<?php
				for($x=1; $x <= 50; $x++){				
			?>

			<tr> <!-- Criando uma linha -->
				<td><?=$x?></td> 			<!-- 1º Coluna -->
				<td>Vitor Mendes</td>	<!-- 2º Coluna -->			
				<td>Endereco</td> 			<!-- 3º Coluna-->
			</tr> <!-- Fechando uma linha -->
			
			<?php
				}
			?>
			
		</table>
		
	</body>
</html>