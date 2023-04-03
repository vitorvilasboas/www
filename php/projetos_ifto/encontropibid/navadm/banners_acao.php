<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
<?php
	include ('banners_classe.php');

	$opcao=new banners_classe();
			
	$acao = $_REQUEST['acao'];
		   
	 if($acao=='listar')
	{
		$opcao->listar();
		require('banners_manutencao.php');
	}
	 if($acao=='excluir')
	{
                $opcao->excluir();
		$opcao->listar();
		require('banners_manutencao.php');
	}
	 if($acao=='incluir')
	{
		require('banners_form.php');
	}
	if($acao=='gravar_incluir')
	{
                $opcao->gravar_incluir();
		$opcao->listar();
		require('banners_manutencao.php');		
	}
?>
<?php }} ?>