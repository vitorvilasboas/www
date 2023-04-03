<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>Sistema Eleitoral</title>
    </head>
    <body>
        <?php
            if( isset($_REQUEST['reiniciar']) && $_REQUEST['reiniciar'] == 'sim' ){
                require_once 'conexao.php';
                $conexao = conectar();
                /*
                $sql_delete = "DELETE FROM candidato";
		if(mysqli_query($conexao,$sql_delete)){
                    $sql_insert = "INSERT INTO candidato (cand_id,cand_nome,cand_qtd) VALUES (1,'Candidato 1',0), (2,'Candidato 2',0), (3,'Candidato 3',0), (4,'Candidato 4',0), (5,'Nulo',0), (6,'Branco',0)";
                    if( mysqli_query($conexao,$sql_insert) ){
                        ?><script type="text/javascript">alert("Banco de Dados atualizado para o reinicio da votação!! ");</script><?php
                    }
		} else {
                     ?><script type="text/javascript">alert("Falha na atualização do banco de dados!");</script><?php
		}
                */
                $sql_update = "UPDATE candidato SET cand_qtd=0 WHERE cand_id=1 OR cand_id=2 OR cand_id=3 OR cand_id=4 OR cand_id=5 OR cand_id=6";
                if( mysqli_query($conexao,$sql_update) ){
                    ?><script type="text/javascript">alert("Banco de Dados atualizado para o reinicio da votação!! ");</script><?php
                } else {
                    ?><script type="text/javascript">alert("Falha na atualização do banco de dados!");</script><?php
                }
                 
                mysqli_close($conexao);
                echo '<meta http-equiv="refresh" content="0; url=index.php" />';
            }
            
            $voto = $_POST["cmp_cand"]; 
            if( (int)$voto != 0 ){
                
                require_once 'conexao.php';
                $conexao = conectar();//armazena o retorno da função de conexão vinda do arquivo conexao.php em uma variável
                $sql_select = "SELECT * FROM candidato WHERE cand_id='{$voto}'";
                $resultado = mysqli_query($conexao, $sql_select);//executa uma instrução sql
                $candidato = mysqli_fetch_assoc($resultado);//armazena a tupla de resultado (um vetor de associação com as colunas) em uma variável que se comporta como um vetor
                $id_candidato = $candidato['cand_id'];
                $nome_candidato = $candidato['cand_nome'];
                $qtd_no_banco = $candidato['cand_qtd'];//pega o valor armazenado na coluna cand_qtd e atribui a uma variável
                        
                $nova_qtd = $qtd_no_banco + 1;

                $sql_update = "UPDATE candidato SET cand_qtd='{$nova_qtd}' WHERE cand_id='{$voto}'";
                if(mysqli_query($conexao,$sql_update)){
                    echo "<h3>Voto computado na base de dados!!</h3><h3>Você votou no $nome_candidato.</h3>";
                } else {
                    echo "<h3>Falha ao computar o voto!</h3><br>";
                }
                mysqli_close($conexao);
                
            } else {
                echo "<h3>Voto inválido!!</h3>";
            }
        ?>
        <br><br>
        <a href="index.php">Novo voto</a>
        <br><br>
        <a href="resultado.php">Finalizar eleição e Gerar Resultado</a>
        
    </body>
</html>
