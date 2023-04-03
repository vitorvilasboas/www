<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
<div id="pagina">
    <h3 class="titulo1">Manutenção dos Banners</h3>
    <div class="formulario">
        <table class="tabelas">
            <tr>
                <th class="th300t">Nome</th>
                <th class="th100t">Imagem</th>
                <th class="th100t">Link</th>
                <th class="th100t" colspan="1"></th>
            </tr>
            <?php 
                while($opcao->registros = $opcao->resultado->FetchNextObject()){//Abre o laço de repição;
            ?>
            <tr>
                <td class="td300"><?php echo $opcao->registros->BAN_IMAGEM;?></td>
                <td class="td100"><center><img width="100" heigth="100" src="uploads/banners/<?php echo $opcao->registros->BAN_IMAGEM;?>" /></center></td>
                <td class="td100"><?php echo $opcao->registros->BAN_LINK;?></td>
                <td class="tdlink"><a href="javascript:if(confirm('Deseja excuir esse registro?')) {location='usuadm.php?pa=banners_acao&acao=excluir&ban_codigo=<?php echo $opcao->registros->BAN_CODIGO;?>'}"><img src="imagens/excluir2.png"/>&nbsp;&nbsp;Excluir</a></td>
            </tr>    
            <?php
            }//fecha o laço de repição;
            ?>
    

        </table>
    </div>
</div>
<?php }} ?>
