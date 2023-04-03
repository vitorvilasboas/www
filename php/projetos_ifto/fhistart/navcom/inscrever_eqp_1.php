<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
                    var contador=1;
                    function novo_integrante() {
                        contador++;
                        var  novoscampos =  '<tr class="tr_int_'+contador+'"><td class="td350novo"><span id="sprytextfield1"><input class="input_350" type="text" id="int_'+contador+'_nome" name="int_'+contador+'_nome"/></span></td>';
                             novoscampos += '<td class="td150novo"><span id="spryselect1"><select class="input_150" id="int_'+contador+'_atribuicao" name="int_'+contador+'_atribuicao" onchange="habilita();"><option value=""></option><option value="Suporte">Suporte</option><option value="Cantor/Interprete">Cantor/Interprete</option><option value="Expositor">Expositor</option><option value="Produção/Vídeo">Produção/Vídeo</option></select></span></td>';
                             novoscampos += '<td class="td300novo"><span id="spryselect2"><select class="input_300_new" id="int_'+contador+'_curso" name="int_'+contador+'_curso" ><option value=""></option><option value="Licenciatura em Ciências Biológicas">Licenciatura em Ciências Biológicas</option><option value="Licenciatura em Computação">Licenciatura em Computação</option></select></span></td>';
                             novoscampos += '<td class="td100novo"><span id="spryselect3"><select class="input_100" id="int_'+contador+'_periodo" name="int_'+contador+'_periodo" ><option value=""></option><option value="1º">1º</option><option value="3º">3º</option><option value="5º">5º</option><option value="7º">7º</option></select></span></td>';
                             novoscampos += '<td class="td50novo"><a href="#" onclick="exclui_integrante('+contador+')"><img src="imagens/deletar.png" name="int_'+contador+'_excluir" value=" X "/></a></td></tr>';
                        $(".tabelaEquipe").append(novoscampos);
                        return false;
                    }
                    function exclui_integrante(linha) {
                        $(".tr_int_"+linha).remove();
                        contador--;
                        return false;
                    }
                    function habilita() {
                        var qtd_cantor=0;
                        var qtd_expositor=0;
                        var qtd_sup=0;
                        var qtd_pvideo=0;
                        var testa=0;
                        while(testa <=contador){
                            var atribuicao = document.formFHISTART.int[document.int_+testa+_.atribuicao.selectedIndex].value
                            if(atribuicao=='Cantor/Interprete'){
                                qtdcantor++;
                            } else if(atribuicao=='Expositor'){
                                qtd_expositor++;
                            } else if(atribuicao=='Suporte'){
                                qtd_sup++;
                            } else if(atribuicao=='Produção/Vídeo'){
                                qtd_pvideo++;
                            }
                            testa++;
                        }
                        //(formFHISTART.termo_aceite.checked) &&  && (qtd_expositor==1) && (qtd_sup>0) && (qtd_pvideo>0)
                        if((qtdcantor==1)){
                            document.formFHISTART.inscrever.value=false;
                        } else {
                            document.formFHISTART.inscrever.value=true;
                        }
                        return true;
                    }
                    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
                    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                    var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
                    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
                    var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                    var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "phone_number", {format:"phone_custom", useCharacterMasking:true, pattern:"(00) 0000-0000"});
                    var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
                    var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
                    var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "custom", {useCharacterMasking:true, pattern:"00.000-000"});
                    var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect2");
                //-->
                </script>
<?php

@session_start();     
if((!$_SESSION['email'])&&(!$_SESSION['senha'])&&(!($_SESSION['atribuicao']))){
        require('index.php');
} else { 
   if($_SESSION['atribuicao']=='Representante'){
       require "Connections/conecta.php";
       $sql="SELECT * from equipe where eqp_curso='".$_SESSION['curso']."' and eqp_periodo='".$_SESSION['periodo']."'";
       $resultado = $con->banco->Execute($sql);
       if($registros = $resultado->FetchNextObject()){
           alerta($_SESSION['nome'].", você já inscreveu uma equipe para o ".$_SESSION['periodo']." Periodo de ".$_SESSION['curso'].".");
           require 'navcom/equipe_comprovante_pdf.php';
       } else {  
        ?>
       <div id="pagina">
           <div class="home">
               <form class="formularioEquipe" name="formFHISTART" method="post" action="usucom.php?pc=equipe_inscricao" target="_blank" width="845" heigth="595" method="post">
                   <h1 class="titulo1">Formulário de Inscrição</h1>
                   <h3 class="titulo2">Identificação da Equipe:</h3>
                   <table class="tabela">
                       <tr>
                           <td class="th276t">Curso: </td>
                           <td class="td700">
                               <input class="input_550" type="text" name="eqp_curso" value="<?php echo $_SESSION['curso']?>" readonly="readonly"/>
                           </td>
                       </tr>
                       <tr>
                           <td class="th276t">Período Representado: </td>
                           <td class="td700">
                               <input class="input_550" type="text" name="eqp_periodo" value="<?php echo $_SESSION['periodo']?>" readonly="readonly"/>
                           </td>
                       </tr>
                       <tr>
                           <td class="th276t">Temática: </td>
                           <td class="td700">
                               <?php 
                                    if(($_SESSION['curso']=='Licenciatura em Computação')&&($_SESSION['periodo']=='1º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="Práticas pedagógicas inclusivas: Desafios para a formação docente" readonly="readonly"/>
                                        <?php
                                    } else if(($_SESSION['curso']=='Licenciatura em Computação')&&($_SESSION['periodo']=='3º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="A Escola e as Relações Étnico-raciais" readonly="readonly"/>
                                        <?php
                                    } else if(($_SESSION['curso']=='Licenciatura em Computação')&&($_SESSION['periodo']=='5º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="Práticas Inclusivas dos deficientes através das tecnologias assistivas" readonly="readonly"/>
                                        <?php
                                    } else if(($_SESSION['curso']=='Licenciatura em Computação')&&($_SESSION['periodo']=='7º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="A Participação Familiar no Processo Educativo dos Filhos com Necessidades Educacionais Especiais" readonly="readonly"/>
                                        <?php
                                    } else if(($_SESSION['curso']=='Licenciatura em Ciências Biológicas')&&($_SESSION['periodo']=='1º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="Formação de competências para trabalhar com Altas Habilidades, Superdotação e Hiperatividade - TDAH" readonly="readonly"/>
                                        <?php
                                    } else if(($_SESSION['curso']=='Licenciatura em Ciências Biológicas')&&($_SESSION['periodo']=='3º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="Escola Inclusiva para os estudantes Autistas - TGD, e com Transtorno de Deficit de Atenção - TDA" readonly="readonly"/>
                                        <?php
                                    } else if(($_SESSION['curso']=='Licenciatura em Ciências Biológicas')&&($_SESSION['periodo']=='5º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="Concepções e Práticas docentes relativas à inclusão dos estudantes com Deficiência Intelectual e Síndrome de Down" readonly="readonly"/>
                                        <?php
                                    } else if(($_SESSION['curso']=='Licenciatura em Ciências Biológicas')&&($_SESSION['periodo']=='7º')){
                                        ?>
                                            <input class="input_550" type="text" name="eqp_tematica" value="A Escola e as Relações de gêneros/Orientação sexual" readonly="readonly"/>
                                        <?php
                                    }
                               ?> 
                           </td>
                       </tr>
                       <tr>
                           <td class="th276t">Professor Representante:</td><td class="td700"><input class="input_550" type="text" name="eqp_professor" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                       </tr>   
                       <tr>
                           <td class="th276t">Título do Vídeo: </td><td class="td700"><input class="input_550" type="text" name="eqp_video" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                       </tr>
                       <tr>
                           <td class="th276t">Título da Música: </td><td class="td700"><input class="input_550" type="text" name="eqp_musica" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                       </tr>
                       <tr>
                           <td class="th276t">Autor da Música: </td><td class="td700"><input class="input_550" type="text" name="eqp_autor_musica" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                       </tr>
                   </table>
                   <h3 class="titulo2">Membros da Equipe Participante:</h3>
                   <table class="tabelaEquipe">
                       <tr>
                           <td class="th350novo">Nome</td>
                           <td class="th150novo">Atribuição</td>
                           <td class="th300novo">Curso</td>
                           <td class="th100novo">Período</td>
                           <td class="td50novo"><a href="#" onclick="novo_integrante(); "><img src="imagens/menu_add.png"/></a></td>
                       </tr>
                       <tr class="tr_int_1">
                           <td class="td350novo"><input class="input_350" type="text" id="int_1_nome" name="int_1_nome" value="<?php echo $_SESSION['nome']?>" readonly="readonly"/></td>
                           <td class="td150novo"><input class="input_150" type="text" id="int_1_atribuicao" name="int_1_atribuicao" value="<?php echo $_SESSION['atribuicao']?>" readonly="readonly"/></td>
                           <td class="td300novo"><input class="input_300_new" type="text" id="int_1_curso" name="int_1_curso" value="<?php echo $_SESSION['curso']?>" readonly="readonly"/></td>
                           <td class="td100novo"><input class="input_100" type="text" id="int_1_periodo" name="int_1_periodo" value="<?php echo $_SESSION['periodo']?>" readonly="readonly"/></td>
                           <td class="td50novo">---</td>
                       </tr>
                   </table>
                   <br><br>
                   <table class="tabela">
                       <tr>   
                           <td colspan="2">
                               <center><a href="imagens/REGULAMENTO_GERAL_III_FHISTART.pdf" target="_blank">REGULAMENTO GERAL</a></center>
                               <br>
                               <input type="checkbox" id="termo_aceite" name="termo_aceite" value="n" onclick="document.getElementById('inscrever').disabled = !this.checked;"/>
                               Declaro estar ciente dos termos do regulamento do Festival, cujo teor não tenho nenhuma restrição.
                           </td>
                       </tr> 
                   </table>
                   <br><br>
                   <div style="text-align: center; color: #006699;">
                       <?php
                           if(date('m')=='1'){$data='Janeiro';}
                           elseif(date('m')=='2'){$data='Fevereiro';}
                           elseif(date('m')=='3'){$data='Março';}
                           elseif(date('m')=='4'){$data='Abril';}
                           elseif(date('m')=='5'){$data='Maio';}
                           elseif(date('m')=='6'){$data='Junho';}
                           elseif(date('m')=='7'){$data='Julho';}
                           elseif(date('m')=='8'){$data='Agosto';}
                           elseif(date('m')=='9'){$data='Setembro';}
                           elseif(date('m')=='10'){$data='Outubro';}
                           elseif(date('m')=='11'){$data='Novembro';}
                           elseif(date('m')=='12'){$data='Dezembro';}
                           echo "Araguatins-TO, ".date('d')." de ".$data." de ".date('Y'); 
                       ?>
                   </div>
                   <br><br>            
                   <input class="btn" type="submit" name="inscrever" id="inscrever" value="Inscrever" disabled="disabled"/>
                   <br>
                   <script type="text/javascript">
                <!--
                    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
                    var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
                    var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
                //-->
                </script>
               </form>
           </div>
       </div>
<?php
    } 
   }
}
?>
