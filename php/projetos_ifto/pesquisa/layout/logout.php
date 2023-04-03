<p>
<?php 
//session_start(); 
if(isset($_SESSION['nome'])){
 //echo "Bem-vindo:".$_SESSION['nome'].
 //        " Hojé é: ".date('d-m-Y').
 //'<a href="index.php?p=logout&op=logout">Sair</a>';
    if(isset($_REQUEST['op'])){
      if($_REQUEST['op']=='logout'){

        //A função unset é utilizada para destruir a session
        unset($_SESSION['codigo']);
        unset($_SESSION['nome']);
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        unset($_SESSION['nivel']);
        session_destroy();
        header('Location:index.php');
    }
 }
}

?>
</p>

