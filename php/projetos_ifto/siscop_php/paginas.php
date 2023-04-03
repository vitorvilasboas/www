<?php
    if (!isset($_REQUEST['p']))
        require 'home.php';                   
         
    else if($_REQUEST['p']=='sair')
         require 'sair.php';
                      
    else if($_REQUEST['p']=='requisicao')
         require 'requisicao_acao.php';
    
    else if($_REQUEST['p']=='usuario')
         require 'usuario_acao.php';
    
    else if($_REQUEST['p']=='departamento')
         require 'departamento_acao.php';
    
    else
        require 'home.php';
?>
