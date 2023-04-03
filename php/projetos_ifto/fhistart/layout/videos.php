   <div id="pagina">
         <h1 class="titulo1">Videoteca</h1>
         <form class="formulario">      
             <div id="video_galeria">
                 <div class="videos_destaque">
                     <?php
                     
                     require 'Connections/conecta.php';
                     
                     $sql = ("select * from videos order by VID_CODIGO desc limit 5");
		     $resultado = $con->banco->Execute($sql);
                     while($registros = $resultado->FetchNextObject()){
                     ?>
                       <ul>
                           <li>
                               <a href="index.php?p=videos&&vid_codigo=<?php echo $registros->VID_CODIGO;?>">
                                   <img  src="imagens/img_video.jpg" />
                               </a>
                           </li>
                           <li>
                              <a href="index.php?p=videos&vid_codigo=<?php echo $registros->VID_CODIGO;?>"><?php echo $registros->VID_LINK; ?></a>
                           </li>
                       </ul>
                     <hr />
                     <?php 
                     }       
                     ?>
                 </div>
    	         <div class="videos_player">        
        	          <?php
                              if(isset($_REQUEST['vid_codigo'])){                
                                  $sql = ("select * from videos where VID_CODIGO='".$_REQUEST['vid_codigo']."'");
                                  $resultado = $con->banco->Execute($sql);
                                  if($registros = $resultado->FetchNextObject()){
                                        echo '<object class="video_play">
                                                    <param name="movie" name="wmode" value="transparent"/>
                                                    <embed src="uploads/videos/'.$registros->VID_VIDEO.'" type="application/x-mplayer2" autostart="TRUE" wmode="transparent" width="500" height="400">
                                              </object>';                                   
                                }
                                }else echo '';
                              
			   ?>
      
                </div>
            </div>
            <div class="todos_videos">
        	          <?php
                          $sql = ("select * from videos order by VID_CODIGO desc");
			  $resultado = $con->banco->Execute($sql);
                          while($registros = $resultado->FetchNextobject()){				
			   ?> 
                               <div class="lista_videos">
                                    <ul>
                                        <li>
                                            <a href="index.php?p=videos&vid_codigo=<?php echo $registros->VID_CODIGO;?>">
                                                <img  src="imagens/img_video.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.php?p=videos&vid_codigo=<?php echo $registros->VID_CODIGO;?>"><?php echo $registros->VID_LINK; ?></a>
                                        </li>
                                    </ul>
                                </div>
                          <?php		   	
			      }
			  ?>                
               </div>
   
     </form>
</div>