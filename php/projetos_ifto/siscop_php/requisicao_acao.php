<?php
include 'requisicao_classe.php';

$opcao = new requisicao_classe();

$acao =$_REQUEST['acao'];

if($acao=='listar_por_usuario')
{
    $opcao->listar_por_usuario();
    require('requisicao_minhalista.php');
}

if($acao=='listar_todas')
{
    $opcao->listar_todas();
    require('requisicao_todalista.php');
}

if($acao=='cancelar')
{
    $opcao->cancelar();
    $opcao->listar_por_usuario();
    require('requisicao_minhalista.php');
}

if($acao=='cadastrar')
{
    require 'requisicao_form.php';
}

if($acao=='bd_cadastrar')
{
    $opcao->cadastrar();
    $opcao->listar_por_usuario();
    require 'requisicao_minhalista.php';
}


if($acao=='autorizar')
{
    $opcao->autorizar();
    $opcao->listar_por_status();
    require 'requisicao_pendenteslista.php';
}

if($acao=='rejeitar')
{
    $opcao->rejeitar();
    $opcao->listar_por_status();
    require 'requisicao_pendenteslista.php';
}

if($acao=='imprimir')
{
    $opcao->imprimir();
    $opcao->listar_por_status();
    require 'requisicao_pendenteslista.php';
}

if($acao=='detalhes')
{
    $opcao->detalhar();
    require 'requisicao_detalhes.php';
}
if($acao=='listar_pendentes')
{
    $opcao->listar_por_status();
    require 'requisicao_pendenteslista.php';
}

if($acao=='alterar')
{
    $opcao->buscar_alterar();
    require 'requisicao_manteralterar.php';
}

if($acao=='bd_alterar')
{
    $opcao->bd_alterar();
    $opcao->listar_por_usuario();
    require 'requisicao_minhalista.php';
}

if($acao=='relatorio')
{
    require 'requisicao_relatorio_escolher.php';
}

if($acao=='buscar'){
    require('requisicao_buscar.php');
}

if($acao=='bd_buscar')
{
    $opcao->buscar();
    require('requisicao_detalhes.php');
}

/*
if($acao=='todas_relatorio')    
{   
    $opcao->listar_todas();
    require 'requisicao_todalista.php';
}

if($acao=='detalhes_relatorio')
{
    $opcao->detalhar();
    require 'requisicao_detalhes_relatorio.php';
}

if($acao=='gerar_relatorio')    
{
    if($_SESSION['on_permissao']=='Reprografia'){
        if($_REQUEST['campo_status']=='Autorizadas'){
            $opcao->reprografia_autorizadas();
            require 'requisicao_relatorio.php';
        } else if ($_REQUEST['campo_status']=='Impressas'){
            $opcao->reprografia_impressas();
            require 'requisicao_relatorio.php';
        } else {
            $opcao->reprografia_todas();
            require 'relatorios_requisicoes/relatorio_matriz.php';
            //require 'requisicao_relatorio.php';
        }
    } else if ($_SESSION['on_permissao']=='Requerente'){
        
    } else if ($_SESSION['on_permissao']=='Avaliador'){
        
    } else {
        
    }
}
 */

?>
