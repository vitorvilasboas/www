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
		<div id="cadastrar">
			<a href="preInscricaoI.php" title="Increva-se no Processo Seletivo!">Inscreva-se &raquo;</a>
		</div>
		<div id="ficha_inscricao" class="borda_radius">
            <div class="inscricao_box_interno">       
              <form method="post" action="?go=logar">
                <div class="inscricao_cabecalho">
                  <img src="img/cabecalho.jpg"><br><br>
                  <p>&Aacute;REA DO CANDIDATO</p>
                </div>
                <div class="div_bloco_login">
                  <fieldset class="borda_radius">
                    <legend>&nbsp;Entrar&nbsp;</legend>
                    <p style="text-align: center; color:red; font-size: 12px; height:12px;"><?php echo $erro;?></p>
                    <div class="div_linha" style="height:60px;">
                      <div><label for="nome_can" style="font-size:14px; margin-left:25px;">N<sup>o</sup> Inscrição:</label >
                        <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="inscricao" id="inscricao" type="text" onkeypress='return SomenteNumero(event)'>
                      </div>
                    </div>
                    <div class="div_linha" style="height:60px;">
                      <div><label for="nome_can" style="font-size:14px; margin-left:25px;">CPF (somente n&uacute;meros):</label>
                        <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="cpf" id="cpf" type="text" maxlength="11" onkeypress='return SomenteNumero(event)'>
                      </div>
                    </div>
                    <div class="div_linha" style="height:60px;">
                      <div><label for="nome_can" style="font-size:14px; margin-left:25px;">Senha:</label>
                        <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="senha" id="senha" type="password">
                      </div>
                    </div>
                    <div class="div_linha" style="margin-top: 3px;">
                      <span><a href="redefinirSenha.php">Esqueci a senha</a></span>
                    </div>
                    <div class="div_linha" style="text-align:right;">
                      <div>
                        <input type="submit" class="btn_prosseguir borda_radius" name="btnEntrar" id="btnEntrar" value="Entrar" />
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
if(@$_GET['go'] == 'logar'){
	$userinsc = $_POST['inscricao'];
	$usercpf = $_POST['cpf'];
	$pwd = $_POST['senha'];

	if(empty($userinsc)){
		echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
	} else if(empty($usercpf)){
		echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
	}elseif(empty($pwd)){
		echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
	}else{
		$pwdcode = base64_encode($pwd);
    $sql = "SELECT * from candidatos WHERE can_inscricao = '$userinsc' AND can_cpf = '$usercpf' AND can_senha = '$pwdcode' LIMIT 1";
		$query1 = mysql_num_rows(mysql_query($sql));
		if($query1 == 1){
			$_SESSION['inscricao_session'] = $userinsc;
			$_SESSION['cpf_session'] = $usercpf;
			$_SESSION['senha_session'] = $pwdcode;

      $query = mysql_query($sql);
      $sql = mysql_fetch_array($query);

      $_SESSION['nome_logado'] = $sql["can_nome"];
      //$_SESSION['cpfcand_logado'] = $sql["can_"];
      $_SESSION['dtnascimento_logado'] = $sql["can_dtnascimento"];
      $_SESSION['rg_logado'] = $sql["can_rg"];
      $_SESSION['rgorg_logado'] = $sql["can_rg_orgexp"];
      $_SESSION['rguf_logado'] = $sql["can_rg_uf"];
      $_SESSION['mae_logado'] = $sql["can_mae"];
      $_SESSION['lateralidade_logado'] = $sql["can_escrita"];
      $_SESSION['atespec_logado'] = $sql["can_atespec"];
      $_SESSION['atespecdesc_logado'] = $sql["can_atespec_descricao"];
      $_SESSION['insc_deferida_logado'] = $sql["can_insc_deferida"];
      $_SESSION['dtinscricao_logado'] = $sql["can_dtinscricao"];

      $_SESSION['logradouro_logado'] = $sql["can_end_logradouro"];
      $_SESSION['numero_logado'] = $sql["can_end_numero"];
      $_SESSION['bairro_logado'] = $sql["can_end_bairro"];
      $_SESSION['complemento_logado'] = $sql["can_end_complemento"];
      $_SESSION['cep_logado'] = $sql["can_end_cep"];
      $_SESSION['cidade_logado'] = $sql["can_end_cidade"];
      $_SESSION['uf_logado'] = $sql["can_end_uf"];
      $_SESSION['email_logado'] = $sql["can_email"];
      $_SESSION['fone1_logado'] = $sql["can_fone1"];
      $_SESSION['fone2_logado'] = $sql["can_fone2"];
      $_SESSION['id_curso_logado'] = $sql["can_curso"];
      $_SESSION['lingua_logado'] = $sql["can_lingua"];
      $_SESSION['id_polafirmativa_logado'] = $sql["can_curso"];
      $_SESSION['sexo_logado'] = $sql["can_sexo"];
      $_SESSION['pai_logado'] = $sql["can_pai"];
      $_SESSION['naturalidade_logado'] = $sql["can_naturalidade"];
      $_SESSION['naturalidade_uf_logado'] = $sql["can_naturalidade_uf"];

      $sql2 = "SELECT nome_cur, turno_cur FROM cursos WHERE cod_cur='$sql[can_curso]' LIMIT 1";
      $query = mysql_query($sql2);
      $sql2 = mysql_fetch_array($query);
      $_SESSION['curso_logado'] = $sql2["nome_cur"]." - ".$sql2["turno_cur"];


      $sql2 = "SELECT * FROM politica WHERE pol_id='$sql[can_politica]' LIMIT 1";
      $query = mysql_query($sql2);
      $sql2 = mysql_fetch_array($query);
      $_SESSION['polafirmativa_logado'] = $sql2["pol_descricao"];
      $_SESSION['nome_polafirmativa_logado'] = $sql2["pol_nome"];

      $sql2 = "SELECT * FROM cidades_provas WHERE cod_lpr='$sql[can_locprova]' LIMIT 1";
      $query = mysql_query($sql2);
      $sql2 = mysql_fetch_array($query);
      $_SESSION['locprova_logado'] = $sql2["descricao_lpr"];
      $_SESSION['endprova_logado'] = $sql2["endereco"];
      $_SESSION['cidprova_logado'] = $sql2["cid_lpr"];

			//echo "<script>alert('Usuário logado com sucesso.');</script>";
			echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
		}else{
			echo "<script>alert('Dados não correspondem. Verifique os dados e tente novamente'); history.back();</script>";
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