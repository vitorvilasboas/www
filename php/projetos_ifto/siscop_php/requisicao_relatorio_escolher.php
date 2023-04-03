<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
function CampoData(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    //if((tecla>46 && tecla<58)) return true;
    //else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
   // }
}

function SomenteNumero(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13) return true;
	else  return false;
    }
}

function vData(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
    if(vr.length == 2) form1.data1.value = form1.data1.value +"/";
    if(vr.length == 5) form1.data1.value = form1.data1.value +"/";
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13) return true;
	else  return false;
    }
}

function vData2(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
    if(vr.length == 2) form1.data2.value = form1.data2.value +"/";
    if(vr.length == 5) form1.data2.value = form1.data2.value +"/";
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13) return true;
	else  return false;
    }
}

function countCheckboxes ( ) {
    var form = document.getElementById('form1');
    var count = 0;
    for(var n=0;n < form1.length;n++){
        if(form1[n].name == 'MyCheckBox' && form1[n].checked){
            count++;
        }
    }
    document.getElementById('checkCount').innerHTML = count;
}

function validar() {
    var f = form1.campo_filtro.value;
    var s = form1.campo_status.value;
    if (((s == "")||(s == " "))) {
        alert('Selecione um status...');
        form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
        form1.campo_status.id = "validate_invalid";
        form1.campo_status.focus();
        return false;
    } else {
        if (((f == "")||(f == " "))) { 
            alert('Informe um Filtro...');
            form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
            form1.campo_filtro.id = "validate_invalid";
            form1.campo_filtro.focus();
            return false;
        } else if((f=='Por Data')||(f=='Por Data da Retirada')){
            if((form1.data1.value=='') || (form1.data1.value==' ') || (form1.data1.value.length < 10)){
                alert('Data de Inicio do período INVÁLIDA...');
                form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
                form1.data1.id = "validate_invalid";
                form1.data1.focus();
                return false;
            } else if((form1.data2.value=='') || (form1.data2.value==' ') || (form1.data2.value.length < 10)){
                alert('Data de Fim do período INVÁLIDA...');
                form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
                form1.data2.id = "validate_invalid";
                form1.data2.focus();
                return false;
            } else {
                form1.action = "requisicao_relatorio_acao.php?acao=<?php echo 'gerar_'.$acao?>";
                return true;
            }
        } else if((f=='Por Requerente')||(f=='Por Departamento')||(f=='Por Avaliador')){
            if(((form1.campo_info1.value=='') || (form1.campo_info1.value==' ')) && ((form1.campo_info2.value=='') || (form1.campo_info2.value==' '))){
                alert('Nenhum dado informado. Informe o código ou Nome...');
                form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
                form1.campo_info1.id = "validate_invalid";
                form1.campo_info2.id = "validate_invalid";
                form1.campo_info1.focus();
                return false;
            } else if((form1.campo_info1.value.length > 0) && (form1.campo_info2.value.length > 0)){
                alert('Informe apenas 1 (um) dos dados (código OU nome)...');
                form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
                form1.campo_info1.id = "validate_invalid";
                form1.campo_info2.id = "validate_invalid";
                form1.data2.focus();
                return false;
            } else {
                form1.action = "requisicao_relatorio_acao.php?acao=<?php echo 'gerar_'.$acao?>";
                return true;
            }
        } else {
            form1.action = "requisicao_relatorio_acao.php?acao=<?php echo 'gerar_'.$acao?>";
            return true;
        }    
    } 
}

function mostra_campos_especificos_do_filtro() {
        var campo_filtro = document.form1.campo_filtro[document.form1.campo_filtro.selectedIndex].value   
        switch(campo_filtro){ 
            case 'Por Data':{  
                    $("#dados_filtro").remove(); 
                    var novoscampos =   '<div id="dados_filtro"><label>Informe o Período:</label>';
                        novoscampos +=  '<label>Data Início:</label>';
                        novoscampos +=  '<input type="text" NAME="data1" MAXLENGTH="10" value="" onkeypress="return vData(event)">';
                        novoscampos +=  '<label>Data Fim:</label>';
                        novoscampos +=  '<input type="text" NAME="data2" MAXLENGTH="10" value="" onkeypress="return vData2(event)"></div>';
                    $("#especifico").append(novoscampos);
                    return false;
            }
            case 'Por Data da Retirada':{ 
                    $("#dados_filtro").remove(); 
                    var novoscampos =   '<div id="dados_filtro"><label>Informe o Período:</label>';
                        novoscampos +=  '<label>Data Início:</label>';
                        novoscampos +=  '<input type="text" NAME="data1" MAXLENGTH="10" value="" onkeypress="return vData(event)">';
                        novoscampos +=  '<label>Data Fim:</label>';
                        novoscampos +=  '<input type="text" NAME="data2" MAXLENGTH="10" value="" onkeypress="return vData2(event)"></div>';
                    $("#especifico").append(novoscampos);
                    return false;
            }
            case 'Por Requerente':{  
                    $("#dados_filtro").remove();
                    var novoscampos =   '<div id="dados_filtro"><label>Informe o Código ou Nome do Requerente:</label>';
                        novoscampos +=  '<label>Código:</label>';
                        novoscampos +=  '<input type="text" NAME="campo_info1" value="" onkeypress="return SomenteNumero(event)">  ou  ';
                        novoscampos +=  '<label>Nome:</label>';
                        novoscampos +=  '<input type="text" NAME="campo_info2" value=""></div>';
                    $("#especifico").append(novoscampos);
                    return false;
            }
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
            case 'Por Avaliador':{ 
                    $("#dados_filtro").remove();     
                    var novoscampos =   '<div id="dados_filtro"><label>Informe o Nome ou Código do Avaliador:</label>';
                        novoscampos +=  '<label>Código:</label>';
                        novoscampos +=  '<input type="text" NAME="campo_info1" value="" onkeypress="return SomenteNumero(event)">  ou  ';
                        novoscampos +=  '<label>Nome:</label>';
                        novoscampos +=  '<input type="text" NAME="campo_info2" value=""></div>';
                    $("#especifico").append(novoscampos);    
                    return false;
            }
            case 'Todas as Minhas Requisições com este Status':{ 
                    $("#dados_filtro").remove();
                    return false;
            }
            case 'Todas com este Status':{
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
            <font class="fonte_titulos"><b>Relatório de Requisições</b></font>
            <form name="form1" id="f1" class="validate" action="" target="_blank" method="post" enctype="multipart/form-data">
            <?php
            if(isset($_REQUEST['acao'])){
                if($_SESSION["on_permissao"]=="Reprografia"){
                    
                    ?>
                        <p>
                            <label>Selecione o Status:</label>
                            <select name="campo_status">
                                <option value =""> </option>
                                <option value ="Autorizadas">AUTORIZADAS</option> 
                                <option value ="Impressas">IMPRESSAS</option> 
                                <option value ="Todas">TODAS AUTORIZADAS/IMPRESSAS</option> 
                            </select>
                        </p>
                        <p>
                            <label>Filtrar Relatório:</label>
                            <select name="campo_filtro" onchange="mostra_campos_especificos_do_filtro()">
                                <option value =""> </option>
                                <option>Por Data</option> 
                                <option>Por Data da Retirada</option> 
                                <option>Por Requerente</option> 
                                <option>Por Departamento</option>
                                <option>Por Avaliador</option>
                                <option>Todas com este Status</option> 
                            </select>
                        </p>
                        <div id="especifico">
                            
                        </div>
                    <?php
                    
                }
                if($_SESSION["on_permissao"]=="Requerente"){
                    ?>
                       <p>
                            <label>Selecione o Status:</label>
                            <select name="campo_status">
                                <option value =""> </option>
                                <option value ="Aguardando">AGUARDANDO</option>
                                <option value ="Autorizadas">AUTORIZADAS</option> 
                                <option value ="Rejeitadas">REJEITADAS</option>
                                <option value ="Canceladas">CANCELADAS</option> 
                                <option value ="Impressas">IMPRESSAS</option> 
                                <option value ="Todas">TODAS</option> 
                            </select>
                        </p>
                        <p>
                            <label>Filtrar Relatório:</label>
                            <select name="campo_filtro" onchange="mostra_campos_especificos_do_filtro()">
                                <option value =""> </option>
                                <option>Por Data</option> 
                                <option>Por Data da Retirada</option>
                                <option>Por Departamento</option>
                                <option>Por Avaliador</option>
                                <option>Todas as Minhas Requisições com este Status</option>
                            </select>
                        </p>
                        <div id="especifico">
                            
                        </div>
                    <?php
                }
                if($_SESSION["on_permissao"]=="Avaliador"){
                    ?>
                        <p>
                            <label>Selecione o Status:</label>
                            <select name="campo_status">
                                <option value =""> </option>
                                <option value ="Aguardando">AGUARDANDO</option>
                                <option value ="Autorizadas">AUTORIZADAS</option> 
                                <option value ="Rejeitadas">REJEITADAS</option>
                                <option value ="Canceladas">CANCELADAS</option> 
                                <option value ="Impressas">IMPRESSAS</option> 
                                <option value ="Todas">TODAS</option> 
                            </select>
                        </p>
                         <p>
                            <label>Filtrar Relatório:</label>
                            <select name="campo_filtro" onchange="mostra_campos_especificos_do_filtro()">
                                <option value =""> </option>
                                <option>Por Data</option> 
                                <option>Por Data da Retirada</option> 
                                <option>Por Requerente</option> 
                                <option>Por Departamento</option>
                                <option>Por Avaliador</option>
                                <option>Todas as Minhas Requisições com este Status</option>
                                <option>Todas com este Status</option>
                            </select>
                        </p>
                        <div id="especifico">
                            
                        </div>
                    <?php
                }
                if($_SESSION["on_permissao"]=="Root"){
                    ?>  
                        <p>
                            <label>Selecione o Status:</label>
                            <select name="campo_status">
                                <option value =""> </option>
                                <option value ="Aguardando">AGUARDANDO</option>
                                <option value ="Autorizadas">AUTORIZADAS</option> 
                                <option value ="Rejeitadas">REJEITADAS</option>
                                <option value ="Canceladas">CANCELADAS</option> 
                                <option value ="Impressas">IMPRESSAS</option> 
                                <option value ="Todas">TODAS</option> 
                            </select>
                        </p>
                        <p>
                            <label>Filtrar Relatório:</label>
                            <select name="campo_filtro" onchange="mostra_campos_especificos_do_filtro()">
                                <option value =""> </option>
                                <option>Por Data</option> 
                                <option>Por Data da Retirada</option> 
                                <option>Por Requerente</option> 
                                <option>Por Departamento</option>
                                <option>Por Avaliador</option>
                                <option>Todas as Minhas Requisições com este Status</option>
                                <option>Todas com este Status</option>
                            </select>
                        </p>
                        <div id="especifico">
                            
                        </div>
                    <?php
                }
                ?>               
           <?php
                }
            ?>
                        <br><p><button class="button blue submit" onclick="return validar()">Gerar Relatório</button></p><br>
            </form>
        </div>
<?php
    }
?>