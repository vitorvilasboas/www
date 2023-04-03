<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
function vCPF(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
    if(vr.length == 3) form1.cmp_cpf_usu.value = form1.cmp_cpf_usu.value +".";
    if(vr.length == 7) form1.cmp_cpf_usu.value = form1.cmp_cpf_usu.value +".";
    if(vr.length == 11) form1.cmp_cpf_usu.value = form1.cmp_cpf_usu.value +"-";
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13) return true;
	else  return false;
    }
}

function validar() {
    var cpf = form1.cmp_cpf_usu.value;
    var cod = form1.cmp_cod_usu.value;
    var siape = form1.cmp_siape_usu.value;
    if (((cpf != "")&&(cpf != " "))||((cod != "")&&(cod != " "))||((siape != "")&&(siape != " "))) { 
        form1.action = "principal.php?p=usuario&acao=<?php echo 'bd_'.$acao?>";
        return true;
    } else {
        alert('Informe um dos dados do usuário!');
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";       
        return false;
    }       
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
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
                            <font class="fonte_titulos"><b>Buscar Usuário</b></font>
                            <form name="form1" id="f1" class="validate" action="" method="post" enctype="multipart/form-data">
                                <p><label>Informe pelo menos um dos dados abaixo:</label></p>
                                <p><label>Código do Usuário:</label><input type="text" name="cmp_cod_usu" class="required"/><br></p>
                                <p><label>ou</label></p>
                                <p><label>CPF do Usuário:</label>
                                     <input id="b" type="text" MAXLENGTH="14" name="cmp_cpf_usu" class="required" onkeypress='return vCPF(event)'/>
                                     
                                    <br>
                                </p>
                                <p><label>ou</label></p>
                                <p><label>Matrícula SIAPE do Usuário:</label><input type="text" name="cmp_siape_usu" class="required" onkeypress='return SomenteNumero(event)'/><br></p>
                                <br><p><button class="button blue submit" onclick="return validar()">Buscar</button></p><br>
                            </form>
           <?php
                }
            ?>
        </div>
<?php
    }
?>