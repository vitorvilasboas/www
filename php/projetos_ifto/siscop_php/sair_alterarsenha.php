<?php 
    session_start(); // Inicia sessões
    session_destroy(); //destruimos a sessão
    session_unset(); //limpamos as variaveis globais das sessões
    //$_SESSION = array(); 
    ?><script>alert('Senha alterada com Sucesso! Autentique-se novamente.');</script><?php
    echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redirecciona para a página inicial
    
?>
    
