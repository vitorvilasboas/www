<?php
if(@$_GET['go'] == 'out') {
    
    if(isset($_GET["msg"])){
        if ($_GET["msg"] == 1){
            echo "<script>alert('Inscrição alterada com sucesso!<br>Autentique-se novamente!'); </script>";
        }
        if ($_GET["msg"] == 2){
            echo "<script>alert('Senha alterada com sucesso!<br>Autentique-se novamente!'); </script>";
        }
    }
    
    session_start(); 
	/*
    unset($_SESSION['inscricao_session']);
    unset($_SESSION['cpf_session']);
    unset($_SESSION['senha_session']);
    unset($_SESSION['nome_logado']);
    unset($_SESSION['dtnascimento_logado']);
    unset($_SESSION['rg_logado']);
    unset($_SESSION['rgorg_logado']);
    unset($_SESSION['rguf_logado']);
    unset($_SESSION['mae_logado']);
    unset($_SESSION['lateralidade_logado']);
    unset($_SESSION['atespec_logado']);
    unset($_SESSION['atespecdesc_logado']);
    unset($_SESSION['curso_logado']);
    unset($_SESSION['polafirmativa_logado']);
    unset($_SESSION['insc_deferida_logado']);
    unset($_SESSION['dtinscricao_logado']);
    unset($_SESSION['logradouro_logado']);
    unset($_SESSION['numero_logado']);
    unset($_SESSION['bairro_logado']);
    unset($_SESSION['complemento_logado']);
    unset($_SESSION['cep_logado']);
    unset($_SESSION['cidade_logado']);
    unset($_SESSION['uf_logado']);
    unset($_SESSION['email_logado']);
    unset($_SESSION['fone1_logado']);
    unset($_SESSION['fone2_logado']);
    */
    session_destroy();

    echo "<meta http-equiv='refresh' content='0, url=../'>";
}
?>