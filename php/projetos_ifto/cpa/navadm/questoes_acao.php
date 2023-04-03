
<?php
	require ('questoes_classe.php');
	
        $opcao=new questoes_classe();		
	
        $acao = $_REQUEST['acao'];
		   
	 if($acao=='listar'){
		$opcao->listar();
		require('questoes_manutencao.php');
	}
	 if($acao=='excluir'){
                $opcao->excluir();
		$opcao->listar();
		require('questoes_manutencao.php');
	}
	 if($acao=='incluir'){
		require('questoes_form.php');
	}
	if($acao=='gravar_incluir'){
                $opcao->gravar_incluir();
		$opcao->listar();
		require('questoes_manutencao.php');		
	}
	 if($acao=='alterar'){
		$opcao->alterar();
	   	require('questoes_form.php');
	}
	if($acao=='gravar_alterar'){
                $opcao->gravar_alterar();
		$opcao->listar();
		require('questoes_manutencao.php');    
	}
?>
