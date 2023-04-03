<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
function validar() {
    var sa = form1.cmp_satual.value;
    var s1 = form1.cmp_snova1.value;
    var s2 = form1.cmp_snova2.value;
    var cont = 0;
    if ((sa == "")||(sa == " ")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo 'alterarsenha'?>";
        form1.cmp_satual.id = "validate_invalid";
        form1.cmp_satual.focus();
    } else {
        form1.cmp_satual.id = "validate_valid";
        cont++;
    }
    
    if ((s1=="")||(s1==" ")){
        form1.action = "principal.php?p=usuario&acao=<?php echo 'alterarsenha'?>";
        form1.cmp_snova1.id = "validate_invalid";
    } else {
        form1.cmp_snova1.id = "validate_valid";
        cont++;
    }
    
    if ((s2=="")||(s2==" ")){    
        form1.action = "principal.php?p=usuario&acao=<?php echo 'alterarsenha'?>";
        form1.cmp_snova2.id = "validate_invalid";
    } else {
        form1.cmp_snova2.id = "validate_valid";
        cont++;
    }
    
    if(cont!=3){
        alert('Preencha os campos obrigatórios!');
        form1.cmp_snova1.focus();
        return false
    } else {
        if(s1!=s2){
            alert('Senhas informadas são incompatíveis!');
            form1.cmp_snova1.focus();
            return false
        } else if (s1.length<8){
            alert('A senha deve conter no mínimo 8 dígitos!');
            form1.cmp_snova1.focus();
            return false
        }
        else{
            form1.action = "principal.php?p=usuario&acao=<?php echo 'bd_alterarsenha'?>";
            return true;
        } 
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
            if(isset($_REQUEST['acao']) || ($_SESSION['acesso1']=='sim')){
                ?>
                            <font class="fonte_titulos"><b>Alterar Senha:</b></font>
                            <form name="form1" id="f1" class="validate" action="" method="post" enctype="multipart/form-data">
                                <p>
                                    <label>Senha Atual:</label>
                                    <input id="a" type="password" name="cmp_satual" class="required"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <p>
                                    <label>Nova Senha:</label>
                                    <input id="a" type="password" name="cmp_snova1" class="required"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <p>
                                    <label>Repita a Nova Senha:</label>
                                    <input id="a" type="password" name="cmp_snova2" class="required"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <br>
                                <p>
					<button class="button blue submit" onclick="return validar()">Alterar</button>
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