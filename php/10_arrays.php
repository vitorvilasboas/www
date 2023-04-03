<html>
	<head>
		<title>Curso de PHP - Arrays</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
            <?php
                // Arrays em PHP iniciam com o indice 0
                // É possível armazenar diferentes tipos de dados em um mesmo array ou seja, podemos armazenar, um valor inteiro e um string em um mesmo array
                
                $nossoArray = array(1, "Valor 2", "Valor 3", 'teste', 56749, 'vitor');// Criando um objeto do tipo array
                
                $nossoArray[] = "Valor 4";// Adicionando um novo elemento ao final do array
                
                $nossoArray[2] = "Troquei o valor do indice 2";// Atribuir um valor, para determinada posição do array
                
                unset($nossoArray[1]);// Removendo o elemento do array que está no índice 1

                print_r($nossoArray);// Função print_r é uma forma de escrever array na tela sem necessitar do echo

                $novoArray = array("ifto" => "www.ifto.edu.br", "google" => "www.google.com.br");// Criando um array com índices personalizados
                
                echo "<br/>".$novoArray['ifto'];// Acessando array que possui como índice = ifto

                foreach ($nossoArray as $valor_indice) {
                    echo "<br>| $valor_indice |";
                }
                
                $arrayMultinivel = array();// Criando um objeto do tipo array multinivel
                
                $arrayMultinivel[0][1] = "valor 0 - 1";
                
                $arrayMultinivel[0][2] = "valor 0 - 2";
                
                print_r($arrayMultinivel);
            ?>
		
	</body>
</html>