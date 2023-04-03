<div class="div_home">
    <?php 
        $reqmes=0;
        $reqano=0;
        $reqhoje=0;
        if($_SESSION['on_permissao']=='Avaliador' || $_SESSION['on_permissao']=='Root'){
            include_once 'conecta.php';
            $sql=("select req_tcopias from requisicao where req_status='Impresso' and DAY(req_data)=DAY(NOW())");
            $resultado= $con->banco->Execute($sql);
            while($registros=$resultado->FetchNextObject()){
                $reqhoje = $reqhoje + $registros->REQ_TCOPIAS;
            }
            $sql=("select req_tcopias from requisicao where req_status='Impresso' and MONTH(req_data)=MONTH(NOW())");
            $resultado= $con->banco->Execute($sql);
            while($registros=$resultado->FetchNextObject()){
                $reqmes = $reqmes + $registros->REQ_TCOPIAS;
            }
            $sql=("select req_tcopias from requisicao where req_status='Impresso' and YEAR(req_data)=YEAR(NOW())");
            $resultado= $con->banco->Execute($sql);
            while($registros=$resultado->FetchNextObject()){
                $reqano = $reqano + $registros->REQ_TCOPIAS;
            }
            ?>  <hr>
                <font class="fonte_msg_ok">TOTAL DE REQUISIÇÕES IMPRESSAS</font>
                <p>
                    <font class="fonte_home1">HOJE: </font>
                    <font class="fonte_home2">&nbsp;<?php echo $reqhoje;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    
                    <font class="fonte_home1">NESTE MÊS:  </font>
                    <font class="fonte_home2">&nbsp;<?php echo $reqmes;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                    
                    <font class="fonte_home1">NESTE ANO:  </font>
                    <font class="fonte_home2">&nbsp;<?php echo $reqano;?>&nbsp;</font> 
                </p>
                <hr>
                <br>    
            <?php 
        }
        if(!isset($_REQUEST['acao'])){        
            if($_SESSION['acesso1']=='sim'){
                include 'usuario_alterarsenha.php';
                ?>
                <script>
                    alert('É seu primeiro Acesso!? Altere sua senha...');
                </script>
                <?php
            }
        }
    ?>
    
</div>

