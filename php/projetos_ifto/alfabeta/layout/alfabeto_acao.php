<?php

include 'alfabeto_classe.php';

$opcao = new alfabeto_classe();

$acao =$_REQUEST['acao'];//a variavel local recebe o valor da acao passada

if($acao=='minusculo')
{
    $opcao->lista_alfabeto();
    require 'minusculo.php';
}

if($acao=='maiusculo')
{
    $opcao->lista_alfabeto();
    require 'maiusculo.php';
}
if($acao=='vogais')
{
    $opcao->lista_alfabeto();
    require 'vogais.php';
}
if($acao=='consoantes')
{
    $opcao->lista_alfabeto();
    require 'consoantes.php';
}
if($acao=='cores')
{
    $opcao->lista_cores();
    require 'cores.php';
}
if($acao=='numeros')
{
    $opcao->lista_numeros();
    require 'numeros.php';
}

if($acao=='libras')
{
    $opcao->lista_alfabeto();
    require 'libras.php';
}

?>
