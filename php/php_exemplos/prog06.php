<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="author" content="Vitor Vilas Boas">
		<title> PHP: Arrays</title>
	</head>
	<body>
		<?php 
			/* um array(vetor) pode armazenar vários valores ao mesmo tempo em 
                             suas posições acessadas pelos indices (numeros ou texto) que indicam 
                             a posição de memória 
                         * Chaves dos Arrays inicia-se 0!
                         */
			
			//indice numérico
			$vetor[0] = 30;
			$vetor[1] = 40;
			$vetor[2] = 50;
			$vetor[3] = 60;

			//S não especificarmos o indice, o PHP irá procurar o ultimo indice utilizado e utilizará o próximo indice
			$vetor[] = "professor";
			$vetor[] = "Vitor";

			//indices tbm podem ser identificado por textos
			$vet ["time"] = "Palmeiras";
			$vet ["titulo"] = "Campeão Brasileiro";
			$vet ["ano"] = 2016;

			/*Obs.: Repare que cada posição do Array pode ser de um tipo diferente*/

			//Matrizes - vetores multidimensionais
			$matriz[0][0] = "Vitor";
			$matriz[0][1] = "Mendes";
			$matriz[1][0] = "Vilas";
			$matriz[1][1] = "Boas";

			
			/* O PHP possui uma função array - outra forma de iniciar um array */

			$vetor1 = array(10,20,30,40,50);
			echo $vetor1[2] . "<br>";

			$vetor2 = array(1, 2, 3, "nome"=>"Vitor");
			echo $vetor2[0] . "<br>";
			echo $vetor2["nome"];
                        
                        
                        $vetor10 = array('Palio','Gol','Fiesta','Corsa'); 
                        var_dump($vetor10);//Imprimindo vetor usando var_dump
                        print_r($vetor10);//Imprimindo vetor usando print_r

                        

		?>


	</body>
</html>