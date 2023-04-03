<!DOCTYPE html>
<html>
    <head>
        <title><?=$_SESSION['titulo']?></title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
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
                    <p>Instituto Federal de Educação, Ciência e Tecnologia do Tocantins<br>
                        Campus Avançado Formoso do Araguaia</p>
                </div>
                <div class="coluna coluna3">
                    <img src="imagens/banner.png" class="img_direita" alt="Logo IFTO" />                  
                </div>
            </div>
        </div>
        <div class="conteudo">
            <div class="linha">
                <?php
                    include 'menu.php';
                ?>
                <div class="coluna coluna9">
                    <!--nome do usuário -->
                    <h3>Seja bem vindo <?=$_SESSION['usuario']?>, você está logado!</h3>
                    <p><a href="pagina2.php">Próxima página</a></p>                   
                    <br><br><br>
                    <p><a href="sair.php?logout=sim">Efetuar logout</a></p><!-- Link para efetuar logout. Esse link vai passar informações pelo método GET -->
                </div>
            </div>
        </div>
        <div class="rodape">
            <div class="linha">
                <div class="coluna coluna12">
                    <font>Copyright &copy; IFTO. Desenvolvido por: Vitor Vilas Boas.</font>
                </div>
            </div>
        </div>
    </body>
</html>