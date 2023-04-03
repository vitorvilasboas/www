<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>

    <div id="pagina">
        <h1 class="titulo1">Inicio</h1>
        <br />
   
    </div>
<?php
    }
    }
    ?>

