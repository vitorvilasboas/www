<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
<?php
session_start();
require "config/confGlobais.php";
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
    
    include_once "config/verifica.php";
    if (verifica_inscricao() != 1){
        require $pagina_inicial;    
        exit;
    }

    if(!isset($_SESSION['inscrever_cpf']))  { 
        header('location:preInscricaoI.php');
    }
    $cpf = $_SESSION['inscrever_cpf'];
    require ("config/conectaBanco.php");
    $result = mysql_query("select * from candidatos where can_cpf='$cpf'",$conectar);
    if(mysql_num_rows($result) == 1){
      	unset($_SESSION['inscrever_cpf']);
      	header('Location: preInscricaoI.php');
    }
?>

  <?php include("header.php"); ?>
        <div id="ficha_inscricao" class="borda_radius">
          <div class="inscricao_box_interno">       
            <form name="efetuarInscricao" method="post" action="confirmaFichaInscricaoIII.php">
              <div class="inscricao_cabecalho">
                <img src="img/cabecalho.jpg"><br><br>
                <p>FICHA DE INSCRI&Ccedil;&Atilde;O</p>
              </div>
              <div class="div_bloco">
                <fieldset class="borda_radius">
                  <legend>Dados Pessoais</legend>
                  <div class="div_linha">
                    <div><label for="nome_can">Nome*:</label>
                      <input style="width:500px;" class="campos_form" name="nome_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                    <div><label for="sexo_can">Sexo*:</label>
                      <select style="width:60px;" class="campos_form_fim_ln" size="1" name="sexo_can" >
                        <option value=""></option><option value="M">M</option><option value="F">F</option>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="cpf_can">CPF*:</label>
                      <input style="width:120px;" class="campos_form" name="cpf_can" type="text" value="<?php echo $cpf;?>" readonly  />
                    </div>
                    <div><label for="nasc_can">Data de Nascimento*:</label>
                      <input style="width:120px;" class="campos_form" name="nasc_can" type="text" maxlength="10" onKeyPress="return MaskData(this, event);" onBlur="ValidarData(this)"></td>
                    </div>
                    <div><label for="nat_can">Naturalidade*:</label>
                      <input style="width:190px;" class="campos_form" name="nat_can" type="text" maxlength="50" onKeyUp="converteMaiuscula(this)">
                    </div>
                    <div><label for="ufnat_can">UF*:</label>
                      <select style="width:60px;" class="campos_form_fim_ln" size="1" name="ufnat_can" >
                        <option value=""></option><option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option>
                        <option value="GO">GO</option><option value="MA">MA</option><option value="MG">MG</option><option value="MT">MT</option><option value="MS">MS</option><option value="PA">PA</option><option value="PB">PB</option><option value="PE">PE</option><option value="PI">PI</option><option value="PR">PR</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SE">SE</option><option value="SP">SP</option><option value="TO">TO</option>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="doc_can">N<sup>o</sup> do RG*:</label>
                      <input style="width:255px;" class="campos_form" name="doc_can" type="text" onkeypress='return soNumerosPontoTraco(event)'>
                    </div>
                    <div><label for="orgexp_can">&Oacute;rg&atilde;o Expedidor (RG) *:</label>
                      <input style="width:210px;" class="campos_form" name="orgexp_can" type="text" maxlength="20" onKeyUp="converteMaiuscula(this);"></td>
                    </div>
                    <div><label for="ufdoc_can">UF (RG)*:</label>
                      <select style="width:60px;" class="campos_form_fim_ln" size="1" name="ufdoc_can" >
                        <option value=""></option><option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option>
                        <option value="GO">GO</option><option value="MA">MA</option><option value="MG">MG</option><option value="MT">MT</option><option value="MS">MS</option><option value="PA">PA</option><option value="PB">PB</option><option value="PE">PE</option><option value="PI">PI</option><option value="PR">PR</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SE">SE</option><option value="SP">SP</option><option value="TO">TO</option>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="mae_can">Nome da M&atilde;e*:</label>
                      <input style="width:595px;"class="campos_form_fim_ln" name="mae_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="pai_can">Nome do Pai:</label>
                      <input style="width:595px;"class="campos_form_fim_ln" name="pai_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                  </div>
                  <p>O documento de identifica&ccedil;&atilde;o informado no ato da inscri&ccedil;&atilde;o dever&aacute; ser o mesmo a ser apresentado na realiza&ccedil;&atilde;o das 
                    provas, ou outro que contenha foto, impress&atilde;o digital e a numera&ccedil;&atilde;o do documento informado no ato da inscri&ccedil;&atilde;o, conforme edital.</p>
                </fieldset>
              </div>
              <div class="div_bloco">
                <fieldset class="borda_radius">
                  <legend>Dados de Contato</legend>
                  <div class="div_linha">
                    <div><label for="logend_can">Rua/Avenida*:</label>
                      <input style="width:595px;" class="campos_form_fim_ln" name="logend_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="numend_can">N&uacute;mero:</label>
                      <input style="width:70px;" class="campos_form" name="numend_can" type="text" maxlength="10" onkeypress='return SomenteNumero(event)'>
                    </div>
                    <div><label for="bairroend_can">Bairro*:</label>
                      <input style="width:240px;" class="campos_form" name="bairroend_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                    <div><label for="comend_can">Complemento:</label>
                      <input style="width:215px;" class="campos_form_fim_ln" name="comend_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="cidend_can">Cidade*:</label>
                      <input style="width:345px;" class="campos_form" name="cidend_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                    <div><label for="ufend_can">UF*:</label>
                      <select style="width:60px;" class="campos_form" size="1" name="ufend_can" >
                        <option value=""></option><option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option>
                        <option value="GO">GO</option><option value="MA">MA</option><option value="MG">MG</option><option value="MT">MT</option><option value="MS">MS</option><option value="PA">PA</option><option value="PB">PB</option><option value="PE">PE</option><option value="PI">PI</option><option value="PR">PR</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SE">SE</option><option value="SP">SP</option><option value="TO">TO</option>
                      </select>
                    </div>
                    <div><label for="cepend_can">CEP:</label>
                      <input style="width:115px;" class="campos_form_fim_ln" name="cepend_can" type="text" maxlength="9" onKeyPress="return MaskCEP(this, event);">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="telfixo_can">Telefone 1*:</label>
                      <input style="width:135px;" class="campos_form" name="telfixo_can" type="text" maxlength="14" onKeyPress="return MaskTelefone(this, event);">
                    </div>
                    <div><label for="telcel_can">Telefone 2:</label>
                      <input style="width:135px;" class="campos_form" name="telcel_can" type="text" maxlength="14" onKeyPress="return MaskTelefone(this, event);">
                    </div>
                    <div><label for="mail_can">E-mail*:</label>
                      <input style="width:255px;" class="campos_form_fim_ln" name="mail_can" type="text" maxlength="100">
                    </div>  
                  </div>
                  <!--  Zona*: <input type="radio" name="zonaend_can" value="Urbana" style="vertical-align: middle">Urbana&nbsp;&nbsp;
                          <input type="radio" name="zonaend_can" value="Rural" style="vertical-align: middle">Rural -->
                </fieldset>
              </div>
              <div class="div_bloco">
                <fieldset class="borda_radius">
                  <legend> Op&ccedil;&otilde;es de Curso / Pol&iacute;tica Afirmativa </legend>
                  <div class="div_linha_op2">
                    <div><!--<label for="opccur_can_1">Op&ccedil;&atilde;o de Curso*:</label>-->
                      <select style="width: 595px" class="campos_form_fim_ln" size="1" name="opccur_can_1" >
                        <option value="">Escolha o curso pretendido*</option>
                        <?php
                          $sql = "SELECT cod_cur, nome_cur, turno_cur, disponivel_cur FROM cursos WHERE disponivel_cur = 1 ORDER BY nome_cur, turno_cur ASC";
                          $query = mysql_query($sql);
                          WHILE ($sql = mysql_fetch_array($query)){
                            $cod_cur = $sql["cod_cur"];
                            $nome_cur = $sql["nome_cur"];
                            $turno_cur = $sql["turno_cur"];
                            echo "<option value=\"$cod_cur\">$nome_cur - $turno_cur</option>\n";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha_op2">
                    <div><!--<label for="opccur_can_2">Confirme a Op&ccedil;&atilde;o de Curso*:</label>-->
                      <select style="width: 595px" class="campos_form_fim_ln" size="1" name="opccur_can_2" >
                        <option value="">Confirme o curso pretendido*</option>
                        <?php
                          $sql = "SELECT cod_cur, nome_cur, turno_cur, disponivel_cur FROM cursos WHERE disponivel_cur = 1 ORDER BY nome_cur, turno_cur ASC";
                          $query = mysql_query($sql);
                          WHILE ($sql = mysql_fetch_array($query)){
                            $cod_cur = $sql["cod_cur"];
                            $nome_cur = $sql["nome_cur"];
                            $turno_cur = $sql["turno_cur"];
                            echo "<option value=\"$cod_cur\">$nome_cur - $turno_cur</option>\n";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha_op2">
                    <div><!--<label for="part_cota">Pol&iacute;tica Afirmativa:</label>-->
                      <select style="width: 595px" class="campos_form_fim_ln" size="1" name="part_cota" id="part_cota">
                        <option value="">Escolha a pol&iacute;tica afirmativa na qual voc&ecirc; concorrer&aacute;*</option>
                        <?php
                          $sql = "SELECT * FROM politica";
                          $query = mysql_query($sql);
                          //$i = 0;
                          WHILE ($sql = mysql_fetch_array($query)){
                            $cod_pol = $sql["pol_id"];
                            $desc_pol = $sql["pol_descricao"];
                            $nome_pol = $sql["pol_nome"];
                            echo "<option value=\"$cod_pol\">$nome_pol</option>\n";
                            /*if($i==0){
                              echo "<option value=\"$cod_pol\" selected=\"true\">$nome_pol</option>\n";
                            } else {
                              echo "<option value=\"$cod_pol\">$nome_pol</option>\n";
                            }
                            $i++;*/
                          }
                        ?>
                      </select>
                    </div>
                  </div>       
                </fieldset>
              </div>
              <div class="div_bloco">
                <fieldset class="borda_radius">
                  <legend>Atendimento Especial</legend>
                  <div class="div_linha_op2">
                    <div><label for="hab_can">Com qual m&atilde;o voc&ecirc; escreve?*</label></div>
                    <div>
                      <input type="radio" name="hab_can" value="DESTRO"  style="vertical-align:middle"><span>Direita</span>&nbsp;&nbsp;<!-- checked -->
                      <input type="radio" name="hab_can" value="CANHOTO" style="vertical-align: middle"><span>Esquerda</span>
                    </div>
                  </div>
                  <div class="div_linha_op2">
                    <div><label for="hab_can">Voc&ecirc; necessita de atendimento especial para realizar a prova?*</label></div>
                    <div>
                      <input type="radio" name="vateesp_can" value="N" style="vertical-align: middle" onClick="document.getElementById('desateesp_can').className='invisivel'"><span>N&atilde;o</span>&nbsp;&nbsp;
                      <input type="radio" name="vateesp_can" value="S" style="vertical-align: middle" onClick="document.getElementById('desateesp_can').className='visivel'; document.efetuarInscricao.desateesp_can.focus()"><span>Sim</span>
                    </div>
                  </div>
                  <div class="div_linha" style="height:100px;" id="desateesp_can">
                    <div><label for="desateesp_can">Descreva como dever&aacute; ser o atendimento especial que necessita para realizar a prova:</label>
                      <textarea style="width:595px; height:70px;" class="campos_form_fim_ln" name="desateesp_can" rows="3"></textarea>
                    </div>
                  </div>
                  <!--  Tipo de Deficiência*:
                        <select size="1" name="tipo_deficiencia" class="combo">
                            <option value="NENHUMA" selected="true">NENHUMA</option><option value="DEFICIENCIA AUDITIVA">DEFICIENCIA AUDITIVA</option>
                            <option value="DEFICIENCIA FISICA">DEFICIENCIA FISICA</option><option value="DEFICIENCIA VISUAL">DEFICIENCIA VISUAL</option>
                            <option value="DEFICIENCIA MENTAL">DEFICIENCIA MENTAL</option><option value="DEFICIENCIA MULTIPLA">DEFICIENCIA MULTIPLA</option>
                        </select> -->
                </fieldset>
              </div>
              <div class="div_bloco">
                <fieldset class="borda_radius">
                  <legend>Dados de Acesso</legend>
                  <div class="div_linha">   
                    <div><label for="senha_can">Senha*:</label>
                      <input style="width:280px;" class="campos_form" name="senha_can" type="password" maxlength="50">
                    </div>
                    <div><label for="conf_senha_can">Confirme a Senha*:</label>
                      <input style="width:280px;" class="campos_form_fim_ln"  name="conf_senha_can" type="password" maxlength="50">
                    </div>
                  </div>
                  <p>A senha &eacute; de sua responsabilidade e ser&aacute; necess&aacute;ria para acompanhamento das informa&ccedil;&otilde;es no processo seletivo</p>
                </fieldset>
              </div>
              <div class="inscricao_rodape">
                <div class="div_linha_op2">
                  <span>*Campos de preenchimento obrigat&oacute;rio</span>
                  <!--<iframe width="620px" style="border: 1px solid black;" height="850px" src="edital.pdf"></iframe>-->
                </div>
                <div class="div_linha_op2">
                  <input type="checkbox" name="aceitar_condicoes"> Declaro que li o edital por completo e estou ciente de todas as normas e prazos presentes nele.
                </div>
                <div style="text-align:center; width:620px;" class="div_linha">
                  <div>
                    <input type="submit" class="btn_submit borda_radius" name="submit" value="Enviar Inscri&ccedil;&atilde;o" />
                  </div>
                  <div>
                    <input type="reset"  class="btn_reset borda_radius" name="btn_limpar" value="Limpar">
                  </div>
                  <div>
                    <input type="button" class="btn_cancel borda_radius" name="btn_cancel" value="Cancelar" onClick="history.go(-1)">
                  </div>
                  <!--<input type="button" value="Avançar" onCLick="history.forward()"> 
                  <input type="button" value="Atualizar" onClick="history.go(0)">-->
                </div> 
              </div>    
            </form>
          </div>
        </div>   
    </body>
</html>
<?php
} else {
  echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
}
?>

<script type="text/javascript">
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

  function soNumerosPontoTraco(evt){
      var tecla=(window.event)?event.keyCode:evt.which; 
      if((tecla>44 && tecla<58)) return true;
      else{
        if (tecla==8 || tecla==0 || tecla==13) return true;
    else  return false;
      }
  }

  function VerificaCharUsuario(evt){
      var tecla=(window.event)?event.keyCode:evt.which; 
      if((tecla>=97 && tecla<=122)||(tecla>=65 && tecla<=90) || (tecla>=45 && tecla<=57) ) return true;
      else{
        if (tecla==8 || tecla==0 || tecla==13 || tecla==95) return true;
    else  return false;
      }
  }

  function VerificaCharNome(evt){
      var tecla=(window.event)?event.keyCode:evt.which; 
      if((tecla>=97 && tecla<=122)||(tecla>=65 && tecla<=90)|| (tecla==192) ||(tecla==222)) return true;
      else{
        if (tecla==8 || tecla==0 || tecla==13 || tecla==32) return true;
        else  return false;
      }
  }
</script>