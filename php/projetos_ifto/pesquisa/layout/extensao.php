<?php

include('extensao_classe.php');

$opcao= new extensao_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_extensao();
    require('extensao_view.php');
}
if($acao=='cadastro'){
    require('extensao_form.php');
}
if($acao=='detalhes'){
    $opcao->select_extensao($_REQUEST['ext_codigo']);
    require('extensao_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_extensao($_REQUEST['ext_codigo']);
    require('extensao_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_extensao($_REQUEST['ext_usu_codigo'],$_REQUEST['ext_portaria'],$_REQUEST['ext_data_portaria'],$_FILES['ext_assinatura']);
    $registro = $opcao->select_todos_extensao();
    require('extensao_view.php');
}
if($acao=='alterar'){
    $opcao->update_extensao($_REQUEST['ext_usu_codigo'],$_REQUEST['ext_portaria'],$_REQUEST['ext_data_portaria'],$_FILES['ext_assinatura'],$_REQUEST['ext_codigo']);
    $registro = $opcao->select_todos_extensao();
    require('extensao_view.php');
}
if($acao=='excluir'){
    $opcao->delete_extensao($_REQUEST['ext_codigo']);
    $registro = $opcao->select_todos_extensao();
    require('extensao_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_extensao($_REQUEST['busca']);
    require('extensao_view.php');
}

