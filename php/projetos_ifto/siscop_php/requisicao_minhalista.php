<div id="pagina">
    <?php
        if(($opcao->registros2=$opcao->resultado2->FetchNextObject())){
        ?>
    <center><font class="fonte_titulos"><b>Minhas Requisições</b></font></center>
    <table class="minha_tabela" border="1" cellpadding="1px" cellspacing="0px">
        <div>
        <tr class="minha_linha_titulo" cellpadding="5px" height="30px">
            <td>Cód.</td>
            <td>Data/Hora da Requisição</td>
            <td>Data da Retirada</td>
            <td>Total de Folhas</td>
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
                <td class="minha_coluna" width="100px"><?php echo $data;?></td><!-- Mostra data convertida para pt -->
                <td class="minha_coluna" width="150px"><?php echo $datar;?></td>
                <td class="minha_coluna" width="90px"><?php echo $opcao->registros->REQ_TCOPIAS;?></td>
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
                <center><font class="fonte_titulos"><b>Nenhuma Requisição Cadastrada!</b></font></center>
                <?php
            }
        ?>
</div>
