<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
<div id="pagina">
       <h3 class="titulo1">Cadastrar Banner</h3>
       <form class="formulario" method="post" action="usuadm.php?pa=banners_acao&acao=gravar_incluir" enctype="multipart/form-data">    
            <table class="tabelas">
                 <tr>
                     <th class="th120t"> Upload do Banner:</th><td class="td300"><input class="input_500" type="file" name="ban_nome" /></td>
                 </tr>
                 <tr>
                     <th class="th120t"> Link:</th><td class="td300"><input class="input_500" type="text" name="ban_link" /></td>
                 </tr>
             </table>
             <input class="btn" type="submit" name="salvar" value="Salvar"/>
       </form>  
</div>
 <?php }} ?>