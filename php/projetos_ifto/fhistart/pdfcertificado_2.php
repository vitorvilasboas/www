<?php
include_once 'Connections/conecta.php';
$sql=("select usu_nome from usuarios where USU_STATUS='confirmado' and USU_CPF='".$_REQUEST['cpf']."' and USU_DATA_NASC='".$_REQUEST['usu_data_nasc']."'");
$resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
?>
<link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
<div id="total">

    <div id="topo1"> </div>
    <div id="topo2">
        <div id="logo1"><img src="imagens/certificado/logo1.png" /></div>
        <div id="instituicao">
            <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
            <p>MINISTÉRIO DA EDUCAÇÃO</p>
            <p>SECRETÁRIA DE EDUCAÇÃO TÉCNICA E TECNOLÓGICA</p>
            <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TOCANTINS</p>
            <p>PIBID - PROGRAMA INSTITUCIONAL DE BOLSAS DE INICIAÇÃO A DOCÊNCIA</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo2.png" /></div>
    </div>
    <div id="nomeevento">I ENCONTRO DO PIBID DO IFTO </div>
    <div id="cert">CERTIFICADO</div>
    
    <div id="conteudo_certificado"> 
             
         <p>Certificamos que <b><?php echo strtoupper($registro->USU_NOME);?></b> Participou do <b>I Encontro do PIBID do IFTO</b>
         com carga horária de 30 horas, que foi realizado nos dias 30/11 e 01/12 de 2012 no Instituto Federal de 
         Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Palmas. </p>   
    
    </div>
    <div id="assinaturas"> </div>
    <div id="patrocinadores"></div>
    
      
</div>
<?php
}
else {
    echo "Você não Participur do I Encontro do PIBID-IFTO";
    
    }
?>
