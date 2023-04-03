<?php
session_start();
require "../config/confGlobais.php";
if (isset($_SESSION['inscricao_session']) && isset($_SESSION['cpf_session']) && isset($_SESSION['senha_session'])) {
    
    include_once "../config/verifica.php";
    if (verifica_inscricao() != 1){
        require $pagina_inicial;    
        exit;
    }
    $dtnascimento_logado = isset($_SESSION['dtnascimento_logado'])?date('d/m/Y',strtotime(str_replace('-','/',$_SESSION['dtnascimento_logado']))):'00/00/0000';
?>

  <?php include("header.php"); ?>
        <div id="ficha_inscricao" class="borda_radius">
          <div class="inscricao_box_interno">       
            <form name="alterarInscricao" method="post" action="alteraInscricaoConfirmar.php?go=alter">
              <div class="inscricao_cabecalho"><img src="../img/cabecalho.jpg"></div>
              <div class="inscricao_rodape">
                <div style="text-align:right; width:620px; display:block">
                    <div style="display:inline-block;">
                        <input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&raquo; Sair &laquo;" onClick='confirmar()'>
                    </div>
                </div>
              </div>
              <div class="inscricao_cabecalho"><p>FICHA DE ALTERA&Ccedil;&Atilde;O DE INSCRI&Ccedil;&Atilde;O</p></div>
              <div class="div_bloco">
                <fieldset class="borda_radius">
                  <legend>Dados Pessoais</legend>
                  <div class="div_linha">
                    <div><label for="nome_can">Nome*:</label>
                      <input style="width:500px;" class="campos_form" name="nome_can" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)" value="<?php echo $_SESSION['nome_logado']; ?>">
                    </div>
                    <div><label for="sexo_can">Sexo*:</label>
                      <select style="width:60px;" class="campos_form_fim_ln" size="1" name="sexo_can" >
                        <?php if($_SESSION['sexo_logado'] == 'F') { ?>
                                <option value=""></option><option value="M">M</option><option value="F" selected >F</option>
                        <?php } else if ($_SESSION['sexo_logado'] == 'M') { ?>
                                <option value=""></option><option value="M" selected >M</option><option value="F">F</option>
                        <?php } else if ($_SESSION['sexo_logado'] == '') { ?>
                                <option value="" selected ></option><option value="M">M</option><option value="F">F</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="cpf_can">CPF*:</label>
                      <input style="width:120px;" class="campos_form" name="cpf_can" type="text" value="<?php echo $_SESSION['cpf_session']; ?>" readonly  />
                    </div>
                    <div><label for="nasc_can">Data de Nascimento*:</label>
                      <input style="width:120px;" class="campos_form" name="nasc_can" type="text" value="<?php echo $dtnascimento_logado; ?>" maxlength="10" onKeyPress="return MaskData(this, event);" onBlur="ValidarData(this)"></td>
                    </div>
                    <div><label for="nat_can">Naturalidade*:</label>
                      <input style="width:190px;" class="campos_form" name="nat_can" type="text" value="<?php echo $_SESSION['naturalidade_logado']; ?>" maxlength="50" onKeyUp="converteMaiuscula(this)">
                    </div>
                    <div><label for="ufnat_can">UF*:</label>
                      <select style="width:60px;" class="campos_form_fim_ln" size="1" name="ufnat_can" >
                        <option value=""></option><option value="<?php echo $_SESSION['naturalidade_uf_logado']; ?>" selected ><?php echo $_SESSION['naturalidade_uf_logado']; ?></option>
                        <option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option>
                        <option value="GO">GO</option><option value="MA">MA</option><option value="MG">MG</option><option value="MT">MT</option><option value="MS">MS</option><option value="PA">PA</option><option value="PB">PB</option><option value="PE">PE</option><option value="PI">PI</option><option value="PR">PR</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SE">SE</option><option value="SP">SP</option><option value="TO">TO</option>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="doc_can">N<sup>o</sup> do RG*:</label>
                      <input style="width:255px;" class="campos_form" name="doc_can" type="text" value="<?php echo $_SESSION['rg_logado']; ?>" onkeypress='return soNumerosPontoTraco(event)'>
                    </div>
                    <div><label for="orgexp_can">&Oacute;rg&atilde;o Expedidor (RG) *:</label>
                      <input style="width:210px;" class="campos_form" name="orgexp_can" type="text" value="<?php echo $_SESSION['rgorg_logado']; ?>" maxlength="20" onKeyUp="converteMaiuscula(this);"></td>
                    </div>
                    <div><label for="ufdoc_can">UF (RG)*:</label>
                      <select style="width:60px;" class="campos_form_fim_ln" size="1" name="ufdoc_can" >
                        <option value=""></option><option value="<?php echo $_SESSION['rguf_logado']; ?>" selected ><?php echo $_SESSION['rguf_logado']; ?></option>
                        <option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option>
                        <option value="GO">GO</option><option value="MA">MA</option><option value="MG">MG</option><option value="MT">MT</option><option value="MS">MS</option><option value="PA">PA</option><option value="PB">PB</option><option value="PE">PE</option><option value="PI">PI</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SE">SE</option><option value="SP">SP</option><option value="TO">TO</option>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="mae_can">Nome da M&atilde;e*:</label>
                      <input style="width:595px;"class="campos_form_fim_ln" name="mae_can" type="text" value="<?php echo $_SESSION['mae_logado']; ?>" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="pai_can">Nome do Pai:</label>
                      <input style="width:595px;"class="campos_form_fim_ln" name="pai_can" type="text" value="<?php echo $_SESSION['pai_logado']; ?>" maxlength="100" onKeyUp="converteMaiuscula(this)">
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
                      <input style="width:595px;" class="campos_form_fim_ln" name="logend_can" type="text" value="<?php echo $_SESSION['logradouro_logado']; ?>" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="numend_can">N&uacute;mero:</label>
                      <input style="width:70px;" class="campos_form" name="numend_can" type="text" value="<?php echo $_SESSION['numero_logado']; ?>" maxlength="10" onkeypress='return SomenteNumero(event)'>
                    </div>
                    <div><label for="bairroend_can">Bairro*:</label>
                      <input style="width:240px;" class="campos_form" name="bairroend_can" type="text" value="<?php echo $_SESSION['bairro_logado']; ?>" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                    <div><label for="comend_can">Complemento:</label>
                      <input style="width:215px;" class="campos_form_fim_ln" name="comend_can" type="text" value="<?php echo $_SESSION['complemento_logado']; ?>" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="cidend_can">Cidade*:</label>
                      <input style="width:345px;" class="campos_form" name="cidend_can" type="text" value="<?php echo $_SESSION['cidade_logado']; ?>" maxlength="100" onKeyUp="converteMaiuscula(this)">
                    </div>
                    <div><label for="ufend_can">UF*:</label>
                      <select style="width:60px;" class="campos_form" size="1" name="ufend_can" >
                        <option value=""></option><option value="<?php echo $_SESSION['uf_logado']; ?>" selected ><?php echo $_SESSION['uf_logado']; ?></option>
                        <option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option>
                        <option value="GO">GO</option><option value="MA">MA</option><option value="MG">MG</option><option value="MT">MT</option><option value="MS">MS</option><option value="PA">PA</option><option value="PB">PB</option><option value="PE">PE</option><option value="PI">PI</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SE">SE</option><option value="SP">SP</option><option value="TO">TO</option>
                      </select>
                    </div>
                    <div><label for="cepend_can">CEP:</label>
                      <input style="width:115px;" class="campos_form_fim_ln" name="cepend_can" type="text" value="<?php echo $_SESSION['cep_logado']; ?>" maxlength="9" onKeyPress="return MaskCEP(this, event);">
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="telfixo_can">Telefone 1*:</label>
                      <input style="width:135px;" class="campos_form" name="telfixo_can" type="text" value="<?php echo $_SESSION['fone1_logado']; ?>" maxlength="14" onKeyPress="return MaskTelefone(this, event);">
                    </div>
                    <div><label for="telcel_can">Telefone 2:</label>
                      <input style="width:135px;" class="campos_form" name="telcel_can" type="text" value="<?php echo $_SESSION['fone2_logado']; ?>" maxlength="14" onKeyPress="return MaskTelefone(this, event);">
                    </div>
                    <div><label for="mail_can">E-mail:</label>
                      <input style="width:255px;" class="campos_form_fim_ln" name="mail_can" type="text" value="<?php echo $_SESSION['email_logado']; ?>" maxlength="100">
                    </div>  
                  </div>
                  <!--  Zona*: <input type="radio" name="zonaend_can" value="Urbana" style="vertical-align: middle">Urbana&nbsp;&nbsp;
                          <input type="radio" name="zonaend_can" value="Rural" style="vertical-align: middle">Rural -->
                </fieldset>
              </div>
              <div class="div_bloco">
                <fieldset class="borda_radius">
                  <legend> Op&ccedil;&otilde;es de Curso / Pol&iacute;tica Afirmativa </legend>
                  <div class="div_linha">
                    <div><label for="opccur_can_1">Op&ccedil;&atilde;o de Curso*:</label>
                      <select style="width: 595px" class="campos_form_fim_ln" size="1" name="opccur_can_1" >
                        <option value=""></option>
                        <option value="<?php echo $_SESSION['id_curso_logado']; ?>" selected><?php echo $_SESSION['curso_logado']; ?></option>
                        <?php
                          $sql = "SELECT cod_cur, nome_cur, turno_cur, disponivel_cur FROM cursos WHERE disponivel_cur = 1 ORDER BY nome_cur, turno_cur ASC";
                          $query = mysql_query($sql);
                          WHILE ($sql = mysql_fetch_array($query)){
                            $cod_cur = $sql["cod_cur"];
                            $nome_cur = $sql["nome_cur"];
                            $turno_cur = $sql["turno_cur"];
                            if($cod_cur != $_SESSION['id_curso_logado'] ){
                              echo "<option value=\"$cod_cur\">$nome_cur - $turno_cur</option>\n";
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="opccur_can_2">Confirme a Op&ccedil;&atilde;o de Curso*:</label>
                      <select style="width: 595px" class="campos_form_fim_ln" size="1" name="opccur_can_2" >
                        <option value=""></option>
                        <option value="<?php echo $_SESSION['id_curso_logado']; ?>" selected><?php echo $_SESSION['curso_logado']; ?></option>
                        <?php
                          $sql = "SELECT cod_cur, nome_cur, turno_cur, disponivel_cur FROM cursos WHERE disponivel_cur = 1 ORDER BY nome_cur, turno_cur ASC";
                          $query = mysql_query($sql);
                          WHILE ($sql = mysql_fetch_array($query)){
                            $cod_cur = $sql["cod_cur"];
                            $nome_cur = $sql["nome_cur"];
                            $turno_cur = $sql["turno_cur"];
                            if($cod_cur != $_SESSION['id_curso_logado'] ){
                              echo "<option value=\"$cod_cur\">$nome_cur - $turno_cur</option>\n";
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="div_linha">
                    <div><label for="part_cota">Pol&iacute;tica Afirmativa:</label>
                      <select style="width: 595px" class="campos_form_fim_ln" size="1" name="part_cota" id="part_cota">
                        <option value=""></option>
                        <option value="<?php echo $_SESSION['id_polafirmativa_logado']; ?>" selected><?php echo $_SESSION['nome_polafirmativa_logado']; ?></option>
                        <?php
                          $sql = "SELECT * FROM politica";
                          $query = mysql_query($sql);
                          //$i = 0;
                          WHILE ($sql = mysql_fetch_array($query)){
                            $cod_pol = $sql["pol_id"];
                            $desc_pol = $sql["pol_descricao"];
                            $nome_pol = $sql["pol_nome"];
                            if($cod_pol != $_SESSION['id_polafirmativa_logado'] ){
                              echo "<option value=\"$cod_pol\">$nome_pol</option>\n";
                            }
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
                      <?php if( $_SESSION['lateralidade_logado'] == 'DESTRO' ) { ?>
                        <input type="radio" name="hab_can" value="DESTRO"  style="vertical-align:middle" checked ><span>Direita</span>&nbsp;&nbsp;<!-- checked -->
                        <input type="radio" name="hab_can" value="CANHOTO" style="vertical-align: middle"><span>Esquerda</span>
                      <?php } else if( $_SESSION['lateralidade_logado'] == 'CANHOTO' ) { ?>
                        <input type="radio" name="hab_can" value="DESTRO"  style="vertical-align:middle"><span>Direita</span>&nbsp;&nbsp;<!-- checked -->
                        <input type="radio" name="hab_can" value="CANHOTO" style="vertical-align: middle" checked ><span>Esquerda</span>
                      <?php } else { ?>
                        <input type="radio" name="hab_can" value="DESTRO"  style="vertical-align:middle"><span>Direita</span>&nbsp;&nbsp;<!-- checked -->
                        <input type="radio" name="hab_can" value="CANHOTO" style="vertical-align: middle"><span>Esquerda</span>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="div_linha_op2">
                    <div><label for="hab_can">Voc&ecirc; necessita de atendimento especial para realizar a prova?*</label></div>
                    <div>
                      <?php if( $_SESSION['atespec_logado'] == 'S' ) { ?>
                        <input type="radio" name="vateesp_can" value="N" style="vertical-align: middle" onClick="document.getElementById('desateesp_can').className='invisivel'; document.alterarInscricao.desateesp_can.value='';"><span>N&atilde;o</span>&nbsp;&nbsp;
                        <input type="radio" name="vateesp_can" value="S" style="vertical-align: middle" checked onClick="document.getElementById('desateesp_can').className='visivel'; document.alterarInscricao.desateesp_can.value='<?php echo $_SESSION['atespecdesc_logado'] ?>'; document.alterarInscricao.desateesp_can.focus()"><span>Sim</span>
                      <?php } else if( $_SESSION['atespec_logado'] == 'N' ) { ?>
                        <input type="radio" name="vateesp_can" value="N" style="vertical-align: middle" checked onClick="document.getElementById('desateesp_can').className='invisivel'; document.alterarInscricao.desateesp_can.value='';"><span>N&atilde;o</span>&nbsp;&nbsp;
                        <input type="radio" name="vateesp_can" value="S" style="vertical-align: middle" onClick="document.getElementById('desateesp_can').className='visivel'; document.alterarInscricao.desateesp_can.focus()"><span>Sim</span>
                      <?php } else { ?>
                        <input type="radio" name="vateesp_can" value="N" style="vertical-align: middle" onClick="document.getElementById('desateesp_can').className='invisivel'; document.alterarInscricao.desateesp_can.value='';"><span>N&atilde;o</span>&nbsp;&nbsp;
                        <input type="radio" name="vateesp_can" value="S" style="vertical-align: middle" onClick="document.getElementById('desateesp_can').className='visivel'; document.alterarInscricao.desateesp_can.value='<?php echo $_SESSION['atespecdesc_logado'] ?>'; document.alterarInscricao.desateesp_can.focus()"><span>Sim</span>
                      <?php } ?>                     
                    </div>
                  </div>
                  <div class="div_linha" style="height:100px;" id="desateesp_can">
                    <div><label for="desateesp_can">Descreva como dever&aacute; ser o atendimento especial que necessita para realizar a prova:</label>
                      <textarea style="width:595px; height:70px;" class="campos_form_fim_ln" name="desateesp_can" rows="3"></textarea>
                    </div>
                  </div>
                </fieldset>
              </div>
              
              <div class="inscricao_rodape">
                <div class="div_linha_op2">
                  <span>*Campos de preenchimento obrigat&oacute;rio</span>
                  <!--<iframe width="620px" style="border: 1px solid black;" height="850px" src="edital.pdf"></iframe>-->
                </div>
                <div class="div_linha_op2">
                  <input type="checkbox" name="aceitar_condicoes2"> Declaro que li o edital por completo e estou ciente de todas as normas e prazos presentes nele.
                </div>
                <div style="width:620px;" class="div_linha">
                  <div style="text-align:left;">
                    <input type="submit" class="btn_alterar borda_radius" name="submit" value="Alterar Inscri&ccedil;&atilde;o" />
                  </div>
                  <div style="margin-left:50px;">
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
  echo "<meta http-equiv='refresh' content='0, url=../'>";
}
?>

<script type="text/javascript">
  function confirmar(){
        var confirma = confirm('Tem certeza que deseja sair?');
        if (confirma) {
            document.location.href = 'logout.php?go=out';
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