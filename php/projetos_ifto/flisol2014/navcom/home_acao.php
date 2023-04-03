<?php
	require ('home_classe.php');
	

	$opcao=new tp_inscricao_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	if($acao=='listar')
	{
            $opcao->listar();
	    require('home_form.php');
	}

	 if($acao=='incluir')
	{
	    require('home_form.php');
	}
	 if($acao=='gravar_incluir')
	{
	    $opcao->gravar_incluir();
	    $opcao->listar();
	    require('home_form.php');
	}

        if($acao=='alterar')
	{
	    require('home_form.php');
	}
        if($acao=='gravar_alterar')
	{
	    $opcao->gravar_alterar();
            echo "<meta http-equiv='refresh' content='0;URL=usucom.php?pc=home_acao&acao=listar'>";
	}

?>
