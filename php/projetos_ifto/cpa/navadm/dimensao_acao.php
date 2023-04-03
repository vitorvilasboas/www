
<?php
	require ('dimensao_classe.php');
	
        $opcao=new dimensao_classe();		
	
        $acao = $_REQUEST['acao'];
		   
	 if($acao=='listar'){
		$opcao->listar();
		require('dimensao_manutencao.php');
	}
	 if($acao=='excluir'){
                $opcao->excluir();
		$opcao->listar();
		require('dimensao_manutencao.php');
	}
	 if($acao=='incluir'){
		require('dimensao_form.php');
	}
	if($acao=='gravar_incluir'){
                $opcao->gravar_incluir();
		$opcao->listar();
		require('dimensao_manutencao.php');		
	}
	 if($acao=='alterar'){
		$opcao->alterar();
	   	require('dimensao_form.php');
	}
	if($acao=='gravar_alterar'){
                $opcao->gravar_alterar();
		$opcao->listar();
		require('dimensao_manutencao.php');    
	}
?>
