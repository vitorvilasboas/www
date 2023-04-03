<?php
session_start();
require "../config/confGlobais.php";
if (isset($_SESSION['inscricao_session']) && isset($_SESSION['cpf_session']) && isset($_SESSION['senha_session'])) {
    
  if(@$_GET['go'] == 'alter'){

    include_once "../config/verifica.php";
    if (verifica_inscricao() != 1){
        require $pagina_inicial;    
        exit;
    }
      require ("../config/conectaBanco.php");
      $sql = "SELECT nome_cur, turno_cur FROM cursos WHERE cod_cur='$_POST[opccur_can_1]' LIMIT 1";
      $query = mysql_query($sql);
      $sql = mysql_fetch_array($query);
      $nome_cur_1 = $sql["nome_cur"]." - ".$sql["turno_cur"];
      
      $sql = "SELECT nome_cur, turno_cur FROM cursos WHERE cod_cur='$_POST[opccur_can_2]' LIMIT 1";
      $query = mysql_query($sql);
      $sql = mysql_fetch_array($query);
      $nome_cur_2 = $sql["nome_cur"]." - ".$sql["turno_cur"];  
      
      $sql = "SELECT * FROM politica WHERE pol_id='$_POST[part_cota]' LIMIT 1";
      $query = mysql_query($sql);
      $sql = mysql_fetch_array($query);
      $politica_descricao = $sql["pol_descricao"];
      //echo "<meta http-equiv='refresh' content='0, url=./alterarInscricaoGravar.php'>";
?>


<?php include("header.php"); ?>
    <div id="ficha_inscricao" class="borda_radius">
      <div class="inscricao_box_interno">
        <div class="inscricao_cabecalho"><img src="../img/cabecalho.jpg"></div>
        <div class="inscricao_rodape">
          <div style="text-align:right; width:620px; display:block">
              <div style="display:inline-block;">
                  <input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&raquo; Sair &laquo;" onClick='confirmar()'>
              </div>
          </div>
        </div>
        <div class="inscricao_cabecalho"><p>CONFIRMA&Ccedil;&Atilde;O DE ALTERA&Ccedil;&Atilde;O DE INSCRI&Ccedil;&Atilde;O</p></div>
        
        <div class="div_dados">
          <fieldset class="borda_radius">
            <div class="div_linha_dados">
              <div><label>Nome:</label><span><?php echo $_POST["nome_can"]; ?></span></div>
              <div class="recuo25l"><label>Sexo:</label><span><?php if($_POST["sexo_can"] == 'F') echo 'FEMININO'; else echo 'MASCULINO'; ?></span></div>
              <div class="recuo25l"><label>CPF:</label><span><?php echo $_POST["cpf_can"];?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>Data de Nascimento:</label><span><?php echo $_POST["nasc_can"]; ?></span></div>
              <div class="recuo25l"><label>Naturalidade:</label><span><?php echo $_POST["nat_can"]; ?></span></div>
              <div class="recuo25l"><label>UF:</label><span><?php echo $_POST["ufnat_can"]; ?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>N<sup>o</sup> do RG:</label><span><?php echo $_POST['doc_can'];?></span></div>
              <div class="recuo25l"><label>&Oacute;rg&atilde;o Expedidor (RG):</label><span><?php echo $_POST['orgexp_can'];?></span></div>
              <div class="recuo25l"><label>UF (RG):</label><span><?php echo $_POST['ufdoc_can'];?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>Nome da M&atilde;e:</label><span><?php echo $_POST["mae_can"]; ?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>Nome do Pai:</label><span><?php echo $_POST["pai_can"]; ?></span></div>
            </div>
          </fieldset>
          <fieldset class="borda_radius">
            <div class="div_linha_dados">
              <div><label>Op&ccedil;&atilde;o de Curso:</label><span><?php echo $nome_cur_1; ?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>Op&ccedil;&atilde;o de L&iacute;ngua Estrangeira:</label><span><?php echo $_POST['lingua_can']; ?></span></div>
            </div>
            <div class="div_linha_dados_op2">
              <div><label>Pol&iacute;tica Afirmativa:</label><span><?php echo $politica_descricao; ?></span></div>
            </div>
          </fieldset>  
          <fieldset class="borda_radius">
            <div class="div_linha_dados">
              <div><label>Rua/Avenida:</label><span><?php echo $_POST["logend_can"]; ?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>N&uacute;mero:</label><span><?php echo $_POST["numend_can"]; ?></span></div>
              <div class="recuo25l"><label>Bairro:</label><span><?php echo $_POST["bairroend_can"]; ?></span></div>
              <div class="recuo25l"><label>Complemento:</label><span><?php echo $_POST["comend_can"]; ?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>Cidade:</label><span><?php echo $_POST["cidend_can"]; ?></span></div>
              <div class="recuo25l"><label>UF:</label><span><?php echo $_POST["ufend_can"]; ?></span></div>
              <div class="recuo25l"><label>CEP:</label><span><?php echo $_POST["cepend_can"]; ?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>Telefone 1:</label><span><?php echo $_POST["telfixo_can"]; ?></span></div>
              <div class="recuo25l"><label>Telefone 2:</label><span><?php echo $_POST["telcel_can"]; ?></span></div>
              <div class="recuo25l"><label>Email:</label><span><?php echo $_POST["mail_can"]; ?></span></div>
            </div>
          </fieldset>
          <fieldset class="borda_radius">
            <div class="div_linha_dados">
              <div><label>Lateralidade Dominante:</label><span><?php echo $_POST["hab_can"]; ?></span></div>
            </div>
            <div class="div_linha_dados">
              <div><label>Voc&ecirc; necessita de atendimento especial para realizar a prova?</label><span><?php if($_POST["vateesp_can"] == 'S') echo 'SIM'; else echo 'N&Atilde;O'; ?></span></div>
            </div>
            <?php
              if ($_POST["vateesp_can"] == "S") {
                  $desateesp_can = nl2br($_POST["desateesp_can"]);
                  echo "<div class=\"div_linha_dados\">
                          <div><label>Descri&ccedil;&atilde;o de como dever&aacute; ser o atendimento especial para realiza&ccedil;&atilde;o da prova:</label><span>$desateesp_can</span></div>
                        <div>";
              }
            ?>
          </fieldset>
        </div>
        <form name="alterarInscricao2" method="post" action="alteraInscricaoGravar.php?go=save">
          <div class="div_bloco">
            <fieldset class="borda_radius">
              <legend>Infome os dados abaixo para Confirmar a altera&ccedil;&atilde;o</legend>
              <div class="div_linha">
                <div><label for="cmp_inscricao_can">N<sup>o</sup> Inscri&ccedil;&atilde;o*:</label>
                  <input style="width:290px;" class="campos_form_fim_ln"  name="cmp_inscricao_can" type="text" maxlength="8" onkeypress='return SomenteNumero(event)'>
                </div>
              </div>
              <div class="div_linha"> 
                <div><label for="senha_can2">Senha*:</label>
                  <input style="width:290px;" class="campos_form" name="senha_can2" type="password" maxlength="50">
                </div>
              </div>
              <p>A senha &eacute; de sua responsabilidade e ser&aacute; necess&aacute;ria para acompanhamento das informa&ccedil;&otilde;es no processo seletivo</p>
            </fieldset>
          </div>        
          <div class="inscricao_rodape">
            <div style="text-align:center; width:620px;" class="div_linha">
                <div>
                  <?php foreach($_POST as $id=>$val):?>
                    <input type="hidden" name="<?php echo $id;?>" value="<?php echo $val;?>" />
                  <?php endforeach;?>
                </div>
                <div><input type="submit" class="btn_submit2 borda_radius" name="submit" value="Confirmar" /></div>
                <div><input type="button" class="btn_reset borda_radius" name="btn_corrigir" value="Corrigir Dados" onClick="javascript:history.go(-1);" ></div>
                <div><input type="button" class="btn_cancel borda_radius" name="btn_cancel" value="Cancelar" onClick="confirmacao()"></div> 
            </div>
          </div>
        </form>
      </div>
    </div>   
  </body>
  </html>

<?php
  } else {
    echo "<h2> go != alter </h2>";
    //echo "<script>history.back();</script>";
  }   
} else {
  echo "<meta http-equiv='refresh' content='0, url=../'>";
}
?>
<script type="text/javascript">
  function SomenteNumero(evt){
      var tecla=(window.event)?event.keyCode:evt.which; 
      if((tecla>47 && tecla<58)) return true;
      else{
        if (tecla==8 || tecla==0 || tecla==13) return true;
    else  return false;
      }
  }

  function confirmacao() {
     var resposta = confirm("Tem certeza que deseja conacelar a altera&ccedil;&atilde;o?");
     if (resposta == true) {
        history.go(-2);
     }
  }

  function confirmar(){
        var confirma = confirm('Tem certeza que deseja sair?');
        if (confirma) {
            document.location.href = 'logout.php?go=out';
        }
    }

</script>