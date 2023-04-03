
  <div id="pagina">
       <h1 class="titulo1">Galeria de fotos</h1>
       <div id="bt_prev"class=" prev"><img class="img_bt_prev" src="imagens/prev.jpg"/></div>
       <div id="carousel">
              <ul>              
                    <?php
                         while($opcao->registros = $opcao->resultado->FetchNextobject()){				
                    ?>
                    <li>  
                         <img src="<?php echo 'uploads/fotos/'.$opcao->registros->FOTO_NOME;?>" aut=""/>                                            
                    </li>
                    <?php			
                    }
                    ?>            
              </ul>                                                                
       </div>
       <div id="bt_next" class="next"><img class="img_bt_next" src="imagens/next.jpg"/></div>
  </div>
  