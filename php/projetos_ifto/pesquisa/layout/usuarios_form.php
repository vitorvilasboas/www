<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=usuarios&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar Usuários</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Campus:* </div>
                    <span id="cursos">
                        <div class="input_300">
                            <select name="usu_camp_codigo" id="campo_campus" >
                                <?php
                                $select = $opcao->select_campus();
                                $cont = count($select);
                                for($par=0;$par<$cont;$par++){
                                    echo '<option value="'.$select[$par]['CAMP_CODIGO'].'">'.$select[$par]['CAMP_NOME'].'</option>';   
                                }
                                ?>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
             
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuário:* </div>
                    <span id="campo_usuario">
                        <div class="input_600">
                            <input type="text" name="usu_nome" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Sexo:* </div>
                    <span id="campo_senha">
                        <div class="input_600">
                            <div class="input_radio">
                                <input  type="radio" name="usu_sexo" value="M" checked/> Masculino &nbsp;&nbsp;&nbsp;
                                <input  type="radio" name="usu_sexo" value="F"/> Feminino
                            </div>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Senha:* </div>
                    <span id="campo_senha">
                        <div class="input_300">
                            <input type="password" name="usu_senha" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> CPF:* </div>
                    <span id="campo_cpf">
                        <div class="input_300">
                            <input type="text" name="usu_cpf" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Endereço:* </div>
                    <span id="campo_endereco">
                        <div class="input_600">
                            <input type="text" name="usu_endereco" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> E-mail:* </div>
                    <span id="campo_email">
                        <div class="input_600">
                            <input type="text" name="usu_email" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> CEP:* </div>
                    <span id="campo_cep">
                        <div class="input_300">
                            <input type="text" name="usu_cep" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Data Nasc.:* </div>
                    <span id="campo_data_nasc">
                        <div class="input_300">
                            <input type="text" name="usu_data_nasc" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tel. Movél:* </div>
                    <span id="campo_celular">
                        <div class="input_300">
                            <input type="text" name="usu_celular" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tel. Fixo:* </div>
                    <span id="campo_fone">
                        <div class="input_300">
                            <input type="text" name="usu_fone" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Cidade:* </div>
                    <span id="campo_cidade">
                        <div class="input_300">
                            <input type="text" name="usu_cidade" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Estado:* </div>
                    <span id="campo_estado">
                        <div class="input_150">
                            <select name="usu_estado" >
                                <?php echo estado();?>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tipo:* </div>
                    <span id="campo_estado">
                        <div class="input_300">
                            <select name="usu_tipo">
                                <option value="1">Docente</option>
                                <option value="2">Estudante</option>
                                <option value="3">Técnico Administrativo</option>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>

            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Próximo" /></div>

            <script type="text/javascript">
                var campo_nome = new Spry.Widget.ValidationTextField("campo_nome");
                var campo_cpf = new Spry.Widget.ValidationTextField("campo_cpf", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                var campo_endereco = new Spry.Widget.ValidationTextField("campo_endereco");
                var campo_email = new Spry.Widget.ValidationTextField("campo_email", "email");
                var campo_cep = new Spry.Widget.ValidationTextField("campo_cep", "custom", {useCharacterMasking:true, pattern:"00.000-000"});
                var campo_data_nasc = new Spry.Widget.ValidationTextField("campo_data_nasc","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_celular = new Spry.Widget.ValidationTextField("campo_celular", "phone_number", {format:"phone_custom", useCharacterMasking:true, pattern:"(00)00000-0000"});
                var campo_cidade = new Spry.Widget.ValidationTextField("campo_cidade");
                var campo_estado = new Spry.Widget.ValidationSelect("campo_estado");
                
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_usuarios($_REQUEST['usu_codigo']);
    $select = $opcao->select_campus();
?>  
      
<section>
    <div class="formulario">
        <form action="index.php?p=usuarios&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar dados do Usuários</div>
            </div>
            <input type="hidden" name="usu_codigo" value="<?php echo $dados[0]['USU_CODIGO']; ?>" />
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Campus:* </div>
                        <span id="campo_cursos">
                        <div class="input_300">
                            <select name="usu_camp_codigo" id="campo_campus" >
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['CAMP_CODIGO']==$dados[0]['USU_CAMP_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['CAMP_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['CAMP_NOME'].'</option>';   
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
                
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuário:* </div>
                    <span id="campo_usuario">
                        <div class="input_600">
                            <input type="text" name="usu_nome" value="<?php echo $dados[0]['USU_NOME']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <?php
                $m_status = '';
                $f_status = '';
                $radio= $dados[0]['USU_SEXO'];
                if($radio=='M'){$m_status='checked';}
                else if ($radio=='F'){$f_status='checked';}
                ?>
                <label>
                    <div class="label_texto"> Sexo:* </div>
                    <span id="campo_senha">
                        <div class="input_600">
                            <div class="input_radio">
                                <input  type="radio" name="usu_sexo" value="M" <?php echo $m_status;?>/> Masculino &nbsp;&nbsp;&nbsp;
                                <input  type="radio" name="usu_sexo" value="F" <?php echo $f_status;?>/> Feminino
                            </div>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> CPF:* </div>
                    <span id="campo_cpf">
                        <div class="input_300">
                            <input type="text" name="usu_cpf" value="<?php echo $dados[0]['USU_CPF']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Endereço:* </div>
                    <span id="campo_endereco">
                        <div class="input_600">
                            <input type="text" name="usu_endereco" value="<?php echo $dados[0]['USU_ENDERECO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> E-mail:* </div>
                    <span id="campo_email">
                        <div class="input_600">
                            <input type="text" name="usu_email" value="<?php echo $dados[0]['USU_EMAIL']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> CEP:* </div>
                    <span id="campo_cep">
                        <div class="input_300">
                            <input type="text" name="usu_cep" value="<?php echo $dados[0]['USU_CEP']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Data Nasc.:* </div>
                    <span id="campo_data_nasc">
                        <div class="input_300">
                            <input type="text" name="usu_data_nasc" value="<?php echo $dados[0]['USU_DATA_NASC']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tel. Movél:* </div>
                    <span id="campo_celular">
                        <div class="input_300">
                            <input type="text" name="usu_celular" value="<?php echo $dados[0]['USU_CELULAR']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tel. Fixo:* </div>
                    <span id="campo_fone">
                        <div class="input_300">
                            <input type="text" name="usu_fone" value="<?php echo $dados[0]['USU_FONE']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Cidade:* </div>
                    <span id="campo_cidade">
                        <div class="input_300">
                            <input type="text" name="usu_cidade" value="<?php echo $dados[0]['USU_CIDADE']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Estado:* </div>
                    <span id="campo_estado">
                        <div class="input_100">
                            <select name="usu_estado" />
                                <?php
                                echo '<option value="'.$dados[0]['USU_ESTADO'].'" selected>'.$dados[0]['USU_ESTADO'].'</option>';
                                echo estado();
                                ?>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tipo:* </div>
                    <span id="campo_estado">
                        <div class="input_100">
                            <select name="usu_tipo">
                                <option value="<?php echo $dados[0]['USU_TIPO']; ?>">
                                    <?php 
                                        $tipo = $dados[0]['USU_TIPO'];
                                        if($tipo =='1'){
                                            echo 'Docente';
                                        }else if($tipo =='2'){
                                            echo 'Estudante';
                                        }else if($tipo =='3'){
                                            echo 'Técnico Administrativo';
                                        }
                                    ?>
                                </option>
                                <option value="1">Docente</option>
                                <option value="2">Estudante</option>
                                <option value="3">Técnico Administrativo</option>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>

            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_nome = new Spry.Widget.ValidationTextField("campo_nome");
                var campo_cpf = new Spry.Widget.ValidationTextField("campo_cpf", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                var campo_endereco = new Spry.Widget.ValidationTextField("campo_endereco");
                var campo_email = new Spry.Widget.ValidationTextField("campo_email", "email");
                var campo_cep = new Spry.Widget.ValidationTextField("campo_cep", "custom", {useCharacterMasking:true, pattern:"00.000-000"});
                var campo_data_nasc = new Spry.Widget.ValidationTextField("campo_data_nasc","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_celular = new Spry.Widget.ValidationTextField("campo_celular", "phone_number", {format:"phone_custom", useCharacterMasking:true, pattern:"(00)00000-0000"});
                var campo_cidade = new Spry.Widget.ValidationTextField("campo_cidade");
                var campo_estado = new Spry.Widget.ValidationSelect("campo_estado");
                
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_usuarios($_REQUEST['usu_codigo']);
    $select = $opcao->select_campus();
?>  
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Dados do Usuário</div>
            </div>
            <input type="hidden" name="usu_codigo" value="<?php echo $dados[0]['USU_CODIGO']; ?>" disabled="true" />
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Campus:* </div>
                        <span id="campo_cursos">
                        <div class="input_300">
                            <select name="usu_camp_codigo" id="campo_campus" disabled="true" >
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['CAMP_CODIGO']==$dados[0]['USU_CAMP_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['CAMP_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['CAMP_NOME'].'</option>';   
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
                
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuário:* </div>
                    <span id="campo_usuario">
                        <div class="input_600">
                            <input type="text" name="usu_nome" value="<?php echo $dados[0]['USU_NOME']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Senha:* </div>
                    <span id="campo_area">
                        <div class="input_300">
                            <input type="password" name="usu_senha" value="<?php echo $dados[0]['USU_SENHA']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> CPF:* </div>
                    <span id="campo_area">
                        <div class="input_300">
                            <input type="text" name="usu_cpf" value="<?php echo $dados[0]['USU_CPF']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Endereço:* </div>
                    <span id="campo_endereco">
                        <div class="input_600">
                            <input type="text" name="usu_endereco" value="<?php echo $dados[0]['USU_ENDERECO']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> E-mail:* </div>
                    <span id="campo_email">
                        <div class="input_600">
                            <input type="text" name="usu_email" value="<?php echo $dados[0]['USU_EMAIL']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> CEP:* </div>
                    <span id="campo_cep">
                        <div class="input_300">
                            <input type="text" name="usu_cep" value="<?php echo $dados[0]['USU_CEP']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Data Nasc.:* </div>
                    <span id="campo_data_nasc">
                        <div class="input_300">
                            <input type="text" name="usu_data_nasc" value="<?php echo $dados[0]['USU_DATA_NASC']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tel. Movél:* </div>
                    <span id="campo_celular">
                        <div class="input_300">
                            <input type="text" name="usu_celular" value="<?php echo $dados[0]['USU_CELULAR']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tel. Fixo:* </div>
                    <span id="campo_celular">
                        <div class="input_300">
                            <input type="text" name="usu_fone" value="<?php echo $dados[0]['USU_FONE']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Cidade:* </div>
                    <span id="campo_cidade">
                        <div class="input_300">
                            <input type="text" name="usu_cidade" value="<?php echo $dados[0]['USU_CIDADE']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Estado:* </div>
                    <span id="campo_estado">
                        <div class="input_300">
                            <input type="text" name="usu_estado" value="<?php echo $dados[0]['USU_ESTADO']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tipo:* </div>
                    <span id="campo_estado">
                        <div class="input_300">
                            <select name="usu_tipo" disabled="true">
                                <option value="<?php echo $dados[0]['USU_TIPO']; ?>">
                                        <?php 
                                        $tipo = $dados[0]['USU_TIPO'];
                                        if($tipo =='1'){
                                            echo 'Docente';
                                        }else if($tipo =='2'){
                                            echo 'Estudante';
                                        }else if($tipo =='3'){
                                            echo 'Técnico Administrativo';
                                        }
                                    ?>
                                </option>
                                <option value="1">Docente</option>
                                <option value="2">Estudante</option>
                                <option value="3">Técnico Administrativo</option>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=usuarios&action=view_alterar&usu_codigo=<?php echo $dados[0]['USU_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var tecnicos_adm = new Spry.Widget.ValidationTextField("tecnicos_adm");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




