<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){
            require('Connections/conecta.php');
 ?>

    <div id="pagina">
        <h1 class="titulo1">Inicio</h1>
        <br />        
 
        <br />
        <table  width="400" border='1' cellspacing="0">
        

            <tr>
                <th class="th100t" colspan="2"> Total de inscritos</th>
            </tr>
            <?php
                    $sql = "SELECT   count(usu_codigo) as total from usuarios";
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
        }
    }
 ?>