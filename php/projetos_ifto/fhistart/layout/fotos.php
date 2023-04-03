
  <div id="pagina">
       <h1 class="titulo1">Galeria de fotos</h1>
       <div id="bt_prev"class=" prev"><img class="img_bt_prev" src="imagens/prev.jpg" alt="img_bt_prev" /></div>
       <div id="carousel">
              <ul>              
                    <?php
                         require 'Connections/conecta.php';
                         $sql=("select * from fotos");
                         $resultado=$con->banco->Execute($sql);
                         while($registros = $resultado->FetchNextobject()){				
                    ?>
                    <li>  
                         <img src="<?php echo 'uploads/fotos/'.$registros->FOTO_NOME;?>" alt=""/>                                            
                    </li>
                    <?php			
                    }
                    ?>            
              </ul>                                                                
       </div>
       <div id="bt_next" class="next"><img class="img_bt_next" alt="img_bt_next" src="imagens/next.jpg"/></div>
  </div>
  