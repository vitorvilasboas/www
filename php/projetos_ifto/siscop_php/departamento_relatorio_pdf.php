<div id="pagina">
<link rel="stylesheet" href="estilo_relatorio.css" type="text/css" media="screen">
<p class="titulo1">Relatório de Departamentos - SISCOP</p>
<hr />
<?php

?>
    <table class="tabelas">
        <tr>
            <td colspan="6"> 
                Filtro: Todos
                <?php
                $num_deps=0;
                while($opcao->registros2=$opcao->resultado2->FetchNextObject()){
                    $num_deps = $num_deps + 1;
                }
                ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Total de Departamentos:  <?php echo $num_deps;?>               
            </td>
        </tr>
        <?php
            $opcao->registros3=$opcao->resultado3->FetchNextObject();
            if(isset($opcao->registros3->DEP_CODIGO)){
        ?>
        <tr>
            <th class="th40tv">Código</th>
            <th class="th90tv">Nome</th>
            <th class="th300tv">Descrição</th>
            <th class="th90tv">Vínculo</th>
            <th class="th200tv">Instituição</th>
            <th class="th90tv">Qtd Usuários</th>
        </tr>
        <?php
            while($opcao->registros=$opcao->resultado->FetchNextObject()){
        ?>   
                <tr>
                    <td class="tdGERAL"><?php echo $opcao->registros->DEP_CODIGO;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->DEP_NOME;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->DEP_DESCRICAO;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->DEP_VINCULO;?></td>
                    <td class="tdGERAL"><?php echo $opcao->registros->DEP_INSTITUICAO;?></td>
                    <?php
                        $numusu=0;
                        $sql=("select * from usuario where dep_codigo=".$opcao->registros->DEP_CODIGO);
                        $opcao->resultado4= $opcao->con->banco->Execute($sql);
                        while($opcao->registros4=$opcao->resultado4->FetchNextObject()){
                            $numusu = $numusu + 1;
                        }
                    ?>
                    <td class="tdGERAL"><?php echo $numusu;?></td>
                </tr>
        <?php
            }   
                ?>
</table>
        <?php           
            } else {
        ?>
            </table>
            <p class="titulo2">Nenhum departamento encontrado!</p>
        <?php 
        }
        ?>
<hr />
</div>
