<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
function validar() {
    var just = form1.cmp_nome.value;
    var npag = form1.cmp_vinculo.value;
    var cont = 0;
    if ((just == "")||(just == " ")) {
        form1.action = "principal.php?p=departamento&acao=<?php echo $acao?>";
        form1.cmp_nome.id = "validate_invalid";
        form1.cmp_nome.focus();
    } else {
        form1.cmp_nome.id = "validate_valid";
        cont++;
    }
    
    if ((npag=="")||(npag==" ")){
        form1.action = "principal.php?p=departamento&acao=<?php echo $acao?>";
        form1.cmp_vinculo.id = "validate_invalid";
    } else {
        form1.cmp_vinculo.id = "validate_valid";
        cont++;
    }
    if(cont!=2){
        alert('Preencha os campos obrigatórios!');
        form1.cmp_vinculo.focus();
        return false
    } else {
        form1.action = "principal.php?p=departamento&acao=<?php echo 'bd_'.$acao?>";
        return true;
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
                            <font class="fonte_titulos"><b>Novo Departamento</b></font>
                            <form name="form1" id="f1" class="validate" action="" method="post" enctype="multipart/form-data">
                                <p>
                                    <label>Nome:</label>
                                    <input id="a" type="text" name="cmp_nome" class="required"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <p>
                                    <label>Descrição:</label>
                                    <input id="b" type="text" name="cmp_descricao"/>
                                    <br>
                                </p>
                                <p>
                                    <label>Vinculo Superior:</label>
                                    <select id="cpp" name="cmp_vinculo">
                                        <option value=""> </option>
                                        <option value ="DAP">DAP</option>
                                        <option value ="DDE">DDE</option>
                                        <option value ="DIRECAO">DIRECAO</option>
                                        <option value ="OUTRO">OUTRO</option>    
                                    </select>
                                </p>
                                <p>
                                    <label>Instituição:</label>
                                    <select id="cpp" name="cmp_instituicao">
                                        <option value="IFTO - Campus Araguatins">IFTO - Campus Araguatins</option>    
                                    </select>
                                </p>
                                <p>
					<button class="button blue submit" onclick="return validar()">Cadastrar</button>
                                        <button class="button gray reset">Limpar</button>
                                </p><br>
                            </form>     
                        <?php
                }
        ?>
        </div>
<?php
    }
?>