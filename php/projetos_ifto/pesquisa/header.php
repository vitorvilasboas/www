<?php
  session_start();
  if(isset($_SESSION['nome'])){ 
      $imagen ="users_logado";
      $nome = $_SESSION['nome'];
  }else{
      $imagen = "users_deslogado";
      $nome = "Visitante";
  }
?>
<header id="topo"> 
    <div class="logo"><img src="imagens/logo_ifto.png"></div>
    <div class="boasvindas">
        <img class="iconeuser" src="imagens/<?php echo $imagen; ?>.png">
        Olá <b><?php echo $nome; ?></b>,<br /> Seja bem vindo! 
    </div>
</header>

