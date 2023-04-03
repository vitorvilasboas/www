<link rel="stylesheet" type="text/css" href="estilo_comprovante_inscricao.css" type="text/css" media="screen"/>
<?php require "Connections/conecta.php"; ?>
<div id="total">
    <div id="topo1"> </div>
    <div id="cert">Comprovante de Inscrição de Equipe</div>
    <div id="nomeevento">III FHISTART</div>
    <div id="conteudo_certificado">
        <h2 class="titulo1">Identificação da Equipe:</h2>
        <?php
        //if(($_SESSION['int_eqp_codigo2']!=NULL)){
            $sql=("select * from equipe where eqp_codigo=".$_SESSION['int_eqp_codigo']);
            $resultado5 = $con->banco->Execute($sql);
            if($registros3 = $resultado5->FetchNextObject()){
                ?>
        <p class="titulo2">
                Curso/Periodo: <font color=#bb404d> <?php echo $registros3->EQP_CURSO.' / '.$registros3->EQP_PERIODO.' Período';?></font><br>
                Temática: <font color=#bb404d><?php echo $registros3->EQP_TEMATICA?></font><br>
                Professor Representante: <font color=#bb404d><?php echo $registros3->EQP_PROFESSOR?></font><br>
                Título do Vídeo: <font color=#bb404d><?php echo $registros3->EQP_VIDEO?></font><br>
                Título da Música: <font color=#bb404d><?php echo $registros3->EQP_MUSICA?></font><br>
                Autor da Música: <font color=#bb404d><?php echo $registros3->EQP_AUTOR_MUS?></font><br>
                <?php
                $numint=0;
                $sql_INT=("select * from integrante where int_eqp_codigo=".$_SESSION['int_eqp_codigo']);
                $resultado = $con->banco->Execute($sql_INT);
                while($registros_int = $resultado->FetchNextObject())
                    $numint = $numint + 1;
                ?>
                Número de Integrantes: <font color=#bb404d><?php echo $numint?></font>
        </p>
                <h2 class="titulo1">Membros da Equipe:</h2>
                <table class="tabelas">
                    <tr>
                        <th class="th400tv">Nome</th>
                        <th class="th200tv">Atribuição</th>
                        <th class="th300tv">Curso</th>
                        <th class="th75tv">Período</th>
                    </tr>
                <?php
                $resultado2 = $con->banco->Execute($sql_INT);
                while($registros_int = $resultado2->FetchNextObject()){
                ?>
                    <tr>
                        <td class="tdGERAL"><?php echo $registros_int->INT_NOME;?></td>
                        <td class="tdGERAL"><?php echo $registros_int->INT_ATRIBUICAO;?></td>
                        <td class="tdGERAL"><?php echo $registros_int->INT_CURSO;?></td>
                        <td class="tdGERAL"><?php echo $registros_int->INT_PERIODO;?></td>                
                    </tr>
                <?php
                }
                ?>
                <?php   /*
                while($opcao->registros=$opcao->resultado->FetchNextObject()){
                    $data = date("d/m/Y", strtotime($opcao->registros->REQ_DATA));//Convertendo data para o padrão br
                    $hora = date("H:i", strtotime($opcao->registros->REQ_DATA));//Convertendo data para o padrão br
                    $datar = date("d/m/Y", strtotime($opcao->registros->REQ_DTENTREGA));//Convertendo data para o padrão br     */
                ?>   
                </table>        
        <?php
        }
        ?>
    </div>
    <!--<div id="assinaturas"></div>-->
    <div id="patrocinadores"></div>
</div>  
        
