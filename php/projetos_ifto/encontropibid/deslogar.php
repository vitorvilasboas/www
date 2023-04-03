<div id="pagina"> 
         
         <?php 

                if(isset($_GET['op']) AND ($_GET['op']=="logout")){
                    @session_start();
                    unset($_SESSION['codigo']);
                    unset($_SESSION['cpf']);
                    unset($_SESSION['senha']);
                    unset($_SESSION['nome']);
                    unset($_SESSION['nivel']);
                    session_destroy();
                header("Location:index.php");
            exit;
	}
        ?>

     </div>
