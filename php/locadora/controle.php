<?php
    if (!isset($_GET['op']))
         require 'home.php';                   
         
    else if($_GET['op']=='sair')
         require 'sair.php';
                      
    else if($_GET['op']=='cadastrar')
         require 'formCadastro-etapa1.php';

    else if($_GET['op']=='cadastrar')
         require 'formCadastro-etapa1.php';

     else if($_GET['op']=='listar')
        require 'operacao.php';
    
    else
        require 'home.php';
?>