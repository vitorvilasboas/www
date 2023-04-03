<?php 
	session_start();
	//require_once 'funcoes.php';
	if(isset($_REQUEST['operacao'])){
		
		if($_REQUEST['operacao'] == 'cadastrar'){
			
			if(!isset($_SESSION['vetor_cliente'])){
				$cliente = array();
			}

			//$cliente[] = $_POST['cmp_nome'];
			//$cliente[] = $_POST["cmp_salario"];
			
			$_SESSION['vetor_cliente'][] = $_POST['cmp_nome'];
			$_SESSION['vetor_cliente'][] = $_POST["cmp_salario"];
			
			//echo $cliente[0].'<br>';
			//echo $cliente[1].'<br>';

			/*$tamanho = count($cliente); //ou sizeof($cliente);
			for($i=0;i<tamanho;$i++){
				echo $cliente[i].'<br>';
			}*/

			foreach ($_SESSION['vetor_cliente'] as $dado) {
				echo $dado.'<br>';
			}

			echo "cadastro efetuado com sucesso";

		}

		else if($_REQUEST['operacao'] == 'listar'){
			foreach ($_SESSION['vetor_cliente'] as $dado) {
				echo $dado.'<br>';
			}
			
		}
	
	} else {
		echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a home
	}

?>