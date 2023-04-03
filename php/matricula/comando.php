<?php
    include 'funcoes.php';
    if( isset( $_REQUEST['p'] )){
        if( $_REQUEST['p'] == 'premat_salvar' ){
            header('location: index.php');
            //require_once '#';
        } else if ($_REQUEST['p'] == 'verifica_login'){
            verifica_login($_POST['cmp_usuario'], $_POST['cmp_senha']);
        } else if ($_REQUEST['p'] == 'sair'){
            sair();
        } else {
            echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a página inicial
        }
    }
?>