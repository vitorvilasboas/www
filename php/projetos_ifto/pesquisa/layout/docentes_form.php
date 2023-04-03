<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=docentes&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar docentes</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="doc_usu_codigo" id="campo_usuario" >
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
                    <div class="label_texto"> Área:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="doc_area" />
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
                            <input type="text" name="doc_siape" />
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
                            <input type="text" name="doc_admissao" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Reg. trabalho:* </div>
                    <span id="campo_regime trabalho">
                        <div class="input_300">
                            <select name="doc_regime_trabalho" > 
                                <option value="20 horas"> 20 horas</option>
                                <option value="40 horas"> 40 horas</option>
                                <option value="Dedicação Exclusiva">Dedicação Exclusiva</option>
                            </select>
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
                            <select name="doc_titulacao" > 
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
                var campo_area = new Spry.Widget.ValidationTextField("campo_area");
                var campo_admissao = new Spry.Widget.ValidationTextField("campo_admissao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuario = new Spry.Widget.ValidationSelect("campo_usuario");
                var campo_titulacao = new Spry.Widget.ValidationSelect("campo_titulacao");
                var campo_regime_trabalho = new Spry.Widget.ValidationSelect("campo_regime_trabalho");
            
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_docentes($_REQUEST['doc_codigo']);
    $select = $opcao->select_usuarios();
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=docentes&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do docente</div>
            </div>
            <input type="hidden" name="doc_codigo" value="<?php echo $dados[0]['DOC_CODIGO']; ?>" />
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="doc_usu_codigo" id="campo_usuario" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['DOC_USU_CODIGO']){
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
                    <div class="label_texto"> Área:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="doc_area" value="<?php echo $dados[0]['DOC_AREA'];?>"/>
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
                            <input type="text" name="doc_siape" value="<?php echo $dados[0]['DOC_SIAPE']; ?>"/>
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
                            <input type="text" name="doc_admissao" value="<?php echo $dados[0]['DOC_ADMISSAO'];?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Reg. trabalho:* </div>
                    <span id="campo_regime trabalho">
                        <div class="input_300">
                            <select name="doc_regime_trabalho" >
                                <option value="<?php echo $dados[0]['DOC_REGIME_TRABALHO'];?>"><?php echo $dados[0]['DOC_REGIME_TRABALHO'];?></option>
                                <option value="20 horas"> 20 horas</option>
                                <option value="40 horas"> 40 horas</option>
                                <option value="Dedicação Exclusiva">Dedicação Exclusiva</option>
                            </select>
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
                            <select name="doc_titulacao" >
                                <option value="<?php echo $dados[0]['DOC_TITULACAO'];?>"><?php echo $dados[0]['DOC_TITULACAO'];?></option>
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
                var campo_area = new Spry.Widget.ValidationTextField("campo_area");
                var campo_admissao = new Spry.Widget.ValidationTextField("campo_admissao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuario = new Spry.Widget.ValidationSelect("campo_usuario");
                var campo_titulacao = new Spry.Widget.ValidationSelect("campo_titulacao");
                var campo_regime_trabalho = new Spry.Widget.ValidationSelect("campo_regime_trabalho");
            
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='proximo'){
    $cpf = $_REQUEST['usu_cpf'];
    $select = $opcao->select_cpf_usuario($cpf);
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=docentes&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do docente</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="doc_usu_codigo" id="campo_usuario" >
                                <?php
                                        echo '<option value="'.$select[0]['USU_CODIGO'].'"'.$selecionado.'>'.$select[0]['USU_NOME'].'</option>';   
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
                    <div class="label_texto"> Área:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="doc_area" />
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
                            <input type="text" name="doc_siape" />
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
                            <input type="text" name="doc_admissao" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Reg. trabalho:* </div>
                    <span id="campo_regime trabalho">
                        <div class="input_300">
                            <select name="doc_regime_trabalho" >
                                <option value="20 horas"> 20 horas</option>
                                <option value="40 horas"> 40 horas</option>
                                <option value="Dedicação Exclusiva">Dedicação Exclusiva</option>
                            </select>
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
                            <select name="doc_titulacao" >
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
                var campo_area = new Spry.Widget.ValidationTextField("campo_area");
                var campo_admissao = new Spry.Widget.ValidationTextField("campo_admissao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuario = new Spry.Widget.ValidationSelect("campo_usuario");
                var campo_titulacao = new Spry.Widget.ValidationSelect("campo_titulacao");
                var campo_regime_trabalho = new Spry.Widget.ValidationSelect("campo_regime_trabalho");
            
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_docentes($_REQUEST['doc_codigo']);
    $select = $opcao->select_usuarios();
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes do docente</div>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="doc_usu_codigo" id="campo_usuario" disabled="true" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['DOC_USU_CODIGO']){
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
                    <div class="label_texto"> Área:* </div>
                    <span id="campo_area">
                        <div class="input_600">
                            <input type="text" name="doc_area" value="<?php echo $dados[0]['DOC_AREA'];?>" disabled="true"/>
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
                            <input type="text" name="doc_siape" value="<?php echo $dados[0]['DOC_SIAPE']; ?>" disabled="true"/>
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
                            <input type="text" name="doc_admissao" value="<?php echo $dados[0]['DOC_ADMISSAO'];?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Reg. trabalho:* </div>
                    <span id="campo_regime trabalho">
                        <div class="input_300">
                            <select name="doc_regime_trabalho" disabled="true" >
                                <option value="<?php echo $dados[0]['DOC_REGIME_TRABALHO'];?>"><?php echo $dados[0]['DOC_REGIME_TRABALHO'];?></option>
                                <option value="20 horas"> 20 horas</option>
                                <option value="40 horas"> 40 horas</option>
                                <option value="Dedicação Exclusiva">Dedicação Exclusiva</option>
                            </select>
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
                            <select name="doc_titulacao" disabled="true">
                                <option value="<?php echo $dados[0]['DOC_TITULACAO'];?>"><?php echo $dados[0]['DOC_TITULACAO'];?></option>
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
                <a class="botaoeditar" href="index.php?p=docentes&action=view_alterar&doc_codigo=<?php echo $dados[0]['DOC_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var docentes = new Spry.Widget.ValidationTextField("docentes");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




