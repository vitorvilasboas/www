<?php

include('tecnicos_adm_classe.php');

$opcao= new tecnicos_adm_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_tecnicos_adm();
    require('tecnicos_adm_view.php');
}
if($acao=='cadastro'){
    require('tecnicos_adm_form.php');
}
if($acao=='proximo'){
    require('tecnicos_adm_form.php');
}
if($acao=='detalhes'){
    $opcao->select_tecnicos_adm($_REQUEST['tadm_codigo']);
    require('tecnicos_adm_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_tecnicos_adm($_REQUEST['tadm_codigo']);
    require('tecnicos_adm_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_tecnicos_adm($_REQUEST['tadm_usu_codigo'],$_REQUEST['tadm_siape'],$_REQUEST['tadm_cargo'],$_REQUEST['tadm_admissao'],$_REQUEST['tadm_titulacao']);
    $registro = $opcao->select_todos_tecnicos_adm();
    require('tecnicos_adm_view.php');
}
if($acao=='alterar'){
    $opcao->update_tecnicos_adm($_REQUEST['tadm_usu_codigo'],$_REQUEST['tadm_siape'],$_REQUEST['tadm_cargo'],$_REQUEST['tadm_admissao'],$_REQUEST['tadm_titulacao'],$_REQUEST['tadm_codigo']);
    $registro = $opcao->select_todos_tecnicos_adm();
    require('tecnicos_adm_view.php');
}
if($acao=='excluir'){
    $opcao->delete_tecnicos_adm($_REQUEST['tadm_codigo']);
    $registro = $opcao->select_todos_tecnicos_adm();
    require('tecnicos_adm_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_tecnicos_adm($_REQUEST['busca']);
    require('tecnicos_adm_view.php');
}

