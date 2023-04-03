<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>

    <div id="pagina">
        <h1 class="titulo1">Home</h1>
        <form class="formulario">
            <div class="questoes">
                Consta no sistema que você já respondeu o formulário!<br />
                Caso você não tenha respondido, entre em contato com respónsavel pela avaliação.
                <br /><br />
                <a href="usucom.php?pc=questionario_acao&acao=listar_questoes&ano=2014">Clique para ver o questionário respondido!</a>
            </div>
            
        </form>
    </div>

<?php
        }
    }
 ?>
