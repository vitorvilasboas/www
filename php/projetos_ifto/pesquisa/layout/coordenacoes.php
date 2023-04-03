<?php

include('coordenacoes_classe.php');

$opcao= new coordenacoes_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_coordenacoes();
    require('coordenacoes_view.php');
}
if($acao=='cadastro'){
    require('coordenacoes_form.php');
}
if($acao=='detalhes'){
    $opcao->select_coordenacoes($_REQUEST['coord_codigo']);
    require('coordenacoes_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_coordenacoes($_REQUEST['coord_codigo']);
    require('coordenacoes_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_coordenacoes($_REQUEST['coord_usu_codigo'],$_REQUEST['coord_portaria'],$_REQUEST['coord_nome'],$_REQUEST['coord_data_portaria'],$_FILES['coord_assinatura']);
    $registro = $opcao->select_todos_coordenacoes();
    require('coordenacoes_view.php');
}
if($acao=='alterar'){
    $opcao->update_coordenacoes($_REQUEST['coord_usu_codigo'],$_REQUEST['coord_portaria'],$_REQUEST['coord_nome'],$_REQUEST['coord_data_portaria'],$_FILES['coord_assinatura'],$_REQUEST['coord_codigo'],$_REQUEST['coord_nome_anterior']);
    $registro = $opcao->select_todos_coordenacoes();
    require('coordenacoes_view.php');
}
if($acao=='excluir'){
    $opcao->delete_coordenacoes($_REQUEST['coord_codigo'],$_REQUEST['id_img']);
    $registro = $opcao->select_todos_coordenacoes();
    require('coordenacoes_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->coordenacoesr_coordenacoes($_REQUEST['busca']);
    require('coordenacoes_view.php');
}

