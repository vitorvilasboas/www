?php
	// insercao();
	//atualizacao();
	//delecao();
	//selecao();	
?>


<?php /* Funções */
	
	function conexaoBD(){
		$host = "localhost";
		$usuarioBD = "root";
		$senhaBD = "root";
		$banco = "cristal_pet";
		
		$conexao = mysql_connect($host,$usuarioBD,$senhaBD,$banco);
		
		return $conexao;
	}


	function selecao(){
		$conexao = conexaoBD();
		
		$sql = "SELECT * FROM evento";
		
		$resultado = mysql_query($conexao, $sql);
		
		$qtd_registros = mysql_num_rows($resultado); 
		
		//selecao_obter_registros($resultado);
		selecao_while($resultado);
		//selecao_for($qtd_registros,$resultado);
		//selecao_while_vetor($resultado);

		mysql_close($conexao);
	}

	function selecao_obter_registros($resultado){
		$evento = mysql_fetch_row($resultado);
		echo $evento[1].'<br>';

		$linha = mysql_fetch_assoc($resultado);
		echo $linha['eve_titulo'].'<br>';

		$tupla = mysql_fetch_array($resultado);
		echo $tupla['eve_area'].'<br>';

		$registro = mysql_fetch_object($resultado);
		echo $registro->eve_qtdvagas.'<br>';
	}

	function selecao_while($resultado){
		while( $linha = mysql_fetch_assoc($resultado) ){
			echo $linha['eve_titulo'].'<br>';
		}
	}

	function selecao_for($qtd_registros,$resultado){
		for($cont=0;$cont<$qtd_registros;$cont++){
			$linha = mysql_fetch_assoc($resultado);
			echo $linha['eve_titulo'].'<br>';
		}
	}

	function selecao_while_vetor($resultado){
		$vet_eventos = array();
		
		while($tupla = mysql_fetch_assoc($resultado)){
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
		
		$resultado2 = mysql_query($conexao, $sql2);
		
		if($resultado2) {
			echo 'Deu certo<br>'; 
		} else {
			echo '*** Não deu certo*** <br>'; 
			mysql_error($conexao);	
		} 

		mysql_close($conexao);
	}
	

	function atualizacao(){
		$conexao = conexaoBD();
		
		$sql3 = "UPDATE evento SET eve_titulo='ExpoFormoso' WHERE eve_titulo LIKE '%pecu%'";
		
		$resultado3 = mysql_query($conexao,$sql3);
		
		if($resultado3){
			echo 'Alteração realizada com sucesso. <br>';
		} else {
			echo '***Nada foi alterado*** <br>';
			echo mysql_error($conexao);	
		}

		mysql_close($conexao);
	}


	function delecao(){
		$conexao = conexaoBD();
		
		$sql4 = "DELETE from evento where eve_titulo like '%teste%'";
		
		$resultado4 = mysql_query($conexao, $sql4);
		
		if($resultado4){
			echo 'Exclusão realizada com sucesso.<br>';
		} else {
			echo '***Nada foi excluido*** <br>';
			echo mysql_error($conexao);
		}
	}


	
	 
?>
