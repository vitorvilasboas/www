<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
function validar() {
    var f = form1.campo_filtro.value;
    if (((f == "")||(f == " "))) { 
        alert('Informe um Filtro...');
        form1.action = "principal.php?p=departamento&acao=<?php echo $acao?>";
        form1.campo_filtro.id = "validate_invalid";
        form1.campo_filtro.focus();
        return false;
    } else {
        form1.action = "departamento_acao.php?acao=<?php echo 'gerar_'.$acao?>";
        return true;
    }    
}
</script>
<?php
    if(!isset($_SESSION["on_nome"]) || !isset($_SESSION["on_codigo"])) { // Verifica se existem os dados da sessão de login
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';//URL mostrado apenas de exemplo
    } else  {      
?>
        <div class="wrap">
            <font class="fonte_titulos"><b>Relatório de Departamentos</b></font>
            <form name="form1" id="f1" class="validate" action="" target="_blank" method="post" enctype="multipart/form-data">
            <?php
            if(isset($_REQUEST['acao'])){
                    ?>  
                        <p>
                            <label>Filtrar Relatório:</label>
                            <select name="campo_filtro">
                                <option value =""> </option>
                                <option>Todos</option>
                            </select>
                        </p>
                        <div id="especifico">
                            
                        </div>              
           <?php
                }
            ?>
                        <br><p><button class="button blue submit" onclick="return validar()">Gerar Relatório</button></p><br>
            </form>
        </div>
<?php
    }
?>