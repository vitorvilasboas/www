<?php
session_start();
    if( isset($_SESSION['usuario_nome']) ){
        unset($_SESSION['usuario_nome']); //encerra sessão específica
    }

    if( ( isset($_SESSION['usuario_cpf']) && isset($_SESSION['usuario_idade']) ) || isset($_SESSION['status']) ){
        session_destroy();//destrói todas as sessões
    }

    echo '<meta http-equiv="refresh" content="0; url=verifica_sessoes.php" />';
?>
