<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>PHP com Banco de Dados</title>
    </head>
    <body>
        <?php
            $escolha = $_POST['cmp_seila'];

            $conexao = mysqli_connect("127.0.0.1","root","","loja");
            //estabelece conexão com BD (parâmetros: host, usuario BD, senha BD, nome BD)

            if ($escolha == "listar"){
                $sql = "SELECT * FROM cliente";
                $resultado = mysqli_query($conexao, $sql); //executa uma instrução sql

                while ($registro = mysqli_fetch_assoc($resultado)){
                    $id = $registro['cli_id'];
                    $nome = $registro['cli_nome'];
                    $fone = $registro['cli_telefone'];
                    echo "<h1><b>$id</b> - $nome (Fone: $fone)<br></h1>";
                }

            } else if ($escolha == "excluir") {
                $sql = "DELETE FROM cliente WHERE cli_id=20";
                if (mysqli_query($conexao, $sql) ) { //executa uma instrução sql
                    echo "<h1>Cliente excluido com sucesso.</h1>";
                } 

            } else if ($escolha == "cadastrar") {
                $sql = "INSERT INTO cliente (cli_nome,cli_telefone) VALUES ('Larissa','99988-0000')";
                if(mysqli_query($conexao, $sql)){ //executa uma instrução sql
                    echo "<h1>Cliente cadastrado com sucesso.</h1>";
                } 

            } else if ($escolha == "alterar"){
                $sql = "UPDATE cliente SET cli_nome='Pedro' WHERE cli_id={20}";
                if (mysqli_query($conexao, $sql)){ //executa uma instrução sql
                    echo "<h1>Alteração registrada com sucesso.</h1>";
                }

            } else {
                ?>
                <script type="text/javascript">
                    alert("Operação Inválida. Por favor, selecione uma operação");
                </script>
                <?php
                echo '<meta http-equiv="refresh" content="0; url=index.php" />';
            }

            mysqli_close($conexao); //encerra a conexão com BD

            // if(mysqli_query($conexao, $sql)) echo "<br>Cliente excluido.<br><br>";

            // $usuario= $_POST['cmp_usuario'];
            // $senha = $_POST['cmp_senha'];

            // $sql = "SELECT * FROM cliente WHERE cli_usuario=={$usuario} AND cli_senha=={$senha}";
            // $resultado = mysqli_query($conexao, $sql);
            // if ($resultado == Null){
            //     echo "Usuário e/ou senha incorreto(s)";
            // } else {
            //     echo "Bem vindo ao sistema!";
            // }
        ?>
        
        <br><br><a href="index.php">Escolha novamente</a>
        
    </body>
</html>
