<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=sub_area&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar sub-área</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Grande área:* </div>
                    <span id="cursos">
                        <div class="input_300">
                            <select name="sba_gda_codigo" id="campo_grande_area" >
                                <?php
                                $select = $opcao->select_grande_area();
                                $cont = count($select);
                                for($par=0;$par<$cont;$par++){
                                    echo '<option value="'.$select[$par]['GDA_CODIGO'].'">'.$select[$par]['GDA_DESCRICAO'].'</option>';   
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
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Identificação:* </div>
                    <span id="campo_identificacao">
                        <div class="input_300">
                            <input type="text" name="sba_identificacao" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                    <span id="campo_sub_area">
                        <div class="input_300">
                            <input type="text" name="sba_descricao" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_sub_area = new Spry.Widget.ValidationTextField("campo_sub_area");
                var campo_identificacao = new Spry.Widget.ValidationTextField("campo_identificacao");
                var campo_grande_area = new Spry.Widget.ValidationSelect("campo_grande_area");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_sub_area($_REQUEST['sba_codigo']);
    $select = $opcao->select_grande_area();
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=sub_area&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do Sub-área</div>
            </div>
            <input type="hidden" name="sba_codigo" value="<?php echo $dados[0]['SBA_CODIGO']; ?>" />
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Grande Área:* </div>
                        <span id="campo_cursos">
                        <div class="input_300">
                            <select name="sba_gda_codigo" id="campo_grande_area" >
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['GDA_CODIGO']==$dados[0]['SBA_GDA_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['GDA_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['GDA_DESCRICAO'].'</option>';   
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
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Identificação:*</div>
                    <span id="campo_identificacao">
                        <div class="input_300">
                            <input type="text" name="sba_identificacao" value="<?php echo $dados[0]['SBA_IDENTIFICACAO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Grande área:* </div>
                    <span id="campo_sub_area">
                        <div class="input_300">
                            <input type="text" name="sba_descricao" value="<?php echo $dados[0]['SBA_DESCRICAO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>  
                        </div>
                    </span>
                </label>
            </div>
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_sub_area = new Spry.Widget.ValidationTextField("campo_sub_area");
                var campo_identificacao = new Spry.Widget.ValidationTextField("campo_identificacao");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_sub_area($_REQUEST['sba_codigo']);
    $select = $opcao->select_grande_area();
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes da Sub-Área</div>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Código:* </div>
                    <span id="sub_area">
                        <div class="input_300">
                            <input type="text" name="sba_codigo" value="<?php echo $dados[0]['SBA_CODIGO']; ?>" disabled="true" />
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
                    <div class="label_texto"> Grande área:* </div>
                        <span id="campo_cursos">
                        <div class="input_300">
                            <select name="sba_gda_codigo" id="campo_grande_area" disabled="true" >
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['GDA_CODIGO']==$dados[0]['SBA_GDA_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['GDA_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['GDA_DESCRICAO'].'</option>';   
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
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Identificação:* </div>
                    <span id="sub_area">
                        <div class="input_300">
                            <input type="text" name="sba_identificacao" value="<?php echo $dados[0]['SBA_IDENTIFICACAO']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                    <span id="campo_sub_area">
                        <div class="input_300">
                            <input type="text" name="sba_descricao" value="<?php echo $dados[0]['SBA_DESCRICAO']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>  
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=sub_area&action=view_alterar&sba_codigo=<?php echo $dados[0]['SBA_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var sub_area = new Spry.Widget.ValidationTextField("sub_area");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




