<?php

include('membro_diretorio_classe.php');

$opcao= new membro_diretorio_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_projetos();
    require('membro_diretorio_view.php');
}
if($acao=='ver_membros'){
    require('membro_diretorio_form.php');
}
if($acao=='detalhes'){
    $opcao->select_diretorio_usuario($_REQUEST['dip_codigo']);
    require('membro_diretorio_form.php');
}

if($acao=='inserir'){
    $opcao->insert_membros_usuarios($_REQUEST['md_dip_codigo'], $_REQUEST['md_usu_codigo'], $_REQUEST['md_tipo'], $_REQUEST['md_entrada']);
    require('membro_diretorio_form.php');
}

if($acao=='excluir'){
    $opcao->delete_membros_diretorio($_REQUEST['md_codigo']);
    require('membro_diretorio_form.php');
}


