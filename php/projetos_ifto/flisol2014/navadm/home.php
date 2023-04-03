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
        <form class="tipoincricao" action="usuadm.php?pa=home_acao&acao=gravar_incluir" method="post">
            <fieldset>
                <legend class="titulo3">Escolha um dos  tipos de opções de Participação</legend>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição Gratuita" checked="enabled"/>
                        Inscrição Gratuita - Você poderá participar do evento, sem receber certificado de participação.
                    </label>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição com 1 (um) minicurso do evento e certificado de participação" />
                        Inscrição R$ 5,00 - Você poderá participar de 1 (um) minicurso do evento e receber certificado de participação.
                    </label>
                    <label>
                        <input class="radio_in" type="radio" name ="tipopart" value="Inscrição com 2 (dois) minicursos do evento e certificado de participação" />
                        Inscrição R$ 10,00 - Você poderá participar de 2 (dois) minicursos do evento e receber certificado de participação.
                    </label>
					
                    <br />
                    <input class="btn" type="submit" name="enviar" value="Enviar" />
                    <br />
            </fieldset>
        </form>
        <br />
        <table  width="400" border='1' cellspacing="0">
            <tr>
                <th class="th100t"> Total</th><th class="th300t">Modalidade de inscrição</th>
            </tr>
             <?php
                    $sql = "SELECT   count(tp_usuario) as total, tp_inscricao,tp_ano FROM   tp_inscricao where tp_ano = '".date('Y')."'  GROUP BY   tp_inscricao";
                    $resultado = $con->banco->Execute($sql); 	
                    while($registros = $resultado->FetchNextObject())
                    {
             
             ?>
            <tr>
              <th class="td100"><?php echo $registros->TOTAL;?></th><th class="td300"><?php echo $registros->TP_INSCRICAO;?></th>  
            </tr>
            <?php
             
                    }
                    
            ?>

            <tr>
                <th class="th100t" colspan="2"> Total de inscritos</th>
            </tr>
            <?php
                    $sql = "SELECT   count(tp_usuario) as total FROM   tp_inscricao  where  tp_ano =".date('Y');
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