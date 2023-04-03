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
                          <td class="td800"><a href="ver_certificado.php?&opcao=part_minicurso&usu_codigo=<?php echo $registro->USU_CODIGO;?>&mcso_codigo=<?php echo $registro->MCSO_CODIGO;?>&itp_ano=<?php echo $registro->MCSO_ANO ?>"><?php echo $registro->MCSO_TITULO.' - Ano: '.$registro->MCSO_ANO;?></a> </td>                     
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
                <br />
                <table class="tabelas">
                    <tr>
                        <th class="titulo1"> Certificado de Premiação</th>     
                    </tr>
                    <tr>                      
                        <?php 
                        $cpf=$_SESSION['cpf'];
                        $sql=("SELECT distinct art_codigo ,id_submissao,titulo,even_ano from artigos INNER JOIN notas ON not_art_codigo = id_submissao inner join eventos on art_even_codigo = even_codigo inner join artigos_premiados on artp_id_submissao = id_submissao where cpf_autor1 = '$cpf' or cpf_autor2 = '$cpf' or cpf_autor3 = '$cpf' or cpf_autor4 = '$cpf' or cpf_autor5 = '$cpf' or cpf_autor6 = '$cpf'");
                        $resultado=$con->banco->Execute($sql);
                        while($registro=$resultado->FetchNextObject()){        
                        ?>                                
                        <td class="td800"><a href="ver_certificado.php?&opcao=premiacao&usu_cpf=<?php echo $cpf;?>&id_submissao=<?php echo $registro->ID_SUBMISSAO; ?>&art_ano=<?php echo $registro->EVEN_ANO;?>"><?php echo 'artigo:  '.$registro->ID_SUBMISSAO.' - '.$registro->TITULO;?></a> </td>                     
                    </tr> 
                       <?php
                       }
                  ?>
                </table>
                <br />
                <table class="tabelas">
                    <tr>
                        <th class="titulo1"> Certificado de Apresentação de Trabalho</th>     
                    </tr>
                    <tr>                      
                        <?php 
                        $cpf=$_SESSION['cpf'];
                        $sql=("SELECT distinct art_codigo ,id_submissao,titulo,even_ano from artigos INNER JOIN notas ON not_art_codigo = id_submissao inner join eventos on art_even_codigo = even_codigo where cpf_autor1 = '$cpf' or cpf_autor2 = '$cpf' or cpf_autor3 = '$cpf' or cpf_autor4 = '$cpf' or cpf_autor5 = '$cpf' or cpf_autor6 = '$cpf'");
                        $resultado=$con->banco->Execute($sql);
                        while($registro=$resultado->FetchNextObject()){        
                        ?>                                
                        <td class="td800"><a href="ver_certificado.php?&opcao=artigos&usu_cpf=<?php echo $cpf;?>&id_submissao=<?php echo $registro->ID_SUBMISSAO; ?>&art_ano=<?php echo $registro->EVEN_ANO;?>"><?php echo 'artigo:  '.$registro->ID_SUBMISSAO.' - '.$registro->TITULO;?></a> </td>                     
                    </tr>  
                       <?php
                       }
                  ?>
                </table>
                <br />
                <table class="tabelas">
                    <tr>
                        <th class="titulo1"> Certificado de publicação nos anais do evento</th>     
                    </tr>
                    <tr>                      
                        <?php 
                        $cpf=$_SESSION['cpf'];
                        $sql=("SELECT distinct art_codigo ,id_submissao,titulo,even_ano from artigos INNER JOIN notas ON not_art_codigo = id_submissao inner join eventos on art_even_codigo = even_codigo where cpf_autor1 = '$cpf' or cpf_autor2 = '$cpf' or cpf_autor3 = '$cpf' or cpf_autor4 = '$cpf' or cpf_autor5 = '$cpf' or cpf_autor6 = '$cpf'");
                        $resultado=$con->banco->Execute($sql);
                        while($registro=$resultado->FetchNextObject()){        
                        ?>                                
                        <td class="td800"><a href="ver_certificado.php?&opcao=anais&usu_cpf=<?php echo $cpf;?>&id_submissao=<?php echo $registro->ID_SUBMISSAO; ?>&art_ano=<?php echo $registro->EVEN_ANO;?>"><?php echo 'artigo:  '.$registro->ID_SUBMISSAO.' - '.$registro->TITULO;?></a> </td>                     
                    </tr>  
                       <?php
                       }
                  ?>
                </table>
                <br />
                <table class="tabelas">
                    <tr>
                        <th class="titulo1"> Certificado de Avaliadores</th>     
                    </tr>
                    <tr>                      
                        <?php 
                        $usuario=$_SESSION['codigo'];
                        $sql=("SELECT art_codigo,usu_nome,id_submissao,titulo,even_ano from artigos INNER JOIN notas ON not_art_codigo = id_submissao inner join eventos on art_even_codigo = even_codigo inner join usuarios on usu_codigo = not_usu_codigo where usu_codigo ='$usuario'");
                        $resultado=$con->banco->Execute($sql);
                        while($registro=$resultado->FetchNextObject()){        
                        ?>                                
                        <td class="td800"><a href="ver_certificado.php?&opcao=avaliadores&usu_codigo=<?php echo $usuario;?>&id_submissao=<?php echo $registro->ID_SUBMISSAO; ?>&art_ano=<?php echo $registro->EVEN_ANO;?>"><?php echo 'artigo:  '.$registro->ID_SUBMISSAO.' - '.$registro->TITULO;?></a> </td>                     
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
