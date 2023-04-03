<?php
	include ('videos_classe.php');

	$opcao=new videos_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	 if($acao=='listar')
	{
		$opcao->listar();
		require('videos_man.php');
	}
	 if($acao=='excluir')
	{
	        $opcao->excluir();
		$opcao->listar();
		require('videos_man.php');
	}
	 if($acao=='incluir')
	{
		require('videos_upload.php');
	}

	 if($acao=='alterar')
	{
		$opcao->alterar();
	   	require('videos_upload.php');
	}
	if($acao=='gravar_incluir')
	{
	        $opcao->gravar_incluir();
		$opcao->listar();
		require('videos_man.php');    
	}
	if($acao=='gravar_alterar')
	{
	        $opcao->gravar_alterar();
		$opcao->listar();
		require('videos_man.php');    
	}
        if($acao=='galeria')
	{
		$opcao->listar();
		require('videos_galeria.php');
	}
        if($acao=='player')
	{
		
		require('videos_galeria.php');
	}
?>

