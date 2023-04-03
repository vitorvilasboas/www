<?php

include('usuarios_classe.php');

$opcao= new usuarios_classe();			
$acao = $_REQUEST['action'];		   

if($acao=='view'){
    $registro = $opcao->select_todos_usuarios();
    require('usuarios_view.php');
}
if($acao=='cadastro'){
    require('usuarios_form.php');
}
if($acao=='detalhes'){
    $opcao->select_usuarios($_REQUEST['usu_codigo']);
    require('usuarios_form.php');
}
if($acao=='view_alterar'){
    $opcao->select_usuarios($_REQUEST['usu_codigo']);
    require('usuarios_form.php');
}
if($acao=='cadastrar'){
    $opcao->insert_usuarios($_REQUEST['usu_camp_codigo'],$_REQUEST['usu_nome'],$_REQUEST['usu_sexo'],$_REQUEST['usu_cpf'],md5($_REQUEST['usu_senha']),'usuario',$_REQUEST['usu_endereco'],$_REQUEST['usu_email'],$_REQUEST['usu_cep'],$_REQUEST['usu_data_nasc'],$_REQUEST['usu_celular'],$_REQUEST['usu_fone'],date('d/m/Y H:m:s'),'semfoto.png',$_REQUEST['usu_cidade'],$_REQUEST['usu_estado'],$_REQUEST['usu_tipo']);
    echo $_REQUEST['usu_tipo'];
    if($_REQUEST['usu_tipo']==1){
        header('Location:index.php?p=docentes&action=proximo&usu_cpf='.$_REQUEST['usu_cpf'].'');    
    }else if($_REQUEST['usu_tipo']==2){
        header('Location:index.php?p=estudantes&action=proximo&usu_cpf='.$_REQUEST['usu_cpf'].'');
    }else if($_REQUEST['usu_tipo']==3){
        header('Location:index.php?p=tecnicos_adm&action=proximo&usu_cpf='.$_REQUEST['usu_cpf'].'');
    }
}
if($acao=='alterar'){
    $opcao->update_usuarios($_REQUEST['usu_camp_codigo'],$_REQUEST['usu_nome'],$_REQUEST['usu_sexo'],$_REQUEST['usu_cpf'],$_REQUEST['usu_endereco'],$_REQUEST['usu_email'],$_REQUEST['usu_cep'],$_REQUEST['usu_data_nasc'],$_REQUEST['usu_celular'],$_REQUEST['usu_fone'],$_REQUEST['usu_cidade'],$_REQUEST['usu_estado'],$_REQUEST['usu_codigo']);
    $registro = $opcao->select_todos_usuarios();
    require('usuarios_view.php');
}
if($acao=='excluir'){
    $opcao->delete_usuarios($_REQUEST['usu_codigo']);
    $registro = $opcao->select_todos_usuarios();
    require('usuarios_view.php');
}
if($acao=='pesquisar'){
    $registro = $opcao->pesquisar_usuarios($_REQUEST['busca']);
    require('usuarios_view.php');
}

