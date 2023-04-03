<?php
     include ('it_cursos_classe.php');

	$opcao=new it_cursos_classe();
	
		
	$acao = $_REQUEST['acao'];
        
        if($acao=='listar')
	{
                $opcao->listar_minicursos();
		require('ver_minicursos.php');
	}
		   
	 if($acao=='excluir')
	{
                $opcao->excluir_participante();
                $opcao->listar_minicursos();
		require('ver_minicursos.php');
	}
?>
