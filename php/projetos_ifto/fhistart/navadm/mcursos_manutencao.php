<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
         <h1 class="titulo1">Manutenção de CURSOS</h1>
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
                      <a  href="usuadm.php?pa=mcursos_acao&acao=incluir"><img  src="imagens/menu_add.png"/>&nbsp;&nbsp;Novo Registro</a>
                 </div>
            </div>
             
               <label>  </label>            
               <?php 
               while($opcao->registros = $opcao->resultado->FetchNextobject())
               {//Inicia o laço de repetição
               ?>
               <table class="tabelas">
                    <tr>
                        <th class="th130t">Horário e Data:</th>
                        <td class="td400"><?php echo $opcao->registros->MCSO_HORARIO;?></td>
                        <th class="th100t">Vagas</th>
                        <td class="td70"><?php echo $opcao->registros->MCSO_VAGAS;?></td>
                        <td class="tdlink"><a href="usuadm.php?pa=mcursos_acao&acao=alterar&mcso_codigo=<?php echo $opcao->registros->MCSO_CODIGO;?>"><img src="imagens/editar2.png"/>&nbsp;&nbsp;Alterar</a></td>
                        <td class="tdlink"><a href="javascript:if(confirm('Deseja excuir esse registro?')) {location='usuadm.php?pa=mcursos_acao&acao=excluir&mcso_codigo=<?php echo $opcao->registros->MCSO_CODIGO;?>'}"><img src="imagens/excluir2.png"/>&nbsp;&nbsp;Excluir</a></td>
                    </tr>
                    <tr>
                        <th class="th130t">Titulo:</th>
                        <td class="td800" colspan="5"><?php echo $opcao->registros->MCSO_TITULO;?></td>
                    </tr>
                    <tr>
                        <th class="th130t">Professor:</th>
                        <td class="td600" colspan="3"><?php echo $opcao->registros->MCSO_CONDUTOR;?></td>
                        <th class="th100t">Disponiveis:</th>
                        <td class="td100"><?php $disponiveis=$opcao->registros->MCSO_VAGAS-$opcao->registros->MCSO_CONT_VAGAS; if($disponiveis=='0'){ echo "Lotado";}else {echo $disponiveis;}?></td>
                    </tr>
                    <tr >                          
                        <th class="th130t">Resumo:</th><td class="td800" colspan="5"><?php echo $opcao->registros->MCSO_RESUMO;?></td>
                    </tr>
                    <tr>
                        <td class="tdespaco" colspan="6">_</td>
                    </tr>
               </table>
               <?php
                }//fecha o laço de repetição
                ?>
         </form>
   </div>
<?php 
     }
}
 ?>
