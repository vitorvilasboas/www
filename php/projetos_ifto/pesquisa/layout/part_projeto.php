<?php

include('part_projeto_classe.php');

$opcao= new part_projeto_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_part_projeto();
    require('part_projeto_view.php');
}
if($acao=='cadastro'){
    require('part_projeto_form.php');
}
if($acao=='detalhes'){
    $opcao->select_part_projeto($_REQUEST['pu_codigo']);
    require('part_projeto_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_part_projeto($_REQUEST['pu_codigo']);
    require('part_projeto_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_part_projeto($_REQUEST['pu_usu_codigo'],$_REQUEST['pu_proj_codigo'],$_REQUEST['pu_tipo_participacao'],$_REQUEST['pu_bolsa'],$_REQUEST['pu_descricao']);
    $registro = $opcao->select_todos_part_projeto();
    require('part_projeto_view.php');
}
if($acao=='alterar'){
    $opcao->update_part_projeto($_REQUEST['pu_usu_codigo'],$_REQUEST['pu_proj_codigo'],$_REQUEST['pu_tipo_participacao'],$_REQUEST['pu_bolsa'],$_REQUEST['pu_descricao'],$_REQUEST['pu_codigo']);
    $registro = $opcao->select_todos_part_projeto();
    require('part_projeto_view.php');
}
if($acao=='excluir'){
    $opcao->delete_part_projeto($_REQUEST['pu_codigo']);
    $registro = $opcao->select_todos_part_projeto();
    require('part_projeto_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_part_projeto($_REQUEST['busca']);
    require('part_projeto_view.php');
}

