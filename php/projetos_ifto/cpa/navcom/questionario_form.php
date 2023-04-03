
<?php
     @session_start();
     $_SESSION['curso']=$_REQUEST['fkcurso_codigo'];
     if($_SESSION['tipo_usuario']=='1'){
?>
          
<div id="pagina">
        <h3 class="titulo1">Questionário para os Estudantes</h3> 
        <form name="verifica_radio" class="formulario" action="usucom.php?pc=questionario_acao&acao=estudantes" method="post" enctype="multiparm/form-data" >              

          <?php
          $num_questao=0; $i=1;
          $sql_dim = ("select * from dimensao where DIM_TIPO_USUARIO=".$_SESSION['tipo_usuario']." order by DIM_NOME");
          $resultado_dim = $con->banco->Execute($sql_dim);
          while($registros_dim=$resultado_dim->FetchNextObject()){
                echo '<h1 class="titulo1">'.$registros_dim->DIM_NOME.' - '.$registros_dim->DIM_PERGUNTA.'</h1>';
                                ?>
                
                <?php
                //
                
                $sql_ques = "select * from questoes where FKDIM_CODIGO='".$registros_dim->DIM_CODIGO."' and FKTDU_CODIGO=".$_SESSION['tipo_usuario']."  order by ques_codigo";
                $resultado_ques = $con->banco->Execute($sql_ques);
                while($registros=$resultado_ques->FetchNextObject()){
                    //$num_questao=0; $i=1;
                ?>
                      
                      <div class="perguntas">
                      
                          <?php $num_questao=$i++; echo $registros->QUES_NOME;?>
                          <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $registros->QUES_CODIGO;?>"/>
                          <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
						  <input type="hidden" name="ano" value="2014"/>
                          <span id="questao<?php echo $num_questao ?>">
                          <p class="respostas">
                          
                             <?php   
                             //abre---------------------bloco de respostas-----------------------------------
                      
                             $sql_res = ("select * from respostas");
                             $resultado_res = $con->banco->Execute($sql_res);
                             while($registros=$resultado_res->FetchNextObject()){
                          
                      ?>
                            
                                <label>
                                    <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $registros->RESP_CODIGO;?>" /><?php echo $registros->RESP_NOME;?>
                                </label>
                               
                            
                       <?php
                         }
                         ?>
                          <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>
       
                      </p>
                      </span>
                      </div>
                          
                      <?php
                          //fecha---------------------bloco de respostas-----------------------------------
                         }
                    }
                    ?>
         
                    
        <input class="btn"type="submit" name="enviar" value="Enviar" />
        </form>
        </span>
                <script type="text/javascript">
                    <?php
                                              
                       for($num_quest=1;$num_quest<=71;$num_quest++){     
                    ?>
                        var questao<?php echo $num_quest ?>  = new Spry.Widget.ValidationRadio("questao<?php echo $num_quest ?>");
                    <?php
                        }
                    ?>
                
              </script>
        
       </div>

<?php     
}
 else if($_SESSION['tipo_usuario']=='2'){
     
?>
          
<div id="pagina">
        <h3 class="titulo1">Questionário para os Docentes</h3> 
        <form name="verifica_radio" class="formulario" action="usucom.php?pc=questionario_acao&acao=docentes" method="post" enctype="multiparm/form-data">              

          <?php
          $num_questao=0; $i=1;
          $sql_dim = ("select * from dimensao where DIM_TIPO_USUARIO=".$_SESSION['tipo_usuario']." order by DIM_NOME");
          $resultado_dim = $con->banco->Execute($sql_dim);
          while($registros_dim=$resultado_dim->FetchNextObject()){
                echo '<h1 class="titulo1">'.$registros_dim->DIM_NOME.' - '.$registros_dim->DIM_PERGUNTA.'</h1>';
                                ?>
                
                <?php
                //
                
                $sql_ques = "select * from questoes where FKDIM_CODIGO='".$registros_dim->DIM_CODIGO."' and FKTDU_CODIGO=".$_SESSION['tipo_usuario']."  order by ques_codigo";
                $resultado_ques = $con->banco->Execute($sql_ques);
                while($registros=$resultado_ques->FetchNextObject()){
                    //$num_questao=0; $i=1;
                ?>
                     <div class="perguntas">
                          <?php $num_questao=$i++; echo $registros->QUES_NOME;?>
                          <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $registros->QUES_CODIGO;?>"/>
                          <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
						  <input type="hidden" name="ano" value="2014"/>
                          <span id="questao<?php echo $num_questao ?>">
                             <p class="respostas">
                      
                                <?php   
                                //abre---------------------bloco de respostas-----------------------------------
                      
                                $sql_res = ("select * from respostas");
                                $resultado_res = $con->banco->Execute($sql_res);
                                while($registros=$resultado_res->FetchNextObject()){
                          
                                ?>
                            
                                <label>
                                    <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $registros->RESP_CODIGO;?>" /><?php echo $registros->RESP_NOME;?>
                                </label> 
                            
                                <?php
                                }
                                ?>
                                <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>
       
                           </p>
                        </span>
                    </div>
                          
               <?php
               //fecha---------------------bloco de respostas-----------------------------------
                    }
               }
               ?>                    
                <input class="btn"type="submit" name="enviar" value="Enviar" />
          </form>

          <script type="text/javascript">
                <?php                                            
                for($num_quest=1;$num_quest<=82;$num_quest++){     
                ?>
                       var questao<?php echo $num_quest ?>  = new Spry.Widget.ValidationRadio("questao<?php echo $num_quest ?>");
               <?php
                }
                ?>                
              </script>

       </div>

<?php     
}

   else if($_SESSION['tipo_usuario']=='3'){
?>
          
<div id="pagina">
        <h3 class="titulo1">Questionário para os Técnicos Administrativos</h3> 
        <form name="verifica_radio" class="formulario" action="usucom.php?pc=questionario_acao&acao=tec_adm" method="post" enctype="multiparm/form-data" >              
        <input type="hidden" name ="uc_usu_codigo" value="<?php echo $_SESSION['codigo'];?>" />
          <?php
          $num_questao=0; $i=1;
          $sql_dim = ("select * from dimensao where DIM_TIPO_USUARIO=".$_SESSION['tipo_usuario']." order by DIM_NOME");
          $resultado_dim = $con->banco->Execute($sql_dim);
          while($registros_dim=$resultado_dim->FetchNextObject()){
                echo '<h1 class="titulo1">'.$registros_dim->DIM_NOME.' - '.$registros_dim->DIM_PERGUNTA.'</h1>';
                                ?>
                
                <?php
                //
                
                $sql_ques = "select * from questoes where FKDIM_CODIGO='".$registros_dim->DIM_CODIGO."' and FKTDU_CODIGO=".$_SESSION['tipo_usuario']."  order by ques_codigo";
                $resultado_ques = $con->banco->Execute($sql_ques);
                while($registros=$resultado_ques->FetchNextObject()){
                    //$num_questao=0; $i=1;
                ?>
                     <div class="perguntas">
                          <?php $num_questao=$i++; echo $registros->QUES_NOME;?>
                          <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $registros->QUES_CODIGO;?>"/>
                          <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
						  <input type="hidden" name="ano" value="2014"/>
                      <span id="questao<?php echo $num_questao ?>">
                      <p class="respostas">
                <?php   
                      //abre---------------------bloco de respostas-----------------------------------
                      
                       $sql_res = ("select * from respostas");
                       $resultado_res = $con->banco->Execute($sql_res);
                       while($registros=$resultado_res->FetchNextObject()){
                          
                      ?>
                            
                                <label>
                                    <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $registros->RESP_CODIGO;?>" /><?php echo $registros->RESP_NOME;?>
                                </label> 
                            
                       <?php
                         }
                         ?>
                    <span class="radioRequiredMsg">Marque uma das opções de resposta. </span>
       
                      </p>
                      </span>
                      </div>
                          
                      <?php
                          //fecha---------------------bloco de respostas-----------------------------------
                         }
                    }
                    ?>
         
                    
        <input class="btn"type="submit" name="enviar" value="Enviar" />
        </form>
        </span>
                <script type="text/javascript">
                    <?php
                                              
                       for($num_quest=1;$num_quest<=55;$num_quest++){     
                    ?>
                        var questao<?php echo $num_quest ?>  = new Spry.Widget.ValidationRadio("questao<?php echo $num_quest ?>");
                    <?php
                        }
                    ?>
                
              </script>

<?php     
}
?>           


