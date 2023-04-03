<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){
            require 'Connections/conecta.php';
 ?>
<div id="pagina"> 
            <h1 class="titulo1">Meus Certificados!</h1>
            <form class="formulario" method="post" action="">
                <table class="tabelas">
                  <tr>
                      <th class="titulo1"> Certificado de Participação Geral</th>     
                  </tr>
                  <tr>                      
                    <?php 
                   
                    $sql=("SELECT usu_codigo, usu_nome,part_ano FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO WHERE  USU_CODIGO =".$_SESSION['codigo']);
                    $resultado=$con->banco->Execute($sql);
                    while($registro=$resultado->FetchNextObject()){        
                    ?>                                
                          <td class="td800"><a href="ver_certificado.php?&opcao=part_evento&usu_codigo=<?php echo $registro->USU_CODIGO;?>&part_ano=<?php echo $registro->PART_ANO;?>"><?php echo 'Ano: '.$registro->PART_ANO;?></a> </td>                     
                  </tr> 
                   <?php
                   }
                  ?>
                </table>
                <br />
               <table class="tabelas">
                  <tr>
                      <th class="titulo1"> Participação em Minicursos/Oficinas</th>     
                  </tr>
                  <tr>                      
                    <?php 
                    
                    $sql=("SELECT usu_codigo, usu_nome,usu_status,mcso_codigo, mcso_titulo, mcso_condutor,mcso_ano FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO =".$_SESSION['codigo']);
                    $resultado=$con->banco->Execute($sql);
                    while($registro=$resultado->FetchNextObject()){        
                    ?>                                
                          <td class="td800"><a href="ver_certificado.php?&opcao=part_minicurso&usu_codigo=<?php echo $registro->USU_CODIGO;?>&mcso_codigo=<?php echo $registro->MCSO_CODIGO;?>"><?php echo $registro->MCSO_TITULO.' - Ano: '.$registro->MCSO_ANO;?></a> </td>                     
                  </tr> 
                   <?php
                   }
                  ?>
                </table>

                <br />
                
                <table class="tabelas">
                  <tr>
                      <th class="titulo1"> Certificado de Oficineiro/Palestrante/Minicurso</th>     
                  </tr>
                  <tr>                      
                    <?php 
                   
                    $sql=("SELECT usu_codigo,mcso_codigo,mcso_titulo, usu_nome,itp_ano FROM itens_palestrantes INNER JOIN usuarios ON ITP_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON ITP_MCSO_CODIGO = MCSO_CODIGO WHERE  USU_CODIGO =".$_SESSION['codigo']);
                    $resultado=$con->banco->Execute($sql);
                    while($registro=$resultado->FetchNextObject()){        
                    ?>                                
                          <td class="td800"><?php echo $registro->MCSO_TITULO;  ?> : <a href="ver_certificado.php?&opcao=palestrante&usu_codigo=<?php echo $registro->USU_CODIGO;?>&itp_ano=<?php echo $registro->ITP_ANO;?>&mcso_codigo=<?php echo $registro->MCSO_CODIGO;?>"><?php echo 'Ano: '.$registro->ITP_ANO;?></a> </td>                     
                  </tr> 
                   <?php
                   }
                  ?>
                </table>
                <br />
                <table class="tabelas">
                    <tr>
                        <th class="titulo1"> Certificado de Organização</th>     
                    </tr>
                    <tr>                      
                        <?php 

                        $sql=("SELECT usu_codigo,usu_nome,ito_ano FROM itens_organizadores INNER JOIN usuarios ON ITO_USU_CODIGO = USU_CODIGO where USU_CODIGO =".$_SESSION['codigo']);
                        $resultado=$con->banco->Execute($sql);
                        while($registro=$resultado->FetchNextObject()){        
                        ?>                                
                        <td class="td800"><a href="ver_certificado.php?&opcao=organizador&usu_codigo=<?php echo $registro->USU_CODIGO;?>&ito_ano=<?php echo $registro->ITO_ANO;?>"><?php echo 'Ano:  '.$registro->ITO_ANO;?></a> </td>                     
                    </tr> 
                       <?php
                       }
                  ?>
                </table>
        </form>
</div>              
 <?php 
        }        
   }                 
 ?>
