
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="author" content="Vitor Vilas Boas">
		<title> PHP: Operadores de Comparação e Lógicos</title>
	</head>
	<body>
		<?php 
			/* 1. Operadores de Comparação: 
					+, -, *, /, % - resto da divisão
					-x: troca o sinal
					++x: pré-incremento (incrementa antes da operação)
					--x: pré-decremento (decrementa antes da operação)
					x++: pós-incremento (incrementa após a operação)
					x--: pós-decremento (decrementa após a operação)
			*/
			echo "<h2>Operadores Aritméticos</h2>";
			$a = 1;
			$b = 3;
			$c = 5;

			$res1 = ++$b - $a;
			$res2 = $c- + $a;
			$res3 = -$a + $c++;

			echo "a = $a<br> b = $b<br> c = $c<br><br>";
			echo "res1 = $res1<br> res2 = $res2<br> res3 = $res3<br>";

			/* 2. Operadores Lógicos: */
			echo "<h2>Operadores de Atribuição</h2>";
			$soma=1;
			$valor1=10;
			$valor2=20;
			$valor3=30;
			$soma += $valor2; //soma = soma + valor2;
			$soma -= $valor1; //soma = soma - valor1;
			$soma *= $valor3; // soma = soma * valor3;
			$soma %= 100; //soma é o resto entre soma/100

			echo $soma."<br><br>";

			/* 3. Operadores de comparação 
				op1 == op2: igualdade
				op1 <= op2: menor ou igual que
				op1 >= op2: maior ou igual que
				op1 != op2: diferença
				op1 <> op2: diferença
				op1 > op2: maior que
				op1 < op2: menor que
			*/

			/* 3. Operadores Lógicos 
				!op1: Verdadeiro se op1 for falso (não op1)
				op1 AND op2: Verdadeiro se op1 E op2 forem verdadeiros
				op1 OR op2: Verdadeiro se op1 OU op2 forem verdadeiros
				op1 XOR op2: Verdadeiro se SÓ op1 OU SÓ op2 forem verdadeiros
				op1 && op2: Verdadeiro se op1 E op2 forem verdadeiros
				op1 || op2: Verdadeiro se op1 OU op2 forem verdadeiros
			*/

			/*
			$nome;
			$email;
			$cpf;
			if(empty($nome) OR empty($email) OR empty($cpf)){
				echo "Você deve preencher os campos nome, e-mail e CPF!";
				exit;
			} else {
				echo "Você preencheu todos os campos";
			}
			*/
			
		?>

	</body>
</html>