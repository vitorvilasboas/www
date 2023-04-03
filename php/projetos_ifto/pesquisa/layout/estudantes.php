<?php

include('estudantes_classe.php');

$opcao= new estudantes_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_estudantes();
    require('estudantes_view.php');
}
if($acao=='cadastro'){
    require('estudantes_form.php');
}
if($acao=='proximo'){
    require('estudantes_form.php');
}
if($acao=='detalhes'){
    $opcao->select_estudantes($_REQUEST['est_codigo']);
    require('estudantes_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_estudantes($_REQUEST['est_codigo']);
    require('estudantes_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_estudantes($_REQUEST['est_usu_codigo'],$_REQUEST['est_matricula'],$_REQUEST['est_ano_ingresso'],$_REQUEST['est_curso_codigo']);
    $registro = $opcao->select_todos_estudantes();
    require('estudantes_view.php');
}
if($acao=='alterar'){
    $opcao->update_estudantes($_REQUEST['est_usu_codigo'],$_REQUEST['est_matricula'],$_REQUEST['est_ano_ingresso'],$_REQUEST['est_curso_codigo'],$_REQUEST['est_codigo']);
    $registro = $opcao->select_todos_estudantes();
    require('estudantes_view.php');
}
if($acao=='excluir'){
    $opcao->delete_estudantes($_REQUEST['est_codigo']);
    $registro = $opcao->select_todos_estudantes();
    require('estudantes_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_estudantes($_REQUEST['busca']);
    require('estudantes_view.php');
}

