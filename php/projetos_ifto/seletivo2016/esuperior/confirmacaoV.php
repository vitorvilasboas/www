<?php
session_start();
require "config/confGlobais.php";
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
  include_once "config/verifica.php"; 
  include_once "boletoVI.php";
  if (verifica_inscricao() != 1){
    require $pagina_inicial;    
    exit;
  }
  include_once 'config/conectaBanco.php';
  $insc = base64_decode($_GET['inscricao']);
  $query = @mysql_query("select * from candidatos where can_inscricao=$insc");
  if(!@mysql_num_rows($query)==1){
  	header('location: preInscricaoI.php');
  }
  $candidato = mysql_fetch_assoc($query);

  require ("config/conectaBanco.php");
  $sql = "SELECT nome_cur, turno_cur FROM cursos WHERE cod_cur='$_SESSION[curso_session]' LIMIT 1";
  $query = mysql_query($sql);
  $sql = mysql_fetch_array($query);
  $nome_cur_1 = $sql["nome_cur"]." - ".$sql["turno_cur"];

  $sql = "SELECT * FROM politica WHERE pol_id='$_SESSION[polafirmativa_session]' LIMIT 1";
  $query = mysql_query($sql);
  $sql = mysql_fetch_array($query);
  $politica_descricao = $sql["pol_descricao"];
  $nascimento = isset($_SESSION['dtnascimento_session'])?date('d/m/Y',strtotime(str_replace('-','/',$_SESSION['dtnascimento_session']))):'00/00/0000';
?>
  <?php include("header.php"); ?>
      <div id="ficha_inscricao" class="borda_radius">
        <div class="inscricao_box_interno">
          <div class="inscricao_cabecalho">
            <img src="img/cabecalho.jpg"><br><br>
            <p>CONFIRMA&Ccedil;&Atilde;O DOS DADOS</p>
          </div>
          <div class="div_confirmacao">
            <fieldset class="borda_radius">
              <p style="font-weight:bold; margin-top:10px; font-size:25px; ">::: Inscri&ccedil;&atilde;o realizada com sucesso! :::</p>
              <p style="font-weight:bold; margin-top:5px; font-size:25px; ">Anote seu n&uacute;mero de inscri&ccedil;&atilde;o: <span style="color:#CC0000;"><?php echo $insc; ?></span></p>   
              <p style="margin-top:10px;">A inscri&ccedil;&atilde;o no certame somente ser&aacute; efetivada mediante confirma&ccedil;&atilde;o do pagamento da taxa de inscri&ccedil;&atilde;o.</p>
              <div class="div_boleto"><p><?php formulario_boleto($insc); ?></div>
              <p style=" font-size:13px; ">Aten&ccedil;&atilde;o: o boleto &eacute; pag&aacute;vel apenas no Banco do Brasil.</p>
            </fieldset>            
          </div>
          <div class="div_dados">
            <fieldset class="borda_radius">
              <div class="div_linha_dados">
                <div><label>N<sup>o</sup> Inscri&ccedil;&atilde;o:</label><span><?php echo $insc; ?></span></div>
              </div>
              <div class="div_linha_dados">
                <div><label>Nome:</label><span><?php echo $_SESSION['nome_session']; ?></span></div>
                <div class="recuo25l"><label>CPF:</label><span><?php echo $_SESSION['cpfcand_session']; ?></span></div>
                <div class="recuo25l"><label>Data de Nascimento:</label><span><?php echo $nascimento; ?></span></div>
              </div>
              <div class="div_linha_dados">
                <div><label>N<sup>o</sup> do RG:</label><span><?php echo $_SESSION['rg_session']; ?></span></div>
                <div class="recuo25l"><label>&Oacute;rg&atilde;o Expedidor (RG):</label><span><?php echo $_SESSION['rgorg_session']; ?></span></div>
                <div class="recuo25l"><label>UF (RG):</label><span><?php echo $_SESSION['rguf_session']; ?></span></div>
                
              </div>
              <div class="div_linha_dados">
                <div><label>Nome da M&atilde;e:</label><span><?php echo $_SESSION['mae_session']; ?></span></div>
              </div>
              <div class="div_linha_dados">
                <div><label>Op&ccedil;&atilde;o de Curso:</label><span><?php echo $nome_cur_1; ?></span></div>
              </div>
              <div class="div_linha_dados" style="height: 50px;">
                <div><label>Op&ccedil;&atilde;o de Língua Estrangeira:</label><span><?php echo $_SESSION['lingua_session']; ?></span></div>
              </div>
              <div class="div_linha_dados" style="height: 50px;">
                <div><label>Pol&iacute;tica Afirmativa:</label><span><?php echo $politica_descricao; ?></span></div>
              </div>
              <div class="div_linha_dados">
                <div><label>Lateralidade Dominante:</label><span><?php echo $_SESSION['lateralidade_session']; ?></span></div>
              </div>
              <div class="div_linha_dados">
                <div><label>Voc&ecirc; necessita de atendimento especial para realizar a prova?</label><span><?php if($_SESSION['atespec_session'] == 'S') echo 'SIM'; else echo 'N&Atilde;O'; ?></span></div>
              </div>
              <?php
                if ($_SESSION['atespec_session'] == "S"){
                    $desateesp_can = nl2br($_SESSION['atespecdesc_session']);
                    echo "<div class=\"div_linha_dados\">
                            <div><label>Descri&ccedil;&atilde;o de como dever&aacute; ser o atendimento especial para realiza&ccedil;&atilde;o da prova:</label><span>$desateesp_can</span></div>
                          <div>";
                }
              ?>
            </fieldset>
          </div>
          <div class="inscricao_rodape">
            <div style="text-align:center; width:620px;" class="div_linha">
              <div>
                <a href="<?php echo $pagina_inicial; ?>"><input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&laquo; Voltar &laquo;"></a>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </body>
    </html>
<?php
} else {
  echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
}
?>