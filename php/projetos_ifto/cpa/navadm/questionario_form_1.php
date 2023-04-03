<?php if($_REQUEST['acao']=='estudantes'){ ?>
<div id="pagina">
        <h3 class="titulo1">Questionario dos Estudantes</h3> 
        <form class="formulario" action="usuadm.php?pa=questionario_acao&acao=gravar_incluir" method="post" enctype="multiparm/form-data">              
            <?php
            echo 'A – Em relação à missão e o plano desenvolvimento institucional, você considera:';              
             ?> 
                  <div>
                   <?php 
               
                        $num_questao=0; $i=1;
                        $opcao->listar_dim1e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>  
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'B - Em relação ao ensino.';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim2e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'C - Em relação à pesquisa, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim3e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'D - Em relação à extensão e cultura, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim4e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'E - Em relação à organização e gestão educacional, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim5e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            
            <?php
            echo 'F - Em relação à infraestrutura, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim6e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'G - Em relação à comunicação com a sociedade, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim7e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'H - Em relação às políticas de atendimento, a alunos, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim8e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'I - AUTO AVALIAÇÃO: eu como aluno tenho';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim9e();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            
            <input class="btn"type="submit" name="enviar" value="Enviar" />
        </form>
       </div>

<?php } elseif($_REQUEST['acao']=='docentes'){ ?>
<div id="pagina">
        <h3 class="titulo1">Questionario dos Docentes</h3> 
        <form class="formulario" action="usuadm.php?pa=questionario_acao&acao=gravar_incluir" method="post" enctype="multiparm/form-data">              
            <?php
            echo 'A – Em relação à missão e o plano desenvolvimento institucional, você considera:';              
             ?> 
                  <div>
                   <?php 
               
                        $num_questao=0; $i=1;
                        $opcao->listar_dim1d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>  
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'B - Em relação a pesquisa, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim2d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'C - Em relação à extensão e cultura, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim3d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'D - Em relação ao ensino.:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim4d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'E - Em relação à organização e gestão educacional, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim5d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'F - Em relação à infraestrutura, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim6d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'G - Em relação às políticas de pessoal e de carreira, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim7d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'H - Em relação à comunicação com a sociedade, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim8d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'I - Em relação às políticas de atendimento, a alunos, você considera::';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim9d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
                        <?php
            echo 'I - Em relação às políticas de atendimento, a alunos, você considera::';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim10d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'J - Em relação a avaliação e planejamento, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim11d();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            
            <input class="btn"type="submit" name="enviar" value="Enviar" />
        </form>
       </div>
<?php } if($_REQUEST['acao']=='tecnicos_adm'){ ?>
<div id="pagina">
        <h3 class="titulo1">Questionario para os Técnicos Administrativos.</h3> 
        <form class="formulario" action="usuadm.php?pa=questionario_acao&acao=gravar_incluir" method="post" enctype="multiparm/form-data">              
            <?php
            echo 'A – Em relação à missão e o plano desenvolvimento institucional, você considera:';              
             ?> 
                  <div>
                   <?php 
               
                        $num_questao=0; $i=1;
                        $opcao->listar_dim1t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>  
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'B - Em relação à organização e gestão educacional, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim2t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'C - Em relação ao ensino, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim3t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'D - Em relação à infraestrutura, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim4t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'E - Em relação às políticas de pessoal e de carreira, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim5t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'F - Em relação à comunicação com a sociedade, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim6t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
           
            <?php
            echo 'G - Em relação a avaliação e planejamento, você considera:';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim7t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            <?php
            echo 'H - AUTO AVALIAÇÃO: eu como servidor tenho';              
             ?> 
                  <div>
                   <?php                        
                        $opcao->listar_dim8t();
                        while($opcao->registros=$opcao->resultado->FetchNextObject()){                                       
                   ?>  
                            <div class="questoes">
                                <p class="perguntas">
                                    <?php $num_questao=$i++; echo $opcao->registros->QUES_NOME;?>
                                    <input type="hidden" name="questoes[<?php echo $num_questao ?>]"  value="<?php echo $opcao->registros->QUES_CODIGO;?>"/>
                                    <input type="hidden" name="contador" value="<?php echo $num_questao ?>"/>
                                </p>
                                <p class="respostas">
                                    <?php 
                      
                                    echo $opcao->listar_respostas(); 
                                    while($opcao->registros_res=$opcao->resultado_res->FetchNextObject()){
                        
                                    ?>
                
                                        <label>
                                            <input type="radio" name="respostas[<?php echo $num_questao ?>]" value="<?php  echo $opcao->registros_res->RESP_CODIGO;?>" /><?php echo $opcao->registros_res->RESP_NOME;?>
                                        </label>             
                                    <?php
                                    }
                                    ?>
                                </p>    
                          </div>
                    <?php     
                    }
                   ?>
            </div>
            
            <input class="btn"type="submit" name="enviar" value="Enviar" />
        </form>
       </div>

<?php     
     }
 ?>
            


