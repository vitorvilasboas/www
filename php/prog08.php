<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> PHP: Operadores Aritméticos e Atribuição</title>
	</head>
	<body>
		<?php 
			/* 1. Operadores Aritméticos: 
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

			/* 2. Operadores de atribuição: */
			echo "<h2>Operadores de Atribuição</h2>";
			$soma=1;
			$valor1=10;
			$valor2=20;
			$valor3=30;
			$soma += $valor2; //soma = soma + valor2;
			$soma -= $valor1; //soma = soma - valor1;
			$soma *= $valor3; // soma = soma * valor3;
			$soma %= 100; //soma é o resto entre soma/100

			echo $soma;



		?>

	</body>
</html>