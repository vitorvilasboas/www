<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
function validar() {
    var cod = form1.cmp_cod_req.value;
    if ((cod != "")&&(cod != " ")) { 
        form1.action = "principal.php?p=requisicao&acao=<?php echo 'bd_'.$acao?>";
        return true;
    } else {
        alert('Informe o código da requisição!');
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
                                <p><label>Informe o Código da Requisição:</label><input type="text" name="cmp_cod_req" class="required" onkeypress='return SomenteNumero(event)'/><br></p>
                                <br><p><button class="button blue submit" onclick="return validar()">Buscar</button></p><br>
                            </form>
           <?php
                }
            ?>
        </div>
<?php
    }
?>