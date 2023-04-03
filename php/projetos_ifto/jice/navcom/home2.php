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
		<p style="color:red; font-size:20px;text-align:justify">
		<b>Atenção</b><br />
		O credenciamento da 7ª JICE será no dia 19 de Outubro à partir das 14hs<br />
		</p>
		    
    </div>

 <?php
        }
    }
 ?> 