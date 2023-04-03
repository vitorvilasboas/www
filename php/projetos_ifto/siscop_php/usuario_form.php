<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">  
function validarNome() {
    var nome = form1.cp_nome.value;
    if ((nome == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.cp_nome.id = "validate_invalid";
        form1.cp_nome.focus();
    } else
        form1.cp_nome.id = "validate_valid";
}

function validar() {
    var cont = 0;
    var nome = form1.cp_nome.value;
    var cpf = form1.cp_cpf.value;
    var email = form1.cp_email.value;
    form1.cp_email.id = "validate_valid";
    var funcao = form1.cp_funcao.value;
    form1.cp_funcao.id = "validate_valid";
    var siape = form1.cp_siape.value;
    var login = form1.cp_login.value;
    var vlotacao = document.form1.campo_lotacao[document.form1.campo_lotacao.selectedIndex].value 
    var vpermissao = document.form1.campo_permissao[document.form1.campo_permissao.selectedIndex].value 
    var vperfil = document.form1.campo_perfil[document.form1.campo_perfil.selectedIndex].value 
    if ((nome == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.cp_nome.id = "validate_invalid";
        form1.cp_nome.focus();
    } else {
        form1.cp_nome.id = "validate_valid";
        cont++;
    } 
    if ((cpf == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.cp_cpf.id = "validate_invalid";
        form1.cp_cpf.focus();
    } else {
        form1.cp_cpf.id = "validate_valid";
        cont++;
    }
       
    if ((siape == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.cp_siape.id = "validate_invalid";
        form1.cp_siape.focus();
    } else {
        form1.cp_siape.id = "validate_valid";
        cont++;
    }
    
    if ((login == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.cp_login.id = "validate_invalid";
        form1.cp_login.focus();    
    } else {
        form1.cp_login.id = "validate_valid";
        cont++;
    }
    
    if ((vlotacao == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.campo_lotacao.id = "validate_invalid";
        form1.campo_lotacao.focus();
    } else {
        form1.campo_lotacao.id = "validate_valid";
        cont++;
    }
    
    if ((vpermissao == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.campo_permissao.id = "validate_invalid";
        form1.campo_permissao.focus();
    } else {
        form1.campo_permissao.id = "validate_valid";
        cont++;
    }
    
    if ((vperfil == "")) {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.campo_perfil.id = "validate_invalid";
        form1.campo_perfil.focus();
    } else {
        form1.campo_perfil.id = "validate_valid";
        cont++;
    }
    
    if(validarCPF()){
        cont++;
    } else {
        form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
        form1.cp_cpf.id = "validate_invalid";
        form1.cp_cpf.focus();
        return false;
    }
    if(vperfil == "administrativo"){
        var cargo = form1.cp_cargo.value;
        if ((cargo == "")) {
            form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
            form1.cp_cargo.id = "validate_invalid";
            form1.cp_cargo.focus();
        } else {
            form1.cp_cargo.id = "validate_valid";
            cont++;
        }
        
        if(cont!=9){
            alert('Preencha os campos obrigatórios!');
            form1.cp_nome.focus();
            return false
        } else {
            form1.action = "principal.php?p=usuario&acao=<?php echo 'bd_'.$acao?>";
            return true;
        }
    } else if(vperfil == "professor"){
        var area = form1.cp_area.value;
        if ((area == "")) {
            form1.action = "principal.php?p=usuario&acao=<?php echo $acao?>";
            form1.cp_area.id = "validate_invalid";
            form1.cp_area.focus();
        } else {
            form1.cp_area.id = "validate_valid";
            cont++;
        }
        
        if(cont!=9){
            alert('Preencha os campos obrigatórios!');
            form1.cp_nome.focus();
            return false
        } else {
            form1.action = "principal.php?p=usuario&acao=<?php echo 'bd_'.$acao?>";
            return true;
        }
    }   else {
        if(cont!=8){
            alert('Preencha os campos obrigatórios!');
            form1.cp_nome.focus();
            return false
        } else {
            form1.action = "principal.php?p=usuario&acao=<?php echo 'bd_'.$acao?>";
            return true;
        }
    }       
}

function vCPF(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
    if(vr.length == 3) form1.cp_cpf.value = form1.cp_cpf.value +".";
    if(vr.length == 7) form1.cp_cpf.value = form1.cp_cpf.value +".";
    if(vr.length == 11) form1.cp_cpf.value = form1.cp_cpf.value +"-";
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13) return true;
	else  return false;
    }
}

function SomenteNumero(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13) return true;
	else  return false;
    }
}

function VerificaCharUsuario(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    if((tecla>=97 && tecla<=122)||(tecla>=65 && tecla<=90) || (tecla>=45 && tecla<=57)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13 || tecla==95) return true;
	else  return false;
    }
}

function VerificaCharNome(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    if((tecla>=97 && tecla<=122)||(tecla>=65 && tecla<=90)) return true;
    else{
    	if (tecla==8 || tecla==0 || tecla==13 || tecla==32) return true;
	else  return false;
    }
}

function validarCPF() {
    var cpf = form1.cp_cpf.value;
    cpf = cpf.replace(/[^\d]+/g,'');
 
    if(cpf == '') return false;
 
    // Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999"){
            alert('CPF Inválido!');
            form1.cp_cpf = "validate_invalid";
            form1.cp_cpf.focus();
            return false;
        }
   
    // Valida 1o digito
    add = 0;
    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9))){
            alert('CPF Inválido!');
            form1.cp_cpf = "validate_invalid";
            form1.cp_cpf.focus();
            return false;
        }
     
    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10))){
            alert('CPF Inválido!');
            form1.cp_cpf = "validate_invalid";
            form1.cp_cpf.focus();
            return false;
        }
         
    return true;
    
}

function mostra_campos_especificos_do_perfil() {
        var campo_perfil = document.form1.campo_perfil[document.form1.campo_perfil.selectedIndex].value     //variavel q recebe o valor do select campo_perfil
        switch(campo_perfil){   //analisa a variavel q contém o valor do select campo_perfil
            case 'administrativo':{   //caso educador...
                    $("#dados_perfil").remove();     //remove a div id=dados_perfil caso ela já exista
                    var  novoscampos =   '<div id="dados_perfil"><label>Cargo:</label>';      //variavel com os campos especificos
                        novoscampos +=  '<input id="cperfil" type="text" name="cp_cargo" class="required"/><br><font id="fonte"> Campo Obrigatório</font></div>';    //concatena a variavel novoscampos               
                    $("#perfil").append(novoscampos);    //executa a variavel novoscampos e insere os campos na div id perfil
                    return false; 
            }
            case 'professor':{  //caso estudante...
                    $("#dados_perfil").remove();     //remove a div id=dados_perfil caso ela já exista
                    var  novoscampos =   '<div id="dados_perfil"><label>Área:</label>';     //variavel com os campos especificos
                        novoscampos +=  '<input id="cperfil" type="text" name="cp_area" class="required"/><br><font id="fonte"> Campo Obrigatório</font></div>';     //concatena a variavel novoscampos
                    $("#perfil").append(novoscampos);    //executa a variavel novoscampos e insere os campos na div id=perfil
                    return false;
            }
            case '':{
                    $("#dados_perfil").remove();     //remove a div id=dados_perfil caso ela já exista 
            }
        }
}
</script>

<?php

function vfcpf($siape, $cpf){
          //verificando se cpf já existe... bloqueando F5 (reenvio de formulário)
          $sql=("select * from usuario where usu_cpf='".$cpf."' or usu_siape=".$siape);
          $this->resultado= $this->con->banco->Execute($sql);
          if($this->registros=$this->resultado->FetchNextObject()){        
              ?>
                <script>
                    alert('Usuário com este CPF/SIAPE já cadastrado no sistema!');
                </script>
              <?php
              return true;
          } else {
              return false;
          }
}


    if(!isset($_SESSION["on_nome"]) || !isset($_SESSION["on_codigo"])) { // Verifica se existem os dados da sessão de login
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';//URL mostrado apenas de exemplo
    } else  {
        
?>
        <div id="wrap">
            <?php
            if(isset($_REQUEST['acao'])){
                switch($_REQUEST['acao']){
                    case 'cadastrar':    
                        ?>
                            <font class="fonte_titulos"><b>Novo Usuário</b></font>
                            <form name="form1" id="f1" class="validate" action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>
                                            <p>
                                                <label>Nome:</label>
                                                <input id="a" type="text" name="cp_nome" class="required" onkeypress="return VerificaCharNome()"/><!--  -->
                                                <br><font id="fonte"> Campo Obrigatório</font>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <label>CPF:</label>
                                                <input id="b" type="text" MAXLENGTH="14" name="cp_cpf" class="required" onkeypress='return vCPF(event)'/>
                                                <br><font id="fonte"> Campo Obrigatório</font>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                <label>Email:</label>
                                                <input id="c" type="text" name="cp_email" class="required"/>
                                                <br><font id="fonte"> Campo Obrigatório</font>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <label>Matrícula Siape:</label>
                                                <input id="d" type="text" name="cp_siape" class="required" onkeypress='return SomenteNumero(event)'/>
                                                <br><font id="fonte"> Campo Obrigatório</font>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                <label>Função:</label>
                                                <input id="cpfun" type="text" name="cp_funcao" class="required"/>
                                                <br><font id="fonte"> Campo Obrigatório</font>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <label>Setor de Lotação:</label>
                                                <select id="cpp" name="campo_lotacao">
                                                    <option value=""> </option>
                                                    <?php
                                                    $sql=("select dep_nome from departamento");
                                                    $opcao->resultado= $opcao->con->banco->Execute($sql);
                                                    while($opcao->registros=$opcao->resultado->FetchNextObject()){
                                                    ?>
                                                        <option><?php echo $opcao->registros->DEP_NOME;?></option>
                                                    <?php
                                                    }
                                                    ?>                                                   
                                                </select>
                                                <br><font id="fonte"> Campo Obrigatório</font>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                <label>Permissão:</label>
                                                <select id="cpp" name="campo_permissao">
                                                    <option value=""> </option>
                                                    <option value ="Avaliador">Avaliador</option>
                                                    <option value ="Requerente">Requerente</option>
                                                    <option value ="Reprografia">Reprografia</option>
                                                    <option value ="Root">Root</option>
                                                </select>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <label>Perfil:</label>
                                                <select id="cppe" name="campo_perfil" onchange="mostra_campos_especificos_do_perfil()">
                                                    <option value=""> </option>
                                                    <option value ="administrativo">Técnico Administrativo</option>
                                                    <option value ="professor">Professor</option>
                                                </select>
                                            </p>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <p>
                                                <label>Nome de Usuário:</label>
                                                <input id="cplog" type="text" name="cp_login" class="required" onkeypress="return VerificaCharUsuario()"/>
                                                <br><font id="fonte"> Campo Obrigatório</font>
                                            </p>
                                        </td>
                                        <td>
                                            <p id="perfil">
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <br>
                                            <p>
                                                <button class="button blue submit" onclick="return validar()">Cadastrar</button>
                                                <button class="button gray reset">Limpar</button>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                            </form>   
                        <?php
                        ;break;
                        ?>  
                        <?php 
                }//fecha o switch
            }//fecha o if
        ?>
        </div>
<?php
    }
?>