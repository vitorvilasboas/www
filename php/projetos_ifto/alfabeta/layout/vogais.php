<div>
    <table>
        <tr>
        <?php
            while(($registro=$opcao->resultado->FetchNextObject())){
                if($registro->CODIGO==1 or ($registro->CODIGO==5) or ($registro->CODIGO==9) or ($registro->CODIGO==15) or ($registro->CODIGO==21)){
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
        ?>
        </tr>
    </table>
</div>
<script>       
        var audio1 = document.createElement('audio');
        window.onload=function AUDIO_001(){
                    //audio1.src = 'audio/vamos_aprender_o_som_das_letras.wav';
                    audio1.src = 'audio/clique_sobre_uma_letra_para_descobrir_seu_som.wav';
                    audio1.autoplay = true
                    return false;
        }
</script>