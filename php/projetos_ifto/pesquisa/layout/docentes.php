<?php

include('docentes_classe.php');

$opcao= new docentes_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_docentes();
    require('docentes_view.php');
}
if($acao=='proximo'){
    require('docentes_form.php');
}
if($acao=='cadastro'){
    require('docentes_form.php');
}
if($acao=='detalhes'){
    $opcao->select_docentes($_REQUEST['doc_codigo']);
    require('docentes_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_docentes($_REQUEST['doc_codigo']);
    require('docentes_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_docentes($_REQUEST['doc_usu_codigo'],$_REQUEST['doc_siape'],$_REQUEST['doc_area'],$_REQUEST['doc_admissao'],$_REQUEST['doc_regime_trabalho'],$_REQUEST['doc_titulacao']);
    $registro = $opcao->select_todos_docentes();
    require('docentes_view.php');
}
if($acao=='alterar'){
    $opcao->update_docentes($_REQUEST['doc_usu_codigo'],$_REQUEST['doc_siape'],$_REQUEST['doc_area'],$_REQUEST['doc_admissao'],$_REQUEST['doc_regime_trabalho'],$_REQUEST['doc_titulacao'],$_REQUEST['doc_codigo']);
    $registro = $opcao->select_todos_docentes();
    require('docentes_view.php');
}
if($acao=='excluir'){
    $opcao->delete_docentes($_REQUEST['doc_codigo']);
    $registro = $opcao->select_todos_docentes();
    require('docentes_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_docentes($_REQUEST['busca']);
    require('docentes_view.php');
}

