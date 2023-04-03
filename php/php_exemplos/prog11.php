<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="author" content="Vitor Vilas Boas">
		<title> PHP : Estrutura de controle - IF, ELSE e ELSEIF</title>
	</head>
	<body>	
		<?php 
			$prova1 = 7;
                        $prova2 = 5;
                        
                        $nota = ($prova1+$prova2)/2;
                        
                        if($nota<3)
                            $desempenho = "PÉSSIMO";
                        elseif ($nota<5)
                            $desempenho = "RUIM";
                        elseif ($nota<5)
                            $desempenho = "RUIM";
                        else
                            $desempenho="satisfatório";
                        
		?>
            <h2>Desempenho: <?=$desempenho?></h2>

	</body>
</html>