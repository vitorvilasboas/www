
<?php 
session_start();
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
    echo "<meta http-equiv='refresh' content='0, url=../'>";
} else {
    require "../config/confGlobais.php";
    require "../config/conectaBanco.php";
    include_once "../config/verifica.php";
    include_once('../funcoesGerais.php'); 
    if (verifica_cartao_acesso() != 1){
      require $pagina_inicial;    
      exit;
    }
    $dtn_logado = isset($_SESSION['dtnascimento_logado'])?date('d/m/Y',strtotime(str_replace('-','/',$_SESSION['dtnascimento_logado']))):'00/00/0000';
    $dti_logado = isset($_SESSION['dtinscricao_logado'])?date('d/m/Y',strtotime(str_replace('-','/',$_SESSION['dtinscricao_logado']))):'00/00/0000';

?>
    <?php include("header.php"); ?>
    <!--<body style="background-image: url('imagens/dot.gif'); margin-top: 0px; margin-left: 0px" onLoad="window.print();">-->
      <div id="ficha_inscricao" class="borda_radius">
        <div class="inscricao_box_interno">
            <div class="inscricao_cabecalho" style="text-align:left;"><img src="../../_img/cabecalho_cartao.jpg"></div>
            <div class="inscricao_cabecalho"><p>CART&Atilde;O DE ACESSO</p></div>
            <div class="div_dados">
              <fieldset class="borda_radius"><legend>Dados do Candidato</legend>
                  <div class="div_linha_dados">
                      <div><label>N<sup>o</sup> Inscri&ccedil;&atilde;o:</label><span><?php echo formataNumero($_SESSION['inscricao_session'],4);?></span></div>
                      <div class="recuo60l"><label>Data da Inscri&ccedil;&atilde;o:</label><span><?php echo $dti_logado; ?></span></div>
                      <div class="recuo60l"><label>Status:</label>
                          <?php if(!$_SESSION['insc_deferida_logado']) { ?>
                                  <span style="color:#CC0000; font-weight:400;"> <?php echo "AGUARDANDO PAGAMENTO"; ?></span>
                          <?php } else { ?>
                                  <span style="color:#338B3D; font-weight:400;"> <?php echo "INSCRI&Ccedil;&Atilde;O CONFIRMADA"; ?></span>
                          <?PHP } ?>
                      </div>
                  </div>
                  <div class="div_linha_dados">
                      <div><label>Nome:</label><span><?php echo $_SESSION['nome_logado']; ?></span></div>
                  </div>
                  <div class="div_linha_dados">
                      <div><label>CPF:</label><span><?php echo $_SESSION['cpf_session']; ?></span></div>
                      <div class="recuo60l"><label>Data de Nascimento:</label><span><?php echo $dtn_logado; ?></span></div>
                  </div>                  
                  <div class="div_linha_dados">
                      <div><label>Nome da M&atilde;e:</label><span><?php echo $_SESSION['mae_logado']; ?></span></div>
                  </div>
                  <div class="div_linha_dados">
                      <div><label>Endereço:</label>
                          <span><?php echo $_SESSION['logradouro_logado'].', '.$_SESSION['numero_logado'].', '.$_SESSION['bairro_logado'].', '.$_SESSION['cidade_logado'].'-'.$_SESSION['uf_logado'].', CEP: '.$_SESSION['cep_logado']; ?></span>
                      </div>
                  </div>
                  <div class="div_linha_dados">
                      <div><label>Telefones:</label><span><?php echo $_SESSION['fone1_logado']; ?> <?php if($_SESSION['fone2_logado'] != '') echo ' / '.$_SESSION['fone2_logado']; ?></span></div>
                      <div class="recuo25l"><label>E-mail:</label><span><?php echo $_SESSION['email_logado']; ?></span></div>
                  </div>
              </fieldset>

              <fieldset  class="borda_radius"><legend>Documento de Identifica&ccedil;&atilde;o</legend>
                <div class="div_linha_dados">
                    <div><label>N<sup>o</sup> do RG:</label><span><?php echo $_SESSION['rg_logado']; ?></span></div>
                    <div class="recuo25l"><label>&Oacute;rg&atilde;o Expedidor (RG):</label><span><?php echo $_SESSION['rgorg_logado']; ?></span></div>
                    <div class="recuo25l"><label>UF (RG):</label><span><?php echo $_SESSION['rguf_logado']; ?></span></div>
                </div>
                <div class="div_bloco" style="margin-bottom:10px;">
                    <p style="font-weight:300">O documento informado no ato na inscri&ccedil;&atilde;o dever&aacute; ser apresentado no dia da realiza&ccedil;&atilde;o das provas.</p>
                </div>
              </fieldset>

              <fieldset  class="borda_radius"><legend>Curso / Pol&iacute;tica Afirmativa</legend>
                <div class="div_linha_dados">
                    <div><label>Op&ccedil;&atilde;o de Curso:</label><span><?php echo $_SESSION['curso_logado']; ?></span></div>
                </div>
                <div class="div_linha_dados" style="height: 70px;">
                    <div><label>Pol&iacute;tica Afirmativa:</label><span><?php echo $_SESSION['polafirmativa_logado']; ?></span></div>
                </div>
              </fieldset>

              <fieldset  class="borda_radius"><legend>Local de Prova</legend>
                  <div class="div_linha_dados">
                    <div><label>Local:</label><span><?php echo $_SESSION['locprova_logado']; ?></span></div>
                  </div>
                  <div class="div_linha_dados">
                    <div><label>Endere&ccedil;o:</label><span><?php echo $_SESSION['endprova_logado']; ?></span></div>
                  </div>
                  <div class="div_linha_dados">
                    <div><label>Cidade:</label><span><?php echo $_SESSION['cidprova_logado']; ?></span></div>
                  </div>
                  <div class="div_bloco" style="margin-bottom:10px;">
                    <p style="font-weight:300">Fique atento ao ensalamento divulgado pela comiss&atilde;o organizadora na p&aacute;gina oficial do processo seletivo conforme cronograma.</p>
                  </div>
              </fieldset>

              <fieldset  class="borda_radius"><legend>Atendimento</legend>
                <div class="div_linha_dados">
                  <div><label>Lateralidade Dominante:</label><span><?php echo $_SESSION['lateralidade_logado']; ?></span></div>
                </div>
                <div class="div_linha_dados">
                  <div><label>Atendimento especial?</label><span><?php if($_SESSION['atespec_logado'] == 'S') echo 'SIM'; else echo 'N&Atilde;O'; ?></span></div>
                </div>
                <?php
                if ($_SESSION['atespec_logado'] == "S"){
                  $desateesp_can = nl2br($_SESSION['atespecdesc_logado']);
                  echo "<div class=\"div_linha_dados\">
                          <div><label>Descri&ccedil;&atilde;o do atendimento especial:</label><span>$desateesp_can</span></div>
                        <div>";
                }
                ?>
              </fieldset>

          </div>
          <div style="margin-top:20px;" class="inscricao_rodape">
                <div style="text-align:justify; width:620px; ">
                    <hr><span style="font-size: 14px; font-weight:400; color: #3A5C3D; "><?php echo $texto_cartao_acesso; ?></span><br><hr><br>
                    
                </div>
          </div>
        </div>
      </div>
      <div class="div_voltar">
        <div style="text-align:left; width:620px;" class="div_linha">
          <div>
            <input type="button" class="btn_boleto borda_radius" value="Imprimir Comprovante" onClick="window.print();">
            <a href="<?php echo $pagina_inicial; ?>"><input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&laquo; Voltar &laquo;"></a>
          </div>
        </div>
      </div>
    </body>
</html>
<?php
}
?>
<script language="javascript">
    function confirmar(){
        var confirma = confirm('Tem certeza que deseja sair?');
        if (confirma) {
            document.location.href = 'logout.php?go=out';
        }
    }
</script>