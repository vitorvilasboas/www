<?php
	require ('projetos_classe.php');
	

	$opcao=new projetos_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	if($acao=='listar')
	{
            $opcao->listar();
	    require('projetos_ver.php');
	}
        if($acao=='detalhes')
	{
            $opcao->detalhes();
	    require('projetos_ver.php');
	}
	 if($acao=='incluir')
	{
	    require('projetos_form.php');
	}
	 if($acao=='gravar_incluir')
	{
	    $opcao->gravar_incluir();
	    $opcao->listar();
	    require('projetos_ver.php');
	}
	if($acao=='excluir')
	{
	    $opcao->excluir();
	    $opcao->listar();
	    require('projetos_ver.php');
	}

?>
