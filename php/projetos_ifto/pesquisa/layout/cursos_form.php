<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=cursos&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar cursos</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Cursos:* </div>
                    <span id="campo_cursos">
                        <div class="input_300">
                            <input type="text" name="curso_nome" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Campus:* </div>
                    <span id="cursos">
                        <div class="input_300">
                            <select name="curso_camp_codigo" id="campo_campus" >
                                <?php
                                $select = $opcao->select_campus();
                                $cont = count($select);
                                for($par=0;$par<$cont;$par++){
                                    echo '<option value="'.$select[$par]['CAMP_CODIGO'].'">'.$select[$par]['CAMP_NOME'].'</option>';   
                                }
                                ?>
                            </select>
                        </div>
                        <script language=javascript>
                            function abrejanela(URL){
                                window.open(URL,"janela1","width=600,height=300,scrollbars=NO");
                            }
                        </script>
                        <a href="javascript:abrejanela('index.php?p=campus&action=cadastro')">Incluir novo</a>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_cursos = new Spry.Widget.ValidationTextField("campo_cursos");
                var campo_campus = new Spry.Widget.ValidationSelect("campo_campus");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_cursos($_REQUEST['curso_codigo']);
    $select = $opcao->select_campus();
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=cursos&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do cursos</div>
            </div>
            <input type="hidden" name="curso_codigo" value="<?php echo $dados[0]['CURSO_CODIGO']; ?>" />
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Cursos:* <img src="imagens/user.png"/></div>
                    <span id="campo_cursos">
                        <div class="input_300">
                            <input type="text" name="curso_nome" value="<?php echo $dados[0]['CURSO_NOME']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Campus:* </div>
                        <span id="campo_cursos">
                        <div class="input_300">
                            <select name="curso_camp_codigo" id="campo_campus" >
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['CAMP_CODIGO']==$dados[0]['CURSO_CAMP_CODIGO']){
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
            
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_cursos = new Spry.Widget.ValidationTextField("campo_cursos");
                var campo_campus = new Spry.Widget.ValidationSelect("campo_campus");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_cursos($_REQUEST['curso_codigo']);
    $select = $opcao->select_campus();
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes do cursos</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Código:* </div>
                    <span id="cursos">
                        <div class="input_300">
                            <input type="text" name="curso_codigo" value="<?php echo $dados[0]['CURSO_CODIGO']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Curso:* </div>
                    <span id="cursos">
                        <div class="input_300">
                            <input type="text" name="curso_nome" value="<?php echo $dados[0]['CURSO_NOME']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Campus:* </div>
                        <span id="campo_cursos">
                        <div class="input_300">
                            <select name="curso_camp_codigo" id="campo_campus" disabled="true">
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['CAMP_CODIGO']==$dados[0]['CURSO_CAMP_CODIGO']){
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
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=cursos&action=view_alterar&curso_codigo=<?php echo $dados[0]['CURSO_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var cursos = new Spry.Widget.ValidationTextField("cursos");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




