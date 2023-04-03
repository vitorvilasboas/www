
<?php
	require ('mcursos_classe.php');
	
        $opcao=new mcursos_classe();		
	
        $acao = $_REQUEST['acao'];
		   
	 if($acao=='listar'){
		$opcao->listar();
		require('mcursos_manutencao.php');
	}
	 if($acao=='excluir'){
                $opcao->excluir();
		$opcao->listar();
		require('mcursos_manutencao.php');
	}
	 if($acao=='incluir'){
		require('mcursos_form.php');
	}
	if($acao=='gravar_incluir'){
                $opcao->gravar_incluir();
		$opcao->listar();
		require('mcursos_manutencao.php');		
	}
	 if($acao=='alterar'){
		$opcao->alterar();
	   	require('mcursos_form.php');
	}
	if($acao=='gravar_alterar'){
                $opcao->gravar_alterar();
		$opcao->listar();
		require('mcursos_manutencao.php');    
	}
?>
