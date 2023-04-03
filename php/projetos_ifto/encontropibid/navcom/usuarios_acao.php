<?php
	require ('usuarios_classe.php');

	$opcao=new usuarios_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	 if($acao=='listar')
	{
		$opcao->listar();
		require('usuarios_manutencao.php');
	}
	 if($acao=='excluir')
	{
                $opcao->excluir();
		$opcao->listar();
		require('usuarios_manutencao.php');
	}
	 if($acao=='incluir')
	{
		require('usuarios_form.php');
	}
	if($acao=='gravar_incluir')
	{
                $opcao->gravar_incluir();
		$opcao->listar();
		require('usuarios_manutencao.php');		
	}
	 if($acao=='alterar')
	{
		$opcao->alterar();
	   	require('usuarios_form.php');
	}
	if($acao=='gravar_alterar')
	{
                $opcao->gravar_alterar();
		$opcao->listar();
		require('usuarios_manutencao.php');    
	}

        if($acao=='pesquisar')
	{
                $opcao->usuarios_pesquisar();
		require('usuarios_manutencao.php');    
	}
        if($acao=='alterar_senha'){

	   	require('alterar_senha.php');
	}
        if($acao=='gravar_alterar_senha'){

	   	$opcao->gravar_alterar_senha();
                $opcao->listar();
		require('usuarios_manutencao.php');
	}
?>
