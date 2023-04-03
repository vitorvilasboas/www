<?php 
    //@session_start();     
    if(isset($_SESSION['cpf'])&&isset($_SESSION['senha'])&&$_SESSION['nivel']=='admin'){
        require('Connections/conecta.php');
 ?>

    <div id="pagina">
        <h1 class="titulo1">Inicio</h1>
        <br />        
 
        <br />
        <table  width="400" border='1' cellspacing="0">
            <tr>
                <th class="th300t">Total de Inscritos</th>
            </tr>
             <?php
                    $sql = "SELECT   count(*) as total FROM   usuarios";
                    $resultado = $con->banco->Execute($sql); 	
                    while($registros = $resultado->FetchNextObject())
                    {
             
             ?>
            <tr>
              <th class="td100"><?php echo $registros->TOTAL;?></th>  
            </tr>
            <?php
             
                    }
                    
            ?>

            <tr>
                <th class="th100t" colspan="2"> Total de credenciados</th>
            </tr>
            <?php
                    $sql = "SELECT   count(part_usu_codigo) as total FROM   caixa  where  part_ano =".date('Y');
                    $resultado = $con->banco->Execute($sql);
                    foreach($resultado as $chave => $linha){
                        


             ?>
            <tr>
              <th class="td100" colspan="2"><?php echo $valor = $linha['total'];?></th>  
            </tr>
            <?php
                   }
            ?>
            
        </table>
    </div>

<?php
        }else{
            echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        }
    
 ?>