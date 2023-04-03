<?php

include('diretorio_classe.php');

$opcao= new diretorio_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_diretorio();
    require('diretorio_view.php');
}
if($acao=='cadastro'){
    require('diretorio_form.php');
}
if($acao=='detalhes'){
    $opcao->select_diretorio($_REQUEST['dip_codigo']);
    require('diretorio_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_diretorio($_REQUEST['dip_codigo']);
    require('diretorio_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_diretorio($_REQUEST['dip_sba_codigo'],$_REQUEST['dip_titulo'],$_REQUEST['dip_lider'],$_REQUEST['dip_vicelider'],$_REQUEST['dip_data_criacao']);
    $registro = $opcao->select_todos_diretorio();
    require('diretorio_view.php');
}
if($acao=='alterar'){
    $opcao->update_diretorio($_REQUEST['dip_sba_codigo'],$_REQUEST['dip_titulo'],$_REQUEST['dip_lider'],$_REQUEST['dip_vicelider'],$_REQUEST['dip_data_criacao'],$_REQUEST['dip_codigo']);
    $registro = $opcao->select_todos_diretorio();
    require('diretorio_view.php');
}
if($acao=='excluir'){
    $opcao->delete_diretorio($_REQUEST['dip_codigo']);
    $registro = $opcao->select_todos_diretorio();
    require('diretorio_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_diretorio($_REQUEST['busca']);
    require('diretorio_view.php');
}

