<?php

include('cursos_classe.php');

$opcao= new cursos_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_cursos();
    require('cursos_view.php');
}
if($acao=='cadastro'){
    require('cursos_form.php');
}
if($acao=='detalhes'){
    $opcao->select_cursos($_REQUEST['curso_codigo']);
    require('cursos_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_cursos($_REQUEST['curso_codigo']);
    require('cursos_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_cursos($_REQUEST['curso_nome'],$_REQUEST['curso_camp_codigo']);
    $registro = $opcao->select_todos_cursos();
    require('cursos_view.php');
}
if($acao=='alterar'){
    $opcao->update_cursos($_REQUEST['curso_nome'],$_REQUEST['curso_camp_codigo'],$_REQUEST['curso_codigo']);
    $registro = $opcao->select_todos_cursos();
    require('cursos_view.php');
}
if($acao=='excluir'){
    $opcao->delete_cursos($_REQUEST['curso_codigo']);
    $registro = $opcao->select_todos_cursos();
    require('cursos_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_cursos($_REQUEST['busca']);
    require('cursos_view.php');
}

