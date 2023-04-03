<?php
session_start();
require "../config/confGlobais.php";
if (isset($_SESSION['inscricao_session']) && isset($_SESSION['cpf_session']) && isset($_SESSION['senha_session'])) {

  if(@$_GET['go'] == 'save'){

    include_once "../config/verifica.php";
    if (verifica_inscricao() != 1){
      require $pagina_inicial;    
      exit;
    }

    require ("../config/conectaBanco.php");
    if($_POST['cmp_inscricao_can'] != '' || $_POST['senha_can2']){
      $pwdcode2 = base64_encode($_POST['senha_can2']);
      $sql = "SELECT * from candidatos WHERE can_inscricao = $_POST[cmp_inscricao_can] AND can_cpf = '$_SESSION[cpf_session]' AND can_senha = '$pwdcode2' LIMIT 1";
      $query1 = mysql_num_rows(mysql_query($sql));
      if($query1 != 1){
        echo "<script>alert('Dados nao correspondem. Infome o Numero de Inscricao e a Senha vinculados ao seu CPF no ato da inscricao.'); history.go(-2);</script>";
      } else {
        if (isset($_POST['nome_can'])){
          require("../funcoesGerais.php");
          echo "<script>alert({$_POST['cpf_can']}); </script>";
          if(@mysql_num_rows(mysql_query("select * from candidatos where can_cpf='{$_POST['cpf_can']}'"))==1){
        
            //$senha_encrypt = base64_encode($_POST['conf_senha_can']);
            $dataalter_can = date("Y-m-d");
            //$nasc_can = date("Y-m-d", strtotime($_POST["nasc_can"]));
            //$nasc_can = formataData($_POST[nasc_can],"/","-");
            $nasc_can = isset($_POST['nasc_can'])?date('Y-m-d',strtotime(str_replace('/','-',$_POST['nasc_can']))):'0000-00-00';
            $desc_especial = '';
            if(isset($_POST['desateesp_can'])){
              $desc_especial = $_POST['desateesp_can'];
            }
            $p = $_POST; 

            $sql = "update candidatos set 
                    can_nome='{$p['nome_can']}', can_curso={$p['opccur_can_1']}, can_politica={$p['part_cota']}, can_rg='{$p['doc_can']}', can_rg_orgexp='{$p['orgexp_can']}', can_rg_uf='{$p['ufdoc_can']}',
                    can_dtnascimento='$nasc_can', can_sexo='{$p['sexo_can']}', can_mae='{$p['mae_can']}', can_pai='{$p['pai_can']}', can_naturalidade='{$p['nat_can']}', can_naturalidade_uf='{$p['ufnat_can']}',
                    can_end_logradouro='{$p['logend_can']}', can_end_numero='{$p['numend_can']}', can_end_bairro='{$p['bairroend_can']}', can_end_complemento='{$p['comend_can']}', can_end_cep='{$p['cepend_can']}',
                    can_end_cidade='{$p['cidend_can']}', can_end_uf='{$p['ufend_can']}', can_fone1='{$p['telfixo_can']}', can_fone2='{$p['telcel_can']}', can_email='{$p['mail_can']}', can_dtinscricao='$dataalter_can',
                    can_escrita='{$p['hab_can']}', can_atespec='{$p['vateesp_can']}', can_atespec_descricao='$desc_especial', can_locprova={$codigo_local_prova}, can_lingua='{$p['lingua_can']}'
                    where can_cpf='{$_SESSION['cpf_session']}' and can_inscricao={$p['cmp_inscricao_can']} and can_senha='$pwdcode2'";
                      
            if (mysql_query($sql)){
              header("Location: logout.php?go=out&msg=1");
              //echo "<meta http-equiv='refresh' content='0, url=logout.php?go=out'>";
              
              //header("Location: logout.php?go=out");
              //echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
            } else {
              echo "<script>alert('Nao foi possivel alterar sua inscricao!!'); </script>";
              echo "<meta http-equiv='refresh' content='0, url=./'>";
            }
          } else {
            echo "<script>alert('Nao existe candidato inscrito com este CPF!!'); </script>";
            echo "<meta http-equiv='refresh' content='0, url=./'>";
          }
        } else {
          echo "<script>alert('Nenhum formulario preenchido!!'); </script>";
          echo "<meta http-equiv='refresh' content='0, url=./'>";
        }
      }
    } else {
      echo "<script>alert('Dados nao correspondem. Infome o Numero de Inscricao e a Senha vinculados ao seu CPF no ato da inscricao.'); history.go(-2);</script>";
    }
  } else {
    echo "<script>alert('Solicitacao bloqueada!!'); </script>";
  }
} else {
  echo "<meta http-equiv='refresh' content='0, url=../'>";
}
?>