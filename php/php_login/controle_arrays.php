<?php
    // 1 - se o usuário não estiver logado, vamos abrir o formulário de login 
    // 2 - se o usuário estiver logado, vamos mostrar uma mensagem de boas vindas

    session_start();//inicia o uso de sessão
    $_SESSION['titulo'] = "PHP: Tela de Login com sessões ";
    
    $vetor_usuarios = array('admin','vitor','arthur','josi','teste');
    $vetor_senhas = array('admin','root','abc','teste123','sisweb');
    
    if(isset($_SESSION['usuario'])){// verificando se o campo usuario na tela de login foi inicializado. isset é uma função que verifica se uma variavel existe ou não
        require_once 'boasvindas.php'; //redireciona        
    } elseif( !isset($_POST['cmp_usuario']) && !isset($_POST['cmp_senha']) ) {
        require_once 'login.php';//Quando o usuário não está logado, invocar a tela de login
    } elseif( isset($_POST['cmp_usuario']) && isset($_POST['cmp_senha']) ){//verifica se o usuário informou os dados de login corretamente
        $encontrou_usuario = false;
        foreach ( $vetor_usuarios as $indice ) {
            if ( $indice == $_POST['cmp_usuario'] ) {
                $encontrou_usuario = true;
            }
        }
        $encontrou_senha = false;
        for ( $cont=0; $cont<sizeof($vetor_senhas); $cont++){//ou count
            if( $vetor_senhas[$cont] == $_POST['cmp_senha'] ){
                $encontrou_senha = true;
            }
        }
        if( $encontrou_usuario && $encontrou_senha ){
            $_SESSION['usuario'] = $_POST['cmp_usuario']; //A sessão usuário passará a existir e receberá o valor do campo usuário
            msg_login(true);
            require_once 'boasvindas.php'; //redireciona
        } else {
            msg_login(false);
            require_once 'login.php';//Quando o usuário não está logado, invocar a tela de login
        }
    } else {
        msg_login(false);
        require_once 'login.php';//Quando o usuário não está logado, invocar a tela de login
    }
    
    
    
    function msg_login($valido){
        if($valido == true){
            ?>
                <script type="text/javascript">
                    alert("Bem vindo, Voce sera direcionado a pagina inicial!");
                </script>
            <?php
        } else {
            ?>
                <script type="text/javascript">
                    alert("Usuario e/ou senha incorreto(s).");
                </script>
            <?php
        }
    }
 ?>
    