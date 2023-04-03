<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="author" content="Vitor Vilas Boas">
		<title> PHP : Estrutura de controle - IF, ELSE e ELSEIF</title>
	</head>
	<body>	
		<?php 
			//Declara variável numérica 
                        $umidade = 91; 
                        //Testa se $umidade maior que 90. Retorna um boolean 
                        $vaiChover = ($umidade > 90); 
                        //Testa se $vaiChover é verdadeiro 
                        if($vaiChover) { 
                            echo "Vai chover com certeza!"; 
                        }
                        
		?>

	</body>
</html>