<div>
    <table>
        <tr>
        <?php
            while(($registro=$opcao->resultado->FetchNextObject())){
        ?>
                    <td>
                        <a href="#" onclick="<?php echo $registro->NUM_ESCRITA.'()';?>">
                            <fieldset class="classe<?php echo $registro->NUM_CODIGO?>">
                                <?php echo strtoupper($registro->NUM_NUMERO); ?><!-- chama a função javascript no arquivo principal.php-->  
                            </fieldset>
                        </a>
                    </td>
        <?php
            }
        ?>
        </tr>
    </table>
</div>
<script>
window.onload=function AUDIO_001(){
                    audio.src = 'audio/clique_sobre_um_dos_numeros_para_descobrir_seu_som.wav';
                    return false;
        }
        audio.autoplay = true;   
</script>