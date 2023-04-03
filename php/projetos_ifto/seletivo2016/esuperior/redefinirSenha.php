<?php
session_start();
require_once "config/conectaBanco.php";
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {

	if (isset($_POST['cpf_can'])) {
    	$result = mysql_query("select * from candidatos where can_cpf='{$_POST['cpf_can']}'",$conectar);
    	if(mysql_num_rows($result) == 0 && CPF_isValido($_POST['cpf_can'])){
    		$_SESSION['inscrever_cpf'] = $_POST['cpf_can'];
    		header('Location: fichaInscricaoII.php');
    	  //require "fichaInscricao.php";
    	  //exit;
        $erro = 'CPF Válido';
    	} else if (!CPF_isValido($_POST['cpf_can'])){
    		$erro = 'O CPF informado é invalido!';
    	} else if(mysql_num_rows($result)==1){
    		$erro = 'Já existe um candidato inscrito com este CPF';
    	}
    } else {
      $erro = '';
    
}
?>
	<?php include("header.php"); ?>
		<div id="ficha_inscricao" class="borda_radius">
            <div class="inscricao_box_interno">       
              <form method="post" action="?go=redefinir">
                <div class="inscricao_cabecalho">
                  <img src="img/cabecalho.jpg"><br><br>
                  <!--<p>REDEFINIR SENHA</p>-->
                </div>
                <div class="div_bloco_login">
                  <fieldset class="borda_radius">
                    <legend>Esqueceu a senha?</legend>
                    <p style="text-align: center; color:red; font-size: 12px; height:12px;"><?php echo $erro;?></p>
                    <div class="div_linha" style="height:60px;">
                      <div><label for="rec_inscricao" style="font-size:14px; margin-left:25px;">N<sup>o</sup> Inscrição:</label >
                        <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="rec_inscricao" id="rec_inscricao" type="text" onkeypress='return SomenteNumero(event)'>
                      </div>
                    </div>
                    <div class="div_linha" style="height:60px;">
                      <div><label for="rec_cpf" style="font-size:14px; margin-left:25px;">CPF cadastrado (somente n&uacute;meros):</label>
                        <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="rec_cpf" id="rec_cpf" type="text" maxlength="11" onkeypress='return SomenteNumero(event)'>
                      </div>
                    </div>
                    <div class="div_linha" style="height:60px;">
                      <div><label for="rec_email" style="font-size:14px; margin-left:25px;">E-mail cadastrado:</label>
                        <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="rec_email" id="rec_email" type="text">
                      </div>
                    </div>
                    <div class="div_linha" style="text-align:right;">
                      <div>
                        <input type="submit" class="btn_prosseguir borda_radius" name="btnEnviar" id="btnEnviar" value="Enviar" />
                      </div>
                    </div>
                  </fieldset>
                </div>  
              </form>
            </div>
          </div>
          <div class="div_voltar">
            <div style="text-align:left; width:620px;" class="div_linha">
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

<?php
if(@$_GET['go'] == 'redefinir'){
	$rec_inscricao = $_POST['rec_inscricao'];
	$rec_cpf = $_POST['rec_cpf'];
	$rec_email = $_POST['rec_email'];

	if(empty($rec_inscricao)){
		echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
	} else if(empty($rec_cpf)){
		echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
	}elseif(empty($rec_email)){
		echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
	}else{
    $sql = "SELECT * from candidatos WHERE can_inscricao = '$rec_inscricao' AND can_cpf = '$rec_cpf' AND can_email = '$rec_email' LIMIT 1";
		$query1 = mysql_num_rows(mysql_query($sql));
		if($query1 == 1){
			/*$_SESSION['rec_email'] = $rec_email;
			$_SESSION['rec_cpf'] = $rec_cpf;
			$_SESSION['rec_inscricao'] = $rec_inscricao;*/
      $query = mysql_query($sql);
      $sql9 = mysql_fetch_array($query);
      $rec_nome = $sql9["can_nome"];

      //error_reporting ( E_ALL );
      require_once 'funcoesGerais.php';
      require_once '../_jscripts/phpmailer/class.smtp.php';
      require_once '../_jscripts/phpmailer/class.phpmailer.php';

      $envio = redefSenhaEmail($rec_email, $rec_cpf, $rec_inscricao, $rec_nome);
      //mail ($rec_email, "Assunto da Mensagem", "Conteúdo do e-mail", "From: seletivosaraguatins@ifto.edu.br");
      //$envio = enviarEmail();
      if( $envio ){
        echo "<script>alert('As informacoes sobre a redefinicao da senha foram encaminhadas ao email cadastrado. Verifique sua caixa de entrada ou caixa de SPAN e siga as instrucoes.');</script>";
        echo "<meta http-equiv='refresh' content='0, url=./'>";

      } else {
        echo "<script>alert('Erro ao enviar informacoes de redefinicao!! Use o email cadastrado e envie uma solicitacao de recuperacao de senha para seletivoaraguatins@ifto.edu.br informando seus dados de inscricao e dados pessoais.');</script>";
        echo "<meta http-equiv='refresh' content='0, url=./'>";  
      }
      

		}else{
			echo "<script>alert('Candidato nao encontrado. Verifique os dados e tente novamente'); history.back();</script>";
		}
	}
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