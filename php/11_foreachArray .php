<html>
	<head>
		<title>Curso de PHP - foreach </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	
	<body>
		<?php // Inicio do bloco PHP
                    $vetor = array(1, 2, 3, 4, 5);
                    // A cada repetição do loop, a variável $var1 representa um ítem do array
                    foreach($vetor as $item){
                        echo $item;
                    }
                    $estrutura = array(
                        array("Vitor Vilas Boas", "15", "12/02/1988", "Uberlandia"), 
                        array("Arthur", "15", "12/02/1978", "Uberlandia"),
                        array("Josiane", "15", "12/02/1968", "Uberlandia"),
                        array("Maya", "15", "12/02/1958", "Uberlandia"),
                        array("Meg", "15", "12/02/1948", "Uberlandia"),
                        array("ABC DEF", "15", "12/02/1938", "Uberlandia"),
                        array("Fulano", "15", "12/02/1928", "Uberlandia"),
                        array("Ciclano", "15", "12/02/1918", "Uberlandia"),
                        array("Maria", "15", "12/02/1908", "Uberlandia")
                    );

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
		?>		
	</body>
</html>