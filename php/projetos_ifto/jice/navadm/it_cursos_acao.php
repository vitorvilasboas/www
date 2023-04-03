<?php
     include ('it_cursos_classe.php');

	$opcao=new it_cursos_classe();
	
		
	$acao = $_REQUEST['acao'];
		   
	 if($acao=='listar')
	{

		require('inscritos.php');
	}
	 if($acao=='ver')
	{

		require('inscritos_ver.php');
	}
	 if($acao=='excluir')
	{
                $opcao->excluir_participante();
		require('inscritos_ver.php');
	}
?>
