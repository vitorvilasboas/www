<?php
    session_start();
    include 'funcoes.php';
    if( isset( $_REQUEST['op'] )){//existe o parametro op??
        if( $_REQUEST['op'] == 'home' ){//se existe, o valor de op=home??
            require_once 'home.php';//se op=home, inclui home.php 
        } else if ($_REQUEST['op'] == 'cadastrar-form'){
            require_once 'form-cadastro.php';
        } else if ($_REQUEST['op'] == 'cadastro2'){
            require_once 'form-cadastro2.php';
        } else if ($_REQUEST['op'] == 'cadastro3'){
            require_once 'form-cadastro3.php';
        } else if ($_REQUEST['op'] == 'cadastro4'){
            require_once 'form-cadastro4.php';
        } else if ($_REQUEST['op'] == 'cadastro5'){
            require_once 'form-cadastro5.php';
        } else if ($_REQUEST['op'] == 'cadastro6'){
            require_once 'conexaoBD.php';
            inserir_eventos(conectaBD());
        } else if ($_REQUEST['op'] == 'excluir-eventos'){
            require_once 'conexaoBD.php';
            $id_excluir = $_REQUEST['id'];
            excluir_eventos(conectaBD(),$id_excluir);
        } else if ($_REQUEST['op'] == 'selecionar-alterar-eventos'){
            require_once 'conexaoBD.php';
            $evento_alterar = select_alterar_eventos(conectaBD(),$_REQUEST['id']);
            if( $evento_alterar != null ){
                $_SESSION['evento_alterar'] = $evento_alterar;
                require_once 'form-alterar-evento.php';
            } else {
                echo "<p class='alert-error'> Evento não encontrado! </p><br>";
                listar_eventos($conexao);
            }
        } else if ($_REQUEST['op'] == 'alterar-eventos'){
            require_once 'conexaoBD.php';
            alterar_eventos(conectaBD(),$_REQUEST['id']);
        } else if ($_REQUEST['op'] == 'cad-form-part1'){
            require_once 'form-cad-part1.php';
        } else if ($_REQUEST['op'] == 'cad-form-part2'){
            require_once 'form-cad-part2.php';
        } else if ($_REQUEST['op'] == 'cad-form-part3'){
            require_once 'form-cad-part3.php';
        } else if ($_REQUEST['op'] == 'cad-form-part4'){
            require_once 'form-cad-part4.php';
        } else if ($_REQUEST['op'] == 'listar-eventos'){
            require_once 'conexaoBD.php';
            listar_eventos(conectaBD());
        } else if ($_REQUEST['op'] == 'verifica_login'){
            verifica_login($_POST['cmp_usuario'], $_POST['cmp_senha']);
        } else if ($_REQUEST['op'] == 'sair'){
            sair();
        } else {
            echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a página inicial
        }
    }
?>