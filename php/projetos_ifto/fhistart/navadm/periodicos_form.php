<div id="pagina">
       <?php	
       if ($_REQUEST['acao']=='incluir'){	
       ?>
       <h1 class="titulo1">Enviar artigos</h1>
       <form  class="formulario" action="usuadm.php?pa=periodicos_acao&acao=gravar_incluir" enctype="multipart/form-data" method="post">
           <table class="tabelas">
               <tr>
                   <th class="th276t"> Autores:</th>
                   <td class="td700"><input class="input_700" type="text" name="per_autores"/></td>
               </tr>
               <tr>
                    <th class="th276t"> Titulo:</th>
                    <td class="td700"><input class="input_700" type="text" name="per_titulo"/></td>               
               </tr>

               <tr>
                   <th class="th276t"> Palavras-chave:</th>
                   <td class="td700"><input class="input_700" type="text" name="per_pal_chave"/><br /></td>                                      
               </tr>
               <tr>
                   <th class="th276t"> Anexar o arquivo .DOC .DOCX:</th>
                   <td class="td700"><input class="input_700" type="file" name="doc"/></td>
               </tr>
               <tr>
                   <th class="th276t"> Resumo:</th>
                   <td class="td700"><textarea class="input_700" rows="10"  name="per_resumo"></textarea></td>
               </tr>
           </table>
               
                <input  class="btn" type="submit" value="Enviar"/>               
        </form>
      <?php
       }else if ($_REQUEST['acao']=='incluir'){
      ?>
    
	<h1 class="titulo1">Alterar artigos</h1>
        
        <form style="width:700px; margin:0 auto;" action="usuadm.php?pa=periodicos_acao&acao=gravar_alterar" enctype="multipart/form-data" method="post">
        	<input type="hidden" name="proj_codigo" size="50" value="<?php   echo $opcao->registros->PER_CODIGO;?>"/>
       		<table class="tabelas">
               <tr>
                   <th class="th276t"> Autores:</th>
                   <td class="td700"><input class="input_700" type="text" name="per_autores" value="<?php   echo $opcao->registros->PER_AUTORES;?>"/></td>
               </tr>
               <tr>
                    <th class="th276t"> Titulo:</th>
                    <td class="td700"><input class="input_700" type="text" name="per_titulo" value="<?php   echo $opcao->registros->PER_TITULO;?>"/></td>               
               </tr>

               <tr>
                   <th class="th276t"> Palavras-chave:</th>
                   <td class="td700"><input class="input_700" type="text" name="per_pal_chave" value="<?php   echo $opcao->registros->PER_PAL_CHAVE;?>"/><br /></td>                                      
               </tr>
               <tr>
                   <th class="th276t"> Anexar o arquivo .DOC .DOCX:</th>
                   <td class="td700"><input class="input_700" type="file" name="doc" value="<?php   echo $opcao->registros->PER_DOC;?>"/></td>
               </tr>
               <tr>
                   <th class="th276t"> Resumo:</th>
                   <td class="td700"><textarea class="input_700" rows="10"  name="per_resumo" ><?php   echo $opcao->registros->PER_RESUMO;?></textarea></td>
               </tr>
           </table>
        </form>
     <?php
     } 
     ?>
  </div>
  
