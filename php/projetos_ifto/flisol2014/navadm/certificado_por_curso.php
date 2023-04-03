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
                        require('Connections/conecta.php');
                        $sql1=("select mcso_titulo from minicursos where MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'");
                        $resultado1=$con->banco->Execute($sql1);
                        if($registro1=$resultado1->FetchNextObject()){
                        ?>

                           <tr>                               
                                <td class="td800"colspan="4">
                                    <label> Curso : <?php echo $registro1->MCSO_TITULO; ?></label>
                                </td>
                           </tr>

                       <?php } ?>
                           <tr>
                                <th class="th70t">Nº</th>
                                <th class="th300t">Nome</th> 
                                <th class="th200t">Situacão</th>
                                <th class="th100t">Confirmar</th>
                           </tr>
                        <?php
                        
                             
                             $sql2=("select  usu_codigo,usu_nome,ic_situacao from usuarios inner join  itens_minicursos on  IC_USU_CODIGO= USU_CODIGO where IC_MCSO_CODIGO='".$_REQUEST['mcso_codigo']."' order by USU_NOME");
                             $resultado2=$con->banco->Execute($sql2);
                             $i=1;
                            while($registros2= $resultado2->FetchNextObject()){
                         ?>
                           <tr>
                                <input type="hidden" name="curso" value="<?php  echo $_REQUEST['mcso_codigo'];?>"/>
                                <td class="td70"><?php  echo $i++;?></td>
                                <td class="td400"><?php echo $registros2->USU_CODIGO.' - '.$registros2->USU_NOME;?> </td>
                                <td class="td200"><?php echo $registros2->IC_SITUACAO;?> </td>
                                <td class="td100"><img src="imagens/marcar_f2.png" /><input class="input_radio" type="checkbox" name="usuarios[]" value="<?php echo $registros2->USU_CODIGO;?>" checked /></td>                      
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