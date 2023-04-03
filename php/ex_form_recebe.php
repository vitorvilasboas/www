<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Adiciona Produto </title>
	</head>
	<body>
            <?php
            $nome = $_GET["nome"];
            $preco = $_GET["preco"];
                echo "<h1>Produto $nome, preço $preco adicionado com sucesso </h1>";
                echo "<h1>Produto ".$_GET["nome"].", preço ".$_GET["preco"]." adicionado com sucesso </h1>";
            ?>
            <h1></h1>
		
	</body>
</html>

