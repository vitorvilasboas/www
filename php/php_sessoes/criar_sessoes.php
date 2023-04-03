<?php
    session_start();
    
    //Capturando informações enviadas do formulário com POST
    $nome = $_POST['campo_nome'];
    $cpf = $_POST['campo_cpf'];
    $idade = $_POST['campo_idade'];
    $sexo = $_POST['campo_sexo'];
    $status = $_POST['status'];
    
    // criando/estabelecendo sessões com informações advindas d formulário
    $_SESSION['usuario_nome'] = $_POST['campo_nome'];
    
    $_SESSION['usuario_cpf'] = $_POST['campo_cpf'];
    
    $_SESSION['usuario_idade'] = $idade;
    
    $_SESSION['usuario_sexo'] = $sexo;
    
    if( isset($_SESSION['usuario_nome']) && $status == 'aguardando_aprovacao' ){
        $_SESSION['status'] = 'autorizado';
    }
    
    header('location: mostrar.php')//direciona para a página mostrar.php
    //echo '<meta http-equiv="refresh" content="0; url=mostrar.php" />';//também direciona para a página mostrar.php
?>

