<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>Sistema Eleitoral</title>
    </head>
    <body>
        <h2>Sistema Eleitoral IFTO</h2>
        <form action="computar.php" method="POST">
            <h2>Escolha um candidato</h2>
            <label>
                <select name="cmp_cand">
                    <option value="0">---</option>
                    <option value="1">Candidato 01</option>
                    <option value="2">Candidato 02</option>
                    <option value="3">Candidato 03</option>
                    <option value="4">Candidato 04</option>
                    <option value="5">Nulo</option>
                    <option value="6">Branco</option>
                </select>
            </label>
            <br><br>
            <input type="submit" value="Votar"/>
        </form>
    </body>
</html>
