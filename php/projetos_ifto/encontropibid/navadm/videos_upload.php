<div id="pagina">
       <?php	
       if ($_REQUEST['acao']=='incluir'){           
       ?>
       <h1 class="titulo1">Enviar Videos</h1>
       <form  class="formulario" action="usuadm.php?pa=videos_acao&acao=gravar_incluir" enctype="multipart/form-data" method="post">      	   	
           <table class="tabelas">
               <tr>
                   <th class="th276t">Nome:</th>
                   <td class="td700"><input type="type" name="vid_link" size="50" /></td>
               </tr>
        	<tr>
                    <th class="th276t">Arquivo:</th>
                    <td class="td700"><input type="file" name="video" size="50" /></td>
                </tr>
           </table>
           <input  class="btn" type="submit" value="Fazer Upload" />
       </form>
      <?php
       }else if ($_REQUEST['acao']=='alterar'){ 
      ?>
    
	<h1 class="titulo1">Alterar Videos</h1>
        
        <form class="formulario" action="usuadm.php?pa=videos_acao&acao=gravar_alterar" enctype="multipart/form-data" method="post">
                <input type="hidden" name="vid_codigo" size="50" value="<?php   echo $opcao->registros->VID_CODIGO;?>"/>
       	        <table class="tabelas">
                      <tr>
                          <th class="th276t">Nome:</th>
                          <td class="td700"><input type="type" name="vid_link" size="50" value="<?php   echo $opcao->registros->VID_LINK;?>"/></td>
                     </tr>
                     <tr>
                         <th class="th276t">Arquivo:</th>
                        < td class="td700"><input type="file" name="video" size="50" value="<?php   echo $opcao->registros->VID_VIDEO;?>"/></td>
                     </tr>                    
                </table>
                <input class="btn" type="submit" value="Fazer Upload" />
        </form>
        <?php 
	}
        ?>
  </div>
  
