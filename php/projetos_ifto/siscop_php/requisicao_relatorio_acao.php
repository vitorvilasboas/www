<?php
session_start();
include 'requisicao_relatorio_classe.php';

$opcao = new requisicao_relatorio_classe();

$acao =$_REQUEST['acao'];

if($acao=='gerar_relatorio')    
{
    
    if($_SESSION['on_permissao']=='Reprografia'){
        if($_REQUEST['campo_status']=='Autorizadas'){
            $opcao->reprografia_autorizadas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Impressas'){
            $opcao->reprografia_impressas();
            require 'requisicao_relatorio_matriz.php';
        } else {
            $opcao->reprografia_todas();
            require 'requisicao_relatorio_matriz.php';       
        }
    
        
    } else if ($_SESSION['on_permissao']=='Requerente'){
        if($_REQUEST['campo_status']=='Autorizadas'){
            $opcao->requerente_autorizadas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Impressas'){
            $opcao->requerente_impressas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Aguardando'){
            $opcao->requerente_aguardando();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Canceladas'){
            $opcao->requerente_canceladas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Rejeitadas'){
            $opcao->requerente_rejeitadas();
            require 'requisicao_relatorio_matriz.php';
        } else {
            $opcao->requerente_todas();
            require 'requisicao_relatorio_matriz.php';       
        }
    
        
    } else if ($_SESSION['on_permissao']=='Avaliador'){
        if($_REQUEST['campo_status']=='Autorizadas'){
            $opcao->avaliador_autorizadas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Impressas'){
            $opcao->avaliador_impressas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Aguardando'){
            $opcao->avaliador_aguardando();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Canceladas'){
            $opcao->avaliador_canceladas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Rejeitadas'){
            $opcao->avaliador_rejeitadas();
            require 'requisicao_relatorio_matriz.php';
        } else {
            $opcao->avaliador_todas();
            require 'requisicao_relatorio_matriz.php';       
        }
    
        
    } else {
        if($_REQUEST['campo_status']=='Autorizadas'){
            $opcao->root_autorizadas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Impressas'){
            $opcao->root_impressas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Aguardando'){
            $opcao->root_aguardando();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Canceladas'){
            $opcao->root_canceladas();
            require 'requisicao_relatorio_matriz.php';
        } else if ($_REQUEST['campo_status']=='Rejeitadas'){
            $opcao->root_rejeitadas();
            require 'requisicao_relatorio_matriz.php';
        } else {
            $opcao->root_todas();
            require 'requisicao_relatorio_matriz.php';       
        }
    }
    
}

?>
