<?php
include_once 'Connections/conecta.php';
if ($_REQUEST['opcao']=='part_evento'){
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
            <p>CAMPUS ARAGUATINS</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo2.png" /></div>
    </div>
    <div id="nomeevento">FLISOL 2013 </div>
    <div id="cert">CERTIFICADO</div>
    
    <div id="conteudo_certificado"> 
             
         <p style="text-align: justify;">Certificamos que <b>LUZIA MATOS LIMA, ELVIRA APARECIDA SIMÕES DE ARAÚJO</b> apresentaram trabalho no <b>FLISOL 2013</b> na modalidade 
             de <b>APRESENTAÇÃO ORAL</b>, com o título <b>"O INSTITUTO FEDERAL DO TOCANTINS E OS DESAFIOS DO DESENVOLVIMENTO SUSTENTÁVEL NA REGIÃO BICO DO PAPAGAIO NO TOCANTINS"</b>.
          O evento foi realizado no 27 de Abril de 2013 no Instituto Federal de 
          Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Araguatins. 
         </p> 
         <br />
         <p>REGISTRO N° 91 ARAGUATINS/IFTO</p>
    
    </div>
    <div id="assinaturas"> </div>
    <div id="patrocinadores"></div>
    
      
</div>
<?php
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do Flisol 2013";
    
    }
}
else if($_REQUEST['opcao']=='part_minicurso'){
?>


<?php
$sql=("SELECT  usu_codigo,usu_nome ,mcso_codigo, mcso_titulo, mcso_condutor
FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO
INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO
WHERE USU_CODIGO ='".$_REQUEST['usu_codigo']."' and MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'");
$resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
    $titulo=$registro->MCSO_TITULO;
 
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
            <p>CAMPUS ARAGUATINS</p>
        </div>
        <div id="logo2"><img src="imagens/certificado/logo2.png" /></div>
    </div>
    <div id="nomeevento">FLISOL 2013 </div>
    <div id="cert">CERTIFICADO</div>
    
    <div id="conteudo_certificado"> 
             
         <p>Certificamos que <b><?php echo strtoupper($registro->USU_NOME);?></b> Participou do minicurso 
         <b><?php echo strtoupper($titulo);?></b> no <b> FLISOL 2013</b> com carga horária de 4 horas, 
         foi realizado no dia  27 de Abril de 2013 no Instituto Federal de  Educação Ciência e Tecnologia 
         do Tocantins - <i>campus</i> Araguatins. </p>   
    
    </div>
    <div id="assinaturas"> </div>
    <div id="patrocinadores"></div>
    
      
</div>
<?php
}
else {
    echo "O certificado ainda não está disponível ou você ainda não participou do Flisol 2013";
    
    }
}
?>
