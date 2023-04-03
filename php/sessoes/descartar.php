<?php
	session_start(); //Inicia sessões
    session_destroy(); //destrói a sessão
    session_unset(); //limpa as variaveis globais de sessões

    echo 'Sessao NOME descartada'.'<br>';
?>

<a href="mostrar2.php">Mostrar novamente Sessoes</a>