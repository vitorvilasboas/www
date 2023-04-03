
<div id="pagina">
    <h1 class="titulo1">Manutenção de videos</h1>
    <form class="formulario">
        <div class="busca_manutencao">                  
                    <div class="img_pesquisa"> 
                        <img  src="imagens/query.png"/>
                    </div>
                    <div class="div_pesquisa">
                        <input class="input_pesquisa"class="input_400" type="text" name="busca"/>
                    </div>
                    <div class="div_busca">
                        <input  class="input_busca" type="submit" name="pesquisar" value="Pesquisar"/>
                    </div>
                    <div class="novo_registro">
                        <a  href="usuadm.php?pa=videos_acao&acao=incluir"><img  src="imagens/menu_add.png"/>&nbsp;&nbsp;Novo Registro</a>
                    </div>
        </div>
        <table class="tabelas">
            <tr>
                <th class="th200t">Nome</th>
                <th class="th200t">Video</th>
                <th class="th300t">Arquivo</th>
                <th class="th300t" colspan="2"></th>
            </tr>
        <?php 

           while($opcao->registros = $opcao->resultado->FetchNextobject())
           {
        ?>
            <tr>
                <td class="td200"><?php echo $opcao->registros->VID_LINK;?></td>
                <td class="td200"> <embed width="198" height="160"  src="<?php echo 'uploads/videos/'.$opcao->registros->VID_VIDEO;?>" type="application/x-mplayer2" autostart="FALSE"</td>	
                <td class="td300"><?php echo $opcao->registros->VID_VIDEO;?></td>
                <td class="tdlink"><a href="usuadm.php?pa=videos_acao&acao=alterar&vid_codigo=<?php echo $opcao->registros->VID_CODIGO;?>"><img src="imagens/editar2.png"/>&nbsp;&nbsp; Alterar</a></td>
                <td class="tdlink"><a href="javascript:if(confirm('Deseja excuir esse registro?')) {location='usuadm.php?pa=videos_acao&acao=excluir&vid_codigo=<?php echo $opcao->registros->VID_CODIGO;?>'}"><img src="imagens/excluir2.png"/>&nbsp;&nbsp;Excluir</a></td>
            </tr>
      <?php
           }
      ?>

     </table>
    </form>
  </div>
