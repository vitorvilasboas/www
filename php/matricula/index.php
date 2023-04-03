<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Matrículas</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="icon" href="imagens/icone.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700" >
    </head>
    <body>
        <?php 
            session_start();
            include 'topo.php';   
            if( isset($_SESSION['usuario']) && isset($_SESSION['senha']) ){
                require 'menu.php';
                include 'conteudo.php';
            } else {
                if( isset( $_REQUEST['p'] )){//existe o parametro p?
                    if( $_REQUEST['p'] == 'prematricula' ){//se existe, o valor de p é 'prematricula'??
                        require_once 'prematricula_form.php';//se p for 'prematricula', inclui o arquivo prematricula_form.php 
                    } else if ($_REQUEST['p'] == 'login'){
                        require_once 'login.php';
                    } else {
                        include 'perfil.php';
                    }
                } else {
                    include 'perfil.php';
                }
            }
            require_once 'rodape.php';             
        ?>
    </body>
</html>