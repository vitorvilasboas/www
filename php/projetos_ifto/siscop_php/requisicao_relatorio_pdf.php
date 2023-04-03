<div id="pagina">
<link rel="stylesheet" href="estilo_relatorio.css" type="text/css" media="screen">
<p class="titulo1">Relatório de Requisições - SISCOP</p>
<hr />
<?php

?>
    <table class="tabelas">
        <tr>
            <td colspan="9"> 
                Status de Requisições: <?php echo $_REQUEST['campo_status'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Filtro: <?php echo $_REQUEST['campo_filtro'];
                if($_REQUEST['campo_filtro']=='Por Data' || $_REQUEST['campo_filtro']=='Por Data da Retirada'){
                    ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Período: de <?php echo $_REQUEST['data1'];?> a <?php echo $_REQUEST['data2'];
                }
                $numrec=0;
                $numcopias=0;
                while($opcao->registros2=$opcao->resultado2->FetchNextObject()){
                    $numrec = $numrec + 1;
                }
                ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Nº de Requisições:  <?php echo $numrec;?>
                <?php
                if($_REQUEST['campo_status']=='Impressas'){
                    while($opcao->registros4=$opcao->resultado4->FetchNextObject()){
                        $numcopias = $numcopias + $opcao->registros4->REQ_TCOPIAS;
                    }
                    ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Total de Cópias Impressas:  <?php echo $numcopias;
                }
                ?>               
            </td>
        </tr>
        <?php
            $opcao->registros3=$opcao->resultado3->FetchNextObject();
            if(isset($opcao->registros3->REQ_CODIGO)){
        ?>
        <tr>
            <th class="th40tv">Código</th>
            <th class="th300tv">Requerente</th>
            <th class="th90tv">Departamento</th>
            <th class="th70tv">Status</th>
            <th class="th50tv">Data</th>
            <th class="th50tv">Hora</th>
            <th class="th90tv">Data Retirada</th>
            <th class="th90tv">Total Folhas</th>
            <th class="th130tv">Avaliador</th>
            <!--    <th class="th70tv">Justificativa</th>   -->
            <!--    <th class="th70tv">Arquivo</th>         -->
            <!--    <th class="th70tv">Nº Págs</th>         -->
            <!--    <th class="th70tv">Nº Copias</th>       -->
            <!--    <th class="th70tv">Mensagem</th>        -->
        </tr>
        <?php
            while($opcao->registros=$opcao->resultado->FetchNextObject()){
                $data = date("d/m/Y", strtotime($opcao->registros->REQ_DATA));//Convertendo data para o padrão br
                $hora = date("H:i", strtotime($opcao->registros->REQ_DATA));//Convertendo data para o padrão br
                $datar = date("d/m/Y", strtotime($opcao->registros->REQ_DTENTREGA));//Convertendo data para o padrão br
        ?>   
                <tr>
                    <td class="tdGERAL"><?php echo $opcao->registros->REQ_CODIGO;?></td>
                    <?php
                        $sql=("select * from usuario where usu_codigo=".$opcao->registros->USU_CODIGO);
                        $opcao->resultado4= $opcao->con->banco->Execute($sql);
                        if($opcao->registros4=$opcao->resultado4->FetchNextObject()){
                        ?>
                            <td class="tdGERAL"><?php echo $opcao->registros4->USU_NOME;?></td>
                        <?php 
                        } else {
                        ?>
                            <td class="tdGERAL"></td>
                        <?php
                        }
                    ?>
                    <?php
                        $sql=("select * from departamento where dep_codigo=".$opcao->registros->REQ_DEP);
                        $opcao->resultado5= $opcao->con->banco->Execute($sql);
                        if($opcao->registros5=$opcao->resultado5->FetchNextObject()){
                        ?>
                            <td class="tdGERAL"><?php echo $opcao->registros5->DEP_NOME;?></td>
                        <?php 
                        } else {
                        ?>
                            <td class="tdGERAL"></td>
                        <?php
                        }
                    ?>
                    <td class="tdGERAL"><?php echo $opcao->registros->REQ_STATUS;?></td>
                    <td class="tdGERAL"><?php echo $data;?></td>
                    <td class="tdGERAL"><?php echo $hora;?></td>
                    <td class="tdGERAL"><?php echo $datar;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->REQ_TCOPIAS;?></td>
                    <?php
                        if(isset($opcao->registros->REQ_AUT)){//pegar nome do autorizador... se ele existe na tabela requisicao faça...
                            $sql=("select * from usuario where usu_codigo=".$opcao->registros->REQ_AUT);
                            $opcao->resultado3= $opcao->con->banco->Execute($sql);
                            if($opcao->registros3=$opcao->resultado3->FetchNextObject()){
                            ?>
                                <td class="tdGERAL"><?php echo $opcao->registros3->USU_NOME;?></td>
                            <?php 
                            } else {
                            ?>
                                <td class="tdGERAL"></td>
                            <?php
                            }
                        } else {
                            ?>
                                <td class="tdGERAL"></td>
                            <?php
                        }
                    ?>
                    <!--    <td><?php //echo $opcao->registros->REQ_JUST;?></td>    -->
                    <!--    <td><?php //echo $opcao->registros->REQ_END;?></td>     -->
                    <!--    <td><?php //echo $opcao->registros->REQ_MNPAGS;?></td>  -->
                    <!--    <td><?php //echo $opcao->registros->REQ_MNCOPS;?></td>  -->
                    <!--    <td><?php //echo $opcao->registros->REQ_MSG;?></td>     -->
                </tr>
        <?php
            }   
                ?>
</table>
        <?php           
            } else {
        ?>
            </table>
            <p class="titulo2">Nenhuma requisição encontrada!</p>
        <?php 
        }
        ?>
<hr />
</div>
