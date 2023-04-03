<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=estudantes&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar estudantes</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="campo_usuarios">
                        <div class="input_600">
                            <select name="est_usu_codigo" id="campo_usuario" >
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
                    <div class="label_texto"> Cursos:* </div>
                    <span id="campo_cursos">
                        <div class="input_600">
                            <select name="est_curso_codigo" id="campo_usuario" >
                                <?php
                                $select2 = $opcao->select_cursos();
                                $cont2 = count($select2);
                                for($par2=0;$par2<$cont2;$par2++){
                                    echo '<option value="'.$select2[$par2]['CURSO_CODIGO'].'">'.$select2[$par2]['CURSO_NOME'].'</option>';   
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
                    <div class="label_texto"> Matrícula:* </div>
                    <span id="campo_matricula">
                        <div class="input_600">
                            <input type="text" name="est_matricula" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Entrada:* </div>
                    <span id="campo_ano_ingresso">
                        <div class="input_300">
                            <input type="text" name="est_ano_ingresso" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_matricula = new Spry.Widget.ValidationTextField("campo_matricula");
                var campo_ano_ingresso = new Spry.Widget.ValidationTextField("campo_ano_ingresso","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuarios = new Spry.Widget.ValidationSelect("campo_usuarios");
                var campo_cursos = new Spry.Widget.ValidationSelect("campo_cursos");
            
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_estudantes($_REQUEST['est_codigo']);
    $select = $opcao->select_usuarios();
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=estudantes&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do docente</div>
            </div>
            <input type="hidden" name="est_codigo" value="<?php echo $dados[0]['EST_CODIGO']; ?>" />
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="campo_usuarios">
                        <div class="input_600">
                            <select name="est_usu_codigo" id="campo_usuario" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['EST_USU_CODIGO']){
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
                    <div class="label_texto"> Cursos:* </div>
                    <span id="campo_cursos">
                        <div class="input_600">
                            <select name="est_curso_codigo" id="campo_usuario" >
                                <?php
                                    $select2 = $opcao->select_cursos();
                                    $cont2 = count($select2);
                                    for($esc2=0;$esc2<$cont2;$esc2++){
                                        $selecionado2 = '';
                                        if($select2[$esc2]['CURSO_CODIGO']==$dados[0]['EST_CURSO_CODIGO']){
                                            $selecionado2 = 'selected';
                                        }
                                        echo '<option value="'.$select2[$esc2]['CURSO_CODIGO'].'"'.$selecionado2.'>'.$select2[$esc2]['CURSO_NOME'].'</option>';   
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
                    <div class="label_texto"> Matrícula:* </div>
                    <span id="campo_matricula">
                        <div class="input_600">
                            <input type="text" name="est_matricula" value="<?php echo $dados[0]['EST_MATRICULA'];?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Entrada:* </div>
                    <span id="campo_ano_ingresso">
                        <div class="input_300">
                            <input type="text" name="est_ano_ingresso" value="<?php echo $dados[0]['EST_ANO_INGRESSO'];?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_matricula = new Spry.Widget.ValidationTextField("campo_matricula");
                var campo_ano_ingresso = new Spry.Widget.ValidationTextField("campo_ano_ingresso","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuarios = new Spry.Widget.ValidationSelect("campo_usuarios");
                var campo_cursos = new Spry.Widget.ValidationSelect("campo_cursos");
            
            </script>
            
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_estudantes($_REQUEST['est_codigo']);
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
                    <span id="campo_usuarios">
                        <div class="input_600">
                            <select name="est_usu_codigo" id="campo_usuario" disabled="true" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['EST_USU_CODIGO']){
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
                    <div class="label_texto"> Cursos:* </div>
                    <span id="campo_cursos">
                        <div class="input_600">
                            <select name="est_curso_codigo" id="campo_usuario" disabled="true" >
                                <?php
                                    $select2 = $opcao->select_cursos();
                                    $cont2 = count($select2);
                                    for($esc2=0;$esc2<$cont2;$esc2++){
                                        $selecionado2 = '';
                                        if($select2[$esc2]['CURSO_CODIGO']==$dados[0]['EST_CURSO_CODIGO']){
                                            $selecionado2 = 'selected';
                                        }
                                        echo '<option value="'.$select2[$esc2]['CURSO_CODIGO'].'"'.$selecionado2.'>'.$select2[$esc2]['CURSO_NOME'].'</option>';   
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
                    <div class="label_texto"> Matrícula:* </div>
                    <span id="campo_matricula">
                        <div class="input_600">
                            <input type="text" name="est_matricula" value="<?php echo $dados[0]['EST_MATRICULA'];?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Entrada:* </div>
                    <span id="campo_ano_ingresso">
                        <div class="input_300">
                            <input type="text" name="est_ano_ingresso" value="<?php echo $dados[0]['EST_ANO_INGRESSO'];?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=estudantes&action=view_alterar&est_codigo=<?php echo $dados[0]['EST_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var estudantes = new Spry.Widget.ValidationTextField("estudantes");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




