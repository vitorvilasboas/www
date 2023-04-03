<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
           <form  class="formulario"method="post" action="usuadm.php?pa=emissao_certificado">
                <h1 class="titulo1">Emitir Certificado</h1>
                <table class="tabelas">                     
                        <?php
                            while($opcao->registros= $opcao->resultado->FetchNextObject()){
                         ?>
                           <tr>
                                <input type="hidden" name="codigo" value="<?php echo $opcao->registros->USU_CODIGO;?>"/>
                                <th class="th100t">Cursos</th>
                                <td class="td600"><?php echo $opcao->registros->MCSO_TITULO;?> </td>
                                <td class="td70"><img src="imagens/marcar_f2.png" /><input class="input_radio" type="checkbox" name="minicursos[]" value="<?php echo $opcao->registros->MCSO_CODIGO;?>"/></td>                      
                          </tr> 
                         <?php
                            }
                         ?>
                </table>
                <input class="btn" type="submit" value="Confirmar"/><br />               
           </form>  
    </div>
<?php 
        }
    }
 ?>