<script type="text/javascript" src="js/jquery-latest.pack.js"></script>

<?php

@session_start();     
if((!$_SESSION['email'])&&(!$_SESSION['senha'])&&(!($_SESSION['atribuicao']))){
        require('index.php');
} else { 
   if($_SESSION['atribuicao']=='Representante'){
       require "Connections/conecta.php";
       //$sql="SELECT * from equipe where eqp_curso='".$_SESSION['curso']."' and eqp_periodo='".$_SESSION['periodo']."'";
       //$resultado = $con->banco->Execute($sql);
       //if($registros = $resultado->FetchNextObject()){
       //    alerta($_SESSION['nome'].", você já inscreveu uma equipe para o ".$_SESSION['periodo']." Periodo de ".$_SESSION['curso'].".");
       //    require 'navcom/equipe_comprovante_pdf.php';
       //} else{  
        ?>
       <div id="pagina">
           <div class="home">  
               <?php
               if(isset($_REQUEST['acao'])){
                   if($_REQUEST['acao']=='listar'){
               
               ?>
               <form class="formularioEquipe" name="formFHISTART" method="post" action="">
                   <h1 class="titulo1">Formulário de Inscrição</h1>
                   <h3 class="titulo2">Identificação da Equipe:</h3>
                   <table class="tabela">
                       <input type="hidden" name="int_codigo" value="<?php echo $_SESSION['codigo']?>"/>
                       <tr>
                           <td class="th276t2">Curso: </td>
                           <td class="td700">
                               <?php echo $_SESSION['curso']?>
                           </td>
                       </tr>
                       <tr>
                           <td class="th276t2">Período Representado: </td>
                           <td class="td700">
                               <?php echo $_SESSION['periodo']?>
                           </td>
                       </tr>
                       <tr>
                           <td class="th276t2">Temática: </td>
                           <td class="td700">
                               
                               <?php 
                               $sql = "select eqp_tematica from equipe inner join integrante on eqp_codigo=int_eqp_codigo where int_eqp_codigo=".$_SESSION['int_eqp_codigo'];
                               $resultado = $con->banco->Execute($sql);
                               if ($registros= $resultado->FetchNextObject()){
                                   echo $registros->EQP_TEMATICA;
                               }
                               ?>                                           
                           </td>
                       </tr>
                       <?php
                       $sql = "select eqp_professor,eqp_musica,eqp_video,eqp_autor_mus from equipe inner join integrante on eqp_codigo=int_eqp_codigo where int_eqp_codigo=".$_SESSION['int_eqp_codigo'];
                               $resultado = $con->banco->Execute($sql);
                               if ($registros= $resultado->FetchNextObject()){
                                   if($registros->EQP_PROFESSOR !='' and $registros->EQP_MUSICA !='' and $registros->EQP_VIDEO !='' and $registros->EQP_AUTOR_MUS !=''){
                                       
                                   ?>
                                       <tr>
                                            <td class="th276t2">Professor Representante:</td><td class="td700"><?php echo $registros->EQP_PROFESSOR; ?></td>
                                       </tr>   
                                        <tr>
                                            <td class="th276t2">Título do Vídeo: </td><td class="td700"><?php echo $registros->EQP_VIDEO; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="th276t2">Título da Música: </td><td class="td700"><?php echo $registros->EQP_MUSICA; ?></td>
                                        </tr>
                                        <tr>
                                              <td class="th276t2">Autor da Música: </td><td class="td700"><?php echo $registros->EQP_AUTOR_MUS; ?></td>
                                        </tr>
                              <?php
                                 echo '</table>';
                                   }else{
                                       
                              ?>
                                        <tr>
                                            <td class="th276t2">Professor Representante:</td><td class="td700"><span id="sprytextfield1"><input class="input_550" type="text" name="eqp_professor" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                                        </tr>   
                                        <tr>
                                             <td class="th276t2">Título do Vídeo: </td><td class="td700"><span id="sprytextfield2"><input class="input_550" type="text" name="eqp_video" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                                        </tr>
                                        <tr>
                                             <td class="th276t2">Título da Música: </td><td class="td700"><span id="sprytextfield3"><input class="input_550" type="text" name="eqp_musica" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                                        </tr>
                                        <tr>
                                             <td class="th276t2">Autor da Música: </td><td class="td700"><span id="sprytextfield4"><input class="input_550" type="text" name="eqp_autor_musica" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                                        </tr>
                                        <!--
                                             <script type="text/javascript">
                <!--
                    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
                    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
                    var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
                    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
                    
                //-->
                </script>
                            <?php 
                               echo '</table>
                                     <input class="btn" type="submit" name="enviar" value="Enviar" />';
                               }
                               }
                            ?>
                       
                   
                   </form>
               
                   <h3 class="titulo2">Membros da Equipe Participante:</h3>
                   <table class="tabelaEquipe">
                       <tr>
                           <td class="th350novo">Nome</td>
                           <td class="th150novo">Atribuição</td>
                           <td class="th300novo">Curso</td>
                           <td class="th100novo">Período</td>
                           <!--<td class="td50novo"><a href="usucom.php?pc=inscrever_eqp&acao=inserir" ><img src="imagens/menu_add.png"/></a></td>-->
                           <td class="td50novo">---</td>
                       </tr>
                       <!--<tr class="tr_int_1">
                           <td class="td350novo"><input class="input_350" type="text" id="int_1_nome" name="int_1_nome" value="<?php echo $_SESSION['nome']?>" readonly="readonly"/></td>
                           <td class="td150novo"><input class="input_150" type="text" id="int_1_atribuicao" name="int_1_atribuicao" value="<?php echo $_SESSION['atribuicao']?>" readonly="readonly"/></td>
                           <td class="td300novo"><input class="input_300_new" type="text" id="int_1_curso" name="int_1_curso" value="<?php echo $_SESSION['curso']?>" readonly="readonly"/></td>
                           <td class="td100novo"><input class="input_100" type="text" id="int_1_periodo" name="int_1_periodo" value="<?php echo $_SESSION['periodo']?>" readonly="readonly"/></td>
                           <td class="td50novo">---</td>
                       </tr>-->
                       <?php
                       $sql="select int_nome,int_atribuicao,int_curso,int_periodo 
                           from integrante inner join equipe on eqp_codigo=int_eqp_codigo where int_eqp_codigo=".$_SESSION['int_eqp_codigo'];
                       $resultado = $con->banco->Execute($sql);
                        while($registros=$resultado->FetchNextObject()){
                        ?>
                        <tr class="tr_int_1">
                            <td class="td350novo"><?php echo $registros->INT_NOME ?></td>
                            <td class="td150novo"><?php echo $registros->INT_ATRIBUICAO ?></td>
                            <td class="td300novo"><?php echo $registros->INT_CURSO ?></td>
                            <td class="td100novo"><?php echo $registros->INT_PERIODO ?></td>
                            <td class="td50novo">---</td>
                        </tr>
                        <?php
                        }
                       ?>
                   </table>
                   <br><br>
                   <table class="tabela">
                       <tr>   
                           <td colspan="2">
                               <center><a href="imagens/REGULAMENTO_GERAL_III_FHISTART.pdf" target="_blank">VER REGULAMENTO GERAL  <img src="imagens/pdf.png" /></a></center>
                               <br>
                               <input type="checkbox" id="termo_aceite" name="termo_aceite"/>
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
                   <a class="btn" href="usucom.php?pc=equipe_comprovante_pdf"><center>Ver Inscrição</center></a>
                   <br>
                   <script type="text/javascript">
                <!--
                    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
                    var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
                    var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
                //-->
                </script>
               
               <?php                 
               }else if($_REQUEST['acao']=='inserir'){
               ?>
               
               <form action="" method="post" >
                   
                   <h3 class="titulo2">Membros da Equipe Participante:</h3>
                   <table class="tabelaEquipe">
                       <tr>
                           <td class="th276t">Nome:</td><td class="td700"><span id="sprytextfield5"><input class="input_550" type="text" name="int_nome" />&nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                       </tr>  
                       <tr>
                           <td class="th276t">CPF:</td><td class="td700"><!--<span id="sprytextfield6">--><span><input class="input_550" type="text" name="int_cpf" />&nbsp;<span class="textfieldRequiredMsg"></span></span></td>
                       </tr>
                       <tr>
                           <td class="th276t">Atribuição: </td><td class="td700">
                                <span id="spryselect1"><select class="input_550" name="int_atribuicao" >
                                    <option value=""></option>
                                    <option value="Suporte">Suporte</option>
                                    <option value="Cantor/Interprete">Cantor/Interprete</option>
                                    <option value="Expositor">Expositor</option>
                                    <option value="Produção/Vídeo">Produção/Vídeo</option>
                                </select>
                                    &nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span>
                                </span>
                               
                           </td>
                       </tr>
                       <tr>
                           <td class="th276t">Curso: </td>
                           <td class="td700">
                               <select class="input_550" name="int_curso" id="spryselect2" >
                                   <option value=""></option>
                                   <option value="Licenciatura em Ciências Biológicas">Licenciatura em Ciências Biológicas</option>
                                   <option value="Licenciatura em Computação">Licenciatura em Computação</option>
                               </select>
                               &nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span>
                           </td>
                       </tr>
                       <tr>
                           <td class="th276t">Periodo: </td>
                           <td class="td700">
                               <select class="input_550" name="int_periodo" id="spryselect3">
                                   <option value=""></option>
                                   <option value="1º">1º</option>
                                   <option value="3º">3º</option>
                                   <option value="5º">5º</option>
                                   <option value="7º">7º</option>
                               </select>
                               &nbsp;<span class="textfieldRequiredMsg">Campo obrigatório.</span></td>
                       </tr>
                   </table>
                   <br><br>
                   
                   <br><br>            
                   <input class="btn" type="submit" name="enviar" id="inscrever" value="Inscrever Membro" />
                   <br>
                   
                   <script type="text/javascript">
                <!--
                    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
                    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
                    var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
                    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
                    var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
                    var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
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
}
?>
<?php
                        if(isset($_REQUEST['enviar'])){
                            if($_REQUEST['acao']=='inserir'){
                                $sql = "insert into integrante (int_nome,int_cpf,int_atribuicao,int_curso,int_periodo,int_eqp_codigo)
                                values ('".$_REQUEST['int_nome']."','".$_REQUEST['int_cpf']."','".$_REQUEST['int_atribuicao']."','".$_REQUEST['int_curso']."','".$_REQUEST['int_periodo']."','".$_SESSION['int_eqp_codigo']."')";
                                if($resultado = $con->banco->Execute($sql)){
                                    alerta("O Integrante foi cadastrado com sucesso");
                                    echo "<meta http-equiv='refresh' content='0;URL=usucom.php?pc=inscrever_eqp&acao=listar'>";
                                }else {
                                    alerta('O integrante não foi cadastrado');
                                    echo "<meta http-equiv='refresh' content='0;URL=usucom.php?pc=inscrever_eqp&acao=listar'>";
                                }
                            }
                            else if($_REQUEST['acao']=='listar'){
                                $sql = "update equipe set eqp_professor = '".$_REQUEST['eqp_professor']."',eqp_musica = '".$_REQUEST['eqp_musica']."',eqp_video = '".$_REQUEST['eqp_video']."',eqp_autor_mus = '".$_REQUEST['eqp_autor_musica']."' where eqp_codigo= '".$_SESSION['int_eqp_codigo']."'";
                                if($resultado = $con->banco->Execute($sql)){
                                   alerta("Os dados foram inseridos");
                                   echo "<meta http-equiv='refresh' content='0;URL=usucom.php?pc=inscrever_eqp&acao=listar'>";                     
                                }else{
                                    alerta("Não foi inserido");
                                    echo "<meta http-equiv='refresh' content='0;URL=usucom.php?pc=inscrever_eqp&acao=listar'>";
                                
                                }
                            }
                            
                        }
                   ?>
