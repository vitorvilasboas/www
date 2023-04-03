<?php
	require ('questionario_classe.php');

	$opcao=new questionario_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	 if($acao=='listar')
	{
		$opcao->listar();
		require('questionario_ver.php');
	}
        if($acao=='listar_questoes')
	{
		$opcao->listar_questoes();
		require('questionario_ver.php');
	}
	 if($acao=='excluir')
	{
                $opcao->excluir();
		require('questionario_ver.php');
	}
	 if($acao=='incluir')
	{
		require('questionario_form.php');
	}
        
	if($acao=='gravar_incluir')
	{
                $opcao->gravar_incluir();
		$opcao->listar_questoes();
                require('questionario_ver.php');                
	}
	 if($acao=='alterar')
	{
		$opcao->alterar();
	   	require('questionario_form.php');
	}
	if($acao=='gravar_alterar')
	{
                $opcao->gravar_alterar();
		$opcao->listar();
		require('questionario_ver.php');    
	}
        if($acao=='iniciar')
	{
		require('questionario_form.php');    
	}
        if($acao=='estudantes')
	{
                $opcao->estudantes();
		$opcao->listar_questoes();
                require('questionario_ver.php');    
	}
        if($acao=='docentes')
	{
                $opcao->docentes();
		$opcao->listar_questoes();
                require('questionario_ver.php');    
	}
        if($acao=='tec_adm')
	{
                $opcao->tecnicos_adm();
		$opcao->listar_questoes();
                require('questionario_ver.php');    
	}
        if($acao=='perfil')
	{
		require('questionario_curso.php');    
	}
?>
