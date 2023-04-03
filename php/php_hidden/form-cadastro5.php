<!DOCTYPE html>
<html>
    <head>
        <title>Campos Ocultos PHP (Hidden)</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
    </head>
    <body>
        <form action="mostrar-cadastro.php" method="POST">
            <h2>Cadastro Parte 5</h2>

                <input type="hidden" name="op" value="cadastro6" />

                <input type="hidden" name="cmp_titulo" 
                        value="<?php echo $_POST['cmp_titulo'];?>" />

                <input type="hidden" name="cmp_area" 
                        value="<?php echo $_POST['cmp_area'];?>" />

                <input type="hidden" name="cmp_dtinicio" 
                        value="<?php echo $_POST['cmp_dtinicio'];?>" />

                <input type="hidden" name="cmp_dtfim" 
                        value="<?php echo $_POST['cmp_dtfim'];?>" />

                <input type="hidden" name="cmp_nome" 
                        value="<?php echo $_POST['cmp_nome'];?>" />

                <input type="hidden" name="cmp_tipo" 
                        value="<?php echo $_POST['cmp_tipo'];?>" />

                <input type="hidden" name="cmp_local" 
                        value="<?php echo $_POST['cmp_local'];?>" />

                <input type="hidden" name="cmp_endereco" 
                        value="<?php echo $_POST['cmp_endereco'];?>" />

                <label for="cmp_vagas">Qtd. Vagas: </label>
                <input type="number" name="cmp_vagas" value="" size="50pt"/>
                <br><br>

                <input type="submit" name="btn_cad_evento" value="Cadastrar"/>
        </form>
    </body>
</html>