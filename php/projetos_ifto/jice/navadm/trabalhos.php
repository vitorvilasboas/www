<div id="pagina">
    <h1 class="titulo1">Trabalhos</h1>
    <?php
    require 'Connections/conecta.php';
    $sqlmodalidade = "select * from modalidades";
    $resmodalidade = $con->banco->Execute($sqlmodalidade);
    while($regmodalidade = $resmodalidade->FetchNextObject()){
        
        echo '<h1 style=" background:#f4f4f4; font-size:18px; border-bottom: 3px #666666 solid; padding:5px; margin: 5px;">'.$regmodalidade->TPT_DESCRICAO.'</h1>';
        $sqlartigos = 'select * from artigos where modalidade = '.$regmodalidade->TPT_CODIGO;
        $resartigos = $con->banco->Execute($sqlartigos);
        while($regartigos = $resartigos->FetchNextObject()){
            echo '<div style="border:1px solid #006600; border-left:20px solid #006600; padding: 5px; margin: 5px;">';
            echo '<p style=" padding:1px 10px;width:100%; font-size:14px; color:#333333;text-align:justify;"><b>Título:  </b>'.$regartigos->TITULO.'</p>';
            echo '<p style=" padding:1px 10px;width:100%; font-size:12px; color:#000000;text-align:justify;"> <b>Autor(es): </b>';
            echo fullUpper($regartigos->AUTOR_1);
            
            echo verificar_autor(trim($regartigos->AUTOR_2));
            echo verificar_autor(trim($regartigos->AUTOR_3));
            echo verificar_autor(trim($regartigos->AUTOR_4));
            echo verificar_autor(trim($regartigos->AUTOR_5));
            echo verificar_autor(trim($regartigos->AUTOR_6));
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
