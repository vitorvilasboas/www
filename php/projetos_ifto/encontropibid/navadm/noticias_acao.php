<?php
	require ('noticias_classe.php');
	

	$opcao=new noticias_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	if($acao=='listar')
	{
            $opcao->listar();
	    require('noticias_ver.php');
	}
        if($acao=='detalhes')
	{
            $opcao->detalhes();
	    require('noticias_ver.php');
	}
	 if($acao=='incluir')
	{
	    require('noticias_form.php');
	}
	 if($acao=='gravar_incluir')
	{
	    $opcao->gravar_incluir();
	    $opcao->listar();
	    require('noticias_ver.php');
	}
	if($acao=='excluir')
	{
	    $opcao->excluir();
	    $opcao->listar();
	    require('noticias_ver.php');
	}
	if($acao=='pesquisar')
	{
	    require('busca.php');
	}
?>
