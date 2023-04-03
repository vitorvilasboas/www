<?php
    session_start();
    if( isset($_GET['logout']) && $_GET['logout'] == "sim" && isset($_SESSION['usuario']) ){
        unset($_SESSION['usuario']); // Encerrar sessão
        msg_sair();
        //session_destroy(); 
        echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a página inicial
    } else {
        echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a página inicial
    }
    
    
    function msg_sair() {
        ?>
             <script type="text/javascript">
                 alert("Logout efetuado com sucesso!");
             </script>
         <?php
    }
    
?>
   
	