<!DOCTYPE html>
<html>
    <head>
        <title>Campos Ocultos PHP (Hidden)</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
    </head>
    <body>
        <form action="form-cadastro3.php" method="POST">
            <h2>Cadastro Parte 2</h2>

            <input type="hidden" name="cmp_titulo" 
                    value="<?php echo $_POST['cmp_titulo'];?>" />

            <input type="hidden" name="cmp_area" 
                    value="<?php echo $_POST['cmp_area'];?>" />

            <input type="hidden" name="cmp_dtinicio" 
                    value="<?php echo $_POST['cmp_dtinicio'];?>" />

            <input type="hidden" name="cmp_dtfim" 
                    value="<?php echo $_POST['cmp_dtfim'];?>" />

            <label for="cmp_nome">Responsável: </label>
            <input type="text" name="cmp_nome" value="" size="50pt"/>
            <br><br>

            <input type="submit" name="btn_cad_evento" value="Próximo"/>
        </form>
    </body>
</html>