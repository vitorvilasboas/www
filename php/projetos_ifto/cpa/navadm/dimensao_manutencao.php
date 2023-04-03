<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
         <h1 class="titulo1">Manutenção de Dimensão</h1>
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
                      <a  href="usuadm.php?pa=dimensao_acao&acao=incluir"><img  src="imagens/menu_add.png"/>&nbsp;&nbsp;Novo Registro</a>
                 </div>
            </div>
             
               <table class="tabelas">
                   <tr>
                       <th class="th120t" colspan="3">Dimensão:</th>
                   </tr>
               <?php 
               while($opcao->registros = $opcao->resultado->FetchNextobject())
               {//Inicia o laço de repetição
               ?>
               
                    <tr>                       
                        <td class="td700"><?php echo $opcao->registros->DIM_NOME;?></td>
                        <td class="tdlink"><a href="usuadm.php?pa=dimensao_acao&acao=alterar&dim_codigo=<?php echo $opcao->registros->DIM_CODIGO;?>"><img src="imagens/editar2.png"/>&nbsp;&nbsp;Alterar</a></td>
                        <td class="tdlink"><a href="javascript:if(confirm('Deseja excuir esse registro?')) {location='usuadm.php?pa=dimensao_acao&acao=excluir&dim_codigo=<?php echo $opcao->registros->DIM_CODIGO;?>'}"><img src="imagens/excluir2.png"/>&nbsp;&nbsp;Excluir</a></td>
                    </tr>
               
               <?php
                }//fecha o laço de repetição
                ?>
              </table>
         </form>
   </div>
<?php 
     }
}
 ?>
