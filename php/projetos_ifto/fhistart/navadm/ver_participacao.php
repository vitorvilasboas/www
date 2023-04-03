<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['atribuicao']))){
        require('index.php');
    }else{ 
        if($_SESSION['atribuicao']=='admin'){                 
 ?>
<div id="pagina"> 
            <h1 class="titulo1">Meus Certificados!</h1>
            <form class="formulario" method="post" action="">
               <table class="tabelas">
                  <tr>
                    <?php 
                    require 'Connections/conecta.php';
                    $sql=("SELECT usu_codigo, usu_nome, mcso_codigo, mcso_titulo, mcso_condutor FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_NOME ='". strtoupper($_SESSION['nome'])."'");
                    $resultado=$con->banco->Execute($sql);
                    if(isset($resultado)){
                          while($registro=$resultado->FetchNextObject()){        
                    ?>                                
                          <td class="td800"><a href="ver_certificado.php?&opcao=part_minicurso&usu_codigo=<?php echo $registro->USU_CODIGO;?>&mcso_codigo=<?php echo $registro->MCSO_CODIGO;?>"><?php echo $registro->MCSO_TITULO;?></a> </td>                     
                  </tr> 
                   <?php
                          }
                   }else "Você não participou de Nenhum minicurso!";
                         ?>
                </table>
        </form>
</div>              
 <?php 
        }        
   }                 
 ?>
