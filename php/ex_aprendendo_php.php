<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sistemas Web</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="icon" href="imagens/icone.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700" >
    </head>
    <body>
        <div class="topo">
            <div class="linha">
                <div class="coluna coluna3">
                    <img src="imagens/banner.png" class="img_esquerda" alt="Logo IFTO" />
                </div>
                <div class="coluna coluna6">
                    <h2>SISTEMAS PHP</h2>
                    <p>
                        Instituto Federal de Educação, Ciência e 
                        Tecnologia do Tocantins<br>Campus Avançado Formoso do Araguaia
                    </p>
                </div>
                <div class="coluna coluna3">
                    <img src="imagens/banner.png" class="img_direita" alt="Logo Construção" />                  
                </div>
            </div>
        </div>
        
        <div class="conteudo">
            <div class="linha">
                
        	<?php
                    echo "<h1>Aprendendo PHP</h1>";
                    
                    $numero1 = 35;
                    $nome = "Vitor Mendes Vilas Boas";
                    $valido = TRUE; //FALSE
                    $numero2 = 90.6;
                    $idade = 29;
                    
                    $somavalores = $numero1 + $numero2;
                    $produto = $numero1 * $numero2;
                    
                    echo "A soma entre $numero1 e $numero2 é: $somavalores";
                    echo "<br>";
                    echo "O produto entre $numero1 e $numero2 é: $produto";
                    
                    $resto = 5%2; //resto da divisão entre dois números
                    $resultado = 5/2;
                    
                    echo "<br><br>O resto da divisao é $resto<br>";
                    echo "O resultado da divisao é $resultado";
                    
                    
                    
                    // Declarações de váriaveis no PHP devem iniciar com o simbolo do cifrão 
			// Dica: utilize nome de variaveis significativos
			
			
			$email = "vitorvilasboas@ifto.edu.br";
			$habilitado = true; // esta é uma variavel do tipo booleana, aceita true ou false
			$valor = 100.00; // esta é uma variavel de ponto flutuante
			$calculo = 1+2+3+4+5;
			$resultado1 = $calculo / 2;
			
			//Declaração de constantes
			define("IDADE","29");
                        
			define("URL", "http://www.ifto.edu.br");
                        
		?>
		
		<!-- Imprimindo váriaveis-->
		<h3> Imprimindo as variaveis </h3>
		<p>Ola, me chamo <?=$nome?>, tenho <?=$idade?> anos.</p>
		
		<!-- realizando operações de soma e concatenação de strings -->
		<h3> Realizando operações de soma e concatenação de strings </h3>
		<p><?=$idade?> + 1 = <?php echo $idade + 1 ?></p>
		<?php echo $nome."1";?> -> concatenacao realizada
		
		<p>1+2+3+4+5 = <?=$calculo?></p>
		<p>Resultado: <?=$resultado?></p>
		
		<!-- Constantes não mudam durante a execução do codigo 
		     tente mudar o valor na expressão define no inicio do
			 codigo e veja o que acontece -->
		<h3> Constantes não mudam durante a execução do codigo </h3>
		<p>Minha idade e: <?php echo IDADE; ?></p>
		<p>Minha idade e: <?php echo IDADE; ?></p>
		<p>Minha idade e: <?php echo IDADE; ?></p>
		<p>Minha idade e: <?php echo IDADE; ?></p>
		<p>Minha idade e: <?php echo IDADE; ?></p>
                    
                    
                    
                    
                    
			
                    
                    
                
                
            </div>
        </div>
        
        <div class="rodape">
            <div class="linha">
                <div class="coluna coluna12">
                    <font>
                        Copyright &copy; IFTO. Todos os direitos reservados.
                    </font>
                </div>
            </div>
        </div>           
        
    </body>
</html>