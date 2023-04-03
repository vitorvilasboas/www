<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){
            require 'Connections/conecta.php';
 ?>
<div id="pagina"> 
            <h1 class="titulo1">Meus Certificados!</h1>
            <form class="formulario" method="post" action="">
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
                          <td class="td800"><a href="ver_certificado.php?&opcao=part_minicurso&usu_codigo=<?php echo $registro->USU_CODIGO;?>&mcso_codigo=<?php echo $registro->MCSO_CODIGO;?>"><?php echo $registro->MCSO_TITULO.' - ANO  '.$registro->MCSO_ANO;?></a> </td>                     
                  </tr> 
                   <?php
                   }
                  ?>
                </table>
                <br />
                
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
                          <td class="td800"><a href="ver_certificado.php?&opcao=part_evento&usu_codigo=<?php echo $registro->USU_CODIGO;?>"><?php echo 'Participação no Ano  '.$registro->PART_ANO;?></a> </td>                     
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
