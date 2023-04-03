<?php
	function conectaBD(){
		$host = "localhost";
		$usuarioBD = "root";
		$senhaBD = "";
		$banco = "cristal_pet";

		$conexao = mysqli_connect($host,$usuarioBD,$senhaBD,$banco);

		return $conexao;
	}
?>