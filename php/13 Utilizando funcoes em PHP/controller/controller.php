﻿<?php
	// Na camada controller, eu incluo a logica da aplicação web
	$titulo = "Curso de PHP";
	
	$nome = "Iury Gomes de Oliveira";
	$idade = 30;
	$dtNasc = "04/11/1985";
	$mensagem = " ";
	
	if($idade < 20) 
	{
		$mensagem = "Jovem";
	}
	else
	{
		$mensagem = "Você está ficando Gostoso!";
	}
	
	// Calculando o quadrado de um numero
	// o parâmetro escreve não foi informado
	$retorno=quadrado(4);
	$retorno2=quadrado(4,true);
	
	$concatenada=concatenar("Gatinha","biscoito");
	