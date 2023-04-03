<div id="pagina">
    
        <form class="formulario" method="post" action="">
            <h1 class="titulo1">Cadastrar Usuário</h1>
            <?php 

if(isset($_POST['inscrever'])){
    
			require'Connections/config.php';
			
			$usu_nome =        strip_tags(trim($_POST['usu_nome']));
			$usu_cpf =         strip_tags(trim($_POST['cpf']));
			$usu_senha =       strip_tags(trim($_POST['usu_senha']));
			$usu_nivel =       strip_tags(trim('usuario')); 
			$usu_status =       strip_tags(trim('pendente'));
			$usu_email =       strip_tags(trim($_POST['usu_email']));
			$usu_sexo =        strip_tags(trim($_POST['usu_sexo']));
			$usu_data_nasc =   strip_tags(trim($_POST['usu_data_nasc']));
			$usu_celular =     strip_tags(trim($_POST['usu_celular']));
			$usu_telefone =    strip_tags(trim($_POST['usu_telefone']));
			$usu_endereco =    strip_tags(trim($_POST['usu_endereco']));
			$usu_cidade =      strip_tags(trim($_POST['usu_cidade']));
			$usu_uf =          strip_tags(trim($_POST['usu_uf']));
			$usu_cep =         strip_tags(trim($_POST['usu_cep']));
			$usu_instituicao = strip_tags(trim($_POST['usu_instituicao']));
			$usu_modalidade =  strip_tags(trim($_POST['usu_modalidade']));
			$usu_portador =    strip_tags(trim($_POST['usu_portador']));
			$usu_data_cadastro   =      date('d/m/Y H:i:s');
			$log_ip = $_SERVER['REMOTE_ADDR'];
			$log_ip_reverse = '1';

	if($usu_nome=='' and usu_cpf=='' and usu_email=='' and usu_data_nasc=='' and usu_celular=='' and usu_celular=='' and usu_cep=='' and usu_endereco=='' and usu_cidade=='' and usu_cep=='' ){
			echo "O cadastro não foi realizado!<br /> Você não preencheu todos os campos Obrigatorios!";
	        $sql_log = "insert into log_sistema (log_ip,log_hora,log_usuario,log_ip_reverse) values ('$log_ip','$usu_data_cadastro','$usu_cpf','$log_ip_reverse')";
			try{
				$query_log = $conecta->prepare($sql_log);
				$query_log->bindValue(':log_ip',$log_ip,PDO::PARAM_STR);
				$query_log->bindValue(':usu_data_cadastro',$usu_data_cadastro,PDO::PARAM_STR);
				$query_log->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
				$query_log->bindValue(':log_ip_reverse',$log_ip_reverse,PDO::PARAM_STR);
				$query_log->execute();
						
			}catch (PDOexcpetion $error_usuarios){
				echo 'Erro ao Inserir os Dados';	
			}
			
	 }else{
			$sql_usuarios = "SELECT usu_cpf FROM usuarios WHERE usu_cpf = :usu_cpf";
	
			try{
				$query_usuarios = $conecta->prepare($sql_usuarios);
				$query_usuarios->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
				$query_usuarios->execute();
		
				$cont_usuarios = $query_usuarios->rowCount(PDO::FETCH_ASSOC);		
		
			}catch (PDOexcpetion $error_usuarios){
				echo 'Erro ao selecionar os dados';	
			}
		
		
			if($cont_usuarios >= '1'){
				 echo '<div class="image_error">O usuário já esta cadastrado! Obrigado!<br />
					   <a href="index.php?p=login">Acessar os Mini-cursos</a>
					   </div><!--enviado-->';
			}else{
	
				$sql_cad_usuarios  = "INSERT usuarios (usu_nome, usu_cpf, usu_senha,usu_nivel,usu_status, usu_email, usu_sexo, usu_data_nasc, usu_celular, usu_telefone, usu_endereco, usu_cidade, usu_uf, usu_cep, usu_instituicao, usu_modalidade, usu_portador, usu_data_cadastro) ";
				$sql_cad_usuarios .= "VALUES ('$usu_nome', '$usu_cpf', '".md5($usu_senha)."', '$usu_nivel','$usu_status','$usu_email', '$usu_sexo', '$usu_data_nasc', '$usu_celular', '$usu_telefone', '$usu_endereco', '$usu_cidade', '$usu_uf', '$usu_cep', '$usu_instituicao', '$usu_modalidade', '$usu_portador', '$usu_data_cadastro')";
				
				try{
					$query_cad_usuarios = $conecta->prepare($sql_cad_usuarios);
					$query_cad_usuarios->bindValue(':usu_nome',$usu_nome,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_senha',$usu_senha,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_nivel',$usu_nivel,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_status',$usu_status,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_email',$usu_email,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_sexo',$usu_sexo,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_data_nasc',$usu_data_nasc,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_celular',$usu_celular,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_telefone',$usu_telefone,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_endereco',$usu_endereco,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_cidade',$usu_cidade,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_uf',$usu_uf,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_cep',$usu_cep,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_instituicao',$usu_instituicao,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_modalidade',$usu_modalidade,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_portador',$usu_portador,PDO::PARAM_STR);
					$query_cad_usuarios->bindValue(':usu_data_cadastro',$usu_data_cadastro,PDO::PARAM_STR);
					
					$query_cad_usuarios->execute();
							
			
					echo '<div class="image_error">O usuário foi cadastrado  com sucesso! Acesse agora as informações do evento!<br />
							   <a href="index.php?p=login">Acessar os Mini-cursos</a>
						  </div><!--envaido-->';
					
			  }catch(PDOexception $error_usuarios){
					'Erro ao Cadastrar, mais informações entre em contato com vilsonsoares@ifto.edu.br';
			 }
			  $sql_log = "insert into log_sistema (log_ip,log_hora,log_usuario,log_ip_reverse) values ('$log_ip','$usu_data_cadastro','$usu_cpf','$log_ip_reverse')";
							try{
								$query_log = $conecta->prepare($sql_log);
								$query_log->bindValue(':log_ip',$log_ip,PDO::PARAM_STR);
								$query_log->bindValue(':usu_data_cadastro',$usu_data_cadastro,PDO::PARAM_STR);
								$query_log->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
								$query_log->bindValue(':log_ip_reverse',$log_ip_reverse,PDO::PARAM_STR);
								$query_log->execute();
						
							}catch (PDOexcpetion $error_usuarios){
								echo 'Erro ao Inserir os Dados';	
							} 
	          
		}
		                  
    }
}
?>
            <table class="tabelas">
                <tr>
                    <td class="th276t">Nome completo:*</td><td class="td700"><span id="sprytextfield1"><input class="input_700" type="text" name="usu_nome" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">CPF:* </td><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="cpf" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">cpf inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Senha:* </td><td class="td700"><span id="sprytextfield3"><input class="input_200" type="password" name="usu_senha" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Email:* </td><td class="td700"><span id="sprytextfield4"><input class="input_700" type="text" name="usu_email" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">Email inválido.</span></span></td>
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
                    <td class="th276t">Endereço Completo:* </td><td class="td700"><span id="sprytextfield8"><input class="input_700" type="text" name="usu_endereco" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
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
                    <td class="th276t">Instituição:* </td><td class="td700"><span id="sprytextfield11"><input class="input_700" type="text" name="usu_instituicao" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Modalidade de inscrição:* </td>
                    <td class="td700"><select class="input_200" name="usu_modalidade" id="spryselect2" >
                        <option value="01">Aluno Graduação</option>
                        <option value="02">Professor Educação Básica</option>
                        <option value="03">Graduado</option>
                        <option value="04">Pós-Graduando</option>
                        <option value="05">Professor/Pesquisador</option>
                        <option value="06">Outros</option>    
                            
                        </select>
                    </td>
                </tr>
                <tr>   
                    <td class="th276t">Portador de Necessidade Especiais:*</td><td class="td700"><input class="input_radio"type="radio" name="usu_portador" value="s"/>Sim <input class="input_radio"type="radio" name="usu_portador" value="n" checked/>Não</td>
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
                <input class="btn" type="submit" name="inscrever" value="Inscrever" />
                           
       </form>
 </div>

