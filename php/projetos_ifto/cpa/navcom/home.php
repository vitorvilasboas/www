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
		<?php 

				
			   if($_SESSION['tipo_usuario']==1){
				   
				    echo '<div style="text-align:center;">
			                <a href="usucom.php?pc=cursos">
			                  <img width="150" src="imagens/responder.jpg" />
			               </a>
			             </div>';
				   
			   }
			   else if($_SESSION['tipo_usuario']==2){
				   echo '<div style="text-align:center;">
			                <a href="usucom.php?pc=questionario_acao&acao=iniciar">
			                  <img width="150" src="imagens/responder.jpg" />
			               </a>
			             </div>';
			   }
			   else if($_SESSION['tipo_usuario']==3){
				   echo '<div style="text-align:center;">
			                <a href="usucom.php?pc=questionario_acao&acao=iniciar">
			                  <img width="150" src="imagens/responder.jpg" />
			               </a>
			             </div>';
			   } 
		?>
		
        
    </div>

<?php
        }
    }
 ?>