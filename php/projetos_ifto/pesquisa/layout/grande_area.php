<?php

include('grande_area_classe.php');

$opcao= new grande_area_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_grande_area();
    require('grande_area_view.php');
}
if($acao=='cadastro'){
    require('grande_area_form.php');
}
if($acao=='detalhes'){
    $opcao->select_grande_area($_REQUEST['gda_codigo']);
    require('grande_area_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_grande_area($_REQUEST['gda_codigo']);
    require('grande_area_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_grande_area($_REQUEST['gda_identificacao'],$_REQUEST['gda_descricao']);
    $registro = $opcao->select_todos_grande_area();
    require('grande_area_view.php');
}
if($acao=='alterar'){
    $opcao->update_grande_area($_REQUEST['gda_identificacao'],$_REQUEST['gda_descricao'],$_REQUEST['gda_codigo']);
    $registro = $opcao->select_todos_grande_area();
    require('grande_area_view.php');
}
if($acao=='excluir'){
    $opcao->delete_grande_area($_REQUEST['gda_codigo']);
    $registro = $opcao->select_todos_grande_area();
    require('grande_area_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_grande_area($_REQUEST['busca']);
    require('grande_area_view.php');
}

