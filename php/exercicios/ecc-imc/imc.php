<?php
	$nome = $_POST["cmp_nome"];
	$idade = $_POST["cmp_idade"];
	$peso = $_POST["cmp_peso"];
	$altura = $_POST["cmp_altura"];
	//$nome = "Vitor";
	//$idade = 29;
	//$peso = 90;
	//$altura = 1.85;

	$imc = (float)($peso/($altura*$altura));

	echo "IMC: ".$imc;

	if($imc <= 18.5){
		echo "".$nome." você esta abaixo do peso!";
	} elseif( ($imc > 18.5) && ($imc <=24.9) ){
		echo $nome." Parabéns!! Você esta no peso ideal!";
	} elseif( ($imc > 24.9) && ($imc <=29.9) ){
		echo $nome." Você esta levemente acima do peso!";
	} elseif( ($imc > 29.9) && ($imc <=34.9) ){
		echo $nome." Você esta com obesidade grau 1!";
	} elseif( ($imc > 34.9) && ($imc <=39.9) ){
		echo $nome." Você esta com obesidade grau 2!";
	} else {
		echo $nome." Você esta com obesidade grau 3!";
	}

?>