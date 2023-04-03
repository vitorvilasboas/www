<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>
<div id="pagina">                                                      
            <form class="inscricao" method="post" action="">
               <h1>Meus Certificados!</h1>
               <table width="100%">
                          <tr>
                <?php 
                    require 'Connections/conecta.php';
                   $sql=("SELECT usu_codigo,usu_status, usu_nome, mcso_codigo, mcso_titulo, mcso_condutor FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_NOME ='". strtoupper($_SESSION['nome'])."' and USU_STATUS='confirmado'");
                   $resultado=$con->banco->Execute($sql);
                   if(isset($resultado)){
                          while($registro=$resultado->FetchNextObject()){        
                ?>
                
                                
                                <td class="td600"><a href="ver_certificado.php?&usu_codigo=<?php echo $registro->USU_CODIGO;?>&mcso_codigo=<?php echo $registro->MCSO_CODIGO;?>"><?php echo $registro->MCSO_TITULO;?></a> </td>                     
                          </tr> 
                         <?php
                            }
                   }else "Você não participou de Nenhum minicurso!";
                         ?>
                </table>
               
</div>              
 <?php 
        }        
   }                 
 ?>
