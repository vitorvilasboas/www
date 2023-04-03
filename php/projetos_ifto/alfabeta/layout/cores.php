<div>
    <table>
        <tr>
        <?php
            while(($registro=$opcao->resultado->FetchNextObject())){
        ?>
                    <td>
                        
                        <a href="#" onclick="<?php echo $registro->COR_NOME.'()';?>">
                            <fieldset style="background:<?php echo $registro->COR_HEXA;?>;"></fieldset>
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
                    audio.src = 'audio/clique_sobre_uma_das_cores_para_descobrir_seu_som.wav';
                    return false;
        }
        audio.autoplay = true;   
</script>