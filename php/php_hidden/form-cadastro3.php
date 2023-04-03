<!DOCTYPE html>
<html>
    <head>
        <title>Campos Ocultos PHP (Hidden)</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
    </head>
    <body>
        <form action="form-cadastro4.php" method="POST">
            <h2>Cadastro Parte 3</h2>

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

                <label for="cmp_tipo">Tipo: </label>
                <input type="text" name="cmp_tipo" value="" size="50pt"/>
                <br><br>

                <input type="submit" name="btn_cad_evento" value="Próximo"/>

        </form>
    </body>
</html>