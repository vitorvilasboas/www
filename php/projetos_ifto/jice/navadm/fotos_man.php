
<div id="pagina">
    <h1 class="titulo1">Manutenção de fotos</h1>
    <form class="formulario">     
        <table class="tabelas" >
            <tr>
                <th class="th200t">Título</th>
                <th class="th100t">Imagen</th>
                <th class="th200t">Nome</th>
                <th class="tdlink"colspan="2"><img src="imagens/menu_add.png"><a href="usuadm.php?pa=fotos_acao&acao=incluir">&nbsp;&nbsp;Novo Registro</a></th>
            </tr>
            <?php 
                while($opcao->registros = $opcao->resultado->FetchNextobject())
            {
            ?>
            <tr>
                <td class="td200"><?php echo $opcao->registros->FOTO_LINK;?></td>
                <td class="td100"width="80" height="60"> <img width="100%" src="<?php echo 'uploads/fotos/'.$opcao->registros->FOTO_NOME;?>"</td>	
                <td class="td200"><?php echo $opcao->registros->FOTO_NOME;?></td>
                <td class="tdlink"><a href="usuadm.php?pa=fotos_acao&acao=alterar&foto_codigo=<?php echo $opcao->registros->FOTO_CODIGO;?>"><img src="imagens/editar2.png">&nbsp;&nbsp;Alterar</a></td>
                <td class="tdlink"><a href="javascript:if(confirm('Deseja excuir esse registro?')) {location='usuadm.php?pa=fotos_acao&acao=excluir&foto_codigo=<?php echo $opcao->registros->FOTO_CODIGO;?>'}"><img src="imagens/excluir2.png">&nbsp;&nbsp;Excluir</a></td>
            </tr>
            <?php
           }
           ?>
       </table>
    </form>
</div>