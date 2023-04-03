<?php 
@session_start();     
if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
     echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{ 
    if($_SESSION['nivel']=='admin'){
?>
        <div id="pagina">
            <h3 class="titulo1">Pesquisa de Satisfação dos participantes da 7ª JICE</h3> 
            <form name="verifica_radio" class="formulario" action="" method="post" enctype="multiparm/form-data" >              

            <div class="perguntas">
                1 - Tipo de Participação?              
                <input type="hidden" name="questoes[1]"  value="1"/>
                <span id="questao1">
                    <p class="respostas">           
                        <label>
                            <input type="radio" name="respostas[1]" value="CONVIDADO/VISITANTE" />CONVIDADO/VISITANTE<br />
                            <input type="radio" name="respostas[1]" value="PROFESSOR DO IFTO" />PROFESSOR DO IFTO<br />
                            <input type="radio" name="respostas[1]" value="T.A.E. DO IFTO" />T.A.E. DO IFTO<br />
                            <input type="radio" name="respostas[1]" value="ALUNO DO IFTO" />ALUNO DO IFTO<br />
                            <input type="radio" name="respostas[1]" value="OUTRO" />OUTRO<br /> 
                        </label>
                        <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>

                    </p>
                </span>
            </div> 

            <div class="perguntas">
                2 - Como você avalia a hospedagem em Araguatins?              
                <input type="hidden" name="questoes[2]"  value="2"/>
                <span id="questao2">
                    <p class="respostas">           
                        <label>
                            <input type="radio" name="respostas[2]" value="Muita disponibilidade e qualidade" />Muita disponibilidade e qualidade<br />
                            <input type="radio" name="respostas[2]" value="Muita disponibilidade, porém com má qualidade" />Muita disponibilidade, porém com má qualidade<br />
                            <input type="radio" name="respostas[2]" value="Pouca disponibilidade, porém com boa qualidade" />Pouca disponibilidade, porém com boa qualidade<br />
                            <input type="radio" name="respostas[2]" value="Pouca disponibilidade e com má qualidade" />Pouca disponibilidade e com má qualidade <br />
                        </label>
                        <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>

                    </p>
                </span>
            </div>
            <div class="perguntas">
                3 - Como você avalia a programação da 7ª JICE?              
                <input type="hidden" name="questoes[3]"  value="3"/>

                <span id="questao3">
                    <p class="respostas">           
                        <label>
                            <input type="radio" name="respostas[3]" value="Excelente" />Excelente<br />
                            <input type="radio" name="respostas[3]" value="Bom" />Bom<br />
                            <input type="radio" name="respostas[3]" value="Regular" />Regular<br />
                            <input type="radio" name="respostas[3]" value="Ruim" />Ruim <br />
                        </label>
                        <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>

                    </p>
                </span>
            </div>
            <div class="perguntas">
                4 - Em relação aos espaços (Ginásio, espaço de Vivência, salas de aula e laboratórios) utilizados na 7ª JICE, você os considera:              
                <input type="hidden" name="questoes[4]"  value="4"/>

                <span id="questao4">
                    <p class="respostas">           
                        <label>
                            <input type="radio" name="respostas[4]" value="Excelente" />Excelente<br />
                            <input type="radio" name="respostas[4]" value="Bom" />Bom<br />
                            <input type="radio" name="respostas[4]" value="Regular" />Regular<br />
                            <input type="radio" name="respostas[4]" value="Ruim" />Ruim <br />
                        </label>
                        <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>

                    </p>
                </span>
            </div>
            <div class="perguntas">
                5 -  Em relação ao atendimento (rapidez, qualidade do cardápio e espaço) do refeitório na 7ª JICE, você o considera:              
                <input type="hidden" name="questoes[5]"  value="5"/>

                <span id="questao5">
                    <p class="respostas">           
                        <label>
                            <input type="radio" name="respostas[5]" value="Excelente" />Excelente<br />
                            <input type="radio" name="respostas[5]" value="Bom" />Bom<br />
                            <input type="radio" name="respostas[5]" value="Regular" />Regular<br />
                            <input type="radio" name="respostas[5]" value="Ruim" />Ruim <br />
                        </label>
                        <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>

                    </p>
                </span>
            </div>
            <div class="perguntas">
                6 -  Como você avalia a comunicação da 7ª JICE?              
                <input type="hidden" name="questoes[6]"  value="6"/>

                <span id="questao6">
                    <p class="respostas">           
                        <label>
                            <input type="radio" name="respostas[6]" value="Objetiva e acessível" />Objetiva e acessível<br />
                            <input type="radio" name="respostas[6]" value="Objetiva, poré, pouco acessível" />Objetiva, poré, pouco acessível<br />
                            <input type="radio" name="respostas[6]" value="Confusa, porém acessível" />Confusa, porém acessível<br />
                            <input type="radio" name="respostas[6]" value="Confusa e pouco acessível" />Confusa e pouco acessível<br /> 
                        </label>
                        <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>

                    </p>
                </span>
            </div>

            <div class="perguntas">
                7 -  Quanto a organização da 7ª JICE, você a  considera:              
                <input type="hidden" name="questoes[7]"  value="7"/>
                <span id="questao7">
                    <p class="respostas">           
                        <label>
                            <input type="radio" name="respostas[7]" value="Excelente" />Excelente<br />
                            <input type="radio" name="respostas[7]" value="Bom" />Bom<br />
                            <input type="radio" name="respostas[7]" value="Regular" />Regular<br />
                            <input type="radio" name="respostas[7]" value="Ruim" />Ruim<br /> 
                        </label>
                        <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>

                    </p>
                </span>
            </div> 
            <div class="perguntas">
                8 -  Deixe aqui suas críticas, sugestões ou elogios da 7ª JICE:              
                <input type="hidden" name="questoes[8]"  value="8"/>
                <span id="questao7">
                    <p class="respostas">           
                        <label>
                            <textarea cols="80" rows="5" name="respostas[8]">

                            </textarea> 
                        </label>
                    </p>
                </span>
            </div> 



            <input class="btn"type="submit" name="enviar" value="Enviar" />
            </form>
            <script type="text/javascript">
                <?php

                   for($num_quest=1;$num_quest<=7;$num_quest++){     
                ?>
                    var questao<?php echo $num_quest ?>  = new Spry.Widget.ValidationRadio("questao<?php echo $num_quest ?>");
                <?php
                    }
                ?>

            </script>

        </div>

    <?php 
        require 'questionario_classe.php';
        $opcao = new questionario_classe();
        $usuario = $_SESSION['codigo'];
        $ano = '2016';
        if(isset($_REQUEST['enviar'])){
            $questao = $_REQUEST['questoes'];
            $respostas = $_REQUEST['respostas'];
            $validar =  $opcao->validar_avaliacao($usuario);
            if($validar==0){
                for($i=1;$i<=8;$i++){
                    $opcao->cadastrar($questao[$i], $respostas[$i], $usuario, $ano);
                }
            }else{
                echo alerta("Você já avaliou o evento");
            }
        }
    }
}
?>