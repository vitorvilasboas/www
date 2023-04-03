<html>
	
	<head>
		<title>Curso de PHP - Método POST</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	
	<body>
	
		<!-- Se expressão IF abaixo for verdade, então se executa o bloco dentro do IF -->
		<!-- Se expressão IF abaixo foi falsa, então se executa apenas o restante do codigo-->
		<!-- Váriaveis em PHP devem iniciar com um cifrão -->
		
		<?php if(isset($_POST['palavra'])) // A Função isset verifica se a variavel foi inicializada 
		{ ?>
			<h3>Voce buscou por: <?=$_POST['palavra']?></h3>
		<?php } ?>
		
		<!-- A forma de envio de informações padrão é pelo metodo GET 
		     para utilizar o método POST é necessário acrescentar 
			 o atributo method com o valor post, conforme feito abaixo -->
		<form method="post" >
			<p>Digite uma palavra</p>
			<input name="palavra" type="text" />
		</form>

	</body>

</html>