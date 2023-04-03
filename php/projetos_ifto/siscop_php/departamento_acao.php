<?php

include 'departamento_classe.php';

$opcao = new departamento_classe();

$acao =$_REQUEST['acao'];

if($acao=='cadastrar')
{
    require 'departamento_form.php';
}

if($acao=='bd_cadastrar')
{
    $opcao->cadastrar();
    require 'home.php';
}

if($acao=='manter_buscar')
{
    require('departamento_manterbuscar.php');
}

if($acao=='bd_manter_buscar')
{
    $opcao->buscar();
    require('departamento_detalhes.php');
}

if($acao=='excluir')
{
    $opcao->excluir();
    require('home.php');
}

if($acao=='alterar')
{
    $opcao->buscar_alterar();
    require('departamento_manteralterar.php');
}

if($acao=='bd_alterar')
{
    $opcao->bd_alterar();
    require 'home.php';
}

if($acao=='relatorio')
{
    require 'departamento_relatorio_escolher.php';
}

if($acao=='gerar_relatorio')    
{
    $opcao->relatorio_departamentos();
    require 'departamento_relatorio_matriz.php';
}

?>
