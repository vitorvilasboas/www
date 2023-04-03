<?php
session_start();
require_once "../config/conectaBanco.php";
if (isset($_SESSION['inscricao_session']) && isset($_SESSION['cpf_session']) && isset($_SESSION['senha_session'])) {

  include_once "../config/verifica.php";
  if (verifica_inscricao() != 1){
      require $pagina_inicial;    
      exit;
  }

  if(@$_GET['go'] == 'passwd'){
    $as_insc = $_POST['as_inscricao'];
    $as_cpf = $_SESSION['cpf_session'];
    $as_pass0 = $_POST['as_senha_old'];
    $as_pass1 = $_POST['as_senha1'];
    $as_pass2 = $_POST['as_senha2'];

    if(empty($as_insc)){
      echo "<script>alert('Informe o numero de inscricao.'); history.back();</script>";
    } if( $as_insc != $_SESSION['inscricao_session'] ){
      echo "<script>alert('O numero de inscricao informado nao corresponde ao candidato.'); history.back();</script>";
    } else if(empty($as_pass0)){
      echo "<script>alert('Informe a senha atual.'); history.back();</script>";
    }elseif(empty($as_pass1)){
      echo "<script>alert('Informe a nova senha.'); history.back();</script>";
    }elseif(empty($as_pass2)){
      echo "<script>alert('Repita a nova senha.'); history.back();</script>";
    }elseif( (strlen($as_pass1) < 8) || (strlen($as_pass2) < 8) ){
      echo "<script>alert('A senha deve ter no minimo 8 caracteres.'); history.back();</script>"; 
    }elseif( $as_pass2 != $as_pass1 ){
      echo "<script>alert('As senhas informadas sao diferentes. Informe a nova senha novamente.'); history.back();</script>";
    } else {
      $pwdcode0 = base64_encode($as_pass0);
      $sql = "SELECT * from candidatos WHERE can_inscricao = '$as_insc' AND can_cpf = '$as_cpf' AND can_senha = '$pwdcode0' LIMIT 1";
      $query1 = mysql_num_rows(mysql_query($sql));
      if($query1 == 1){
        $pwdcode1 = base64_encode($as_pass1);
        $sql2 = "update candidatos set can_senha='$pwdcode1' WHERE can_cpf='$as_cpf' AND can_inscricao=$as_insc";
        if (mysql_query($sql2)){
          header("Location: logout.php?go=out&msg=2");
          exit;
        } else {
          echo "<script>alert('Ocorreu um erro inesperado.<br>Nao foi possivel concluir a alteracao.<br>Por favor, tente novamente.'); history.back();</script>";
        }
      } else {
        echo "<script>alert('Dados nao correspondem. Verifique e tente novamente'); history.back();</script>";
      }
    }
  }



} else {
  echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
}

?>