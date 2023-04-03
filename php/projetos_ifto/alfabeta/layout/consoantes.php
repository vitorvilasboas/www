<div>
    <table>
        <tr>
        <?php
            while(($registro=$opcao->resultado->FetchNextObject())){
             if($registro->CODIGO==14){
                    if($registro->CODIGO!=1 && ($registro->CODIGO!=5) && ($registro->CODIGO!=9) && ($registro->CODIGO!=15) && ($registro->CODIGO!=21)){
        ?>
                    <td>
                        <a href="#" onclick="<?php echo $registro->LETRA.'()';?>">
                            <fieldset class="classe<?php echo $registro->CODIGO?>">
                                <?php echo strtoupper($registro->LETRA); ?><!-- chama a função javascript no arquivo principal.php-->  
                            </fieldset>
                        </a>
                    </td>
                    </tr><tr><!-- NÃO APAGAR... SERVE PARA PULAR A LINHA -->
        <?php
                    }
                } else {
                    if($registro->CODIGO!=1 && ($registro->CODIGO!=5) && ($registro->CODIGO!=9) && ($registro->CODIGO!=15) && ($registro->CODIGO!=21)){
            ?>
                        <td>
                            <a href="#" onclick="<?php echo $registro->LETRA.'()';?>">
                                <fieldset class="classe<?php echo $registro->CODIGO?>">
                                    <?php echo strtoupper($registro->LETRA); ?><!-- chama a função javascript no arquivo principal.php-->  
                                </fieldset>
                            </a>
                        </td>
            <?php
                    }
                }
            }
        ?>
        </tr>
    </table>
</div>
<script>
window.onload=function AUDIO_001(){
                    audio.src = 'audio/clique_sobre_uma_letra_para_descobrir_seu_som.wav'; 
                    return false;
        }
        audio.autoplay = true;   
</script>