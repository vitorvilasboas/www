<?php 
    session_start(); //Inicia sessões
    session_unset(); //limpa as variaveis globais de sessões
    //unset($_SESSION['nome']); //exclui uma sessão especifica
    session_destroy(); //destrói todas as sessões
    echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a página inicial
?>
    
