<?php
	//insercao();
	//atualizacao();
	//delecao();
	//selecao();	
?>


<?php /* Funções */
	
	function conexaoBD(){
		$host = "localhost";
		$usuarioBD = "root";
		$senhaBD = "root";
		$banco = "ifeventos";
		
		$conexao = mysqli_connect($host,$usuarioBD,$senhaBD,$banco);
		
		return $conexao;
	}


	function selecao(){
		$conexao = conexaoBD();
		
		$sql = "SELECT * FROM evento";
		
		$resultado = mysqli_query($conexao, $sql);
		
		$qtd_registros = mysqli_num_rows($resultado); 
		
		//selecao_obter_registros($resultado);
		selecao_while($resultado);
		//selecao_for($qtd_registros,$resultado);
		//selecao_while_vetor($resultado);

		mysqli_close($conexao);
	}

	function selecao_obter_registros($resultado){
		$evento = mysqli_fetch_row($resultado);
		echo $evento[1].'<br>';

		$linha = mysqli_fetch_assoc($resultado);
		echo $linha['eve_titulo'].'<br>';

		$tupla = mysqli_fetch_array($resultado);
		echo $tupla['eve_area'].'<br>';

		$registro = mysqli_fetch_object($resultado);
		echo $registro->eve_qtdvagas.'<br>';
	}

	function selecao_while($resultado){
		while( $linha = mysqli_fetch_assoc($resultado) ){
			echo $linha['eve_titulo'].'<br>';
		}
	}

	function selecao_for($qtd_registros,$resultado){
		for($cont=0;$cont<$qtd_registros;$cont++){
			$linha = mysqli_fetch_assoc($resultado);
			echo $linha['eve_titulo'].'<br>';
		}
	}

	function selecao_while_vetor($resultado){
		$vet_eventos = array();
		
		while($tupla = mysqli_fetch_assoc($resultado)){
			array_push($vet_eventos, $tupla);
		}
		
		foreach ($vet_eventos as $evento){
			echo $evento['eve_titulo'].'<br>';
		}
	}

	
	function insercao(){
		$conexao = conexaoBD();
		
		$titulo = 'titulo_teste';
		$area = 'area_teste';
		$qtd_vagas = 99;
		
		$sql2 = "INSERT INTO evento (eve_titulo,eve_area,eve_qtdvagas) VALUES ('{$titulo}','{$area}','{$qtd_vagas}')";
		
		$resultado2 = mysqli_query($conexao, $sql2);
		
		if($resultado2) {
			echo 'Deu certo<br>'; 
		} else {
			echo '*** Não deu certo*** <br>'; 
			mysqli_error($conexao);	
		} 

		mysqli_close($conexao);
	}
	

	function atualizacao(){
		$conexao = conexaoBD();
		
		$sql3 = "UPDATE evento SET eve_titulo='ExpoFormoso' WHERE eve_titulo LIKE '%pecu%'";
		
		$resultado3 = mysqli_query($conexao,$sql3);
		
		if($resultado3){
			echo 'Alteração realizada com sucesso. <br>';
		} else {
			echo '***Nada foi alterado*** <br>';
			echo mysqli_error($conexao);	
		}

		mysqli_close($conexao);
	}


	function delecao(){
		$conexao = conexaoBD();
		
		$sql4 = "DELETE from evento where eve_titulo like '%teste%'";
		
		$resultado4 = mysqli_query($conexao, $sql4);
		
		if($resultado4){
			echo 'Exclusão realizada com sucesso.<br>';
		} else {
			echo '***Nada foi excluido*** <br>';
			echo mysqli_error($conexao);
		}
	}


	/*
	$qtd_registros = mysqli_num_rows($resultado);

	for($cont=0;$cont<$qtd_registros;$cont++){
		$linha = mysqli_fetch_assoc($resultado);
		echo '<br><br>';
		echo 'Titulo: '.$linha['eve_titulo'].'<br>';
		echo 'Qtd vagas: '.$linha['eve_qtdvagas'].'<br>';
		echo 'Area: '.$linha['eve_area'].'<br>';
		echo 'Responsavel: '.$linha['eve_responsavel'].'<br>';
	}
	*/
	
	/* Funções para obter os registros do bd */
	/*
	$linha = mysqli_fetch_assoc($resultado);
	echo $linha['eve_titulo'].'<br>';

	$linha = mysqli_fetch_array($resultado);
	echo $linha['eve_area'].'<br>';

	$linha = mysqli_fetch_row($resultado);
	echo $linha[1].'<br>';

	$evento = mysqli_fetch_object($resultado);
	echo $evento->eve_qtdvagas.'<br>';
	*/
	 
?>
