<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">

function SomenteNumero(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13) return true;
	else  return false;
    }
}

function validar() {
    var f = form1.campo_filtro.value;
    if (((f == "")||(f == " "))) { 
        alert('Informe um Filtro...');
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.campo_filtro.id = "validate_invalid";
        form1.campo_filtro.focus();
        return false;
    } else if((f=='Por Departamento')){
        if(((form1.campo_info1.value=='') || (form1.campo_info1.value==' ')) && ((form1.campo_info2.value=='') || (form1.campo_info2.value==' '))){
            alert('Nenhum dado informado. Informe o código ou Nome...');
            form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
            form1.campo_info1.id = "validate_invalid";
            form1.campo_info2.id = "validate_invalid";
            form1.campo_info1.focus();
            return false;
        } else if((form1.campo_info1.value.length > 0) && (form1.campo_info2.value.length > 0)){
            alert('Informe apenas 1 (um) dos dados (código OU nome)...');
            form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
            form1.campo_info1.id = "validate_invalid";
            form1.campo_info2.id = "validate_invalid";
            form1.data2.focus();
            return false;
        } else {
            form1.action = "usuario_acao.php?acao=<?php echo 'gerar_'.$acao?>";
            return true;
        }
    } else {
        form1.action = "usuario_acao.php?acao=<?php echo 'gerar_'.$acao?>";
        return true;
    }    
}

function mostra_campos_especificos_do_filtro() {
        var campo_filtro = document.form1.campo_filtro[document.form1.campo_filtro.selectedIndex].value   
        switch(campo_filtro){ 
            case 'Por Departamento':{  
                    $("#dados_filtro").remove();     
                    var novoscampos =   '<div id="dados_filtro"><label>Informe o Nome ou Código do Departamento:</label>';
                        novoscampos +=  '<label>Código:</label>';
                        novoscampos +=  '<input type="text" NAME="campo_info1" value="" onkeypress="return SomenteNumero(event)">  ou  ';
                        novoscampos +=  '<label>Nome:</label>';
                        novoscampos +=  '<input type="text" NAME="campo_info2" value=""></div>';
                    $("#especifico").append(novoscampos);    
                    return false;
            }
            case 'Todos':{
                    $("#dados_filtro").remove();
                    return false;
            }
            case '':{
                    $("#dados_filtro").remove();
                    return false;
            }
        }
}
</script>
<?php
    if(!isset($_SESSION["on_nome"]) || !isset($_SESSION["on_codigo"])) { // Verifica se existem os dados da sessão de login
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';//URL mostrado apenas de exemplo
    } else  {      
?>
        <div class="wrap">
            <font class="fonte_titulos"><b>Relatório de Usuários</b></font>
            <form name="form1" id="f1" class="validate" action="" target="_blank" method="post" enctype="multipart/form-data">
            <?php
            if(isset($_REQUEST['acao'])){
                    ?>  
                        <p>
                            <label>Filtrar Relatório:</label>
                            <select name="campo_filtro" onchange="mostra_campos_especificos_do_filtro()">
                                <option value =""> </option>
                                <option>Por Departamento</option> 
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