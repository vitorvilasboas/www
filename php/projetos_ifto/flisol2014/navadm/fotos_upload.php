<div id="pagina">
       <?php	
       if ($_REQUEST['acao']=='incluir'){          
       ?>
       <h1 class="titulo1">Enviar fotos</h1>
       <form  class="formulario" action="usuadm.php?pa=fotos_acao&acao=gravar_incluir" enctype="multipart/form-data" method="post">      		
           <table>
               <tr>
                   <th class="th276t">Nome:</th>
                   <td class="td700"><input class="input_700" type="type" name="foto_link" size="50" /></td>
               </tr>
               <tr>
                    <th class="th276t">Foto:</th>
                    <td class="td700"><input class="input_700" type="file" name="foto_nome" size="50" /></td>
               </tr>              
           </table>
           <input class="btn" name="gravar_incluir" type="submit" value="Fazer Upload" />
        </form>
      <?php
       }else if($_REQUEST['acao']=='alterar'){
      ?> 
        <h1 class="titulo1">Alterar Foto</h1>
        <form class="formulario" action="usuadm.php?pa=fotos_acao&acao=gravar_alterar" enctype="multipart/form-data" method="post">
                	
                <input  type="hidden" name="foto_codigo" size="50" value="<?php   echo $opcao->registros->FOTO_CODIGO;?>"/>
       		<label>Link:
                    <input class="input_600" type="type" name="foto_link" size="50" value="<?php   echo $opcao->registros->FOTO_LINK;?>"/>
                </label>
        	<label>Nome:
                    <input class="input_600" type="file" name="foto_nome" size="50" value="<?php   echo $opcao->registros->FOTO_NOME;?>"/>
                </label>
                <label>
                    <input class="btn" type="submit" value="Fazer Upload" />
                </label>
        </form>
    <?php
	 }
     ?>
  </div>
  
