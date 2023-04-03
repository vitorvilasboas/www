
<div id="pagina">
    <form class="formulario">
    <h1 class="titulo1">Manutenção de artigos</h1>             
        <table class="tabelas" > 
           <?php 
           while($opcao->registros = $opcao->resultado->FetchNextobject())
           {
            ?>   
            <tr>               
                <th class="th176t">Postato dia:</th>
                <td class="td200"><?php echo $opcao->registros->PER_DATA;?></td>
                <td class="td300"><a href="uploads/periodicos/<?php echo $opcao->registros->PER_DOC;?>"><img src="imagens/pdf.png"/>&nbsp;&nbsp;baixar o artigo</a></td>
                <td class="tdlink"><a href="javascript:if(confirm('Deseja excuir esse registro?')) {location='usuadm.php?pa=periodicos_acao&acao=excluir&per_codigo=<?php echo $opcao->registros->PER_CODIGO;?>'}"><img src="imagens/excluir2.png"/>&nbsp;&nbsp;Excluir</a></td>
            </tr> 
            <tr>
                <th class="th176t">Titulo:</th>
                <td class="td800" colspan="3"><?php echo $opcao->registros->PER_TITULO;?></td>	
            </tr>
            <tr>
                <th class="th176t">Autores:</th>
                <td class="td800" colspan="3"><?php echo $opcao->registros->PER_AUTORES;?></td>	
            </tr>
            <tr>
                <th class="th176t">Palavras-chave:</th>
                <td class="td800" colspan="3"><?php echo $opcao->registros->PER_PAL_CHAVE;?></td>	
            </tr>
            <tr>
                <th class="th176t">Resumo:</th>
                <td class="td800" colspan="3"><?php echo $opcao->registros->PER_RESUMO;?></td>	
            </tr>
            <tr>
                 <td class="tdespaco" colspan="5">_</td>
            </tr>
      <?php
      }
      ?>
      </table> 
   </form>
</div>
