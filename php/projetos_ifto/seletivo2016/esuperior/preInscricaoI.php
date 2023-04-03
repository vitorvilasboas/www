<?php
session_start();
include_once "config/verifica.php";
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
    require "config/confGlobais.php";
    require ("config/conectaBanco.php");
    if (verifica_inscricao() != 1){
        require $pagina_inicial;    
        exit;
    }

    function CPF_isValido($cpf) {	// Verifiva se o número digitado contém todos os digitos
      $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
    	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
      if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999'){
    	  return false;
      } else {   // Calcula os números para verificar se o CPF é verdadeiro
          for ($t = 9; $t < 11; $t++) {
              for ($d = 0, $c = 0; $c < $t; $c++) {
                  $d += $cpf{$c} * (($t + 1) - $c);
              }
              $d = ((10 * $d) % 11) % 10;
              if ($cpf{$c} != $d) {
                  return false;
              }
          }
          return true;
        }
    }

    
    if(isset($_SESSION['inscrever_cpf'])){
      unset($_SESSION['inscrever_cpf']);
      echo "<meta http-equiv='refresh' content='0'>";
    }

    if (isset($_POST['cpf_can'])) {
    	$result = mysql_query("select * from candidatos where can_cpf='{$_POST['cpf_can']}'",$conectar);
    	if(mysql_num_rows($result) == 0 && CPF_isValido($_POST['cpf_can'])){
    		$_SESSION['inscrever_cpf'] = $_POST['cpf_can'];
    		header('Location: fichaInscricaoII.php');
    	  //require "fichaInscricao.php";
    	  //exit;
        $erro = 'CPF Valido';
    	} else if (!CPF_isValido($_POST['cpf_can'])){
    		$erro = 'O CPF informado e invalido!';
    	} else if(mysql_num_rows($result)==1){
    		$erro = 'Ja existe um candidato inscrito com este CPF';
    	}
    } else {
      $erro = '';
    }
?>
    <?php include("header.php"); ?>
    <!--<body style="background-image: url('../img/dot.gif'); margin-top: 0px; margin-left: 0px">-->
          <div id="ficha_inscricao" class="borda_radius">
            <div class="inscricao_box_interno">       
              <form name="efetuarInscricao" method="post" action="preInscricaoI.php">
                <div class="inscricao_cabecalho">
                  <img src="img/cabecalho.jpg"><br><br>
                  <p>FICHA DE INSCRI&Ccedil;&Atilde;O</p>
                </div>
                <div class="div_bloco_preinsc">
                  <fieldset class="borda_radius">
                    <legend></legend>
                    <p style="text-align: center; color:red; font-size: 12px; height:12px;"><?php echo $erro;?></p>
                    <div class="div_linha" style="height:80px;">
                      <div><label for="nome_can" style="font-size:16px; margin-left:25px;">Informe o CPF (somente n&uacute;meros):</label>
                        <input style="width:300px; height:40px; margin-left:25px;" class="campos_form" name="cpf_can" type="text" maxlength="11" onkeypress='return SomenteNumero(event)'>
                      </div>
                    </div>
                    <div class="div_linha" style="text-align:right;">
                      <div>
                        <input type="submit" class="btn_prosseguir borda_radius" name="submit" value="Prosseguir" />
                      </div>
                    </div>
                  </fieldset>
                </div>
                   
              </form>
            </div>
          </div>
          <div class="div_voltar">
            <div style="text-align:left; width:640px;" class="div_linha">
              <div>
                <a href="<?php echo $pagina_inicial; ?>"><input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&laquo; Voltar &laquo;"></a>
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

<script type="text/javascript">
function SomenteNumero(evt){
      var tecla=(window.event)?event.keyCode:evt.which; 
      if((tecla>47 && tecla<58)) return true;
      else{
        if (tecla==8 || tecla==0 || tecla==13) return true;
    else  return false;
      }
  }
</script>