<?php
session_start();
require "verifica.php";
require "../config/confGlobais.php";
if ($_POST["numero"]==""){
	header("Location: buscaInscricao.php?erro=1");
	exit;
}

if ($_POST["campo"] == "cpf"){
	$SQL = "select * from candidatos where cpf_can=".$_POST["numero"];
}
else if ($_POST["campo"] == "inscricao"){
	$SQL = "select * from candidatos where cod_can=".$_POST["numero"];
}

require "../config/conectaBanco.php";

$resultado = mysql_query($SQL, $conectar);

$total = mysql_num_rows($resultado);

if (!$total){
	header("Location: buscaInscricao.php?erro=1");
	exit;
}

$dados = mysql_fetch_array($resultado);

$SQL = "select cod_cur, nome_cur from cursos where cod_cur = ".$dados["opccur_can_1"];
$result = mysql_query($SQL, $conectar);
$curso_1 = mysql_fetch_array($result);

$SQL = "select cod_cur, nome_cur from cursos where cod_cur = ".$dados["opccur_can_1"];
$result = mysql_query($SQL, $conectar);
$curso_2 = mysql_fetch_array($result);

require "cabecalho.php";
?>
       
<form name="editaInscricao" method="post" action="atualizaInscricao.php">
<input type=hidden name=cod_can value=<?php echo $dados["cod_can"];?>>
<input type=hidden name=origem value=<?php echo $_POST["origem"]; ?>>
<table width="622" border="0" cellspacing="0" cellpadding="4" style="background-color: #FFFFFF">
  <tr>
    <td width="622">            
      <h2 style="text-align:center; color: #cc0000;">ATUALIZAÇÃO DE INSCRIÇÃO</h2>
        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
        	<legend class="text_medio_caps_color">Controle Interno</legend>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
			<tr><td width=20%>Nº Inscrição:</td> <td><?php echo $dados[cod_can]; ?> </td></tr>			
			<tr><td width=20%>CPF:</td> <td><?php echo $dados[cpf_can]; ?> </td></tr>						
            <tr><td colspan=2 class="text_caps_neg" height="28" width="110"><input type="checkbox" name="deferido" <?php if ($dados["deferido"]==1) {echo "checked=true";} ?> >Inscrição deferida</td></tr>
            <tr><td colspan=2 class="text_caps_neg" height="28" width="110"><input type="checkbox" name="cota_esc_pub" <?php if ($dados["cota_esc_pub"]==1) {echo "checked=true";} ?> >Cotista</td></tr>			              
            </table>
        </fieldset>
        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
        	<legend class="text_medio_caps_color">Dados Pessoais</legend>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="text_caps_neg" height="28" width="110">Nome*:</td>
                <td width="290"><input style="margin-right: 10px; width: 350px;" class="caixa" name="nome_can" type="text" maxlength="100" value="<?php echo $dados["nome_can"] ?>"onKeyUp="converteMaiuscula(this)"></td>
                <td class="text_caps_neg" height="28">Sexo*:</td>
                <td>
                  <select size="1" name="sexo_can" class="combo">
                      <option value="">Sexo</option>
					  <?php if ($dados["sexo_can"]=="Masculino"){?>
					  <option value="Masculino" selected>Masculino</option>
                      <option value="Feminino">Feminino</option>
					  <?php }
					  else{?>
					  <option value="Masculino">Masculino</option>
                      <option value="Feminino" selected>Feminino</option>					  
					  <?php }?>

                  </select>
                </td>
              </tr>
              <tr>
                  <td class="text_caps_neg" height="28" width="110">CPF*:</td>
                  <td colspan="3">
                    <table border="0">
                        <tr>
                            <td><input readonly="readonly" class="caixa" name="cpf_can" value="<?php echo $dados["cpf_can"]?>" style="width: 150px;" type="text" size="52" maxlength="11" /></td>
                            <td width="190px" style="text-align:right;" class="text_caps_neg"> Data de Nascimento*:</td>
							<?php $data = explode ("-", $dados["nasc_can"]); $data = $data[2]."/".$data[1]."/".$data[0]; ?>
                            <td><input class="caixa" name="nasc_can" style="width:117px; margin-left: 20px;" type="text" maxlength="10" value="<?php echo $data; ?>" onKeyPress="return MaskData(this, event);" onBlur="ValidarData(this)"></td>
                        </tr>
                    </table>
                   </td>
               </tr>
               <tr>
                <td class="text_caps_neg" height="28">Mãe*:</td>
                <td><input class="caixa" name="mae_can" style="margin-right: 10px; width: 350px;" type="text" maxlength="100" value="<?php echo $dados["mae_can"]?>" onKeyUp="converteMaiuscula(this)"></td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28">Naturalidade*:</td>
                <td><input class="caixa" style="margin-right: 10px; width: 350px;" name="nat_can" type="text" maxlength="50" value="<?php echo $dados["nat_can"]?>" onKeyUp="converteMaiuscula(this)"></td>
                <td class="text_caps_neg" height="28">Estado*:</td>
                <td>
                  <select size="1" name="ufnat_can" class="combo">
                      <option value="">UF</option>
                      <option value="AC" <?php if ($dados["ufnat_can"]=="AC") echo "selected";?>>AC</option>
                      <option value="AL" <?php if ($dados["ufnat_can"]=="AL") echo "selected";?>>AL</option>
                      <option value="AP" <?php if ($dados["ufnat_can"]=="AP") echo "selected";?>>AP</option>
                      <option value="AM" <?php if ($dados["ufnat_can"]=="AM") echo "selected";?>>AM</option>
                      <option value="BA" <?php if ($dados["ufnat_can"]=="BA") echo "selected";?>>BA</option>
                      <option value="CE" <?php if ($dados["ufnat_can"]=="CE") echo "selected";?>>CE</option>
                      <option value="DF" <?php if ($dados["ufnat_can"]=="DF") echo "selected";?>>DF</option>
                      <option value="ES" <?php if ($dados["ufnat_can"]=="ES") echo "selected";?>>ES</option>
                      <option value="GO" <?php if ($dados["ufnat_can"]=="GO") echo "selected";?>>GO</option>
                      <option value="MA" <?php if ($dados["ufnat_can"]=="MA") echo "selected";?>>MA</option>
                      <option value="MG" <?php if ($dados["ufnat_can"]=="MG") echo "selected";?>>MG</option>
                      <option value="MT" <?php if ($dados["ufnat_can"]=="MT") echo "selected";?>>MT</option>
                      <option value="MS" <?php if ($dados["ufnat_can"]=="MS") echo "selected";?>>MS</option>
                      <option value="PA" <?php if ($dados["ufnat_can"]=="PA") echo "selected";?>>PA</option>
                      <option value="PB" <?php if ($dados["ufnat_can"]=="PB") echo "selected";?>>PB</option>
                      <option value="PR" <?php if ($dados["ufnat_can"]=="PR") echo "selected";?>>PR</option>
                      <option value="PE" <?php if ($dados["ufnat_can"]=="PE") echo "selected";?>>PE</option>
                      <option value="PI" <?php if ($dados["ufnat_can"]=="PI") echo "selected";?>>PI</option>
                      <option value="RJ" <?php if ($dados["ufnat_can"]=="RJ") echo "selected";?>>RJ</option>
                      <option value="RN" <?php if ($dados["ufnat_can"]=="RN") echo "selected";?>>RN</option>
                      <option value="RS" <?php if ($dados["ufnat_can"]=="RS") echo "selected";?>>RS</option>
                      <option value="RO" <?php if ($dados["ufnat_can"]=="RO") echo "selected";?>>RO</option>
                      <option value="RR" <?php if ($dados["ufnat_can"]=="RR") echo "selected";?>>RR</option>
                      <option value="SC" <?php if ($dados["ufnat_can"]=="SC") echo "selected";?>>SC</option>
                      <option value="SE" <?php if ($dados["ufnat_can"]=="SE") echo "selected";?>>SE</option>
                      <option value="SP" <?php if ($dados["ufnat_can"]=="SP") echo "selected";?>>SP</option>
                      <option value="TO" <?php if ($dados["ufnat_can"]=="TO") echo "selected";?> >TO</option>
                  </select>
                </td>
              </tr>
            </table>
        </fieldset>		
        <fieldset style="width: 600px">
        	<legend class="text_medio_caps_color">Opção de Curso</legend>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="text_caps_neg" height="28" width="110">1ª Opção*:</td>
                <td colspan="3" width="490">
                  <select size="1" name="opccur_can_1" class="combo" style="font-size: 12px; width: 490px">
                      <option value="">Escolha o curso pretendido</option>
                      <?php
						$sql = "SELECT cod_cur, nome_cur, turno_cur FROM cursos ORDER BY nome_cur ASC";
                        $query = mysql_query($sql);

                        WHILE ($sql = mysql_fetch_array($query)){
                              $cod_cur = $sql["cod_cur"];
                              $nome_cur = $sql["nome_cur"];
							  $turno_cur = $sql["turno_cur"];
							if ($dados["opccur_can_1"] == $cod_cur){
								echo "<option value=\"$cod_cur\" selected>$nome_cur - $turno_cur</option>\n";
							}
							else{
                              echo "<option value=\"$cod_cur\">$nome_cur - $turno_cur</option>\n";
							}
                        }
                      ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28" width="110">1ª Opção*:</td>
                <td colspan="3" width="490">
                  <select size="1" name="opccur_can_2" class="combo" style="font-size: 12px; width: 490px">
                      <option value="">Escolha o curso pretendido</option>
                      <?php
						$sql = "SELECT cod_cur, nome_cur, turno_cur FROM cursos ORDER BY nome_cur ASC";
                        $query = mysql_query($sql);

                        WHILE ($sql = mysql_fetch_array($query)){
                              $cod_cur = $sql["cod_cur"];
                              $nome_cur = $sql["nome_cur"];
							  $turno_cur = $sql["turno_cur"];
							if ($dados["opccur_can_2"] == $cod_cur){
								echo "<option value=\"$cod_cur\" selected>$nome_cur - $turno_cur</option>\n";
							}
							else{
                              echo "<option value=\"$cod_cur\">$nome_cur - $turno_cur</option>\n";
							}
                        }
                      ?>
                  </select>
                </td>
              </tr>			  
            </table>
        </fieldset>		
        <fieldset style="width: 600px">
        	<legend class="text_medio_caps_color">Documento de Identificação</legend>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
              <tr>
                  <td class="text_caps_neg" height="28" width="130">N<sup>o</sup> do Documento*:</td>
                  <td width="290"><input class="caixa" name="doc_can" style="width: 150px;" type="text" size="52" maxlength="14" value="<?php echo $dados["doc_can"]?>"></td>
              </tr>
              <tr>
                  <td class="text_caps_neg" height="28" width="130"> Orgão Expedidor*:</td>
                  <td width="290"><input class="caixa" value="<?php echo $dados["orgexp_can"]?>" onKeyUp="converteMaiuscula(this);" name="orgexp_can" style="width: 150px;" type="text" size="10" maxlength="14"></td>              
              </tr>
              <tr>
               <td class="text_caps_neg" height="28" width="110">UF*:</td>
                  <td>
                  <select size="1" name="ufdoc_can" class="combo">
                      <option value="">UF</option>
                      <option value="AC" <?php if ($dados["ufdoc_can"]=="AC") echo "selected";?>>AC</option>
                      <option value="AL" <?php if ($dados["ufdoc_can"]=="AL") echo "selected";?>>AL</option>
                      <option value="AP" <?php if ($dados["ufdoc_can"]=="AP") echo "selected";?>>AP</option>
                      <option value="AM" <?php if ($dados["ufdoc_can"]=="AM") echo "selected";?>>AM</option>
                      <option value="BA" <?php if ($dados["ufdoc_can"]=="BA") echo "selected";?>>BA</option>
                      <option value="CE" <?php if ($dados["ufdoc_can"]=="CE") echo "selected";?>>CE</option>
                      <option value="DF" <?php if ($dados["ufdoc_can"]=="DF") echo "selected";?>>DF</option>
                      <option value="ES" <?php if ($dados["ufdoc_can"]=="ES") echo "selected";?>>ES</option>
                      <option value="GO" <?php if ($dados["ufdoc_can"]=="GO") echo "selected";?>>GO</option>
                      <option value="MA" <?php if ($dados["ufdoc_can"]=="MA") echo "selected";?>>MA</option>
                      <option value="MG" <?php if ($dados["ufdoc_can"]=="MG") echo "selected";?>>MG</option>
                      <option value="MT" <?php if ($dados["ufdoc_can"]=="MT") echo "selected";?>>MT</option>
                      <option value="MS" <?php if ($dados["ufdoc_can"]=="MS") echo "selected";?>>MS</option>
                      <option value="PA" <?php if ($dados["ufdoc_can"]=="PA") echo "selected";?>>PA</option>
                      <option value="PB" <?php if ($dados["ufdoc_can"]=="PB") echo "selected";?>>PB</option>
                      <option value="PR" <?php if ($dados["ufdoc_can"]=="PR") echo "selected";?>>PR</option>
                      <option value="PE" <?php if ($dados["ufdoc_can"]=="PE") echo "selected";?>>PE</option>
                      <option value="PI" <?php if ($dados["ufdoc_can"]=="PI") echo "selected";?>>PI</option>
                      <option value="RJ" <?php if ($dados["ufdoc_can"]=="RJ") echo "selected";?>>RJ</option>
                      <option value="RN" <?php if ($dados["ufdoc_can"]=="RN") echo "selected";?>>RN</option>
                      <option value="RS" <?php if ($dados["ufdoc_can"]=="RS") echo "selected";?>>RS</option>
                      <option value="RO" <?php if ($dados["ufdoc_can"]=="RO") echo "selected";?>>RO</option>
                      <option value="RR" <?php if ($dados["ufdoc_can"]=="RR") echo "selected";?>>RR</option>
                      <option value="SC" <?php if ($dados["ufdoc_can"]=="SC") echo "selected";?>>SC</option>
                      <option value="SE" <?php if ($dados["ufdoc_can"]=="SE") echo "selected";?>>SE</option>
                      <option value="SP" <?php if ($dados["ufdoc_can"]=="SP") echo "selected";?>>SP</option>
                      <option value="TO" <?php if ($dados["ufdoc_can"]=="TO") echo "selected";?> >TO</option>
                  </select>
                </td>
              </tr>         
            </table>
            <p class="text_align_center" style="font-weight: bold; color: #CC0000">O documento de identificação informado no ato da inscrição deverá ser o mesmo a ser apresentado na realização das provas, ou outro que contenha foto, impressão digital e a numeração do documento informado no ato da inscrição, como consta no edital.</p>
        </fieldset>		
        <fieldset style="width: 600px">
        	<legend class="text_medio_caps_color">Dados de Contato</legend>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
<!--              <tr>
                <td class="text_caps_neg" height="28">Zona*:</td>
                <td colspan="3"><input type="radio" name="zonaend_can" value="Urbana" style="vertical-align: middle">Urbana&nbsp;&nbsp;<input type="radio" name="zonaend_can" value="Rural" style="vertical-align: middle">Rural</td>
              </tr> -->
              <tr>
                <td class="text_caps_neg" height="28">Rua/Avenida*:</td>
                <td colspan="3"><input class="caixa" name="logend_can" style="width:100%;" type="text" size="94" maxlength="70" value="<?php echo $dados["logend_can"]?>" onKeyUp="converteMaiuscula(this)"></td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28" width="110">Número*:</td>
                <td width="190"><input class="caixa" style="width:100px;" name="numend_can" type="text" size="32" maxlength="15" value="<?php echo $dados["numend_can"]?>" onKeyUp="converteMaiuscula(this)"></td>
                <td class="text_caps_neg" width="110">Complemento:</td>
                <td width="190"><input style="width:250px;" class="caixa" name="comend_can" type="text" size="34" maxlength="25" value="<?php echo $dados["comend_can"]?>" onKeyUp="converteMaiuscula(this)"></td>
                <td></td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28">Bairro*:</td>
                <td><input class="caixa" name="bairroend_can" style="width:150px;" type="text" size="32" maxlength="30" value="<?php echo $dados["bairroend_can"]?>" onKeyUp="converteMaiuscula(this)"></td>
                <td class="text_caps_neg">Cidade*:</td>
                <td><input class="caixa" style="width:150px;" name="cidend_can" type="text" size="34" maxlength="50" value="<?php echo $dados["cidend_can"]?>" onKeyUp="converteMaiuscula(this)"></td>
                <td></td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28">CEP*:</td>
                <td><input class="caixa" name="cepend_can" type="text" size="12" maxlength="9" value="<?php echo $dados["cepend_can"]?>" onKeyPress="return MaskCEP(this, event);"></td>
                <td class="text_caps_neg" height="28">Estado*:</td>
                <td>
                  <select size="1" name="ufend_can" class="combo">
                      <option value="">UF</option>
                      <option value="AC" <?php if ($dados["ufend_can"]=="AC") echo "selected";?>>AC</option>
                      <option value="AL" <?php if ($dados["ufend_can"]=="AL") echo "selected";?>>AL</option>
                      <option value="AP" <?php if ($dados["ufend_can"]=="AP") echo "selected";?>>AP</option>
                      <option value="AM" <?php if ($dados["ufend_can"]=="AM") echo "selected";?>>AM</option>
                      <option value="BA" <?php if ($dados["ufend_can"]=="BA") echo "selected";?>>BA</option>
                      <option value="CE" <?php if ($dados["ufend_can"]=="CE") echo "selected";?>>CE</option>
                      <option value="DF" <?php if ($dados["ufend_can"]=="DF") echo "selected";?>>DF</option>
                      <option value="ES" <?php if ($dados["ufend_can"]=="ES") echo "selected";?>>ES</option>
                      <option value="GO" <?php if ($dados["ufend_can"]=="GO") echo "selected";?>>GO</option>
                      <option value="MA" <?php if ($dados["ufend_can"]=="MA") echo "selected";?>>MA</option>
                      <option value="MG" <?php if ($dados["ufend_can"]=="MG") echo "selected";?>>MG</option>
                      <option value="MT" <?php if ($dados["ufend_can"]=="MT") echo "selected";?>>MT</option>
                      <option value="MS" <?php if ($dados["ufend_can"]=="MS") echo "selected";?>>MS</option>
                      <option value="PA" <?php if ($dados["ufend_can"]=="PA") echo "selected";?>>PA</option>
                      <option value="PB" <?php if ($dados["ufend_can"]=="PB") echo "selected";?>>PB</option>
                      <option value="PR" <?php if ($dados["ufend_can"]=="PR") echo "selected";?>>PR</option>
                      <option value="PE" <?php if ($dados["ufend_can"]=="PE") echo "selected";?>>PE</option>
                      <option value="PI" <?php if ($dados["ufend_can"]=="PI") echo "selected";?>>PI</option>
                      <option value="RJ" <?php if ($dados["ufend_can"]=="RJ") echo "selected";?>>RJ</option>
                      <option value="RN" <?php if ($dados["ufend_can"]=="RN") echo "selected";?>>RN</option>
                      <option value="RS" <?php if ($dados["ufend_can"]=="RS") echo "selected";?>>RS</option>
                      <option value="RO" <?php if ($dados["ufend_can"]=="RO") echo "selected";?>>RO</option>
                      <option value="RR" <?php if ($dados["ufend_can"]=="RR") echo "selected";?>>RR</option>
                      <option value="SC" <?php if ($dados["ufend_can"]=="SC") echo "selected";?>>SC</option>
                      <option value="SE" <?php if ($dados["ufend_can"]=="SE") echo "selected";?>>SE</option>
                      <option value="SP" <?php if ($dados["ufend_can"]=="SP") echo "selected";?>>SP</option>
                      <option value="TO" <?php if ($dados["ufend_can"]=="TO") echo "selected";?> >TO</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28">Telefone Fixo:</td>
                <td><input style="width:150px;" class="caixa" name="telfixo_can" type="text" size="23" maxlength="14" value="<?php echo $dados["telfixo_can"];?>" onKeyPress="return MaskTelefone(this, event);"></td>
                <td class="text_caps_neg" height="28">Celular:</td>
                <td><input style="width:150px;" class="caixa" name="telcel_can" type="text" size="23" maxlength="14" value="<?php echo $dados["telcel_can"];?>" onKeyPress="return MaskTelefone(this, event);"></td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28">E-Mail:</td>
                <td colspan="3"><input class="caixa" style="width:100%;" name="mail_can" type="text" size="56" maxlength="50"  value="<?php echo $dados["mail_can"];?>"  onKeyUp="converteMaiuscula(this)"></td>
              </tr>
            </table>
        </fieldset>		
        <fieldset style="width: 600px">
        	<legend class="text_medio_caps_color">Atendimento Especial</legend>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="text_caps_neg" height="28" width="600">Com qual mão você escreve?* <input type="radio" name="hab_can" <?php if ($dados["hab_can"]=="Destro") echo "checked=true";?> value="Destro" style="vertical-align: middle"><span style="font-variant: normal; font-weight: normal">Direita</span>&nbsp;&nbsp;<input type="radio" name="hab_can" <?php if ($dados["hab_can"]=="Canhoto") echo "checked=true";?> value="Canhoto" style="vertical-align: middle"><span style="font-variant: normal; font-weight: normal">Esquerda</span></td>
              </tr>
              <tr>
                <td class="text_caps_neg" height="28">Você necessita de atendimento especial para realizar a prova?* <input type="radio" name="vateesp_can" <?php if ($dados["vateesp_can"]=="Não") echo "checked=true";?> value="Não" style="vertical-align: middle" onClick="document.getElementById('v_ate_especial').className='invisivel'"><span style="font-variant: normal; font-weight: normal">Não</span>&nbsp;&nbsp;
				<input type="radio" name="vateesp_can" <?php if ($dados["vateesp_can"]=="Sim") echo "checked=true";?> value="Sim" style="vertical-align: middle" onClick="document.getElementById('v_ate_especial').className='visivel'; document.efetuarInscricao.desateesp_can.focus()"><span style="font-variant: normal; font-weight: normal">Sim</span></td>

              </tr>
            </table>
            <div id="v_ate_especial" class="invisivel">
                <table width="600" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="text_caps_neg" height="28">Descreva como deverá ser o atendimento especial que necessita para realizar a prova*:</td>
                  </tr>
                  <tr>
                    <td><textarea class="combo" name="desateesp_can" rows="3" onKeyUp="converteMaiuscula(this);" style="font-size: 12px; width: 600px"><?php if ($dados["vateesp_can"]=="Sim") echo $dados["desateesp_can"];?></textarea></td>
                  </tr>
                </table>	
            </div>
        </fieldset>
        <b>*Campos de preenchimento obrigatório</b>		
  <tr>
      <td colspan=2 class="text_align_center" height="40"><input class="botao" type="submit" name="submit" value="Atualizar Inscrição"></td>
  </tr>
<tr><td><p align=center><a href="<?php echo $_POST["origem"]; ?>?erro=0">voltar</a></td></tr>  
<table>
</form>
</center>
</body>
</html>

