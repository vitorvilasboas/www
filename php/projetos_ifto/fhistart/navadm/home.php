<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['atribuicao']=='admin'){                 
 ?>

    <div id="pagina">
        <h1 class="titulo1">Home</h1>
    </div>

<?php
        }
    }
 ?>