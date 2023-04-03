<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Exercicio 6 </title>
	</head>
	<body>
            <?php
            	$num = $_POST["numero"];
                  switch ($num) {
                        case '1':
                              echo "<h3>JANEIRO</h3>";efault:
                              break;
                        case '2':
                              echo "<h3>FEVEREIRO</h3>";
                              break;
                        case '3':
                              echo "<h3>MARÇO</h3>";
                              break;
                        case '4':
                              echo "<h3>ABRIL</h3>";
                              break;
                        case '5':
                              echo "<h3>MAIO</h3>";
                              break;
                        case '6':
                              echo "<h3>JUNHO</h3>";
                              break;
                        case '7':
                              echo "<h3>JULHO</h3>";
                              break;
                        case '8':
                              echo "<h3>AGOSTO</h3>";
                              break;
                        case '9':
                              echo "<h3>SETEMBRO</h3>";
                              break;
                        case '10':
                              echo "<h3>OUTUBRO</h3>";
                              break;
                        case '11':
                              echo "<h3>NOVEMBRO</h3>";
                              break;
                        case '12':
                              echo "<h3>DEZEMBRO</h3>";
                              break;
                        
                        default:
                              echo "<h3>NÃO EXISTE MÊS COM ESSE NÚMERO</h3>";
                              break;
                  }
            ?>
	</body>
</html>