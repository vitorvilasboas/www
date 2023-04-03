<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen"><!-- invoca o arquivo css -->
        <script type="text/javascript" src="js/jquery-latest.pack.js">
        </script>
        <title>AlfaBeta</title>
    </head>
    <body> 
        <div id="box_geral">
            <a href="index.php"><div id="topo"></div></a>
            <div id="menu">          
                <table border="1px">
                    <tr>
                        <td><a href="principal.php?p=alfabeto_acao&op=alfabeto&acao=minusculo">MINUSCULO</a></td>
                        <td><a href="principal.php?p=alfabeto_acao&op=alfabeto&acao=maiusculo">MAIUSCULO</a></td>                       
                        <td><a href="principal.php?p=alfabeto_acao&op=alfabeto&acao=vogais">VOGAIS</a></td>
                        <td><a href="principal.php?p=alfabeto_acao&op=alfabeto&acao=consoantes">CONSOANTES</a></td>
                        <td><a href="principal.php?p=alfabeto_acao&op=color&acao=cores">CORES</a></td>
                        <td><a href="principal.php?p=alfabeto_acao&op=number&acao=numeros">NÚMEROS</a></td>
                        <td><a href="principal.php?p=alfabeto_acao&op=lib&acao=libras">LIBRAS</a></td>
                    </tr>     
                </table>                
            </div>
            <div id="letra_div">
                <table id="tabela_letra">
                    <tr>
                        <!-- INICIO... Verificando primeira imagem... se a opção do menu foi selecionada ou não -->
                        <?php
                        if(!isset($_REQUEST['op'])){
                        ?>
                            <td id="imagem1_coluna_sem_opcao">
                                <div id="imagem1_sem_opcao"><img src="imagens/desenhos/menina_apontando.png"/></div>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td id="imagem1_coluna"></td>
                        <?php
                        }
                        ?>
                        <!-- FIM... Verificando primeira imagem... se a opção do menu foi selecionada ou não -->
                        <!-- INÍCIO... Verificando Espaço para letras-->
                        <?php
                        if(!isset($_REQUEST['op'])){
                        ?>
                            <td id="letra_coluna_sem_opcao">
                                <p>ESCOLHA UMA OPÇÃO ACIMA</p>
                            </td>
                        <?php
                        } else {
                            if($_REQUEST['op']=='alfabeto'){
                            ?>
                            <td id="letra_coluna">
                                <table>
                                    <tr>
                                        <td id="letra_forma1"></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td id="letra_forma2"></td>
                                    </tr>
                                </table>
                            </td>
                            <?php
                            }else if($_REQUEST['op']=='lib'){
                            ?>
                            <td id="letra_coluna">
                                <table>
                                    <tr>
                                        <td id="letra_libras"></td>
                                    </tr>
                                </table>
                            </td>
                            <?php
                            }else if($_REQUEST['op']=='color'){
                            ?>
                            <td id="letra_coluna">
                                <table>
                                    <tr>                                  
                                        <td id="nome_cor"></td>
                                    </tr>
                                    <tr>
                                        <td id="cor"></td>
                                    </tr>
                                </table>
                            </td>
                            <?php
                            } else if($_REQUEST['op']=='number'){
                            ?>
                            <td id="letra_coluna">
                                <table>
                                    <tr>                                  
                                        <td id="numero"></td>
                                    </tr>
                                    <tr>
                                        <td id="letra_forma1"></td>
                                    </tr>
                                </table>
                            </td>
                            <?php
                            }
                        }
                        ?>
                        <!-- FIM... Verificando Espaço para letras-->
                        <!-- INICIO... Verificando segunda imagem... se a opção do menu foi selecionada ou não -->
                        <?php
                        if(!isset($_REQUEST['op'])){
                        ?>
                            <td id="imagem2_coluna_sem_opcao">
                                <div id="imagem2_sem_opcao"><img src="imagens/desenhos/macaco_apontando.png"/></div>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td id="imagem2_coluna"></td>
                        <?php
                        }
                        ?>
                        <!-- FIM... Verificando segunda imagem... se a opção do menu foi selecionada ou não -->
                    </tr>
                </table>   
           </div>
           <?php
           if(isset($_REQUEST['op'])){
           ?>
                <div id="alfabeto" >
                <?php
                    foreach ($_REQUEST as $___opt => $___val) {
                        $$___opt = $___val;
                    }
                    if(empty($p)) {
                        include("layout/alfabeto_acao.php");
                    }
                    elseif(substr($p, 0, 4)=='http' or substr($p, 0, 1)=="/" or substr($p, 0, 1)==".") 
                    {
                        echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a partir do Menu Principal.</font>'; 
                    }
                    else {
                        include("layout/$p.php");
                    }                   
                ?>
                </div>
           <?php
           }
           ?>                
            <div id="rodape"><center>PIBID IFTO ARAGUATINS &copy Copyright 2013</center></div>       
        </div>
        <script>   
            var audio = document.createElement('audio');
            var audio1 = document.createElement('audio');
            <?php
            if(!isset($_REQUEST['op'])){
            ?>
                //NÃO DEU CERTO.... EXECUTAR AUDIO NA PRIMEIRA PÁGINA SE NÃO HOUVER OPÇÃP
                window.onload=function AUDIO_VITOR(){
                    audio.src = 'audio/clique_na_opcao_desejada.wav';//Incluir audio (Clique sobre uma das cores...) 
                    audio.autoplay = true;
                }
            <?php        
            }
            if($_REQUEST['op']=='alfabeto'){
                $opcao->lista_alfabeto();
                while($opcao->registros=$opcao->resultado->FetchNextObject()){
                ?>
                    function <?php echo $opcao->registros->LETRA;?>(){
                        audio.src = 'audio/letras/<?php echo $opcao->registros->AUDIO;?>';
                        audio.autoplay = true;
                        $("#letra").remove();
                        $("#letra").remove();
                        $("#imagem1").remove();
                        $("#imagem2").remove();
                        <?php if($_REQUEST['acao']=='minusculo'){?>
                            var letra =   '<div id="letra"><a href="#" onclick="<?php echo $opcao->registros->LETRA;?>()"><label><?php echo $opcao->registros->LETRA;?></label></a></div>';
                        <?php } else if($_REQUEST['acao']=='maiusculo'){?>
                            var letra =   '<div id="letra"><a href="#" onclick="<?php echo $opcao->registros->LETRA;?>()"><label><?php echo strtoupper($opcao->registros->LETRA);?></label></a></div>';
                        <?php } else if($_REQUEST['acao']=='vogais'){?>
                            var letra =   '<div id="letra"><a href="#" onclick="<?php echo $opcao->registros->LETRA;?>()"><label><?php echo strtoupper($opcao->registros->LETRA);?></label></a></div>';
                        <?php } else if($_REQUEST['acao']=='consoantes'){?>
                            var letra =   '<div id="letra"><a href="#" onclick="<?php echo $opcao->registros->LETRA;?>()"><label><?php echo strtoupper($opcao->registros->LETRA);?></label></a></div>';
                        <?php } ?>
                        var imagem1 =   '<div id="imagem1"><a href="#" onclick="<?php echo $opcao->registros->IMG1;?>()"><img src="imagens/desenhos/<?php echo $opcao->registros->IMG1;?>.png"/></a></div>';
                        var imagem2 =   '<div id="imagem2"><a href="#" onclick="<?php echo $opcao->registros->IMG2;?>()"><img src="imagens/desenhos/<?php echo $opcao->registros->IMG2;?>.png"/></a></div>';                 
                        $("#imagem1_coluna").append(imagem1);
                        $("#letra_forma1").append(letra);
                        $("#letra_forma2").append(letra);
                        $("#imagem2_coluna").append(imagem2);
                        return false;
                        audio_agora();
                    }
                    
                    function <?php echo $opcao->registros->IMG1;?>(){
                        audio.src = 'audio/desenhos/<?php echo $opcao->registros->IMG1;?>.wav';
                        audio.autoplay = true;
                        return false; 
                    }
                    function <?php echo $opcao->registros->IMG2;?>(){
                        audio.src = 'audio/desenhos/<?php echo $opcao->registros->IMG2;?>.wav';
                        audio.autoplay = true;
                        return false; 
                    }  
                <?php 
                }
                ?>
                audio.autoplay = true;
            <?php
            
            } else if($_REQUEST['op']=='lib'){
                $opcao->lista_alfabeto();
                while($opcao->registros=$opcao->resultado->FetchNextObject()){
                ?>
                    function <?php echo $opcao->registros->LETRA;?>(){
                        audio.src = 'audio/letras/<?php echo $opcao->registros->AUDIO;?>';
                        audio.autoplay = true;
                        $("#letra_libras1").remove();
                        $("#imagem1").remove();
                        $("#imagem2").remove();
                        var letra_libras1 =   '<div id="letra_libras1"><a href="#" onclick="<?php echo $opcao->registros->LETRA;?>()"><img src="imagens/libras/<?php echo $opcao->registros->LETRA;?>.png"/></a></div>';
                        var imagem1 =   '<div id="imagem1"><a href="#" onclick="<?php echo $opcao->registros->IMG1;?>()"><img src="imagens/desenhos/<?php echo $opcao->registros->IMG1;?>.png"/></a></div>';
                        var imagem2 =   '<div id="imagem2"><a href="#" onclick="<?php echo $opcao->registros->IMG2;?>()"><img src="imagens/desenhos/<?php echo $opcao->registros->IMG2;?>.png"/></a></div>';                 
                        $("#imagem1_coluna").append(imagem1);
                        $("#letra_libras").append(letra_libras1);
                        $("#imagem2_coluna").append(imagem2);
                        return false;
                        audio_agora();
                    }
                    
                    function <?php echo $opcao->registros->IMG1;?>(){
                        audio.src = 'audio/desenhos/<?php echo $opcao->registros->IMG1;?>.wav';
                        audio.autoplay = true;
                        return false; 
                    }
                    function <?php echo $opcao->registros->IMG2;?>(){
                        audio.src = 'audio/desenhos/<?php echo $opcao->registros->IMG2;?>.wav';
                        audio.autoplay = true;
                        return false; 
                    } 
                <?php 
                }
                ?>
                audio.autoplay = true;
            <?php
            
            } else if($_REQUEST['op']=='color'){
                $opcao->lista_cores();
                while($opcao->registros=$opcao->resultado->FetchNextObject()){
                ?>
                    function <?php echo $opcao->registros->COR_NOME;?>(){
                        audio.src = 'audio/cores/<?php echo $opcao->registros->COR_AUDIO;?>';
                        $("#nome_da_cor").remove();
                        $("#cor_1").remove();
                        var nome_da_cor =   '<div id="nome_da_cor" style="color:<?php echo $opcao->registros->COR_HEXA;?>;"><label><?php echo $opcao->registros->COR_NOME;?></label></div>';
                        var cor =   '<div id="cor_1"><fieldset style="background:<?php echo $opcao->registros->COR_HEXA;?>;"></fieldset></div>';                
                        $("#nome_cor").append(nome_da_cor);
                        $("#cor").append(cor);
                        return false; 
                    } 
                <?php 
                }
                ?>
                audio.autoplay = true;
            <?php
            } else if($_REQUEST['op']=='number'){
                $opcao->lista_numeros();
                while($opcao->registros=$opcao->resultado->FetchNextObject()){
                ?>
                    function <?php echo $opcao->registros->NUM_ESCRITA;?>(){
                        audio.src = 'audio/numeros/<?php echo $opcao->registros->NUM_NUMERO;?>.wav';
                        $("#num_escrito").remove();
                        $("#numero_1").remove();
                        var num_escrito =   '<div id="num_escrito"><?php echo $opcao->registros->NUM_ESCRITA;?></div>';
                        var numero_1 =   '<div id="numero_1"><?php echo $opcao->registros->NUM_NUMERO;?></div>';                
                        $("#numero").append(num_escrito);
                        $("#letra_forma1").append(numero_1);
                        return false; 
                    } 
                <?php 
                }
                ?>
                audio.autoplay = true;
            <?php
            }
            ?>
            function audio_agora(){
                audio1.src = 'audio/agora_clique_sobre_os_desenhos.wav';
                    audio1.load();
                    audio1.play();
            }
        </script>
    </body>
</html>  

<!--
function AUDIO_1(){
            <?php //if(isset($_REQUEST['op'])){?>
                    audio.src = 'audio/letra.wav'; 
                    return false;
            <?php //}?>
        }
        audio.autoplay = true;
-->