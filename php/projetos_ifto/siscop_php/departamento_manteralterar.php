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
        form1.action = "principal.php?p=departamento&acao=<?php echo 'bd_'.$acao?>&dep_codigo=<?php echo $opcao->registros->DEP_CODIGO;?>";
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
                            <font class="fonte_titulos"><b>Alterar Cadastro do Departamento</b></font>
                            <form name="form1" id="f1" class="validate" action="" method="post" enctype="multipart/form-data">
                                <p>
                                    <label>Nome:</label>
                                    <input id="a" type="text" name="cmp_nome" class="required" value="<?php echo $opcao->registros->DEP_NOME;?>"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <p>
                                    <label>Descrição:</label>
                                    <input id="b" type="text" name="cmp_descricao" value="<?php echo $opcao->registros->DEP_DESCRICAO;?>"/>
                                    <br>
                                </p>
                                <p>
                                    <label>Vinculo Superior:</label>
                                    <select id="cpp" name="cmp_vinculo">
                                        <option value="<?php echo $opcao->registros->DEP_VINCULO;?>"><?php echo $opcao->registros->DEP_VINCULO;?></option>
                                        <?php
                                            if($opcao->registros->DEP_VINCULO=='DAP'){
                                                ?>
                                                    <option value ="DDE">DDE</option>
                                                    <option value ="DIRECAO">DIRECAO</option>
                                                    <option value ="OUTRO">OUTRO</option>
                                                <?php
                                            }
                                        ?>
                                        <?php
                                            if($opcao->registros->DEP_VINCULO=='DDE'){
                                                ?>
                                                    <option value ="DAP">DAP</option>
                                                    <option value ="DIRECAO">DIRECAO</option>
                                                   <option value ="OUTRO">OUTRO</option>
                                                <?php
                                            }
                                        ?>
                                        <?php
                                            if($opcao->registros->DEP_VINCULO=='OUTRO'){
                                                ?>
                                                    <option value ="DAP">DAP</option>
                                                    <option value ="DDE">DDE</option>
                                                    <option value ="DIRECAO">DIRECAO</option>
                                                <?php
                                            }
                                        ?>
                                        <?php
                                            if($opcao->registros->DEP_VINCULO=='DIRECAO'){
                                                ?>
                                                    <option value ="DAP">DAP</option>
                                                    <option value ="DDE">DDE</option>
                                                    <option value ="OUTRO">OUTRO</option>                                                               
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <p>
                                    <label>Instituição:</label>
                                    <select id="cpp" name="cmp_instituicao">
                                        <option value="<?php echo $opcao->registros->DEP_INSTITUICAO;?>"><?php echo $opcao->registros->DEP_INSTITUICAO;?></option>    
                                    </select>
                                </p>
                                <p><button class="button blue submit" onclick="return validar()">Salvar Alterações</button></p>
                            </form>
                            <br>
                            <p class="detalhes_baixo">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="principal.php?p=departamento&acao=manter_buscar"><button class="button gray" onclick="return confirm('Realmente cancelar edição?')">Cancelar</button></a>
                            </p>
                            <br>
                                <?php 
            }
        ?>
        </div>
<?php
    }
?>