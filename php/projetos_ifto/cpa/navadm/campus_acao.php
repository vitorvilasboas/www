
<?php
	require ('campus_classe.php');
	
        $opcao=new campus_classe();		
	
        $acao = $_REQUEST['acao'];
		   
	 if($acao=='listar'){
		$opcao->listar();
		require('campus_manutencao.php');
	}
	 if($acao=='excluir'){
                $opcao->excluir();
		$opcao->listar();
		require('campus_manutencao.php');
	}
	 if($acao=='incluir'){
		require('campus_form.php');
	}
	if($acao=='gravar_incluir'){
                $opcao->gravar_incluir();
		$opcao->listar();
		require('campus_manutencao.php');		
	}
	 if($acao=='alterar'){
		$opcao->alterar();
	   	require('campus_form.php');
	}
	if($acao=='gravar_alterar'){
                $opcao->gravar_alterar();
		$opcao->listar();
		require('campus_manutencao.php');    
	}
?>
