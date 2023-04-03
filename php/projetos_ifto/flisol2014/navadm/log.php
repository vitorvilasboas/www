<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
   <div id="pagina">
       <h1 class="titulo1">Logs do Sistema</h1>
       <form class="formulario">
            
            <table class="tabelas">
                        <tr>
                            <th class="th120t">Horário</th>
                            <th class="th120t">Ip</th>
                            <th class="th300t">Nome</th>
                        </tr> 
                   <?php
                   require_once "Connections/conecta.php";
                   $sql = "select log_hora,usu_nome,log_ip from log_sistema inner join  usuarios on usu_codigo=log_usuario order by log_hora desc";
                   $resultado = $con->banco->Execute($sql);
                   while($registro = $resultado->FetchNextObject()){
                   ?> 
                                
                        <tr>

                            <td class="td100"> <?php echo $registro->LOG_HORA;?></td>
                            <td class="td100"><?php echo $registro->LOG_IP;?></td>
                            <td class="td600"> <?php echo $registro->USU_NOME;?></td>

                        </tr>
             
                <?php    
                    }
                ?>
				<?php
                   require_once "Connections/conecta.php";
                   $sql2 = "select log_hora,log_usuario,log_ip from log_sistema where log_ip_reverse = '1' order by log_hora desc";
                   $resultado2 = $con->banco->Execute($sql2);
                   while($registro2 = $resultado2->FetchNextObject()){
                   ?> 
                                
                        <tr>

                            <td class="td100"> <?php echo $registro2->LOG_HORA;?></td>
                            <td class="td100"><?php echo $registro2->LOG_IP;?></td>
                            <td class="td600"> <?php echo $registro2->LOG_USUARIO;?></td>

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