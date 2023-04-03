<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 

    require_once 'Connections/config.php';
    $sql = 'select usu_codigo,usu_nome from usuarios inner join caixa on part_usu_codigo = usu_codigo where part_ano = 2016';                        

    try{
        $query= $conecta->prepare($sql);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);	
     }catch(PDOexception $error_noticias){
         echo 'Erro ao selecionar noticias';
     } 
     //print_r($resultado);
        ?>
<div id="pagina">
    <div id="sorteiogeral">
        <div id="esquerda"> 
            <h1>Sorteio</h1>
              <div class="sorteiobarra">
                    
                <!-- Progress bar holder -->
                <div id="progress" class="sorteiostatus"></div>
                <!-- Progress information -->
                <div id="information" style="width"></div>
                <?php
                // Total processes
                $total = 10;

                // Loop through process
                for($i=1; $i<=$total; $i++){
                // Calculate the percentation
                $percent = intval($i/$total * 100)."%";

                // Javascript for updating the progress bar and information
                echo '<script language="javascript">
                document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ff3333;\">&nbsp;</div>";
                document.getElementById("information").innerHTML="Aguarde.. '.$i.'  segundos.";
                </script>';

                // This is for the buffer achieve the minimum size in order to flush data
                echo str_repeat(' ',1024*64);

                // Send output to browser immediately
                flush();

                // Sleep one second so we can see the delay
                sleep(1);
            }

            // Tell user that the process is completed
            echo '<script language="javascript">document.getElementById("information").innerHTML="O Sorteado foi:"</script>';
            
            ?>
                
        </div>
            <?php $id = array_rand($resultado); ?>
            <div class="sorteiocodigo">
            <?php echo $resultado[$id]['usu_codigo']; ?>    
            </div>
            <div class="sorteionome"><?php echo $resultado[$id]['usu_nome']; ?></div>        
    </div>
    </div>
</div>        
 <?php }} ?>
