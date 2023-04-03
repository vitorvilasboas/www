<!DOCTYPE html>
<html>
    <head>
        <title>Sessões PHP</title>
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
                <div class="coluna coluna9">
                    <h2>SISTEMAS WEB</h2>
                    <p>Instituto Federal de Educação, Ciência e Tecnologia do Tocantins<br>
                        Campus Avançado Formoso do Araguaia</p>
                </div>
            </div>
        </div>
        <div class="conteudo">
            <div class="linha">
                <div class="coluna coluna3">
                    <aside class="barra-lateral">
                        <div class="coluna coluna3">
                            <aside class="barra-lateral">
                                <nav class="menu">
                                    <ul>
                                        <li><a href=".">Home</a></li>
                                        <li><a href="#">Menu A</a></li>
                                        <li><a href="#">Menu B</a></li>
                                        <li><a href="sair.php?logout=sim">Sair</a></li>
                                    </ul>
                                </nav>
                            </aside>
                        </div>
                    </aside>
                </div>
                <div class="coluna coluna9">
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
        </div>
        <div class="rodape">
            <div class="linha">
                <div class="coluna coluna12">
                    <font>&copy; Copyright 2017 IFTO. Desenvolvido por: Vitor Vilas Boas.</font>
                </div>
            </div>
        </div>
    </body>
</html>


