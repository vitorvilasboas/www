<?php
include_once 'Connections/conecta.php';
if ($_REQUEST['opcao']=='part_evento'){
$usuario = $_REQUEST['usu_codigo'];
$part_ano = $_REQUEST['part_ano'];
$sql=("SELECT usu_codigo, usu_nome,part_ano FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO WHERE  USU_CODIGO = '$usuario' and PART_ANO ='$part_ano'") ;
$resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
    $ano=$registro->PART_ANO;
    if($ano=='2013'){
        $data = '27 de Abril de 2013';
    }else if($ano=='2014'){
        $data = '26 de Abril de 2014';
    }else if($ano=='2015'){
        $data = '25 de Abril de 2015';
    }else if($ano=='2016'){
        $data = '16 de Abril de 2016';
    }
?>
<link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
<div id="total">

    <div id="topo1"> </div>
    <div id="topo2">
        <div id="logo1"><img src="imagens/certificado/evento<?php echo $ano; ?>.png" /></div>
        <div id="instituicao">
            <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
            <p>MINISTÉRIO DA EDUCAÇÃO</p>
            <p>SECRETÁRIA DE EDUCAÇÃO TÉCNICA E TECNOLÓGICA</p>
            <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TOCANTINS</p>
            <p>CAMPUS ARAGUATINS</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo_ifto.png" /></div>
    </div>
    <div id="nomeevento">FLISOL <?php echo $ano;?> </div>
    <div id="cert">CERTIFICADO</div>
    
    <div id="conteudo_certificado"> 
             
         <p>Certificamos que <b><?php echo fullUpper($registro->USU_NOME);?></b> Participou do <b>FLISOL <?php echo $ano;?></b>
         com carga horária de 10 horas, que foi realizado no dia <?php echo $data;?> no Instituto Federal de 
         Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Araguatins. </p>   
    
    </div>
    <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano;?>.png" /></div>
    <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano;?>.png" /></div>
    
      
</div>
<?php
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do Flisol";
    
    }
}
else if($_REQUEST['opcao']=='part_minicurso'){
?>


<?php
$sql=("SELECT  usu_codigo,usu_nome ,mcso_codigo, mcso_titulo, mcso_condutor, cert_codigo,mcso_ano
FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO
INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO
INNER JOIN certificados ON CERT_MCSO_CODIGO = MCSO_CODIGO
WHERE USU_CODIGO ='".$_REQUEST['usu_codigo']."' and MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'");
$resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
    $titulo=$registro->MCSO_TITULO;
    $ano=$registro->MCSO_ANO;
    if($ano=='2013'){
        $data = '27 de Abril de 2013';
    }else if($ano=='2014'){
        $data = '26 de Abril de 2014';
    }else if($ano=='2015'){
        $data = '25 de Abril de 2015';
    }else if($ano=='2016'){
        $data = '16 de Abril de 2016';
    }
 
?>
<link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
<div id="total">

    <div id="topo1"> </div>
    <div id="topo2">
        <div id="logo1"><img src="imagens/certificado/evento<?php echo $ano; ?>.png" /></div>
        <div id="instituicao">
            <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
            <p>MINISTÉRIO DA EDUCAÇÃO</p>
            <p>SECRETÁRIA DE EDUCAÇÃO TÉCNICA E TECNOLÓGICA</p>
            <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TOCANTINS</p>
            <p>CAMPUS ARAGUATINS</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo_ifto.png" /></div>
    </div>
    <div id="nomeevento">FLISOL <?php echo $ano;?> </div>
    <div id="cert">CERTIFICADO</div>
    
    <div id="conteudo_certificado"> 
             
         <p>Certificamos que <b><?php echo fullUpper($registro->USU_NOME);?></b> Participou do minicurso 
         <b><?php echo fullUpper($titulo);?></b> no <b> FLISOL <?php echo $ano;?></b> com carga horária de 4 horas, 
         foi realizado no dia  <?php echo $data;?> no Instituto Federal de  Educação Ciência e Tecnologia 
         do Tocantins - <i>campus</i> Araguatins. </p> 
         <br />	
         <br />
        <p>Registro nº <?php echo $registro->CERT_CODIGO;?>/IFTO/Araguatins	</p> 
    
    </div>
    <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano;?>.png" /></div>
    <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano;?>.png" /></div>
       
      
</div>
<?php
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do Flisol";
    
    }
}
else if($_REQUEST['opcao']=='palestrante'){
?>


<?php
$sql=("SELECT  usu_codigo,mcso_codigo, mcso_titulo, mcso_condutor, itp_registro,mcso_ano
FROM itens_palestrantes INNER JOIN usuarios ON ITP_USU_CODIGO = USU_CODIGO
INNER JOIN minicursos ON ITP_MCSO_CODIGO = MCSO_CODIGO
WHERE USU_CODIGO ='".$_REQUEST['usu_codigo']."' and ITP_ANO='".$_REQUEST['itp_ano']."' and MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'");
$resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
    $titulo=$registro->MCSO_TITULO;
    $ano=$registro->MCSO_ANO;
    if($ano=='2013'){
        $data = '27 de Abril de 2013';
    }else if($ano=='2014'){
        $data = '26 de Abril de 2014';
    }else if($ano=='2015'){
        $data = '25 de Abril de 2015';
    }else if($ano=='2016'){
        $data = '16 de Abril de 2016';
    }
    $sqlcount = "select count(itp_mcso_codigo) as soma from itens_palestrantes where itp_mcso_codigo='$registro->MCSO_CODIGO'";
    $resultadoCount=$con->banco->Execute($sqlcount);
    if($registroCount=$resultadoCount->FetchNextObject()){
        if($registroCount->SOMA==1){
            $ministrou = 'ministrou';
        }else if($registroCount->SOMA>1){
           $ministrou = 'ministraram';
        }   
    }
?>
<link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
<div id="total">

    <div id="topo1"> </div>
    <div id="topo2">
        <div id="logo1"><img src="imagens/certificado/evento<?php echo $ano; ?>.png" /></div>
        <div id="instituicao">
            <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
            <p>MINISTÉRIO DA EDUCAÇÃO</p>
            <p>SECRETÁRIA DE EDUCAÇÃO TÉCNICA E TECNOLÓGICA</p>
            <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TOCANTINS</p>
            <p>CAMPUS ARAGUATINS</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo_ifto.png" /></div>
    </div>
    <div id="nomeevento">FLISOL <?php echo $ano;?> </div>
    <div id="cert">CERTIFICADO</div>
    
    <div id="conteudo_certificado"> 
             
         <p>Certificamos que <b><?php echo fullUpper($registro->MCSO_CONDUTOR);?></b> <?php echo $ministrou; ?> o minicurso 
         entitulado de <b><?php echo fullUpper($titulo);?></b> no <b> FLISOL <?php echo $ano;?></b> com carga horária de 4 horas, 
         sendo realizado no dia  <?php echo $data;?> no Instituto Federal de  Educação Ciência e Tecnologia 
         do Tocantins - <i>campus</i> Araguatins. </p> 
         <br />	
         <br />
        <p>Autenticação nº <?php echo $registro->ITP_REGISTRO;?> </p> 
    
    </div>
    <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano;?>.png" /></div>
    <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano;?>.png" /></div>
       
      
</div>
<?php
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do Flisol";
    
    }
}
else if($_REQUEST['opcao']=='organizador'){
?>


<?php
$sql=("SELECT  usu_codigo,usu_nome,ito_ano,ito_registro FROM itens_organizadores INNER JOIN usuarios ON ITO_USU_CODIGO = USU_CODIGO
WHERE USU_CODIGO ='".$_REQUEST['usu_codigo']."' and ITO_ANO='".$_REQUEST['ito_ano']."'");
$resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
    $ano=$registro->ITO_ANO;
    if($ano=='2013'){
        $data = '27 de Abril de 2013';
    }else if($ano=='2014'){
        $data = '26 de Abril de 2014';
    }else if($ano=='2015'){
        $data = '25 de Abril de 2015';
    }else if($ano=='2016'){
        $data = '16 de Abril de 2016';
    }
 
?>
<link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
<div id="total">

    <div id="topo1"> </div>
    <div id="topo2">
        <div id="logo1"><img src="imagens/certificado/evento<?php echo $ano; ?>.png" /></div>
        <div id="instituicao">
            <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
            <p>MINISTÉRIO DA EDUCAÇÃO</p>
            <p>SECRETÁRIA DE EDUCAÇÃO TÉCNICA E TECNOLÓGICA</p>
            <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TOCANTINS</p>
            <p>CAMPUS ARAGUATINS</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo_ifto.png" /></div>
    </div>
    <div id="nomeevento">FLISOL <?php echo $ano;?> </div>
    <div id="cert">CERTIFICADO</div>
    
    <div id="conteudo_certificado"> 
             
         <p>Certificamos que <b><?php echo fullUpper($registro->USU_NOME);?></b> Participou da organização 
         do <b> FLISOL <?php echo $ano;?></b> com carga horária de 20 horas, o evento
         foi realizado no dia  <?php echo $data;?> no Instituto Federal de  Educação Ciência e Tecnologia 
         do Tocantins - <i>campus</i> Araguatins. </p> 
         <br />	
         <br />
        <p>Autenticação nº <?php echo $registro->ITO_REGISTRO;?></p> 
    
    </div>
    <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano;?>.png" /></div>
    <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano;?>.png" /></div>
       
      
</div>
<?php
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do Flisol";
    
    }
}
?>
