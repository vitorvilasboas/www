<html> <!-- Na camada de visão está definido a exibição para o usuário -->
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>
		<h1>Dados de usuário:</h1>
		<p>Nome: <?=$nome?> / Idade : <?=$idade?> / Data de nascimento : <?=$dtNasc?></p>
		<h3><?=$mensagem?></h3>
		<p>O resultado sem true: <?=$retorno?></p>
		<p>O resultado com true: <?=$retorno2?></p>
		<p>As palavras concatenadas são: <?=$concatenada?></p>
		
	</body>
</html>