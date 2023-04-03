<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=tecnicos_adm&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar técnicos administrativos</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="campo_cursos">
                        <div class="input_600">
                            <select name="tadm_usu_codigo" id="campo_usuario" >
                                <?php
                                $select = $opcao->select_usuarios();
                                $cont = count($select);
                                for($par=0;$par<$cont;$par++){
                                    echo '<option value="'.$select[$par]['USU_CODIGO'].'">'.$select[$par]['USU_NOME'].'</option>';   
                                }
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
                    <div class="label_texto"> Cargo:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="tadm_cargo" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Siape:* </div>
                    <span id="campo_siape">
                        <div class="input_300">
                            <input type="text" name="tadm_siape" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data da posse:* </div>
                    <span id="campo_admissao">
                        <div class="input_300">
                            <input type="text" name="tadm_admissao" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Titulação:* </div>
                    <span id="campo_titulacao">
                        <div class="input_300">
                            <select name="tadm_titulacao" > 
                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                <option value="Ensino Médio">Ensino Médio</option>
                                <option value="Graduado">Graduado</option>
                                <option value="Pós-graduado">Pós-graduado</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Pós-doutorado">Pós-doutorado</option>
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
                var campo_siape = new Spry.Widget.ValidationTextField("campo_siape");
                var campo_cargo = new Spry.Widget.ValidationTextField("campo_cargo");
                var campo_admissao = new Spry.Widget.ValidationTextField("campo_admissao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuario = new Spry.Widget.ValidationSelect("campo_usuario");
                var campo_titulacao = new Spry.Widget.ValidationSelect("campo_titulacao");
                
            </script>
        </form>
    </div>
</section>
<?php } else if($_REQUEST['action']=='proximo'){
    $select = $opcao->select_cpf_usuario($_REQUEST['usu_cpf']);
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=tecnicos_adm&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar técnicos administrativos</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="campo_cursos">
                        <div class="input_600">
                            <select name="tadm_usu_codigo" id="campo_usuario" >
                                <?php
                                    echo '<option value="'.$select[0]['USU_CODIGO'].'">'.$select[0]['USU_NOME'].'</option>';   
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
                    <div class="label_texto"> Cargo:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="tadm_cargo" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Siape:* </div>
                    <span id="campo_siape">
                        <div class="input_300">
                            <input type="text" name="tadm_siape" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data da posse:* </div>
                    <span id="campo_admissao">
                        <div class="input_300">
                            <input type="text" name="tadm_admissao" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Titulação:* </div>
                    <span id="campo_titulacao">
                        <div class="input_300">
                            <select name="tadm_titulacao" > 
                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                <option value="Ensino Médio">Ensino Médio</option>
                                <option value="Graduado">Graduado</option>
                                <option value="Pós-graduado">Pós-graduado</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Pós-doutorado">Pós-doutorado</option>
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
                var campo_siape = new Spry.Widget.ValidationTextField("campo_siape");
                var campo_cargo = new Spry.Widget.ValidationTextField("campo_cargo");
                var campo_admissao = new Spry.Widget.ValidationTextField("campo_admissao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuario = new Spry.Widget.ValidationSelect("campo_usuario");
                var campo_titulacao = new Spry.Widget.ValidationSelect("campo_titulacao");
                
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_tecnicos_adm($_REQUEST['tadm_codigo']);
    $select = $opcao->select_usuarios();
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=tecnicos_adm&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar dados técnicos administrativo</div>
            </div>
            <input type="hidden" name="tadm_codigo" value="<?php echo $dados[0]['TADM_CODIGO']; ?>" />
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="tadm_usu_codigo" id="campo_usuario" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['TADM_USU_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['USU_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['USU_NOME'].'</option>';   
                                    }
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
                    <div class="label_texto"> Cargo:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="tadm_cargo" value="<?php echo $dados[0]['TADM_CARGO'];?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Siape:* </div>
                    <span id="campo_siape">
                        <div class="input_300">
                            <input type="text" name="tadm_siape" value="<?php echo $dados[0]['TADM_SIAPE']; ?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data da posse:* </div>
                    <span id="campo_admissao">
                        <div class="input_300">
                            <input type="text" name="tadm_admissao" value="<?php echo $dados[0]['TADM_ADMISSAO'];?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Titulação:* </div>
                    <span id="campo_titulacao">
                        <div class="input_300">
                            <select name="tadm_titulacao" >
                                <option value="<?php echo $dados[0]['TADM_TITULACAO'];?>"><?php echo $dados[0]['TADM_TITULACAO'];?></option>
                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                <option value="Ensino Médio">Ensino Médio</option>
                                <option value="Graduado">Graduado</option>
                                <option value="Pós-graduado">Pós-graduado</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Pós-doutorado">Pós-doutorado</option>
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
                var campo_siape = new Spry.Widget.ValidationTextField("campo_siape");
                var campo_cargo = new Spry.Widget.ValidationTextField("campo_cargo");
                var campo_admissao = new Spry.Widget.ValidationTextField("campo_admissao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuario = new Spry.Widget.ValidationSelect("campo_usuario");
                var campo_titulacao = new Spry.Widget.ValidationSelect("campo_titulacao");
                
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_tecnicos_adm($_REQUEST['tadm_codigo']);
    $select = $opcao->select_usuarios();
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes do técnico admistrativo</div>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="tadm_usu_codigo" id="campo_usuario" disabled="true" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['TADM_USU_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['USU_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['USU_NOME'].'</option>';   
                                    }
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
                    <div class="label_texto"> Cargo:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="tadm_cargo" value="<?php echo $dados[0]['TADM_CARGO'];?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Siape:* </div>
                    <span id="campo_siape">
                        <div class="input_300">
                            <input type="text" name="tadm_siape" value="<?php echo $dados[0]['TADM_SIAPE']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data da posse:* </div>
                    <span id="campo_admissao">
                        <div class="input_300">
                            <input type="text" name="tadm_admissao" value="<?php echo $dados[0]['TADM_ADMISSAO'];?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Titulação:* </div>
                    <span id="campo_titulacao">
                        <div class="input_300">
                            <select name="tadm_titulacao" disabled="true">
                                <option value="<?php echo $dados[0]['TADM_TITULACAO'];?>"><?php echo $dados[0]['TADM_TITULACAO'];?></option>
                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                <option value="Ensino Médio">Ensino Médio</option>
                                <option value="Graduado">Graduado</option>
                                <option value="Pós-graduado">Pós-graduado</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Pós-doutorado">Pós-doutorado</option>
                            </select>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=tecnicos_adm&action=view_alterar&tadm_codigo=<?php echo $dados[0]['TADM_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var tecnicos_adm = new Spry.Widget.ValidationTextField("tecnicos_adm");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




