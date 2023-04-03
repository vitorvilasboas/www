<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Site do zero </title>
        <meta charset="UTF-8" />
        <meta name="description" content="Resumo do conteudo do site em 156 caracteres">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="css/normalize.css" /> -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css" />
        <script src="nome_do_arquivo.js"></script>
        <title> Site do zero </title>
    </head>
    <body>
        <div class="header">
            <div class="linha">
                <header>
                    <?php include 'topo.php'; ?>
                </header>
            </div>
        </div>
        <div class="conteudo">
            <div class="linha">
                <section>
                    <?php
                        if (isset($_GET['p'])) {
                            if($_GET['p'] == "home"){
                                include 'home.php';
                            } else if ($_GET['p'] == "clientes"){
                                include 'clientes.php';
                            } else if ($_GET['p'] == "servicos"){
                                include 'servicos.php';
                            } else if ($_GET['p'] == "sobre"){
                                include 'sobre.php';
                            } else if ($_GET['p'] == "contato"){
                                include 'contato.php';
                            }
                        } else {
                            include 'home.php';
                        }
                    ?>
                </section>
            </div>
        </div>
        <div class="rodape">
            <?php include 'rodape.php'; ?>
        </div>
    </body>
</html>
