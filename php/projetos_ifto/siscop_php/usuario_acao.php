<?php

include 'usuario_classe.php';

$opcao = new usuario_classe();

$acao =$_REQUEST['acao'];

if($acao=='cadastrar')
{
    require 'usuario_form.php';
}

if($acao=='alterarsenha')
{
    require 'usuario_alterarsenha.php';
}

if($acao=='bd_cadastrar')
{
    $opcao->cadastrar1();
    $opcao->cadastrar2();
    $opcao->cadastrar3();
    if($_SESSION['verificaCadastro']=='1'){
        require 'home.php';
    } else {
        die("<script>window.history.back();</script>");
    }
}

if($acao=='bd_alterarsenha')
{
    $opcao->alterar_senha();
    require 'usuario_alterarsenha.php';    
}

if($acao=='manter_buscar')
{
    require('usuario_manterbuscar.php');
}

if($acao=='bd_manter_buscar')
{
    $opcao->buscar();
    require('usuario_detalhes.php');
}

if($acao=='excluir')
{
    $opcao->excluir();
    require('home.php');
}

if($acao=='alterar')
{
    $opcao->buscar_alterar();
    require('usuario_manteralterar.php');
}

if($acao=='bd_alterar')
{
    $opcao->bd_alterar();
    if($_SESSION['verificaAlt']=='1'){
        require 'home.php';
    } else {
        die("<script>window.history.back();</script>");
    }
}

if($acao=='relatorio')
{
    require 'usuario_relatorio_escolher.php';
}

if($acao=='gerar_relatorio')    
{
    $opcao->relatorio_usuarios();
    require 'usuario_relatorio_matriz.php';
}
?>
