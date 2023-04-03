
<?php
	require ('respostas_classe.php');
	
        $opcao=new respostas_classe();		
	
        $acao = $_REQUEST['acao'];
		   
	 if($acao=='listar'){
		$opcao->listar();
		require('respostas_manutencao.php');
	}
	 if($acao=='excluir'){
                $opcao->excluir();
		$opcao->listar();
		require('respostas_manutencao.php');
	}
	 if($acao=='incluir'){
		require('respostas_form.php');
	}
	if($acao=='gravar_incluir'){
                $opcao->gravar_incluir();
		$opcao->listar();
		require('respostas_manutencao.php');		
	}
	 if($acao=='alterar'){
		$opcao->alterar();
	   	require('respostas_form.php');
	}
	if($acao=='gravar_alterar'){
                $opcao->gravar_alterar();
		$opcao->listar();
		require('respostas_manutencao.php');    
	}
?>
