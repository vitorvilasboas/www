<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
   <div id="pagina">  	
       <?php
       if ($_REQUEST['acao']=='incluir'){			
       ?>
           <h1 class="titulo1">Cadastrar Usuários</h1>
           <form  class="formulario"method="post" action="usuadm.php?pa=usuarios_acao&acao=gravar_incluir">
                
                <input type="hidden" name="usu_codigo" />
                <input type="hidden" name="usu_data_cadastro" />
                     <table>
                        <tr>
                            <th class="th276t"> Nome:</th><td class="td700"><input class="input_700" type="text" name="usu_nome" /></td>
                        </tr>
                        <tr>
                            <th class="th276t"> CPF:</th><td class="td700"><input class="input_200" type="text" name="usu_cpf" /></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Senha:</th><td class="td700"><input class="input_200" type="password" name="usu_senha" /></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Nível:</th><td class="td700"><input class="input_200" type="text" name="usu_nivel" /></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Email:</th><td class="td700"><input class="input_700" type="text" name="usu_email" /></td>
                        </tr>
                        <tr>

                            <th class="th276t"> Sexo:</th><td class="td700"><input class="input_radio" type="radio" name="usu_sexo" value="m" checked/>M <input class="input_radio" type="radio" name="usu_sexo" value="f"/>F</td>
                        </tr>
                        <tr>
                            <th class="th276t">Data Nascimento:</th><td class="td700"><input class="input_200" type="text" name="usu_data_nasc" /></td>
                        </tr>
                            <tr>
                                <th class="th276t"> Tel. Celular:</th><td class="td700"><input class="input_200" type="text" name="usu_celular" /></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Tel. Fixo:</th><td class="td700"><input class="input_200" type="text" name="usu_telefone" /></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Endereço:</th><td class="td700"><input class="input_200" type="text" name="usu_endereco" /></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Cidade:</th><td class="td700"><input class="input_700" type="text" name="usu_cidade" /></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Estado:</th>
                                <td class="td700">
                                    <select class="input_60" name="usu_uf">
                                        <option value="AC">AC</option>
                            		<option value="AL">AL</option>
                           		<option value="AM">AM</option>
                            		<option value="AP">AP</option>
                            		<option value="BA">BA</option>
                            		<option value="CE">CE</option>
                            		<option value="DF">DF</option>
                           		<option value="ES">ES</option>
                            		<option value="GO">GO</option>
                            		<option value="MA">MA</option>
                            		<option value="MG">MG</option>
                            		<option value="MS">MS</option>
                            		<option value="MT">MT</option>
                            		<option value="PA">PA</option>
                            		<option value="PB">PB</option>
                            		<option value="PE">PE</option>
                            		<option value="PI">PI</option>
                            		<option value="PR">PR</option>
                            		<option value="RJ">RJ</option>
                            		<option value="RN">RN</option>
                            		<option value="RO">RO</option>
                            		<option value="RR">RR</option>
                            		<option value="RS">RS</option>
                            		<option value="SC">SC</option>
                            		<option value="SE">SE</option>
                            		<option value="SP">SP</option>
                            		<option value="TO" selected>TO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="th276t"> CEP:</th><td class="td700"><input class="input_200"type="text" name="usu_cep" /></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Instituição:</th><td class="td700"><input class="input_700"type="text" name="usu_instituicao" /></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Modalidade:</th>
                                <td class="td700">
                                    <select class="input_200" name="usu_modalidade" >
                                        <option>Professor</option>
                                        <option>Estudante</option>
                                        <option>Outros</option>            
                                   </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="th276t"> Portador de necessidade especiais:</th><td class="td700"><input class="input_radio"type="radio" name="usu_portador" value="s"/>Sim <input class="input_radio"type="radio" name="usu_portador" value="n" checked/>Não</td>
                            </tr>
                      </table>                                   
                  <input class="btn" type="submit" name="salvar" value="Salvar"/>
             </form>
    
            <?php
            }else if ($_REQUEST['acao']=='alterar'){
            ?>
    
            <h1 class="titulo1">Alterar Usuários</h1>
            <form  class="formulario" method="post" action="usuadm.php?pa=usuarios_acao&acao=gravar_alterar">
            <input type="hidden" name="usu_codigo" value="<?php echo $opcao->registros->USU_CODIGO;?>"/>
            <input type="hidden" name="usu_data_cadastro" value="<?php echo $opcao->registros->USU_DATA_CADASTRO;?>"/>
                  
                        <table>
                        <tr>
                            <th class="th276t"> Nome:</th><td class="td700"><input class="input_700" type="text" name="usu_nome" value="<?php echo $opcao->registros->USU_NOME;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> CPF:</th><td class="td700"><input class="input_200" type="text" name="usu_cpf" value="<?php echo $opcao->registros->USU_CPF;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Senha:</th><td class="td700"><input class="input_200" type="password" name="usu_senha" value="<?php echo $opcao->registros->USU_SENHA;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Nível:</th><td class="td700"><input  class="input_200" type="text" name="usu_nivel" value="<?php echo $opcao->registros->USU_NIVEL;?>"/></td>
                        </tr>
                        <tr>
                            <th class="th276t"> Email:</th><td class="td700"><input  class="input_700"type="text" name="usu_email" value="<?php echo $opcao->registros->USU_EMAIL;?>"/></td>
                        </tr>
                        <tr>
                            <?php
                                $m_status = '';
                                $f_status = '';
                                $radio= $opcao->registros->USU_SEXO;
                                if($radio=='m'){$m_status='checked';}
                                else if ($radio=='f'){$f_status='checked';}
                                
                            ?>
                            <th class="th276t"> Sexo:</th><td><input class="input_radio" type="radio" name="usu_sexo" value="m" <?php echo $m_status;?>/>M <input class="input_radio" type="radio" name="usu_sexo" value="f" <?php echo $f_status;?>/>F</td>
                        </tr>
                        <tr>
                            <th class="th276t">Data Nascimento:</th><td class="td700"><input class="input_200" type="text" name="usu_data_nasc" value="<?php echo $opcao->registros->USU_DATA_NASC;?>"/></td>
                        </tr>
                            <tr>
                                <th class="th276t"> Tel. Celular:</th><td class="td700"><input class="input_200" type="text" name="usu_celular" value="<?php echo $opcao->registros->USU_CELULAR;?>"/></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Tel. Fixo:</th><td class="td700"><input class="input_200" type="text" name="usu_telefone" value="<?php echo $opcao->registros->USU_TELEFONE;?>"/></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Endereço:</th><td class="td700"><input class="input_700" type="text" name="usu_endereco" value="<?php echo $opcao->registros->USU_ENDERECO;?>"/></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Cidade:</th><td class="td700"><input class="input_700" type="text" name="usu_cidade" value="<?php echo $opcao->registros->USU_CIDADE;?>"/></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Estado:</th>
                                <td class="td700">
                                    <select class="input_60" name="usu_uf">
                                        <option value="<?php echo $opcao->registros->USU_UF; ?>" selected><?php echo $opcao->registros->USU_UF;?></option>
                                        <option value="AC">AC</option>
                            		<option value="AL">AL</option>
                           		<option value="AM">AM</option>
                            		<option value="AP">AP</option>
                            		<option value="BA">BA</option>
                            		<option value="CE">CE</option>
                            		<option value="DF">DF</option>
                           		<option value="ES">ES</option>
                            		<option value="GO">GO</option>
                            		<option value="MA">MA</option>
                            		<option value="MG">MG</option>
                            		<option value="MS">MS</option>
                            		<option value="MT">MT</option>
                            		<option value="PA">PA</option>
                            		<option value="PB">PB</option>
                            		<option value="PE">PE</option>
                            		<option value="PI">PI</option>
                            		<option value="PR">PR</option>
                            		<option value="RJ">RJ</option>
                            		<option value="RN">RN</option>
                            		<option value="RO">RO</option>
                            		<option value="RR">RR</option>
                            		<option value="RS">RS</option>
                            		<option value="SC">SC</option>
                            		<option value="SE">SE</option>
                            		<option value="SP">SP</option>
                            		<option value="TO">TO</option>
                                    </select>
                                </td>
                            <tr>
                                <th class="th276t"> CEP:</th><td class="td700"><input class="input_200" type="text" name="usu_cep" value="<?php echo $opcao->registros->USU_CEP;?>"/></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Instituição:</th><td class="td700"><input class="input_700" type="text" name="usu_instituicao" value="<?php echo $opcao->registros->USU_INSTITUICAO;?>"/></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Modalidade:</th>
                                 <td class="td700">
                                    <select class="input_200" name="usu_modalidade" value="<?php echo $opcao->registros->USU_MODALIDADE;?>">
                                        <option>Professor</option>
                                        <option>Estudante</option>
                                        <option>Outros</option> 
                                        <?php echo $opcao->listar_modalidade();?>
                                   </select>
                                </td>
                            </tr>
                            <tr>
                            <?php
                                $sim_status = '';
                                $nao_status = '';
                                $radio_p= $opcao->registros->USU_PORTADOR;
                                if($radio_p=='s'){$sim_status='checked';}
                                else if ($radio_p=='n'){$nao_status='checked';}
                                
                            ?>                               
                                <th class="th276t"> Portador de necessidade especiais::</th><td class="td700"><input class="input_radio"type="radio" name="usu_portador" value="s" <?php echo $sim_status;?>/>Sim <input class="input_radio"type="radio" name="usu_portador" value="n" <?php echo $nao_status;?>/>Não</td>
                            </tr>
                      </table>                                    
                   
                   <input class="btn" type="submit" name="salvar" value="Salvar"/>
               </form>
   
                <?php
                } 
                ?>
           </div>
<?php 
        }
    }
 ?>
