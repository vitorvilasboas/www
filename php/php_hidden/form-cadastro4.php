<!DOCTYPE html>
<html>
    <head>
        <title>Campos Ocultos PHP (Hidden)</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
    </head>
    <body>
        <form action="form-cadastro5.php" method="POST">
            <h2>Cadastro Parte 4</h2>

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

            <label for="cmp_local">Local: </label>
            <input type="text" name="cmp_local" value="" size="50pt"/>
            <br><br>

            <label for="cmp_Endereco">Endereço: </label>
            <input type="text" name="cmp_endereco" value="" size="100pt"/>
            <br><br>

            <input type="submit" name="btn_cad_evento" value="Próximo"/>

        </form>
        
    </body>
</html>