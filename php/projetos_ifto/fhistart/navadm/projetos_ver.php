<div id="pagina">
    <h1 class="titulo1">Projetos em andamento</h1>
    <form class="formulario">       
        <div class="projetos"> 
        <?php 	 	                  
         while($opcao->registros = $opcao->resultado->FetchNextobject()){                      	             
	 ?> 		
             <h2 class="titulo2"><?php echo $opcao->registros->PROJ_TITULO; ?> </h2>
             <img src="uploads/img_proj/<?php echo $opcao->registros->PROJ_FOTO;?>" />	
	     <div class="projeto_texto">
                 <p><?php echo $opcao->registros->PROJ_TEXTO;?></p> 
             </div>
             <br />            
    	     Publicado dia <?php echo $opcao->registros->PROJ_DATA; ?>
             <hr />
        <?php                     		
        }
        ?> 
        </div>
    </form>
</div>

