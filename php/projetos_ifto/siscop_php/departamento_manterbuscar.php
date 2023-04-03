<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
function validar() {
    var nome = form1.cmp_nome_dep.value;
    var cod = form1.cmp_cod_dep.value;
    if (((nome != "")&&(nome != " "))||((cod != "")&&(cod != " "))) { 
        form1.action = "principal.php?p=departamento&acao=<?php echo 'bd_'.$acao?>";
        return true;
    } else {
        alert('Informe um dos dados do departamento!');
        form1.action = "principal.php?p=departamento&acao=<?php echo $acao?>";       
        return false;
    }       
}
</script>
<?php
    if(!isset($_SESSION["on_nome"]) || !isset($_SESSION["on_codigo"])) { // Verifica se existem os dados da sessão de login
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';//URL mostrado apenas de exemplo
    } else  {      
?>
        <div id="wrap">
            <?php
            if(isset($_REQUEST['acao'])){
                ?>    
                            <font class="fonte_titulos"><b>Buscar Departamento</b></font>
                            <form name="form1" id="f1" class="validate" action="" method="post" enctype="multipart/form-data">
                                <p><label>Informe pelo menos um dos dados abaixo:</label></p>
                                <p><label>Código do Departamento:</label><input type="text" name="cmp_cod_dep" class="required"/><br></p>
                                <p><label>ou</label></p>
                                <p><label>Nome do Departamento:</label><input type="text" name="cmp_nome_dep" class="required"/><br></p>
                                <br><p><button class="button blue submit" onclick="return validar()">Buscar</button></p><br>
                            </form>
           <?php
                }
            ?>
        </div>
<?php
    }
?>