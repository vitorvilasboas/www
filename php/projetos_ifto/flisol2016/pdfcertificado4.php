<?php
function fullUpper($string){
  return strtr(strtoupper($string), array(
      "à" => "À","è" => "È","ì" => "Ì","ò" => "Ò","ù" => "Ù",
      "á" => "Á","é" => "É","í" => "Í","ó" => "Ó","ú" => "Ú",
      "â" => "Â","ê" => "Ê","î" => "Î","ô" => "Ô","û" => "Û",
      "ç" => "Ç","ã" => "Ã","õ" => "õ","-" => "-","ª" => "ª","º"=>"º", "–"=>"–","º"=>"º","'"=>"\'",'"'=>'\"'));
}
include_once 'Connections/config.php';

if($_REQUEST['opcao']=='part_evento'){
    $sql= "SELECT usu_codigo, usu_nome,part_ano FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO WHERE part_ano = '".$_REQUEST['part_ano']."' and USU_CODIGO = ".$_REQUEST['usu_codigo'];
    $res = $conecta->prepare($sql);
    $res->execute();
    if($dados = $res->fetchAll(PDO::FETCH_ASSOC)){

        $ano=$dados[0]['part_ano'];
        if($ano=='2015'){
            $data = '10 a 12 de dezembro de 2015';
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
                <div id="cert">CERTIFICADO</div>
    
                <div id="conteudo_certificado"> 
             
                    <p>Certificamos que <b><?php echo fullUpper($dados[0]['usu_nome']); ?></b> Participou da 6ª Jornada de Iniciação Científica e Extensão <b> (JICE) </b>
                     com carga horária de 30 horas, realizado durante o período de <?php echo $data;?> no Instituto Federal de 
                     Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Araguatins. </p>   
    
                </div>
                <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano; ?>.png" /></div>
                <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano; ?>.png" /></div>
            </div>
<?php
        }elseif($ano=='2016'){
            $data = '19 a 21 de outubro de 2016';
?>    
            <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
            <div id="total1">
                <div id="titulo_cert"><img src="imagens/certificado/titulo.png" /></div>    
                <div id="conteudo_certificado2016">             
                     <p>Certificamos que <b><?php echo fullUpper($dados[0]['usu_nome']); ?></b> Participou da 7ª Jornada de Iniciação Científica e Extensão - <b> JICE </b>
                     com carga horária de 20 horas, realizado durante o período de <?php echo $data; ?> no Instituto Federal de 
                     Educação Ciência e Tecnologia do Tocantins - <i>campus</i> Araguatins. </p>   
                </div>
                <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano; ?>.png" /></div>
                <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano; ?>.png" /></div>
            </div>
<?php
        }
    }else{
          echo "O certificado ainda não está disponível ou você ainda não participou do Evento";
    }
    
}else if($_REQUEST['opcao']=='part_minicurso'){

    $sql=("SELECT  usu_codigo,usu_nome ,mcso_codigo, mcso_titulo, mcso_condutor, cert_codigo,mcso_ano
    FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO
    INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO
    INNER JOIN certificados ON CERT_MCSO_CODIGO = MCSO_CODIGO
    WHERE USU_CODIGO ='".$_REQUEST['usu_codigo']."' and MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'");
    $res = $conecta->prepare($sql);
    $res->execute();
    if($dados = $res->fetchAll(PDO::FETCH_ASSOC)){
        //print_r($dados);
        $titulo=$dados[0]['mcso_titulo'];
        $ano=$dados[0]['mcso_ano'];
        if($ano=='2015'){
            $data = '12 à 15 de Dezembro de 2015';
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
                    <div id="cert">CERTIFICADO</div>
    
                    <div id="conteudo_certificado"> 
             
                        <p>Certificamos que <b><?php echo fullUpper($dados[0]['usu_nome']);?></b> Participou do minicurso 
                        <b><?php echo fullUpper($titulo);?></b> na 6ª Jornada de Iniciação Científica e Extensão - <b> JICE </b> com carga horária de 4 horas, 
                        realizado durante o período de  <?php echo $data;?> no Instituto Federal de  Educação Ciência e Tecnologia 
                        do Tocantins - <i>campus</i> Araguatins. </p> 
                        <br />	
                        <br />
                        <p>Registro nº <?php echo $dados[0]['cert_codigo'];?>/IFTO/Araguatins</p> 
                    </div>
                    <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano; ?>.png" /></div>
                    <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano; ?>.png" /></div> 
            </div>
<?php
        }else if($ano=='2016'){
            $data = '19 a 21 de Outubro de 2016';
?>
            <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
            <div id="total1">
                <div id="titulo_cert"><img src="imagens/certificado/titulo.png" /></div>    
                <div id="conteudo_certificado2016"> 
             
                        <p>Certificamos que <b><?php echo fullUpper($dados[0]['usu_nome']);?></b> Participou do minicurso 
                        <b><?php echo fullUpper($titulo);?></b> na 7ª Jornada de Iniciação Científica e Extensão - <b> JICE </b> com carga horária de 4 horas, 
                        realizado durante o período de  <?php echo $data;?> no Instituto Federal de  Educação Ciência e Tecnologia 
                        do Tocantins - <i>campus</i> Araguatins. </p> 
                        <br />	
                        <br />
                        <p>Registro nº <?php echo $dados[0]['cert_codigo'];?>/IFTO/Araguatins</p> 
                </div>
                <div id="assinaturas"><img src="imagens/certificado/assinaturas<?php echo $ano; ?>.png" /></div>
                <div id="patrocinadores"><img src="imagens/certificado/patrocinadores<?php echo $ano; ?>.png" /></div> 
            
            </div>    
<?php
        }
    }else{
        echo "O certificado ainda não está disponível ou você ainda não participou do Evento";
    }
}

