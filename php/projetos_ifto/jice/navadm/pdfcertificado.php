<?php

/* ##################### Funções Auxiliares ############################# */
// converte o texto para maisculo
function fullUpperc($string){
  return strtr(strtoupper($string), array(
      "à" => "À","è" => "È","ì" => "Ì","ò" => "Ò","ù" => "Ù",
      "á" => "Á","é" => "É","í" => "Í","ó" => "Ó","ú" => "Ú",
      "â" => "Â","ê" => "Ê","î" => "Î","ô" => "Ô","û" => "Û",
      "ç" => "Ç","ã" => "Ã","õ" => "Õ","-" => "-","ª" => "ª","º"=>"º", "–"=>"–","º"=>"º","'"=>"\'",'"'=>'\"'));
}
/* Melhorar a qualidade do texto do certificado de acordo com a tipo de participação do usuario*/
//entrada da função tipoAtividade($dados[0]['ITP_TIPO']);
function tipoAtividade($atividade){
    if($atividade=='Minicurso' or $atividade=='minicurso'){
        $o = 'o';
    }else{
        $o = 'a';  
    }
    return $o;
}
function verificar_autor($autor){

    if($autor==''){
        $res = '';
        return $res;
    }else{
        $res =  ', '.fullUpperc($autor);
        return $res;
    }

}
/* Melhorar a qualidade do texto do certificado de acordo com a tipo de participação do usuario*/
// contar a quantidade de ministrantes da 0ficina/Palestra/Minicurso
// entrada countMinistrante($dados[0]['MCSO_CODIGO']);
function countMinistrante($minicurso){
        require 'Connections/config.php';
        $ministrou = "";
        $sqlcount = "select itp_mcso_codigo from itens_palestrantes where itp_mcso_codigo='$minicurso'";
        $rescount = $conecta->prepare($sqlcount);
        $rescount->execute();
        if($dadoscount = $rescount->fetchAll(PDO::FETCH_ASSOC)){
            $total = count($dadoscount);
            if($total==1){
                $ministrou = 'ministrou';
            }else if($total>1){
                $ministrou = 'ministraram';
            } 
        }
        return $ministrou; 
    }
/* #####################      Funções SQL   ############################# */
/* ################### Tipos de participação  ########################### */
//Consulta para certificado de participação geral para os usuarios por ano
function participacaogeral($ano,$usuario){
    require 'Connections/config.php';
    $sql= "SELECT usu_codigo, usu_nome,part_ano FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO WHERE part_ano = '".$ano."' and USU_CODIGO = ".$usuario;
    $res = $conecta->prepare($sql);
    $res->execute();
    if($dados = $res->fetchAll(PDO::FETCH_ASSOC)){
        return $dados;
    }else{
        $dados = "0";
        return $dados;
    }
}
//função para consultar os participantes em cada minicurso
//participacaominicurso($_REQUEST['usu_codigo'],$_REQUEST['itp_ano'],$_REQUEST['mcso_codigo']);
function particapacaoMinicurso($usuario,$minicurso){
    require 'Connections/config.php';
    $sql=("SELECT  usu_codigo,usu_nome ,mcso_codigo, mcso_titulo, mcso_condutor,mcso_tipo_ativ_codigo, cert_codigo,mcso_carga_horaria,mcso_ano FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO INNER JOIN certificados ON CERT_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO ='$usuario' and MCSO_CODIGO='$minicurso'");
    $res = $conecta->query($sql);
    $res->execute();
    if($dados = $res->fetchAll(PDO::FETCH_ASSOC)){
        return $dados;
    }else{
        $dados = "0";
        return $dados;
    }
}
//função para consultar os oficineiros/palestrantes/minicurso de cada minicurso
function particapacaoOficineiro($usuario,$ano,$minicurso){
    require 'Connections/config.php';
    $sql=("SELECT  usu_codigo,mcso_codigo, mcso_titulo, mcso_condutor,mcso_carga_horaria, itp_registro,mcso_ano,itp_tipo FROM itens_palestrantes INNER JOIN usuarios ON ITP_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON ITP_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO ='$usuario' and ITP_ANO='".$ano."' and MCSO_CODIGO='$minicurso'");
    $res = $conecta->query($sql);
    $res->execute();
    if($dados = $res->fetchAll(PDO::FETCH_ASSOC)){
        return $dados;
    }else{
        $dados = "0";
        return $dados;
    }
}
//Consulta os organizadores por evento
function particapacaoorganizador($usuario,$ano){
    require 'Connections/config.php';
    $sql=("SELECT  usu_codigo,usu_nome,ito_ano,ito_registro,ito_carga_horaria FROM itens_organizadores INNER JOIN usuarios ON ITO_USU_CODIGO = USU_CODIGO WHERE USU_CODIGO ='$usuario' and ITO_ANO='$ano'");
    $res = $conecta->query($sql);
    $res->execute();
    if($dados = $res->fetchAll(PDO::FETCH_ASSOC)){
        return $dados;
    }else{
        $dados = "0";
        return $dados;
    }
}
//Consulta os autores do artigo
function premios($id){
    require 'Connections/config.php';
    $sql=("SELECT distinct id_submissao,titulo,modalidade,first_name,first_name_autor1,first_name_autor2,first_name_autor3,first_name_autor4,first_name_autor5,first_name_autor6,middle_name,middle_name_autor1,middle_name_autor2,middle_name_autor3,middle_name_autor4,middle_name_autor5,middle_name_autor6,last_name,last_name_autor1,last_name_autor2,last_name_autor3,last_name_autor4,last_name_autor5,last_name_autor6,artp_tipo from artigos_premiados INNER JOIN artigos ON artp_id_submissao = id_submissao inner join eventos on art_even_codigo = even_codigo where id_submissao ='$id'");
    $res = $conecta->query($sql);
    $res->execute();
    if($regartigos = $res->fetchAll(PDO::FETCH_ASSOC)){
        $apresentador = $regartigos[0]['first_name'].' '.$regartigos[0]['middle_name'].' '.$regartigos[0]['last_name'];           
        $autor1 = $regartigos[0]['first_name_autor1'].' '.$regartigos[0]['middle_name_autor1'].' '.$regartigos[0]['last_name_autor1'];
        $autor2 = $regartigos[0]['first_name_autor2'].' '.$regartigos[0]['middle_name_autor2'].' '.$regartigos[0]['last_name_autor2'];
        $autor3 = $regartigos[0]['first_name_autor3'].' '.$regartigos[0]['middle_name_autor3'].' '.$regartigos[0]['last_name_autor3'];
        $autor4 = $regartigos[0]['first_name_autor4'].' '.$regartigos[0]['middle_name_autor4'].' '.$regartigos[0]['last_name_autor4'];
        $autor5 = $regartigos[0]['first_name_autor5'].' '.$regartigos[0]['middle_name_autor5'].' '.$regartigos[0]['last_name_autor5'];
        $autor6 = $regartigos[0]['first_name_autor6'].' '.$regartigos[0]['middle_name_autor6'].' '.$regartigos[0]['last_name_autor6'];
        $modalidade = $regartigos[0]['modalidade'];
        $tipotrabalho = $regartigos[0]['artp_tipo'];
        $titulo = $regartigos[0]['titulo'];
        $autor = '';
        $autor .= trim($autor1);
        $autor .= verificar_autor(trim($autor2));
        $autor .= verificar_autor(trim($autor3));
        $autor .= verificar_autor(trim($autor4));
        $autor .= verificar_autor(trim($autor5));
        $autor .= verificar_autor(trim($autor6));
        $autores[0]['apresentador']=$apresentador;
        $autores[0]['autores']=$autor;
        $autores[0]['modalidade']=$modalidade;
        $autores[0]['tipo']=$tipotrabalho;
        $autores[0]['titulo']=$titulo;
        return $autores;
    }else{
        $autores = "0";
        return $autores;
    }
}
//Consulta os autores do artigo
function autores($usuario,$id){
    require 'Connections/config.php';
    $sql=("SELECT  * from artigos where cpf_apresentador ='$usuario' and id_submissao='$id'");
    $res = $conecta->query($sql);
    $res->execute();
    if($dados = $res->fetchAll(PDO::FETCH_ASSOC)){
        $apresentador = $regartigos[0]['first_autor'].' '.$regartigos[0]['middle_autor'].' '.$regartigos[0]['name_autor'];           
        $autor1 = $regartigos[0]['first_name_autor1'].' '.$regartigos[0]['middle_name_autor1'].' '.$regartigos[0]['last_name_autor1'];
        $autor2 = $regartigos[0]['first_name_autor2'].' '.$regartigos[0]['middle_name_autor2'].' '.$regartigos[0]['last_name_autor2'];
        $autor3 = $regartigos[0]['first_name_autor3'].' '.$regartigos[0]['middle_name_autor3'].' '.$regartigos[0]['last_name_autor3'];
        $autor4 = $regartigos[0]['first_name_autor4'].' '.$regartigos[0]['middle_name_autor4'].' '.$regartigos[0]['last_name_autor4'];
        $autor5 = $regartigos[0]['first_name_autor5'].' '.$regartigos[0]['middle_name_autor5'].' '.$regartigos[0]['last_name_autor5'];
        $autor6 = $regartigos[0]['first_name_autor6'].' '.$regartigos[0]['middle_name_autor6'].' '.$regartigos[0]['last_name_autor6'];

        $autor .= trim($autor1);
        $autor .= verificar_autor(trim($autor2));
        $autor .= verificar_autor(trim($autor3));
        $autor .= verificar_autor(trim($autor4));
        $autor .= verificar_autor(trim($autor5));
        $autor .= verificar_autor(trim($autor6));
        return $autor;
    }else{
        $dados = "0";
        return $autor;
    }
}
//Consulta as apresentações de trabalho
function apresentacao($id){
    require 'Connections/config.php';
    $sql=("SELECT distinct id_submissao,titulo,modalidade,not_tipo_trabalho,first_name,first_name_autor1,first_name_autor2,first_name_autor3,first_name_autor4,first_name_autor5,first_name_autor6,middle_name,middle_name_autor1,middle_name_autor2,middle_name_autor3,middle_name_autor4,middle_name_autor5,middle_name_autor6,last_name,last_name_autor1,last_name_autor2,last_name_autor3,last_name_autor4,last_name_autor5,last_name_autor6 from notas INNER JOIN artigos ON not_art_codigo = id_submissao inner join eventos on art_even_codigo = even_codigo where id_submissao ='$id'");
    $res = $conecta->query($sql);
    $res->execute();
    if($regartigos = $res->fetchAll(PDO::FETCH_ASSOC)){
    $apresentador = $regartigos[0]['first_name'].' '.$regartigos[0]['middle_name'].' '.$regartigos[0]['last_name'];           
        $autor1 = $regartigos[0]['first_name_autor1'].' '.$regartigos[0]['middle_name_autor1'].' '.$regartigos[0]['last_name_autor1'];
        $autor2 = $regartigos[0]['first_name_autor2'].' '.$regartigos[0]['middle_name_autor2'].' '.$regartigos[0]['last_name_autor2'];
        $autor3 = $regartigos[0]['first_name_autor3'].' '.$regartigos[0]['middle_name_autor3'].' '.$regartigos[0]['last_name_autor3'];
        $autor4 = $regartigos[0]['first_name_autor4'].' '.$regartigos[0]['middle_name_autor4'].' '.$regartigos[0]['last_name_autor4'];
        $autor5 = $regartigos[0]['first_name_autor5'].' '.$regartigos[0]['middle_name_autor5'].' '.$regartigos[0]['last_name_autor5'];
        $autor6 = $regartigos[0]['first_name_autor6'].' '.$regartigos[0]['middle_name_autor6'].' '.$regartigos[0]['last_name_autor6'];
        $modalidade = $regartigos[0]['modalidade'];
        $tipotrabalho = $regartigos[0]['not_tipo_trabalho'];
        $titulo = $regartigos[0]['titulo'];
        $autor = '';
        $autor .= trim($autor1);
        $autor .= verificar_autor(trim($autor2));
        $autor .= verificar_autor(trim($autor3));
        $autor .= verificar_autor(trim($autor4));
        $autor .= verificar_autor(trim($autor5));
        $autor .= verificar_autor(trim($autor6));
        $autores[0]['apresentador']=$apresentador;
        $autores[0]['autores']=$autor;
        $autores[0]['modalidade']=$modalidade;
        $autores[0]['tipo']=$tipotrabalho;
        $autores[0]['titulo']=$titulo;
        return $autores;
    }else{
        $autores = "0";
        return $autores;
    }
}
function anais($id){
    require 'Connections/config.php';
    $sql=("SELECT distinct id_submissao,titulo,first_name,first_name_autor1,first_name_autor2,first_name_autor3,first_name_autor4,first_name_autor5,first_name_autor6,middle_name,middle_name_autor1,middle_name_autor2,middle_name_autor3,middle_name_autor4,middle_name_autor5,middle_name_autor6,last_name,last_name_autor1,last_name_autor2,last_name_autor3,last_name_autor4,last_name_autor5,last_name_autor6 from notas INNER JOIN artigos ON not_art_codigo = id_submissao inner join eventos on art_even_codigo = even_codigo where id_submissao ='$id'");
    $res = $conecta->query($sql);
    $res->execute();
    if($regartigos = $res->fetchAll(PDO::FETCH_ASSOC)){
    $apresentador = $regartigos[0]['first_name'].' '.$regartigos[0]['middle_name'].' '.$regartigos[0]['last_name'];           
        $autor1 = $regartigos[0]['first_name_autor1'].' '.$regartigos[0]['middle_name_autor1'].' '.$regartigos[0]['last_name_autor1'];
        $autor2 = $regartigos[0]['first_name_autor2'].' '.$regartigos[0]['middle_name_autor2'].' '.$regartigos[0]['last_name_autor2'];
        $autor3 = $regartigos[0]['first_name_autor3'].' '.$regartigos[0]['middle_name_autor3'].' '.$regartigos[0]['last_name_autor3'];
        $autor4 = $regartigos[0]['first_name_autor4'].' '.$regartigos[0]['middle_name_autor4'].' '.$regartigos[0]['last_name_autor4'];
        $autor5 = $regartigos[0]['first_name_autor5'].' '.$regartigos[0]['middle_name_autor5'].' '.$regartigos[0]['last_name_autor5'];
        $autor6 = $regartigos[0]['first_name_autor6'].' '.$regartigos[0]['middle_name_autor6'].' '.$regartigos[0]['last_name_autor6'];
        $titulo = $regartigos[0]['titulo'];
        $autor = '';
        $autor .= trim($autor1);
        $autor .= verificar_autor(trim($autor2));
        $autor .= verificar_autor(trim($autor3));
        $autor .= verificar_autor(trim($autor4));
        $autor .= verificar_autor(trim($autor5));
        $autor .= verificar_autor(trim($autor6));
        $autores[0]['autores']=$autor;
        $autores[0]['titulo']=$titulo;
        return $autores;
    }else{
        $autores = "0";
        return $autores;
    }
}
//Consulta os avaliadores
//Consulta as apresentações de trabalho
function avaliadores($usuario,$id){
    require 'Connections/config.php';
    $sql=("SELECT distinct id_submissao,usu_nome,titulo,modalidade,not_tipo_trabalho,first_name,first_name_autor1,first_name_autor2,first_name_autor3,first_name_autor4,first_name_autor5,first_name_autor6,middle_name,middle_name_autor1,middle_name_autor2,middle_name_autor3,middle_name_autor4,middle_name_autor5,middle_name_autor6,last_name,last_name_autor1,last_name_autor2,last_name_autor3,last_name_autor4,last_name_autor5,last_name_autor6 from notas INNER JOIN artigos ON not_art_codigo = id_submissao inner join eventos on art_even_codigo = even_codigo inner join usuarios on not_usu_codigo = usu_codigo where id_submissao = '$id' and usu_codigo = '$usuario' ");
    $res = $conecta->query($sql);
    $res->execute();
    if($regartigos = $res->fetchAll(PDO::FETCH_ASSOC)){
    $apresentador = $regartigos[0]['first_name'].' '.$regartigos[0]['middle_name'].' '.$regartigos[0]['last_name'];           
        $autor1 = $regartigos[0]['first_name_autor1'].' '.$regartigos[0]['middle_name_autor1'].' '.$regartigos[0]['last_name_autor1'];
        $autor2 = $regartigos[0]['first_name_autor2'].' '.$regartigos[0]['middle_name_autor2'].' '.$regartigos[0]['last_name_autor2'];
        $autor3 = $regartigos[0]['first_name_autor3'].' '.$regartigos[0]['middle_name_autor3'].' '.$regartigos[0]['last_name_autor3'];
        $autor4 = $regartigos[0]['first_name_autor4'].' '.$regartigos[0]['middle_name_autor4'].' '.$regartigos[0]['last_name_autor4'];
        $autor5 = $regartigos[0]['first_name_autor5'].' '.$regartigos[0]['middle_name_autor5'].' '.$regartigos[0]['last_name_autor5'];
        $autor6 = $regartigos[0]['first_name_autor6'].' '.$regartigos[0]['middle_name_autor6'].' '.$regartigos[0]['last_name_autor6'];
        $modalidade = $regartigos[0]['modalidade'];
        $tipotrabalho = $regartigos[0]['not_tipo_trabalho'];
        $titulo = $regartigos[0]['titulo'];
        $autor = '';
        $autor .= trim($autor1);
        $autor .= verificar_autor(trim($autor2));
        $autor .= verificar_autor(trim($autor3));
        $autor .= verificar_autor(trim($autor4));
        $autor .= verificar_autor(trim($autor5));
        $autor .= verificar_autor(trim($autor6));
        $autores[0]['apresentador']=$apresentador;
        $autores[0]['autores']=$autor;
        $autores[0]['modalidade']=$modalidade;
        $autores[0]['tipo']=$tipotrabalho;
        $autores[0]['titulo']=$titulo;
        $autores[0]['usu_nome']=$regartigos[0]['usu_nome'];
        return $autores;
    }else{
        $autores = "0";
        return $autores;
    }
}
//Consulta a identificação do evento
//No futuro trocar pelo id do evento
function eventos($ano){
    require 'Connections/config.php';
    $sql= "SELECT * from eventos where even_ano = '$ano'";
    $res = $conecta->prepare($sql);
    $res->execute();
    if($eventos = $res->fetchAll(PDO::FETCH_ASSOC)){
        return $eventos;
    }else{
        $eventos = "0";
        return $eventos;
    }
}
//Consulta a identificação do evento
//No futuro trocar pelo id do evento
function atividade($atividade){
    require 'Connections/config.php';
    $sql= "SELECT * from tipo_atividade where tativ_codigo = '$atividade'";
    $res = $conecta->prepare($sql);
    $res->execute();
    if($tipo = $res->fetchAll(PDO::FETCH_ASSOC)){
        return $tipo[0]['tativ_descricao'];
    }else{
        $tipo = "0";
        return $tipo;
    }
}

   
/* ##################### Funções Layout ############################# */

/* ################ Conteudo dos Certificados ####################### */
//participacaoGeral($infoParticipante[0]['usu_nome'],$infoEvento[0]['even_descricao'],$infoEvento[0]['even_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local']);
function conteudoGeral($usuario,$evento,$cargaHoraria,$data,$local,$ano){
    return $geral = 
    '<div id="conteudo_certificado'.$ano.'"> 
        <p>Certificamos que <b>'.$usuario.'</b> Participou da '.$evento.'
         com carga horária de '.$cargaHoraria.' horas, realizado durante o período de '.$data.' no '.$local.'. </p>   
    </div>';
}
//conteudominicurso($infoParticipante[0]['usu_nome'],$infoParticipante[0]['itp_tipo'],$infoParticipante[0]['mcso_titulo'],$infoParticipante[0]['mcso_condutor'],$infoEvento[0]['even_descricao'],$infoParticipante[0]['mcso_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoParticipante[0]['cert_codigo']);
function conteudominicurso($usuario,$o,$tipo,$titulo,$ministrantes,$evento,$cargaHoraria,$data,$local,$registro,$ano){
    return $minicurso = 
    '<div id="conteudo_certificado'.$ano.'"> 
        <p>
            Certificamos que <b>'.fullUpperc($usuario).'</b> participou d'. $o.' '.$tipo.' intitulad'.$o.' de <b>'.fullUpperc($titulo).'</b> ministrado por <b>'.fullUpperc($ministrantes).'</b> na <b> '.$evento.' </b> com carga horária de '.$cargaHoraria.' horas, sendo realizado nos dias  '.$data.' no '.$local.'.
        </p> 
        <br />	
        <br />
        <p>Autenticação nº '.$registro.' </p> 

    </div>';
}
//conteudoPalestrante($infoParticipante[0]['mcso_condutor'],$o;$infoParticipante[0]['itp_tipo'],$infoParticipante[0]['mcso_titulo'],$infoEvento[0]['even_descricao'],$infoParticipante[0]['mcso_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoParticipante[0]['itp_registro']);
function conteudoPalestrante($ministrantes,$ministrou,$o,$tipo,$titulo,$evento,$cargaHoraria,$data,$local,$registro,$ano){
    return $palestrante = 
    '<div id="conteudo_certificado'.$ano.'"> 
        <p>Certificamos que <b>'.fullUpperc($ministrantes).'</b> '.$ministrou.' '.$o.' '.$tipo.' intitulad'.$o.' 
        de <b>  '.fullUpperc($titulo).'</b> na '.$evento.' com carga horária de '.$cargaHoraria.' horas, 
        realizado durante o período de  '.$data.' no '.$local.' </p> 
        <br />	
        <br />
        <p>Registro nº '.$registro.'</p> 
    </div>';
}
//conteudoOrganizador($infoParticipante[0]['usu_nome'],$infoEvento[0]['even_descricao'],$infoParticipante[0]['ito_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoParticipante[0]['ito_registro']);
function conteudoOrganizador($usuario,$evento,$cargaHoraria,$data,$local,$registro,$ano){
    return $conteudo = 
        '<div id="conteudo_certificado'.$ano.'"> 
            <p>Certificamos que <b>'.fullUpperc($usuario).'</b> Participou da organização da '.$evento.' com carga horária de '.$cargaHoraria.' horas, 
            realizado durante o período de  '.$data.' no '.$local.'. </p> 
            <br />	
            <br />
            <p>Registro nº '.$registro.'</p> 
        </div>';
}
//echo conteudoPremios($infoParticipante[0]['apresentador'],$infoParticipante[0]['autores'],$infoParticipante[0]['modalidade'],$infoParticipante[0]['tipo'],$infoEvento[0]['even_descricao'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoEvento[0]['even_ano']);           
function conteudoPremios($titulo,$apresentador,$usuario,$modalidade,$tipo,$evento,$data,$local,$ano){
    return $conteudo = 
        '<div id="conteudo_certificado'.$ano.'"> 
            <p>Certificamos que o trabalho com o título <b>'.$titulo.'</b> de autoria de <b>'.fullUpperc($usuario).'</b> foi premiado como melhor artigo apresentado na sessão "<b>'.$tipo.'</b>", modalidade '.$modalidade.' na '.$evento.', 
            realizado durante o período de  '.$data.' no '.$local.'. </p>  
        </div>';
}
function conteudoApresentador($titulo,$apresentador,$usuario,$modalidade,$tipo,$evento,$data,$local,$ano){
    return $conteudo = 
        '<div id="conteudo_certificado'.$ano.'"> 
            <p>Certificamos que o trabalho com o título <b>'.$titulo.'</b> de autoria de <b>'.fullUpperc($usuario).'</b> foi apresentado por <b>'.fullUpperc($apresentador).'</b> na sessão '.$tipo.', modalidade '.$modalidade.' na '.$evento.', 
            realizado durante o período de  '.$data.' no '.$local.'. </p>  
        </div>';
}
function conteudoAnais($titulo,$usuario,$issn,$evento,$local,$ano){
    return $conteudo = 
        '<div id="conteudo_certificado'.$ano.'"> 
            <p>Certificamos que o trabalho com o título <b>'.fullUpperc($titulo).'</b> de autoria de <b>'.fullUpperc($usuario).'</b> foi publicado nos anais eletrônicos  <b>'.$issn.'</b> da '.$evento.', 
            realizado no '.$local.'. </p>  
        </div>';
}
function conteudoAvaliador($usuario,$titulo,$apresentador,$participantes,$modalidade,$tipo,$evento,$data,$local,$ano){
    return $conteudo = 
        '<div id="conteudo_certificado'.$ano.'"> 
            <p>Certificamos que <b>'.fullUpperc($usuario).'</b> participou como avaliador do artigo <b>'.fullUpperc($titulo).'</b> com autoria de <b>'.fullUpperc($participantes).'</b> na sessão '.$tipo.', modalidade '.$modalidade.' que foi publicado na '.$evento.', 
            realizado durante o período de  '.$data.' no '.$local.'. </p>  
        </div>';
}

/* ################ Layout do Certificado ####################### */

//topoCertificado($infoEvento[0]['even_ano']);
function topoCertificado($ano){
    if($ano=='2015'){
        return $topo = 
            '<div id="topo1"> </div>
            <div id="topo2">
                <div id="logo1"><img src="imagens/certificado/evento'.$ano.'.png" /></div>
                <div id="instituicao">
                    <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
                    <p>MINISTÉRIO DA EDUCAÇÃO</p>
                    <p>SECRETÁRIA DE EDUCAÇÃO TÉCNICA E TECNOLÓGICA</p>
                    <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TOCANTINS</p>
                </div>
                <div id="logo2"><img src="imagens/certificado/logo_ifto.png" /></div>
            </div>
            <div id="cert">CERTIFICADO</div>';
        }
    if($ano=='2016'){
        return $topo = 
            '<div id="titulo_cert"><img src="imagens/certificado/titulo.png" /></div>';
    }
}
/* Controla as imagens da assinaturas e patrocinadores */
//$infoEvento[0]['even_ano']
//No futuro controlar pelo id das imagens
function assinaturas($ano){       
    return $assinaturas =  
        '<div id="assinaturas"><img src="imagens/certificado/assinaturas'.$ano.'.png" /></div>
         <div id="patrocinadores"><img src="imagens/certificado/patrocinadores'.$ano.'.png" /></div>';
}
    
/* ########## Cria os certificados de acordo com os parametros ################ */    
    
// Gera o certificado de participação geral do usuario no evento   
if($_REQUEST['opcao']=='part_evento'){
        $infoParticipante= participacaogeral($_REQUEST['part_ano'],$_REQUEST['usu_codigo']);
        $infoEvento= eventos($_REQUEST['part_ano']);
        if($infoParticipante!=0){
?>
            <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
            <page>
                <div id="total<?php echo $_REQUEST['part_ano']  ?>">
                    <?php 
                    echo topoCertificado($infoEvento[0]['even_ano']);
                    echo conteudoGeral($infoParticipante[0]['usu_nome'],$infoEvento[0]['even_descricao'],$infoEvento[0]['even_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$_REQUEST['part_ano']);
                    echo assinaturas($infoEvento[0]['even_ano']); 
                    ?>
                </div>
            </page>
            
            <?php if($_REQUEST['part_ano']=='2016') { echo '<page ><div id="verso"></div></page>'; }?>
<?php
        }else{
            echo "O certificado ainda não está disponivel";
        }
// Gera o certificado de participação no minicurso do usuario no evento
}else if($_REQUEST['opcao']=='part_minicurso'){
    $infoParticipante = particapacaoMinicurso($_REQUEST['usu_codigo'],$_REQUEST['mcso_codigo']); 
    $infoEvento= eventos($_REQUEST['itp_ano']);
    $o = tipoAtividade(atividade($infoParticipante[0]['mcso_tipo_ativ_codigo']));
    $ministrou = countMinistrante($_REQUEST['mcso_codigo']);
    if($infoParticipante!=0){
        
?>          
        <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
        <div id="total<?php echo $_REQUEST['itp_ano'];  ?>">
            <?php 
            echo topoCertificado($infoEvento[0]['even_ano']);
            //conteudominicurso($usuario, $o, $tipo, $titulo, $ministrantes, $evento, $cargaHoraria, $data, $local, $registro, $ano)
            echo conteudominicurso($infoParticipante[0]['usu_nome'],$o,atividade($infoParticipante[0]['mcso_tipo_ativ_codigo']),$infoParticipante[0]['mcso_titulo'],$infoParticipante[0]['mcso_condutor'],$infoEvento[0]['even_descricao'],$infoParticipante[0]['mcso_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoParticipante[0]['cert_codigo'],$_REQUEST['itp_ano']);
            echo assinaturas($infoEvento[0]['even_ano']); 
            ?>
        </div>
<?php
        }else{
            echo "O certificado ainda não está disponivel!";
        }
// Gera o certificado do oficineiro/palestrante/minicurso no minicurso do usuario no evento        
}else if($_REQUEST['opcao']=='palestrante'){
    $infoParticipante = particapacaoOficineiro($_REQUEST['usu_codigo'],$_REQUEST['itp_ano'],$_REQUEST['mcso_codigo']); 
    //print_r($infoParticipante);
    $infoEvento= eventos($_REQUEST['itp_ano']);
    $o = tipoAtividade($infoParticipante[0]['itp_tipo']);
    $ministrou = countMinistrante($_REQUEST['mcso_codigo']);
    if($infoParticipante!=0){    
?>          
            <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
            <div id="total<?php echo $_REQUEST['itp_ano'];  ?>">
                <?php 
                echo topoCertificado($infoEvento[0]['even_ano']);
                echo conteudoPalestrante($infoParticipante[0]['mcso_condutor'],$ministrou,$o,$infoParticipante[0]['itp_tipo'],$infoParticipante[0]['mcso_titulo'],$infoEvento[0]['even_descricao'],$infoParticipante[0]['mcso_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoParticipante[0]['itp_registro'],$_REQUEST['itp_ano']);
                echo assinaturas($infoEvento[0]['even_ano']); 
                ?>
            </div>
<?php
        }else{
            echo "O certificado ainda não está disponivel!";
        }
// Gera o certificado para o organizador do evento
}else if($_REQUEST['opcao']=='organizador'){
    $infoParticipante = particapacaoorganizador($_REQUEST['usu_codigo'],$_REQUEST['ito_ano']); 
    $infoEvento= eventos($_REQUEST['ito_ano']);
    if($infoParticipante!=0){   
?>          
        <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
        <div id="total<?php echo $_REQUEST['ito_ano']  ?>">
            <?php 
            echo topoCertificado($infoEvento[0]['even_ano']);
            echo conteudoOrganizador($infoParticipante[0]['usu_nome'],$infoEvento[0]['even_descricao'],$infoParticipante[0]['ito_carga_horaria'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoParticipante[0]['ito_registro'],$_REQUEST['ito_ano']);
            echo assinaturas($infoEvento[0]['even_ano']); 
            ?>
        </div>
<?php
        }else{
            echo "O certificado ainda não está disponivel!";
        }
}else if($_REQUEST['opcao']=='premiacao'){
    $infoParticipante = premios($_REQUEST['id_submissao']); 
    $infoEvento= eventos($_REQUEST['art_ano']);
    if($infoParticipante!=0){   
?>          
        <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
        <div id="total<?php echo $_REQUEST['art_ano']  ?>">
            <?php 
            echo topoCertificado($infoEvento[0]['even_ano']);
            //print_r($infoParticipante);
            echo conteudoPremios($infoParticipante[0]['titulo'],$infoParticipante[0]['apresentador'],$infoParticipante[0]['autores'],$infoParticipante[0]['modalidade'],$infoParticipante[0]['tipo'],$infoEvento[0]['even_descricao'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoEvento[0]['even_ano']);
            echo assinaturas($infoEvento[0]['even_ano']); 
            ?>
        </div>
<?php
        }else{
            echo "O certificado ainda não está disponivel!";
        }
}else if($_REQUEST['opcao']=='artigos'){
    $infoParticipante = apresentacao($_REQUEST['id_submissao']); 
    $infoEvento= eventos($_REQUEST['art_ano']);
    if($infoParticipante!=0){   
?>          
        <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
        <div id="total<?php echo $_REQUEST['art_ano']  ?>">
            <?php 
            echo topoCertificado($infoEvento[0]['even_ano']);
            echo conteudoApresentador($infoParticipante[0]['titulo'],$infoParticipante[0]['apresentador'],$infoParticipante[0]['autores'],$infoParticipante[0]['modalidade'],$infoParticipante[0]['tipo'],$infoEvento[0]['even_descricao'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoEvento[0]['even_ano']);
            echo assinaturas($infoEvento[0]['even_ano']); 
            ?>
        </div>
<?php
        }else{
            echo "O certificado ainda não está disponivel!";
        }
}else if($_REQUEST['opcao']=='avaliadores'){
    $infoParticipante = avaliadores($_REQUEST['usu_codigo'],$_REQUEST['id_submissao']); 
    $infoEvento= eventos($_REQUEST['art_ano']);
    if($infoParticipante!=0){   
?>          
        <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
        <div id="total<?php echo $_REQUEST['art_ano']  ?>">
            <?php 
            echo topoCertificado($infoEvento[0]['even_ano']);
            echo conteudoAvaliador($infoParticipante[0]['usu_nome'],$infoParticipante[0]['titulo'],$infoParticipante[0]['apresentador'],$infoParticipante[0]['autores'],$infoParticipante[0]['modalidade'],$infoParticipante[0]['tipo'],$infoEvento[0]['even_descricao'],$infoEvento[0]['even_data'],$infoEvento[0]['even_local'],$infoEvento[0]['even_ano']);
            echo assinaturas($infoEvento[0]['even_ano']); 
            ?>
        </div>
<?php
        }else{
            echo "O certificado ainda não está disponivel!";
        }
}else if($_REQUEST['opcao']=='anais'){
    $infoParticipante = anais($_REQUEST['id_submissao']); 
    $infoEvento= eventos($_REQUEST['art_ano']);
    if($infoParticipante!=0){   
?>          
        <link rel="stylesheet" type="text/css" href="estilo_certificado.css" />
        <div id="total<?php echo $_REQUEST['art_ano']  ?>">
            <?php 
            echo topoCertificado($infoEvento[0]['even_ano']);
            echo conteudoAnais($infoParticipante[0]['titulo'],$infoParticipante[0]['autores'],$infoEvento[0]['even_issn'],$infoEvento[0]['even_descricao'],$infoEvento[0]['even_local'],$infoEvento[0]['even_ano']);
            echo assinaturas($infoEvento[0]['even_ano']); 
            ?>
        </div>
<?php
        }else{
            echo "O certificado ainda não está disponivel!";
        }
}

