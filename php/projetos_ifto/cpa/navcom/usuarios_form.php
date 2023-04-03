<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>
   <div id="pagina">  	
      
    
            <?php
            if ($_REQUEST['acao']=='alterar'){
            ?>
    
            <h1 class="titulo1">Alterar Usuários</h1>
            <form  class="formulario" method="post" action="usucom.php?pc=usuarios_acao&acao=gravar_alterar">
            <input type="hidden" name="usu_codigo" value="<?php echo $opcao->registros->USU_CODIGO;?>"/>
            <input type="hidden" name="usu_data_cadastro" value="<?php echo $opcao->registros->USU_DATA_CADASTRO;?>"/>
                  
                        <table>
                        <tr>
                            <th class="th276t"> Nome:</th><td class="td700"><?php echo $opcao->registros->USU_NOME;?></td>
                        </tr>
                        <tr>
                            <th class="th276t"> CPF:</th><td class="td700"><?php echo $opcao->registros->USU_CPF;?></td>
                        </tr>
                        <tr>
                            <th class="th100t">Matrícula</th>
                            <td class="td300" colspan="5"><?php echo $opcao->registros->USU_MATRICULA;?></td>
                        </tr>
                        <tr>
                            <td class="th276t">Email:* </td><td class="td700"><span id="sprytextfield1"><input class="input_700" type="text" name="usu_email" value="<?php echo $opcao->registros->USU_EMAIL;?>"/><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">Email inválido.</span></span></td>
                        </tr>
                        
                        <tr>
                            <?php
                                $m_status = '';
                                $f_status = '';
                                $radio= $opcao->registros->USU_SEXO;
                                if($radio=='M'){$m_status='checked';}
                                else if ($radio=='F'){$f_status='checked';}
                                
                            ?>
                            
                            <td class="th276t">sexo:*</td><td class="td700"><input class="input_radio" type="radio" name="usu_sexo" value="M" <?php echo $m_status;?>/>M <input class="input_radio" type="radio" name="usu_sexo" value="F" <?php echo $f_status;?>/>F</td>        
                        </tr>
                        <tr>
                            <td class="th276t">Data Nasc.:* </td><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="usu_data_nasc" value="<?php echo $opcao->registros->USU_DATA_NASC;?>" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">data inválido.</span></span></td>
                
                        </tr>
                            <tr>
                                <td class="th276t">Celular:* </td><td class="td700"><span id="sprytextfield3"><input class="input_200"type="text" name="usu_celular" value="<?php echo $opcao->registros->USU_CELULAR;?>"/><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                            </tr>
                            <tr>
                                <th class="th276t"> Tel. Fixo:</th><td class="td700"><input class="input_200" type="text" name="usu_telefone" value="<?php echo $opcao->registros->USU_TELEFONE;?>"/></td>
                            </tr>
                            <tr>
                                <td class="th276t">Endereço Completo:* </td><td class="td700"><span id="sprytextfield4"><input class="input_700" type="text" name="usu_endereco" value="<?php echo $opcao->registros->USU_ENDERECO;?>"/><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                
                            </tr>
                            <tr>
                                <td class="th276t">Cidade:* </td><td class="td700"><span id="sprytextfield5"><input class="input_200" type="text" name="usu_cidade" value="<?php echo $opcao->registros->USU_CIDADE;?>"/><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                
                            </tr>
                            <tr>
                                <th class="th276t"> Estado:</th>
                                <td class="td700">                                
                                      <select class="input_60"  name="usu_uf" id="spryselect1">
                                            <?php echo $opcao->listar_estados();?>
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
                                <td class="th276t">CEP:*</td><td class="td700"><span id="sprytextfield6"><input class="input_200" type="text" name="usu_cep" value="<?php echo $opcao->registros->USU_CEP;?>"/><span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td>
                
                            </tr>              
                            
                            <script type="text/javascript">
                <!--
                    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
                    var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                    var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield3", "phone_number", {format:"phone_custom", useCharacterMasking:true, pattern:"(00) 0000-0000"});
                    var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield4");
                    var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield5");
                    var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield6", "custom", {useCharacterMasking:true, pattern:"00.000-000"});
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
                    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect2");
                //-->
                </script>
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
