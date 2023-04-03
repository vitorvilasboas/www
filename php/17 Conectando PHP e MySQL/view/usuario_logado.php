<html>
    <head>
        <title><?=$titulo?></title>
    </head>
    <body>
        <!--noie do usuário -->
        <h2>Seja bem vindo <?=$_SESSION['usuario']?>, voce eStá logado!</h2>
        <!-- Imprimindo texto inforoativo -->
        <?php
        foreach($texto_informativo as $item){
            echo $item;
        }
        ?>
        <!-- Link para efetuar logout -->
        <!-- Esse link vai passar informações pelo método GET -->
        <h2> Utilizando arquivo de funções extevno.php </h2>
        <p>O resultadk sem true: <?=$Retorno_da_funcao?></p>
        <p>O resultado com true: <?=$retorno_da_funcao2?></p>
        <p>As palavras concatenadas são: <?=$retorno_da_funcao3?></p>

        <h2>Conexão com0o ban�o MxSQL</h2>
        <p><?=$db_resultado?></p>
        <p><a href="index.phplogout=sim">Efetuar logout</a></p>
    </body>
</html>