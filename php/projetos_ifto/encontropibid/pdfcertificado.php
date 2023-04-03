<?php
include_once 'Connections/conecta.php';

if($_REQUEST['opcao']=='part_evento'){

   $sql= "select usu_nome from usuarios where USU_STATUS='confirmado' and USU_CODIGO =".$_REQUEST['usu_codigo'] ;
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
                    <p>III ENCONTRO DO PIBID DO IFTO</p>
                </div>
            <div id="logo2"><img src="imagens/certificado/logo2.png" /></div>
        </div>
        <div id="nomeevento">III ENCONTRO DO PIBID DO IFTO </div>
        <div id="cert">CERTIFICADO</div>
    
        <div id="conteudo_certificado"> 
             
            <p>Certificamos que <b><?php echo strtoupper($registro->USU_NOME);?></b> Participou do <b>III Encontro do PIBID do IFTO</b>
            com carga horária de 24 horas, que foi realizado nos dias 04 e 05 de Dezembro de 2014 no Instituto Federal de 
             Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Araguatins. </p>   
    
        </div>
        <div id="assinaturas"> </div>
        <div id="patrocinadores"></div>
    
      
    </div>
<?php
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do evento";
    
    }
}else if($_REQUEST['opcao']=='part_minicurso'){

    $sql=("SELECT  cert_codigo, usu_nome , mcso_titulo, mcso_condutor
            FROM certificados INNER JOIN usuarios ON CERT_USU_CODIGO = USU_CODIGO
            INNER JOIN minicursos ON CERT_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO ='".$_REQUEST['usu_codigo']."' and MCSO_CODIGO ='".$_REQUEST['mcso_codigo']."' order by CERT_CODIGO");
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
                    <p>III ENCONTRO DO PIBID DO IFTO</p>
                </div>
            <div id="logo2"><img src="imagens/certificado/logo2.png" /></div>
        </div>
        <div id="nomeevento">III ENCONTRO DO PIBID DO IFTO </div>
        <div id="cert">CERTIFICADO</div>
    
        <div id="conteudo_certificado"> 
             
            <p>Certificamos que <b><?php echo strtoupper($registro->USU_NOME);?></b> participou do minicurso <b><?php echo strtoupper($registro->MCSO_TITULO);?></b>
             ministrado por <b><?php echo strtoupper($registro->MCSO_CONDUTOR);?></b> no <b>III Encontro do PIBID do IFTO</b>
            com carga horária de 4 horas, que foi realizado nos dias 04 e 05 de Dezembro de 2014 no Instituto Federal de 
             Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Araguatins. </p>
            <br />
            <p>Protocolo/IFTO/ARAGUATINS Nº <b><?php echo $registro->CERT_CODIGO;?></b></p>
    
        </div>
        <div id="assinaturas"> </div>
        <div id="patrocinadores"></div>
    
      
    </div>
<?php
}    
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do evento";
    
    }
?>
