<html>
	
	<head>
		<title>Curso de PHP - Estrutura de condição Switch</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	
	<body>
		
		<?php
			
			// Verificando se o formulário foi postado
			if( isset($_POST['calcular']) )
			{
				
				$resultado = "";
				$valor1 = $_POST['valor1'];
				$valor2 = $_POST['valor2'];
				
				switch($_POST['operacao']){
					case "1";
						$resultado = $valor1 + $valor2;
						break;
					case "2";
						$resultado = $valor1 - $valor2;
						break;
					case "3";
						$resultado = $valor1 * $valor2;
						break;
					case "4";
						if($_POST['valor2'] != "0")          // Divisão por zero não é possivel
							$resultado = $valor1 / $valor2;  // Esse teste evita que uma divisão por zero aconteça
						else 
							$resultado = "Nao e possivel dividir por zero";
						break;
				}
				
			}
						
			if( isset($resultado) )
			{
				echo "<h3>O resultado e: ".$resultado."</h3>";
			}
						
		?>		
		
	
		<form method="post">
			<p>Valor 1: <input type="text" name="valor1" /></p>
			<p>Valor 2: <input type="text" name="valor2" /></p>
			
			<p>Selecione a operacao: 
			
			<!-- Criando um caixa de seleção de operação -->
			<select name="operacao">
				<option value="1">Adicao</option>
				<option value="2">Subtracao</option>
				<option value="3">Multiplicacao</option>
				<option value="4">Divisao</option>
			</select>
			
			</p>
			
			<p><input type="submit" value="Executar" name="calcular"></p>
		</form>
	</body>
</html>