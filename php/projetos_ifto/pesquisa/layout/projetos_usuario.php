<?php

include('projetos_usuario_classe.php');

$opcao= new projetos_usuario_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_projetos();
    require('projetos_usuario_view.php');
}
if($acao=='ver_projeto'){
    require('projetos_usuario_form.php');
}
if($acao=='detalhes'){
    $opcao->select_projetos_usuario($_REQUEST['pu_proj_codigo']);
    require('projetos_usuario_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_projetos_usuario($_REQUEST['pu_proj_codigo']);
    require('projetos_usuario_form.php');
}
if($acao=='inserir'){
    $opcao->insert_projetos_usuarios($_REQUEST['pu_proj_codigo'], $_REQUEST['pu_usu_codigo'], $_REQUEST['pu_tipo_participacao'], $_REQUEST['pu_bolsa'], $_REQUEST['pu_descricao']);
    require('projetos_usuario_form.php');
}
if($acao=='alterar'){
    $opcao->update_projetos_usuario($_REQUEST['pu_proj_usu_codigo'],$_REQUEST['pu_proj_portaria'],$_REQUEST['pu_proj_nome'],$_REQUEST['pu_proj_data_portaria'],$_FILES['pu_proj_assinatura'],$_REQUEST['pu_proj_codigo'],$_REQUEST['pu_proj_nome_anterior']);
    $registro = $opcao->select_todos_projetos_usuario();
    require('projetos_usuario_view.php');
}
if($acao=='excluir'){
    $opcao->delete_projetos_usuario($_REQUEST['pu_codigo']);
    require('projetos_usuario_form.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->projetos_pesquisar_projetos_usuario($_REQUEST['busca']);
    require('projetos_usuario_view.php');
}

