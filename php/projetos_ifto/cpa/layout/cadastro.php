<div id="pagina">
    
        <form class="formulario" method="post" action="">
            <h1 class="titulo1">Cadastrar Usuário</h1>
            <?php 

if(isset($_POST['cadastrar'])){
    
    
    $usu_nome =        strip_tags(trim($_POST['usu_nome']));
    $usu_cpf =         strip_tags(trim($_POST['usu_cpf']));
    $usu_senha =       strip_tags(trim($_POST['usu_senha']));
    $usu_nivel =       strip_tags(trim('usuario')); 
    $usu_email =       strip_tags(trim($_POST['usu_email']));
    $usu_sexo =        strip_tags(trim($_POST['usu_sexo']));
    $usu_data_nasc =   strip_tags(trim($_POST['usu_data_nasc']));
    $usu_celular =     strip_tags(trim($_POST['usu_celular']));
    $usu_telefone =    strip_tags(trim($_POST['usu_telefone']));
    $usu_endereco =    strip_tags(trim($_POST['usu_endereco']));
    $usu_bairro =      strip_tags(trim($_POST['usu_bairro']));
    $usu_cidade =      strip_tags(trim($_POST['usu_cidade']));
    $usu_uf =          strip_tags(trim($_POST['usu_uf']));
    $usu_cep =         strip_tags(trim($_POST['usu_cep']));
    $usu_rg =          strip_tags(trim($_POST['usu_rg']));
    $tdu_codigo =      strip_tags(trim($_POST['fktdu_codigo']));
    $campus_codigo =   strip_tags(trim($_POST['fkcampus_codigo']));
    $usu_matricula =   strip_tags(trim($_POST['usu_matricula']));
    $usu_data_cadastro   =      date('d/m/Y H:i:s');

    $sql_cpf = 'SELECT usu_cpf FROM usuarios WHERE USU_CPF = "'.$usu_cpf.'"';
    $resultado = $con->banco->Execute($sql_cpf);
    if($registros = $resultado->FetchNextObject()){
	$cont_usuarios = $registros->USU_CPF;
        if($cont_usuarios >= '1'){
            echo alerta('O usuário já esta cadastrado!');
        }	
    }		
    else{
	
	$sql_cadastro  = "INSERT usuarios (usu_nome, usu_cpf, usu_senha,usu_nivel, usu_email, 
            usu_sexo, usu_data_nasc, usu_celular, usu_telefone, usu_endereco,usu_bairro, usu_cidade, usu_uf, usu_cep,
            usu_rg, fkcampus_codigo,fktdu_codigo, usu_matricula, usu_data_cadastro)
	    VALUES ('$usu_nome', '$usu_cpf', '".md5($usu_senha)."', '$usu_nivel','$usu_email', '$usu_sexo', 
                    '$usu_data_nasc', '$usu_celular', '$usu_telefone', '$usu_endereco','$usu_bairro', '$usu_cidade', '$usu_uf', 
                    '$usu_cep', '$usu_rg', '$campus_codigo','$tdu_codigo', '$usu_matricula', '$usu_data_cadastro')";
	
	if($registros=$con->banco->Execute($sql_cadastro)){
		
		echo alerta('O usuário foi cadastrado  com sucesso!');
        }else{
                echo alerta('Erro ao Cadastrar, mais informações entre em contato com vilsonsoares@ifto.edu.br</div>');
	     }
	
  }
    }
?>
            <table class="tabelas">
                <tr>
                    <td class="th276t">Nome completo:*</td><td class="td700"><span id="sprytextfield1"><input class="input_700" type="text" name="usu_nome" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">CPF:* </td><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="usu_cpf" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">cpf inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">RG:* </td><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="usu_rg" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">cpf inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Email:* </td><td class="td700"><span id="sprytextfield4"><input class="input_700" type="text" name="usu_email" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">Email inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Senha:* </td><td class="td700"><span id="sprytextfield3"><input class="input_200" type="password" name="usu_senha" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                               <tr>
                    <td class="th276t">Matricula:* </td><td class="td700"><span id="sprytextfield11"><input class="input_200" type="text" name="usu_matricula" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Campus:* </td>
                    <td class="td700"><select class="input_200" name="fkcampus_codigo" id="spryselect2" >
                        <option value="1">Araguatins</option>
                        <option value="2">Araguaina</option>
                        <option value="3">Gurupi</option>
                        <option value="4">Palmas</option>
                        <option value="5">Paraíso TO</option>
                        <option value="6">Porto Nacional</option>    
                            
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td class="th276t">Categorias:* </td>
                    <td class="td700"><select class="input_200" name="fktdu_codigo" id="spryselect2" >
                        <option value="1">Estudante</option>
                        <option value="2">Professor</option>
                        <option value="3">Tecnico Administrativo</option>    
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="th276t">sexo:*</td><td class="td700"><input class="input_radio" type="radio" name="usu_sexo" value="m" checked/>M <input class="input_radio" type="radio" name="usu_sexo" value="f"/>F</td>
                </tr>
                <tr>
                    <td class="th276t">Nascimento:* </td><td class="td700"><span id="sprytextfield5"><input class="input_200" type="text" name="usu_data_nasc" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">data inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Celular:* </td><td class="td700"><span id="sprytextfield6"><input class="input_200"type="text" name="usu_celular" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Telefone: </td><td class="td700"><input class="input_200" type="text" name="usu_telefone" /></td>
                </tr>
                <tr>
                    <td class="th276t">Endereço e Número:* </td><td class="td700"><span id="sprytextfield8"><input class="input_700" type="text" name="usu_endereco" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Bairro:* </td><td class="td700"><span id="sprytextfield8"><input class="input_700" type="text" name="usu_bairro" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Cidade:* </td><td class="td700"><span id="sprytextfield9"><input class="input_200" type="text" name="usu_cidade"/><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Estado:* </td>
                    <td class="td700">
                        <select class="input_60"  name="usu_uf" id="spryselect1">
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AM">AM</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="PR">PR</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="RS">RS</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="SP">SP</option>
                            <option value="TO" selected>TO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="th276t">CEP:*</td><td class="td700"><span id="sprytextfield10"><input class="input_200" type="text" name="usu_cep" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>   
                    <td colspan="2" style="text-align: right;"> * Campos Obrigatórios.</td>
                </tr>
                <script type="text/javascript">
                <!--
                    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
                    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                    var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
                    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
                    var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                    var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "phone_number", {format:"phone_custom", useCharacterMasking:true, pattern:"(00) 0000-0000"});
                    var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
                    var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
                    var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "custom", {useCharacterMasking:true, pattern:"00.000-000"});
                    var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect2");
                //-->
                </script>
            </table>                   
                <input class="btn" type="submit" name="cadastrar" value="Inscrever" />
                           
       </form>
 </div>

