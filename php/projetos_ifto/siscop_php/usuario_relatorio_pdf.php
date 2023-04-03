<div id="pagina">
<link rel="stylesheet" href="estilo_relatorio.css" type="text/css" media="screen">
<p class="titulo1">Relatório de Usuários - SISCOP</p>
<hr />
<?php

?>
    <table class="tabelas">
        <tr>
            <td colspan="10"> 
                Filtro: <?php echo $_REQUEST['campo_filtro'];
                if($_REQUEST['campo_filtro']=='Por Departamento'){
                    if(($_REQUEST['campo_info1']!="") && ($_REQUEST['campo_info1']!=" ")){
                    ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Código do Departamento: <?php echo $_REQUEST['campo_info1'];
                    
                    } else if(($_REQUEST['campo_info2']!="") && ($_REQUEST['campo_info2']!=" ")){
                    ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Nome do Departamento: <?php echo $_REQUEST['campo_info2'];
                    }
                    
                }
                $num_users=0;
                while($opcao->registros2=$opcao->resultado2->FetchNextObject()){
                    $num_users = $num_users + 1;
                }
                ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Total de Usuários:  <?php echo $num_users;?>               
            </td>
        </tr>
        <?php
            $opcao->registros3=$opcao->resultado3->FetchNextObject();
            if(isset($opcao->registros3->USU_CODIGO)){
        ?>
        <tr>
            <th class="th40tv">Código</th>
            <th class="th200tv">Nome</th>
            <th class="th90tv">CPF</th>
            <th class="th70tv">Lotação</th>
            <th class="th50tv">SIAPE</th>
            <th class="th50tv">Perfil</th>
            <th class="th50tv">Cargo/Área</th>
            <th class="th90tv">Função</th>
            <th class="th70tv">Permissão</th>
            <th class="th70tv">Impressões</th>
        </tr>
        <?php
            while($opcao->registros=$opcao->resultado->FetchNextObject()){
        ?>   
                <tr>
                    <td class="tdGERAL"><?php echo $opcao->registros->USU_CODIGO;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->USU_NOME;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->USU_CPF;?></td>
                    
                    <?php
                        $sql=("select * from departamento where dep_codigo=".$opcao->registros->DEP_CODIGO);
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
                     <td class="tdGERAL"><?php echo $opcao->registros->USU_SIAPE;?></td>
                   <?PHP         
                        if($opcao->registros->ADM_CODIGO!=""){
                            $sql=("select * from administrativo where adm_codigo=".$opcao->registros->ADM_CODIGO);
                            $opcao->resultado5= $opcao->con->banco->Execute($sql);
                            if($opcao->registros5=$opcao->resultado5->FetchNextObject()){
                            ?>
                                <td class="tdGERAL"><?php echo 'TAE';?></td>
                                <td class="tdGERAL"><?php echo $opcao->registros5->ADM_CARGO;?></td>
                            <?php 
                            } else {
                            ?>
                                <td class="tdGERAL"></td>
                                <td class="tdGERAL"></td>
                            <?php
                            }
                        } else if($opcao->registros->PROF_CODIGO!=""){
                            $sql=("select * from professor where prof_codigo=".$opcao->registros->PROF_CODIGO);
                            $opcao->resultado5= $opcao->con->banco->Execute($sql);
                            if($opcao->registros5=$opcao->resultado5->FetchNextObject()){
                            ?>
                                <td class="tdGERAL"><?php echo 'Professor';?></td>
                                <td class="tdGERAL"><?php echo $opcao->registros5->PROF_AREA;?></td>
                            <?php 
                            } else {
                            ?>
                                <td class="tdGERAL"></td>
                                <td class="tdGERAL"></td>
                            <?php
                            }
                        } else {
                            ?>
                                <td class="tdGERAL"></td>
                                <td class="tdGERAL"></td>
                            <?php
                        }
                    ?>
                    <td class="tdGERAL"><?php echo $opcao->registros->USU_FUNCAO;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->USU_PERMISSAO;?></td>
                    <?php
                        $numrec=0;
                        $sql=("select * from requisicao where usu_codigo=".$opcao->registros->USU_CODIGO." and req_status='Impresso'");
                        $opcao->resultado4= $opcao->con->banco->Execute($sql);
                        while($opcao->registros4=$opcao->resultado4->FetchNextObject()){
                            $numrec = $numrec + $opcao->registros4->REQ_TCOPIAS;
                        }
                    ?>
                    <td class="tdGERAL"><?php echo $numrec;?></td>
                </tr>
        <?php
            }   
                ?>
</table>
        <?php           
            } else {
        ?>
            </table>
            <p class="titulo2">Nenhum usuário encontrado!</p>
        <?php 
        }
        ?>
<hr />
</div>
