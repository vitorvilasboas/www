<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>
				
							<!--nome do usuário -->
		<h1>Seja bem vindo <?=$_SESSION['usuario']?>, você está logado!</h1>
		
		<!-- Imprimindo texto informativo -->
		<h4> 
			<?php
			
			foreach($texto_informativo as $item)
			{
				echo $item;
			}
			?>
		</h4>
		
		<!-- Link para efetuar logout-->
		<!-- Esse link vai passar informações pelo método GET -->
		
		<h4> Utilizando funções do arquivo funções.php </h4>
		
		<p>O resultado sem true: <?=$retorno?></p>
		<p>O resultado com true: <?=$retorno2?></p>
		<p>As palavras concatenadas são: <?=$concatenada?></p>
		
		<p><a href="index.php?logout=sim">Efetuar logout</a></p>
	</body>
</html>