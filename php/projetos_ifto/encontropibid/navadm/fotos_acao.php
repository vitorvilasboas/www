<?php
	include ('fotos_classe.php');

        $opcao=new fotos_classe();
			
	$acao = $_REQUEST['acao'];
		   
	 if($acao=='listar'){
		$opcao->listar();
		require('fotos_man.php');
	}
	 if($acao=='excluir'){
	        $opcao->excluir();
		$opcao->listar();
		require('fotos_man.php');
	}
	 if($acao=='incluir'){
		require('fotos_upload.php');
	}

	 if($acao=='alterar'){
		$opcao->alterar();
	   	require('fotos_upload.php');
	}
	if($acao=='gravar_incluir'){
	        $opcao->gravar_incluir();
		$opcao->listar();
		require('fotos_man.php');    
	}
	if($acao=='gravar_alterar'){
	        $opcao->gravar_alterar();
		$opcao->listar();
		require('fotos_man.php');    
	}
        if($acao=='galeria'){
		$opcao->listar();
		require('fotos_galeria.php');
	}
?>

