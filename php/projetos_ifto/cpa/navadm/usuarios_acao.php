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
	if($acao=='pesquisar')
	{
                $opcao->usuarios_pesquisar();
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
        if($acao=='usuario_confirmar')
	{
                $opcao->usuario_confirmar();
		require('usuarios_confirmar.php');    
	}
        if($acao=='confirmado')
	{
                $opcao->confirmado();
		require('usuarios_confirmar.php');    
	}
        if($acao=='emitir')
	{
                $opcao->usuario_confirmar();
		require('emitir_certificado.php');    
	}
        if($acao=='confirmar_participacao')
	{
                $opcao->confirmar_participacao();
		require('certificado_por_curso.php');    
	}
        if($acao=='emitir_certificado')
	{
                $opcao->emitir_certificado();
		require('emitir_certificado.php');    
	}
?>
