<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){
            require 'Connections/conecta.php';
 ?>
<div id="pagina"> 
            <h1 class="titulo1">Credenciamento</h1>
            <?php
            if(!isset($_REQUEST['enviar'])){
            ?>
            <form class="formulario" method="post" action=""> 
                <table>
                   <tr>      
                        <th class="th176t">Pesquisar</th> 
                        <td class="td800">
                            <select class="input_800" name="usu_codigo">
         
                            <?php
                                $sql = "select * from usuarios order by USU_NOME";
                                $resultado = $con->banco->Execute($sql); 	
                                while($registros = $resultado->FetchNextObject())
                                {
                                    echo '<option value="'.$registros->USU_CODIGO.'">'.$registros->USU_NOME.'</option>'; 
			  
                                }
                         
                            ?>
                            </select>
                        </td>
                   </tr>
               </table>
                <input class="btn" type ="submit" name="enviar" value="Pesquisar"/>
            </form>
              
                  <?php
            } else if(isset($_REQUEST['enviar'])){
                                $usuario = $_REQUEST['usu_codigo'];
                                $sql_usu=("select usu_nome,usu_cpf from usuarios where USU_CODIGO = ".$usuario);
                                $resultadousu = $con->banco->Execute($sql_usu);
                                if($registrousu = $resultadousu->FetchNextObject()){
								    
                                    echo '<table><tr> <td class="valor_a_pagar">'.$registrousu->USU_NOME.'</td>';
									echo '</tr></table>';
                                }
                    ?> 
              
               <form class="formulario" method="post" action="usuadm.php?pa=itens_caixa">
                   <input type="hidden" name="part_usu_codigo" value="<?php echo $usuario;?>" />
                   <input type="hidden" name="part_cred_codigo" value="<?php echo $_SESSION['codigo'];?>" />
                <table class="tabelas">  
                    <tr>
                        <th class="th600t">Descrição</th>
                        <th class="th176t">Valor</th>
                    </tr>
                    <?php
                        
                            //if($_REQUEST['acao']=='ver'){
                                $usuario = $_REQUEST['usu_codigo'];
                                $sql=("select usu_codigo,usu_cpf,usu_nome,mcso_codigo, mcso_horario,mcso_valor, mcso_titulo, mcso_condutor, mcso_resumo, mcso_status FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO = '$usuario' AND MCSO_STATUS='Ativo' and mcso_ano='".date('Y')."' order by mcso_horario");
                        $resultado = $con->banco->Execute($sql);
                        while($registro = $resultado->FetchNextObject()){
                    ?> 
                     <input type="hidden" name='minicursos[]' value="<?php echo $registro->MCSO_CODIGO;?>"/>
                    <tr>
                        <td class="td800"> <?php echo $registro->MCSO_HORARIO.' - '.$registro->MCSO_TITULO;?></td>
                        <td class="td150"> <?php if($registro->MCSO_VALOR=='0.00'){echo '<span> Gratuito </span>';} else {echo '<span>'.number_format($registro->MCSO_VALOR,2,',','.').'</span>';} ?></td>
                        
                    </tr>
                    <?php
                    
                    }
                    
                        $cpf = $registrousu->USU_CPF;
                        $sqlartigos= "select art_codigo,titulo,status_artigo from artigos where cpf_apresentador='$cpf'";
                        $resultadoartigos = $con->banco->Execute($sqlartigos);
                        while($registroartigos = $resultadoartigos->FetchNextObject()){
                    ?> 
                     <input type="hidden" name='artigos[]' value="<?php echo $registroartigos->ART_CODIGO;?>"/>
                     <input type="hidden" name='cpf_artigo' value="<?php echo $cpf;?>"/>
                     <tr>
                        <td class="td800" colspan="2"> 
                            <?php 
                            if(empty($registroartigos->TITULO)){
                                echo "Não é apresentador de trabalho";
                            }else{
                                echo '<b style="color:#000000;">Apresentador(a): </b>'.$registroartigos->TITULO.'<br /><b style="color:#000000;">Situação: </b> '.$registroartigos->STATUS_ARTIGO;
                            }
                            ?>
                        </td>
                        
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td class="tdespaco" colspan="2">_</td>
                    </tr>
              </table>
                <?php
                    
                    $sql = ("select tp_inscricao from tp_inscricao where tp_ano = '".date('Y')."' and TP_USUARIO = ".$usuario);
                    $resultado = $con->banco->Execute($sql);
                    if($registro = $resultado->FetchNextObject()){
                        if($registro->TP_INSCRICAO=='Inscrição Gratuita'){
                            $taxa = '0.00';
                            echo '<h1 class="valor_a_pagar">'.$registro->TP_INSCRICAO.' R$:  '.number_format($taxa,2,',','.').'</h1><hr />';
                        }
                        else if($registro->TP_INSCRICAO=='Inscrição com 1 (um) minicurso do evento e certificado de participação'){
                            $taxa = '0.00';
                            echo '<h1 class="valor_a_pagar">'.$registro->TP_INSCRICAO.' R$:  '.number_format($taxa,2,',','.').'</h1><hr />';                                       
                        }
                        else if($registro->TP_INSCRICAO=='Inscrição com 2 (dois) minicursos do evento e certificado de participação'){
                            $taxa = '0.00';
                            
                            echo '<h1 class="valor_a_pagar">'.$registro->TP_INSCRICAO.' R$:  '.number_format($taxa,2,',','.').'</h1><hr />';
                        }
                        						
                        
                    }else{
                            $taxa = '0.00';                          
                            echo '<h1 class="valor_a_pagar"> Atenção: Participante não escolheu uma modalidade. R$:  '.number_format($taxa,2,',','.').'</h1><hr />';
                        }
                    
                    $sql=("select sum(mcso_valor) as soma FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE mcso_ano = '".date('Y')."' and USU_CODIGO =".$usuario);
                    $resultado = $con->banco->Execute($sql);           
                        foreach($resultado as $chave => $linha){
                        $valor = $linha['soma'];
                        if($valor==''){
                            $valor='0.00';
                            echo'<h1 class="valor_a_pagar">Valor dos Mini-cursos/Oficinas R$:   '.number_format($valor,2,',','.').'</h1><hr />';
                            $total=$taxa + $valor;
                            echo '<h1 class="valor_a_pagar">Total a Pagar R$:   '.number_format($total,2,',','.').'</h1>';
                            echo '<input type="hidden" name="part_valor_pago" value="'.number_format($total,2,',','.').'" />';
                        }else{
                            echo'<h1 class="valor_a_pagar">Valor dos Mini-cursos/Oficinas R$:   '.number_format($valor,2,',','.').'</h1><hr />';
                            $total=$taxa + $valor;
                            echo '<h1 class="valor_a_pagar">Total a Pagar R$:   '.number_format($total,2,',','.').'</h1>';
                            echo '<input type="hidden" name="part_valor_pago" value="'.number_format($total,2,',','.').'" />';
                        }
                    }
                 
                
                  ?>
            
            <input class="btn" type="submit" name="credenciar" value="Credenciar"/>
            </form>
            

<?php 
            } 
        
        }
    }
 ?>
</div>