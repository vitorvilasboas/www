
     <div id="pagina">
         <h1 class="titulo1">Videoteca</h1>
         <form class="formulario">      
             <div id="video_galeria">
                 <div class="videos_destaque">
                     <?php     
                     $opcao->destaques();
                     while($opcao->registros = $opcao->resultado->FetchNextObject()){
                     ?>
                       <ul>
                           <li>
                               <a href="usuadm.php?pa=videos_acao&acao=player&vid_codigo=<?php echo $opcao->registros->VID_CODIGO;?>">
                                   <img  src="imagens/img_video.jpg" />
                               </a>
                           </li>
                           <li>
                              <a href="usuadm.php?pa=videos_acao&acao=player&vid_codigo=<?php echo $opcao->registros->VID_CODIGO;?>"><?php echo $opcao->registros->VID_LINK; ?></a>
                           </li>
                       </ul>
                     <hr />
                     <?php 
                     }       
                     ?>
                 </div>
    	         <div class="videos_player">        
        	          <?php
                              if (($_REQUEST['acao']=='player')){
                                    $opcao->ver();                                   
                                }				
			   ?>
      
                </div>
            </div>
            <div class="todos_videos">
        	          <?php
                                $opcao->todos_videos();
                                while($opcao->registros = $opcao->resultado->FetchNextobject()){				
			   ?> 
                <div class="lista_videos">
                       <ul>
                           <li>
                               <a href="usuadm.php?pa=videos_acao&acao=player&vid_codigo=<?php echo $opcao->registros->VID_CODIGO;?>">
                                   <img  src="imagens/img_video.jpg" />
                               </a>
                           </li>
                           <li>
                              <a href="usuadm.php?pa=videos_acao&acao=player&vid_codigo=<?php echo $opcao->registros->VID_CODIGO;?>"><?php echo $opcao->registros->VID_LINK; ?></a>
                           </li>
                       </ul>
                    </div>
                          <?php		   	
			      }
			  ?>                
               </div>
   
     </form>
</div>
  
 
