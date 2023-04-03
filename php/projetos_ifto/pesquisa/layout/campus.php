<?php

include('campus_classe.php');

$opcao= new campus_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_campus();
    require('campus_view.php');
}
if($acao=='cadastro'){
    require('campus_form.php');
}
if($acao=='detalhes'){
    $opcao->select_campus($_REQUEST['camp_codigo']);
    require('campus_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_campus($_REQUEST['camp_codigo']);
    require('campus_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_campus($_REQUEST['camp_nome']);
    $registro = $opcao->select_todos_campus();
    require('campus_view.php');
}
if($acao=='alterar'){
    $opcao->update_campus($_REQUEST['camp_nome'],$_REQUEST['camp_codigo']);
    $registro = $opcao->select_todos_campus();
    require('campus_view.php');
}
if($acao=='excluir'){
    $opcao->delete_campus($_REQUEST['camp_codigo']);
    $registro = $opcao->select_todos_campus();
    require('campus_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_campus($_REQUEST['busca']);
    require('campus_view.php');
}

