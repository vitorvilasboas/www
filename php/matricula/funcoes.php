<?php
    function verifica_login($usuario, $senha){
        $vet_usuarios = array('admin','vitor','abc','teste','adm');
        $vet_senhas = array('admin','vitor','abc','teste','adm');

        $encontrou_usuario = false;
        $encontrou_senha = false;

        for($cont_usu=0;$cont_usu<count($vet_usuarios);$cont_usu++){
            if( $usuario == $vet_usuarios[$cont_usu]){
                $encontrou_usuario = true;
            }
        }

        for($cont_sen=0;$cont_sen<sizeof($vet_senhas);$cont_sen++){
            if( $senha == $vet_senhas[$cont_sen]){
                $encontrou_senha = true;
            }
        }

        if($encontrou_usuario && $encontrou_senha){
            estabelecer_sessoes($usuario,$senha);
            msg_login(true);
        } else {
            msg_login(false);
        }
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
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

    function estabelecer_sessoes($u, $s){
        $_SESSION['usuario'] = $u;
        $_SESSION['senha'] = $s;
    }

    function sair(){
        session_unset();
        session_destroy();
        header('location: index.php');
    }

?>

