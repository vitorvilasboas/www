<?php

include('ensino_classe.php');

$opcao= new ensino_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_ensino();
    require('ensino_view.php');
}
if($acao=='cadastro'){
    require('ensino_form.php');
}
if($acao=='detalhes'){
    $opcao->select_ensino($_REQUEST['ens_codigo']);
    require('ensino_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_ensino($_REQUEST['ens_codigo']);
    require('ensino_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_ensino($_REQUEST['ens_usu_codigo'],$_REQUEST['ens_portaria'],$_REQUEST['ens_data_portaria'],$_FILES['ens_assinatura']);
    $registro = $opcao->select_todos_ensino();
    require('ensino_view.php');
}
if($acao=='alterar'){
    $opcao->update_ensino($_REQUEST['ens_usu_codigo'],$_REQUEST['ens_portaria'],$_REQUEST['ens_data_portaria'],$_FILES['ens_assinatura'],$_REQUEST['ens_codigo']);
    $registro = $opcao->select_todos_ensino();
    require('ensino_view.php');
}
if($acao=='excluir'){
    $opcao->delete_ensino($_REQUEST['ens_codigo']);
    $registro = $opcao->select_todos_ensino();
    require('ensino_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_ensino($_REQUEST['busca']);
    require('ensino_view.php');
}

