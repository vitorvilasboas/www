<!DOCTYPE html>
<html>
    <head>
        <title>Campos Ocultos PHP (Hidden)</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
    </head>
    <body>
        <form action="form-cadastro2.php" method="POST">
            <h2>Cadastro Parte 1</h2>
            <label for="cmp_titulo">Título: </label>
            <input type="text" name="cmp_titulo" value="" size="50pt"/>
            <br><br>

            <label for="cmp_area">Área: </label>
            <input type="text" name="cmp_area" value="" size="30pt"/>
            <br><br>

            <label for="cmp_dtinicio">Período: </label>
            <input type="date" name="cmp_dtinicio" value=""/>
            <input type="date" name="cmp_dtfim" value=""/>
            <br><br>

            <input type="submit" name="btn_cad_evento" value="Próximo"/>
        </form>
    </body>
</html>