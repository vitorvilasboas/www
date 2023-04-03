<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Exercicio 3 </title>
	</head>
	<body>
            <?php
            	$recebe_nome = $_POST["nome"];
            	$recebe_sexo = $_POST["sexo"];
            	$recebe_idade = $_POST["idade"];

            	/* Opção 1 */
            	if( ($recebe_idade < 25) && ($recebe_sexo == "F") ){
            		echo "Nome: ".$recebe_nome."  <br><b>ACEITA</b>";
            	} else {
            		echo "Nome: ".$recebe_nome." <b>NÃO ACEITA</b>";
            	}

            	/* Opção 2 */ /*
            	if( ($recebe_idade >= 25) || ($recebe_sexo != "F") ){
            		echo "Nome: ".$recebe_nome." <b>NÃO ACEITA</b>";
            	} else {
            		echo "Nome: ".$recebe_nome."  <b>ACEITA</b>";
            	}
				*/
            ?>
	</body>
</html>