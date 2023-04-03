
<?php
	require ('cursos_dos_campi_classe.php');
	
        $opcao=new cursos_dos_campi_classe();		
	
        $acao = $_REQUEST['acao'];
		   
	 if($acao=='listar'){
		$opcao->listar();
		require('cursos_dos_campi_manutencao.php');
	}
	 if($acao=='excluir'){
                $opcao->excluir();
		$opcao->listar();
		require('cursos_dos_campi_manutencao.php');
	}
	 if($acao=='incluir'){
		require('cursos_dos_campi_form.php');
	}
	if($acao=='gravar_incluir'){
                $opcao->gravar_incluir();
		$opcao->listar();
		require('cursos_dos_campi_manutencao.php');		
	}
	 if($acao=='alterar'){
		$opcao->alterar();
	   	require('cursos_dos_campi_form.php');
	}
	if($acao=='gravar_alterar'){
                $opcao->gravar_alterar();
		$opcao->listar();
		require('cursos_dos_campi_manutencao.php');    
	}
?>
