<?php
	include ('periodicos_classe.php');

	$opcao=new periodicos_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	 if($acao=='listar')
	{
		$opcao->listar();
		require('periodicos_man.php');
	}
	 if($acao=='excluir')
	{
	        $opcao->excluir();
		$opcao->listar();
		require('periodicos_man.php');
	}
	 if($acao=='incluir')
	{
		require('periodicos_form.php');
	}

	 if($acao=='alterar')
	{
		$opcao->alterar();
	   	require('periodicos_form.php');
	}
	if($acao=='gravar_incluir')
	{
	        $opcao->gravar_incluir();
		$opcao->listar();
		require('periodicos_man.php');    
	}
	if($acao=='gravar_alterar')
	{
	        $opcao->gravar_alterar();
		$opcao->listar();
		require('periodicos_man.php');    
	}
        if($acao=='galeria')
	{
		$opcao->listar();
		require('periodicos_galeria.php');
	}
        
?>

