<?php

include('projetos_classe.php');

$opcao= new projetos_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_projetos();
    require('projetos_view.php');
}
if($acao=='cadastro'){
    require('projetos_form.php');
}
if($acao=='detalhes'){
    $opcao->select_projetos($_REQUEST['proj_codigo']);
    require('projetos_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_projetos($_REQUEST['proj_codigo']);
    require('projetos_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_projetos($_REQUEST['proj_usu_codigo'],$_REQUEST['proj_livro'],$_REQUEST['proj_camp_codigo'],$_REQUEST['proj_dip_codigo'],$_REQUEST['proj_curso_codigo'],$_REQUEST['proj_tipo'],$_REQUEST['proj_sba_codigo'],$_REQUEST['proj_nome'],$_REQUEST['proj_data_inicio'],$_REQUEST['proj_data_fim'],$_REQUEST['proj_situacao'],$_REQUEST['proj_edital'],$_REQUEST['proj_processo'],date('d/m/Y h:m:s'));
    $registro = $opcao->select_todos_projetos();
    require('projetos_view.php');
}
if($acao=='alterar'){
    $opcao->update_projetos($_REQUEST['proj_usu_codigo'],$_REQUEST['proj_livro'],$_REQUEST['proj_camp_codigo'],$_REQUEST['proj_dip_codigo'],$_REQUEST['proj_curso_codigo'],$_REQUEST['proj_tipo'],$_REQUEST['proj_sba_codigo'],$_REQUEST['proj_nome'],$_REQUEST['proj_data_inicio'],$_REQUEST['proj_data_fim'],$_REQUEST['proj_situacao'],$_REQUEST['proj_edital'],$_REQUEST['proj_processo'],$_REQUEST['proj_codigo']);
    $registro = $opcao->select_todos_projetos();
    require('projetos_view.php');
}
if($acao=='excluir'){
    $opcao->delete_projetos($_REQUEST['proj_codigo']);
    $registro = $opcao->select_todos_projetos();
    require('projetos_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->projetosr_projetos($_REQUEST['busca']);
    require('projetos_view.php');
}

