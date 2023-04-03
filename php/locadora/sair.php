<?php 
    session_start(); //Inicia sessões
    session_destroy(); //destrói a sessão
    session_unset(); //limpa as variaveis globais de sessões
    //$_SESSION = array(); 
    echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a página inicial
?>