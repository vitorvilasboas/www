<div id="pagina">
    <h1 class="titulo1">Trabalhos</h1>
    <?php
    $testanota = 0;
    require 'Connections/conecta.php';
    $sqlmodalidade = "select distinct modalidade from artigos";
    $resmodalidade = $con->banco->Execute($sqlmodalidade);
    while($regmodalidade = $resmodalidade->FetchNextObject()){
        
        echo '<h1 style=" background:#f4f4f4; font-size:18px; border-bottom: 3px #666666 solid; padding:5px; margin: 5px;">'.$regmodalidade->MODALIDADE.'</h1>';
        $sqlartigos = "select * from artigos where modalidade = '$regmodalidade->MODALIDADE'";
        $resartigos = $con->banco->Execute($sqlartigos);
        while($regartigos = $resartigos->FetchNextObject()){
            echo '<div style="border:1px solid #006600; border-left:20px solid #006600; padding: 5px; margin: 5px;">';
            echo '<p style=" padding:1px 10px;width:100%; font-size:14px; color:#333333;text-align:justify;"><b>Título:  </b>'.$regartigos->ID_SUBMISSAO.' - '.$regartigos->TITULO.'</p>';
            echo '<p style=" padding:1px 10px;width:100%; font-size:12px; color:#000000;text-align:justify;"> <b>Autor(es): </b>';
            echo $regartigos->CPF_APRESENTADOR.' / ';
            $apresentador = $regartigos->FIRST_NAME.' '.$regartigos->MIDDLE_NAME.' '.$regartigos->LAST_NAME;           
            $autor1 = $regartigos->FIRST_NAME_AUTOR1.' '.$regartigos->MIDDLE_NAME_AUTOR1.' '.$regartigos->LAST_NAME_AUTOR1;
            $autor2 = $regartigos->FIRST_NAME_AUTOR2.' '.$regartigos->MIDDLE_NAME_AUTOR2.' '.$regartigos->LAST_NAME_AUTOR2;
            $autor3 = $regartigos->FIRST_NAME_AUTOR3.' '.$regartigos->MIDDLE_NAME_AUTOR3.' '.$regartigos->LAST_NAME_AUTOR3;
            $autor4 = $regartigos->FIRST_NAME_AUTOR4.' '.$regartigos->MIDDLE_NAME_AUTOR4.' '.$regartigos->LAST_NAME_AUTOR4;
            $autor5 = $regartigos->FIRST_NAME_AUTOR5.' '.$regartigos->MIDDLE_NAME_AUTOR5.' '.$regartigos->LAST_NAME_AUTOR5;
            $autor6 = $regartigos->FIRST_NAME_AUTOR6.' '.$regartigos->MIDDLE_NAME_AUTOR6.' '.$regartigos->LAST_NAME_AUTOR6;

            echo fullUpper($apresentador);
            
            echo verificar_autor(trim($autor2));
            echo verificar_autor(trim($autor3));
            echo verificar_autor(trim($autor4));
            echo verificar_autor(trim($autor5));
            echo verificar_autor(trim($autor6));
            echo '</p>';
            echo '<p style=" padding:1px 10px;width:100%; font-size:12px; color:#000000;text-align:justify;">';
            $sqlnotas = 'SELECT distinct(usu_codigo),usu_nome, not_nota, not_tipo_trabalho FROM artigos INNER JOIN notas ON id_submissao = not_art_codigo INNER JOIN usuarios ON usu_codigo = not_usu_codigo WHERE not_art_codigo ='.$regartigos->ID_SUBMISSAO;
            $resnotas = $con->banco->Execute($sqlnotas);
            while($regnotas = $resnotas->FetchNextObject()){
                echo '<b>'.$regnotas->NOT_TIPO_TRABALHO.'</b><br />'.$regnotas->USU_NOME.'   -   '.$regnotas->NOT_NOTA.'<br />';
            }
            
            echo '</p>';
            echo '<p style=" padding:1px 10px;width:100%; font-size:12px; color:#000000;text-align:justify;">';
            $sqlmedia = 'SELECT avg( not_nota ) AS nota FROM artigos INNER JOIN notas ON id_submissao = not_art_codigo INNER JOIN usuarios ON usu_codigo = not_usu_codigo  WHERE not_art_codigo ='.$regartigos->ID_SUBMISSAO;
            $resmedia = $con->banco->Execute($sqlmedia);
            if($regmedia = $resmedia->FetchNextObject()){
                echo 'Média: '.$regmedia->NOTA.'<br />';
            }
            
            echo '</p>';
            
            
          echo '</div>';  
        }
        
       
    }
    function verificar_autor($autor){

        if($autor==''){
            $res = '';
            return $res;
        }else{
            $res =  ', '.fullUpper($autor);
            return $res;
        }
        
    }
    ?>
</div>
