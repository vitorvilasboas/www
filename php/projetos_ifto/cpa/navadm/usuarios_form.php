<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
   <div id="pagina">  	
       <?php
       if ($_REQUEST['acao']=='incluir'){			
       ?>
           <h1 class="titulo1">Cadastrar Usuários</h1>
           <form  class="formulario"method="post" action="usuadm.php?pa=usuarios_acao&acao=gravar_incluir">
                 <table class="tabelas">
               <tr>
                    <td class="th276t">Nome:*</td><td class="td700"><span id="sprytextfield1"><input class="input_700" type="text" name="usu_nome" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Sobrenome:*</td><td class="td700"><span id="sprytextfield1"><input class="input_700" type="text" name="usu_sobrenome" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">CPF:* </td><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="usu_cpf" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">cpf inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">RG:* </td><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="usu_rg" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">cpf inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Email:* </td><td class="td700"><span id="sprytextfield4"><input class="input_700" type="text" name="usu_email" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">Email inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Senha:* </td><td class="td700"><span id="sprytextfield3"><input class="input_200" type="password" name="usu_senha" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                               <tr>
                    <td class="th276t">Matricula:* </td><td class="td700"><span id="sprytextfield11"><input class="input_200" type="text" name="usu_matricula" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Campus:* </td>
                    <td class="td700"><select class="input_200" name="fkcampus_codigo" id="spryselect2" >
                        <option value="1">Araguatins</option>
                        <option value="2">Araguaina</option>
                        <option value="3">Gurupi</option>
                        <option value="4">Palmas</option>
                        <option value="5">Paraíso TO</option>
                        <option value="6">Porto Nacional</option>    
                            
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td class="th276t">Categorias:* </td>
                    <td class="td700"><select class="input_200" name="fktdu_codigo" id="spryselect2" >
                        <option value="1">Estudante</option>
                        <option value="2">Professor</option>
                        <option value="3">Tecnico Administrativo</option>    
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="th276t">sexo:*</td><td class="td700"><input class="input_radio" type="radio" name="usu_sexo" value="m" checked/>M <input class="input_radio" type="radio" name="usu_sexo" value="f"/>F</td>
                </tr>
                <tr>
                    <td class="th276t">Nascimento:* </td><td class="td700"><span id="sprytextfield5"><input class="input_200" type="text" name="usu_data_nasc" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">data inválido.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Celular:* </td><td class="td700"><span id="sprytextfield6"><input class="input_200"type="text" name="usu_celular" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Telefone: </td><td class="td700"><input class="input_200" type="text" name="usu_telefone" /></td>
                </tr>
                <tr>
                    <td class="th276t">Endereço e Número:* </td><td class="td700"><span id="sprytextfield8"><input class="input_700" type="text" name="usu_endereco" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Bairro:* </td><td class="td700"><span id="sprytextfield8"><input class="input_700" type="text" name="usu_bairro" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Cidade:* </td><td class="td700"><span id="sprytextfield9"><input class="input_200" type="text" name="usu_cidade"/><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>
                    <td class="th276t">Estado:* </td>
                    <td class="td700">
                        <select class="input_60"  name="usu_uf" id="spryselect1">
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
                    <td class="th276t">CEP:*</td><td class="td700"><span id="sprytextfield10"><input class="input_200" type="text" name="usu_cep" /><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                </tr>
                <tr>   
                    <td colspan="2" style="text-align: right;"> * Campos Obrigatórios.</td>
                </tr>
                <script type="text/javascript">
                <!--
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
                                        <option>T0</option>
                                        <option>G0</option>
                                        <option>MA</option>
                                        <option>MG</option>
                                        <option>BA</option>
                                            <?php echo $opcao->listar_estados();?>
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
                                        <option value="1">Estudante</option>
										<option value="2">Professor</option>
                                        <option value="3">Tec. Administrativo</option>
                                        
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
                   
                   <input class="btn" type="submit" name="salvar" value="Salvar" />
               </form>
   
                <?php
                } 
                ?>
           </div>
<?php 
        }
    }
 ?>
