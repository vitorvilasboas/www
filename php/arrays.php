<html>
	<head>
            <title>Arrays</title>
            <meta name="author" content="Vitor Vilas Boas">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
            <?php
                // Arrays em PHP iniciam com o indice 0
                // É possível armazenar diferentes tipos de dados em um mesmo array ou seja, podemos armazenar, um valor inteiro e um string em um mesmo array
                
                $nossoArray = array(1, "Valor 2", "Valor 3", 'teste', 56749, 'vitor');// Criando um objeto do tipo array
                
                $nossoArray[] = "Valor X";// Adicionando um novo elemento ao final do array
                
                unset($nossoArray[1]);// Removendo o elemento do array que está no índice 1
                
                echo '<hr>Imprimindo Array unidimensional (nossoArray) com print_r:<br>';
                print_r($nossoArray);// Função print_r é uma forma de escrever array na tela sem necessitar do echo
                
                $nossoArray[2] = "Troquei o valor do indice 2";// Atribuir um valor, para determinada posição do array
                echo "<br>";
                print_r($nossoArray);
                
                $novoArray = array("ifto" => "www.ifto.edu.br", "google" => "www.google.com.br");// Criando um array com índices personalizados
                
                echo '<br><br><hr>Imprimindo item do vetor novoArray:<br>';
                echo "<br/>".$novoArray['ifto'];// Acessando array que possui como índice = ifto
                
                echo '<br><br><hr>Percorrendo e Imprimindo vetor nossoArray usando foreach:<br>';
                foreach ($nossoArray as $valor_indice) {
                    echo "<br>| $valor_indice |";
                }
                
                
                $vetor = array(1, 2, 3, 4, 5);
                // A cada repetição do loop, a variável $var1 representa um ítem do array
                echo '<br><br><hr>Percorrendo e Imprimindo vetor (vetor) usando foreach:<br>';
                foreach($vetor as $item){
                    echo '   '.$item;
                }
                
                $estrutura = array(
                    array("Vitor Vilas Boas", "15", "12/02/1988", "Uberlandia"), 
                    array("Arthur", "22", "28/10/2017", "Palmas"),
                    array("Josiane", "34", "08/06/1989", "Formoso do Araguaia"),
                    array("Maya", "7", "25/04/1956", "São Paulo"),
                    array("Meg", "80", "17/01/1987", "Rio de Janeiro"),
                    array("ABC DEF", "43", "09/11/1938", "Natal"),
                    array("Fulano", "68", "29/05/1925", "Gioânia"),
                    array("Ciclano", "21", "20/08/1912", "UImperatriz"),
                    array("Maria", "92", "11/07/1903", "Porto Nacional")
                );
                
                echo '<br><br><hr>Percorrendo e Imprimindo vetor estrutura em forma de tabela usando foreach:<br>';
                echo "<table border='1'>";
                echo "<tr><td>Nome</td><td></td><td>Dt. Nascimento</td><td>Cidade</td></tr>";
                foreach($estrutura as $var1)
                {
                    echo "<tr>";
                    foreach($var1 as $var2)
                    {
                        echo "<td>".$var2."</td>"; // Os pontinhos concatenam as strings
                    }
                    echo "</tr>";
                }
                echo "</table>";
                
                
                
                
                echo '<br><hr>Imprimindo Array multidimensional [matriz] com print_r:<br>';
                $arrayMultinivel = array();// Criando um objeto do tipo array multinivel
                
                $arrayMultinivel[0][1] = "valor 0 - 1";
                
                $arrayMultinivel[0][2] = "valor 0 - 2";
                
                print_r($arrayMultinivel);
            ?>
		
	</body>
</html>
