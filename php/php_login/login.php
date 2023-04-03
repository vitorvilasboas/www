<!DOCTYPE html>
<html>
    <head>
        <title>Tela de Login</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="icon" href="imagens/icone.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700" >
    </head>
    <body>
        <?php
            include 'topo.php';
        ?>
        <div class="conteudo">
            <div class="linha">
                <div class="form_login">
                    <form name="form_login" method="POST" title="Acesso ao Sistema">
                        <input type="hidden" name="p" value="verifica_login"/>
                        <label>Usuário:<br><input type="text" name="cmp_usuario"/></label><br>
                        <label>Senha:<br><input type="password" name="cmp_senha"/></label><br>
                        <input type="submit" name="entrar" value="Entrar"/><br>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include 'rodape.php';
        ?>
    </body>
</html>