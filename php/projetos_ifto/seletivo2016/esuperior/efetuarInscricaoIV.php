<?php
session_start();
require "config/confGlobais.php";
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
  include_once "config/verifica.php";
  if (verifica_inscricao() != 1){
    require $pagina_inicial;    
    exit;
  }
  require ("config/conectaBanco.php");
  if ($_POST['nome_can']){
    require("funcoesGerais.php");
    if(@mysql_num_rows(mysql_query("select * from candidatos where can_cpf='{$_POST['cpf_can']}'"))==1){
      echo "Já existe um candidato inscrito com este CPF";
	    header('location: preInscricaoI.php');
		} else {
     	$senha_encrypt = base64_encode($_POST['conf_senha_can']);
  		$datains_can = date("Y-m-d");
      //$nasc_can = date("Y-m-d", strtotime($_POST["nasc_can"]));
      //$nasc_can = formataData($_POST[nasc_can],"/","-");
  		$nasc_can = isset($_POST['nasc_can'])?date('Y-m-d',strtotime(str_replace('/','-',$_POST['nasc_can']))):'0000-00-00';
      //$desc_especial = '';
      //if(isset($_POST['desateesp_can'])){
      $desc_especial = $_POST['desateesp_can'];
      //}
      $p = $_POST; 

      $sql = "insert into candidatos
                (can_nome, can_cpf, can_curso, can_politica, can_rg, can_rg_orgexp, can_rg_uf, can_dtnascimento, can_sexo, 
                  can_mae, can_pai, can_naturalidade, can_naturalidade_uf, can_end_logradouro, can_end_numero, can_end_bairro, can_end_complemento, 
                  can_end_cep, can_end_cidade, can_end_uf, can_fone1, can_fone2, can_email, can_senha, can_dtinscricao, 
                  can_escrita, can_atespec, can_atespec_descricao, can_insc_processada, can_insc_deferida, can_locprova, can_dtalteracao, can_lingua) values
                ('{$p['nome_can']}', '{$p['cpf_can']}', {$p['opccur_can_1']}, {$p['part_cota']}, '{$p['doc_can']}', '{$p['orgexp_can']}', '{$p['ufdoc_can']}', '$nasc_can', '{$p['sexo_can']}',
                  '{$p['mae_can']}', '{$p['pai_can']}', '{$p['nat_can']}', '{$p['ufnat_can']}', '{$p['logend_can']}','{$p['numend_can']}', '{$p['bairroend_can']}', '{$p['comend_can']}',
                  '{$p['cepend_can']}', '{$p['cidend_can']}', '{$p['ufend_can']}', '{$p['telfixo_can']}', '{$p['telcel_can']}', '{$p['mail_can']}', '$senha_encrypt', '$datains_can',
                  '{$p['hab_can']}', '{$p['vateesp_can']}', '$desc_especial', 1, 0, {$codigo_local_prova},'$datains_can','{$p['lingua_can']}')";
     	
      if (mysql_query($sql)){
        //echo $sql;
   	    $cod_can = base64_encode(mysql_insert_id());
        $_SESSION['nome_session'] = $_POST['nome_can'];
        $_SESSION['cpfcand_session'] = $_POST['cpf_can'];
        $_SESSION['dtnascimento_session'] = $nasc_can;
        $_SESSION['rg_session'] = $_POST['doc_can'];
        $_SESSION['rgorg_session'] = $_POST['orgexp_can'];
        $_SESSION['rguf_session'] = $_POST['ufdoc_can'];
        $_SESSION['mae_session'] = $_POST['mae_can'];
        $_SESSION['curso_session'] = $_POST['opccur_can_1'];
        $_SESSION['polafirmativa_session'] = $_POST['part_cota'];
        $_SESSION['lateralidade_session'] = $_POST['hab_can'];
        $_SESSION['lingua_session'] = $_POST['lingua_can'];
        $_SESSION['atespec_session'] = $_POST['vateesp_can'];
        $_SESSION['atespecdesc_session'] = $_POST['desateesp_can'];    
   	    header("Location: confirmacaoV.php?inscricao=$cod_can");     
     	} else {
			  echo "erro ao inserir";
		  }
    }
  } else
    header("Location: fichaInscricaoII.php");
} else {
  echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
}
?>