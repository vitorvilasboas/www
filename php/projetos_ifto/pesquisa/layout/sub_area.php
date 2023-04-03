<?php

include('sub_area_classe.php');

$opcao= new sub_area_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_sub_area();
    require('sub_area_view.php');
}
if($acao=='cadastro'){
    require('sub_area_form.php');
}
if($acao=='detalhes'){
    $opcao->select_sub_area($_REQUEST['sba_codigo']);
    require('sub_area_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_sub_area($_REQUEST['sba_codigo']);
    require('sub_area_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_sub_area($_REQUEST['sba_gda_codigo'],$_REQUEST['sba_identificacao'],$_REQUEST['sba_descricao']);
    $registro = $opcao->select_todos_sub_area();
    require('sub_area_view.php');
}
if($acao=='alterar'){
    $opcao->update_sub_area($_REQUEST['sba_gda_codigo'],$_REQUEST['sba_identificacao'],$_REQUEST['sba_descricao'],$_REQUEST['sba_codigo']);
    $registro = $opcao->select_todos_sub_area();
    require('sub_area_view.php');
}
if($acao=='excluir'){
    $opcao->delete_sub_area($_REQUEST['sba_codigo']);
    $registro = $opcao->select_todos_sub_area();
    require('sub_area_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_sub_area($_REQUEST['busca']);
    require('sub_area_view.php');
}

