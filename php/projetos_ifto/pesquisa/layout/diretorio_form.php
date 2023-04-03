<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=diretorio&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar diretório</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="dip_sba_codigo" id="campo_sub_area" >
                                <?php
                                $select = $opcao->select_sub_area();
                                $cont = count($select);
                                for($par=0;$par<$cont;$par++){
                                    echo '<option value="'.$select[$par]['SBA_CODIGO'].'">'.$select[$par]['SBA_DESCRICAO'].'</option>';   
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
                    <div class="label_texto"> Título:* </div>
                    <span id="campo_titulo">
                        <div class="input_600">
                            <input type="text" name="dip_titulo" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Lider:* </div>
                    <span id="campo_lider">
                        <div class="input_600">
                            <input type="text" name="dip_lider" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Vice-lider:* </div>
                    <span id="campo_vice_lider">
                        <div class="input_600">
                            <input type="text" name="dip_vicelider" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data criação:* </div>
                    <span id="campo_data_criacao">
                        <div class="input_300">
                            <input type="text" name="dip_data_criacao" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_titulo = new Spry.Widget.ValidationTextField("campo_titulo");
                var campo_lider = new Spry.Widget.ValidationTextField("campo_lider");
                var campo_vice_lider = new Spry.Widget.ValidationTextField("campo_vice_lider");
                var campo_data_criacao = new Spry.Widget.ValidationTextField("campo_data_criacao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_sub_area = new Spry.Widget.ValidationSelect("campo_sub_area");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_diretorio($_REQUEST['dip_codigo']);
    $select = $opcao->select_sub_area();
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=diretorio&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do diretório</div>
            </div>
            <input type="hidden" name="dip_codigo" value="<?php echo $dados[0]['DIP_CODIGO']; ?>" />
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                        <span id="campo_cursos">
                        <div class="input_600">
                            <select name="dip_sba_codigo" id="campo_sub_area" >
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['SBA_CODIGO']==$dados[0]['DIP_SBA_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['SBA_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['SBA_DESCRICAO'].'</option>';   
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
                    <div class="label_texto"> Título:* </div>
                    <span id="campo_titulo">
                        <div class="input_600">
                            <input type="text" name="dip_titulo" value="<?php echo $dados[0]['DIP_TITULO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Lider:* </div>
                    <span id="campo_lider">
                        <div class="input_600">
                            <input type="text" name="dip_lider" value="<?php echo $dados[0]['DIP_LIDER']; ?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Vice-lider:* </div>
                    <span id="campo_vice_lider">
                        <div class="input_600">
                            <input type="text" name="dip_vicelider" value="<?php echo $dados[0]['DIP_VICELIDER']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data criação:* </div>
                    <span id="campo_data_criacao">
                        <div class="input_300">
                            <input type="text" name="dip_data_criacao" value="<?php echo $dados[0]['DIP_DATA_CRIACAO']; ?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_titulo = new Spry.Widget.ValidationTextField("campo_titulo");
                var campo_lider = new Spry.Widget.ValidationTextField("campo_lider");
                var campo_vice_lider = new Spry.Widget.ValidationTextField("campo_vice_lider");
                var campo_data_criacao = new Spry.Widget.ValidationTextField("campo_data_criacao","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_sub_area = new Spry.Widget.ValidationSelect("campo_sub_area");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_diretorio($_REQUEST['dip_codigo']);
    $select = $opcao->select_sub_area();
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes do diretório</div>
            </div>
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                        <span id="campo_cursos">
                        <div class="input_600">
                            <select name="dip_sba_codigo" id="campo_sub_area" disabled="true">
                                <?php
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['SBA_CODIGO']==$dados[0]['DIP_SBA_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                        echo '<option value="'.$select[$esc]['SBA_CODIGO'].'"'.$selecionado.'>'.$select[$esc]['SBA_DESCRICAO'].'</option>';   
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
                    <div class="label_texto"> Título:* </div>
                    <span id="campo_titulo">
                        <div class="input_600">
                            <input type="text" name="dip_titulo" value="<?php echo $dados[0]['DIP_TITULO']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Lider:* </div>
                    <span id="campo_lider">
                        <div class="input_600">
                            <input type="text" name="dip_lider" value="<?php echo $dados[0]['DIP_LIDER'];  ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Vice-lider:* </div>
                    <span id="campo_vice_lider">
                        <div class="input_600">
                            <input type="text" name="dip_vicelider" value="<?php echo $dados[0]['DIP_VICELIDER']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data criação:* </div>
                    <span id="campo_data_criacao">
                        <div class="input_300">
                            <input type="text" name="dip_data_criacao" value="<?php echo $dados[0]['DIP_DATA_CRIACAO']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=diretorio&action=view_alterar&dip_codigo=<?php echo $dados[0]['DIP_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var diretorio = new Spry.Widget.ValidationTextField("diretorio");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




