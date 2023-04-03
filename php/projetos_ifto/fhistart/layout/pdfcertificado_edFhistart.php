<?php
include_once 'Connections/conecta.php';
if ($_REQUEST['opcao']=='part_evento'){
    if($_REQUEST['edicao']=='I'){
        $sql=("select * from participante_fhi_i where PART_STATUS='ok' and PART_CPF='".$_REQUEST['cpf']."'");
    } else if($_REQUEST['edicao']=='II'){
        $sql=("select * from participante_fhi_ii where PART_STATUS='ok' and PART_CPF='".$_REQUEST['cpf']."'");
    } else if($_REQUEST['edicao']=='III'){
        $sql=("select * from participante_fhi_iii where PART_STATUS='ok' and PART_CPF='".$_REQUEST['cpf']."'");
    } else {
        header('Location:index.php');
    }
    $resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
    
?>
<link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
<div id="total">
    <div id="topo1"> </div>
    <div id="topo2">
        <div id="logo1"><img src="imagens/certificado/logo1.png" alt="logo1 certificado" /></div>
        <div id="instituicao">
            <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
            <p>MINISTÉRIO DA EDUCAÇÃO</p>
            <p>SECRETÁRIA DE EDUCAÇÃO TÉCNICA E TECNOLÓGICA</p>
            <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TOCANTINS</p>
            <p>CAMPUS ARAGUATINS</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo2.png" alt="logo2 certificado" /></div>
    </div>
    <div id="nomeevento"><?php echo $_REQUEST['edicao']?> FHISTART</div>
    <div id="cert">CERTIFICADO</div>
    <div id="conteudo_certificado"> 
         <?php 
            if($_REQUEST['edicao']=='I'){
            ?>
                <p>Certificamos que <b><?php echo strtoupper($registro->PART_NOME);?></b> portador(a) do CPF nº <b><?php echo strtoupper($registro->PART_CPF);?></b> participou do <b><?php echo $_REQUEST['edicao']?> FHISTART</b>
                    - Festival de História e Arte, realizado no ano de <?php echo $_REQUEST['ano']?>, no IFTO - Campus Araguatins
                    na qualidade de integrante da <b><?php echo strtoupper($registro->PART_CONDICAO);?></b> com carga horária de <b><?php echo strtoupper($registro->PART_CH);?></b> horas.  
                </p>
            <?php
            } else if($_REQUEST['edicao']=='II'){
            ?>
                <p>Certificamos que <b><?php echo strtoupper($registro->PART_NOME);?></b> portador(a) do CPF nº <b><?php echo strtoupper($registro->PART_CPF);?></b> participou do <b><?php echo $_REQUEST['edicao']?> FHISTART</b>
                    - Festival de História e Arte, realizado no ano de <?php echo $_REQUEST['ano']?>, no IFTO - Campus Araguatins
                    na qualidade de <b><?php echo strtoupper($registro->PART_CONDICAO);?></b> com carga horária de <b><?php echo strtoupper($registro->PART_CH);?></b> horas.  
                </p>
            <?php        
            } else if($_REQUEST['edicao']=='III'){
            ?>
                <p>Certificamos que <b><?php echo strtoupper($registro->PART_NOME);?></b> portador(a) do CPF nº <b><?php echo strtoupper($registro->PART_CPF);?></b> participou do <b><?php echo $_REQUEST['edicao']?> FHISTART</b>
                    - Festival de História e Arte, realizado no ano de <?php echo $_REQUEST['ano']?>, no IFTO - Campus Araguatins
                    na qualidade de <b><?php echo strtoupper($registro->PART_CONDICAO);?></b> com carga horária de <b><?php echo strtoupper($registro->PART_CH);?></b> horas.  
                </p>
            <?php    
            }
         ?>          
    </div>
    <div id="assinaturas"> </div>
    <div id="patrocinadores"></div>    
</div>
<?php
} else {
    echo "Você não participou da Edição ".$_REQUEST['edicao']." do FHISTART.";
    }
}
?>