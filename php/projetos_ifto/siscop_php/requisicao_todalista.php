<div id="pagina">
    <?php
        $opcao->registros2=$opcao->resultado2->FetchNextObject();
        if(isset($opcao->registros2->REQ_CODIGO)){
        ?>
    <center><font class="fonte_titulos"><b>Todas as Requisições</b></font></center>
    
    <table class="minha_tabela" border="1" cellpadding="1px" cellspacing="0px">
        <div>
        <tr class="minha_linha_titulo" cellpadding="5px" height="30px">
            <td>Cód.</td>
            <td>Requerente</td>
            <td>Lotação</td>
            <td>Data/Hora Requisição</td>
            <td>Data da Retirada</td>
            <td>Status</td>
            <td></td>
        </tr>
        <?php
        while($opcao->registros=$opcao->resultado->FetchNextObject()){
        ?>
            <input type="hidden" name="req_codigo" value="<?php echo $opcao->registros->REQ_CODIGO;?>"/>
            <tr class="minha_linha" height="30px">
                <?php $data = date("d/m/Y H:i:s", strtotime($opcao->registros->REQ_DATA));?><!-- Convertendo data para o padrão br-->
                <?php $datar = date("d/m/Y", strtotime($opcao->registros->REQ_DTENTREGA));?><!-- Convertendo data para o padrão br-->
                <td class="minha_coluna" width="50px"><?php echo $opcao->registros->REQ_CODIGO;?></td>
                <?php
                        $sql=("select * from usuario where usu_codigo=".$opcao->registros->USU_CODIGO);
                        $opcao->resultado3= $opcao->con->banco->Execute($sql);
                        if($opcao->registros3=$opcao->resultado3->FetchNextObject()){
                ?> 
                            <td class="minha_coluna"><?php echo $opcao->registros3->USU_NOME;?></td>
                            <?php
                            $sql1=("select * from departamento where dep_codigo=".$opcao->registros3->DEP_CODIGO);
                            $opcao->resultado4= $opcao->con->banco->Execute($sql1);
                            if($opcao->registros4=$opcao->resultado4->FetchNextObject()){
                            ?> 
                                        <td class="minha_coluna" width="80px"><?php echo $opcao->registros4->DEP_NOME;?></td>
                            <?php
                                } else {
                            ?>
                                    <td class="minha_coluna"></td>  
                            <?php
                                }
                            ?>        
                <?php
                    } else {
                ?>
                        <td class="minha_coluna"></td>  
                <?php
                    }
                ?>
                <td class="minha_coluna" width="100px"><?php echo $data;?></td><!-- Mostra data convertida para pt -->
                <td class="minha_coluna" width="80px"><?php echo $datar;?></td>
                <td class="minha_coluna" width="150px"><?php echo $opcao->registros->REQ_STATUS;?></td>
                <td class="minha_coluna"><a href="principal.php?p=requisicao&acao=detalhes&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button_det detalhes submit" value="Detalhes"></a></td>
            </tr>
        <?php
        }
        ?>
            </div>
    </table>
    <?php
        }
            else {
                ?>
    <br><br>
                <center><font class="fonte_titulos"><b>Nenhuma requisição encontrada!</b></font></center>
                <?php
            }
        ?>
</div>