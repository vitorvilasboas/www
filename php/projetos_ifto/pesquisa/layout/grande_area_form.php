<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=grande_area&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar grande area</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Identificação:* </div>
                    <span id="campo_identificacao">
                        <div class="input_300">
                            <input type="text" name="gda_identificacao" />
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
                    <div class="label_texto"> Grande area:* </div>
                    <span id="campo_grande_area">
                        <div class="input_300">
                            <input type="text" name="gda_descricao" />
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
                var campo_grande_area = new Spry.Widget.ValidationTextField("campo_grande_area");
                var campo_identificacao = new Spry.Widget.ValidationTextField("campo_identificacao");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_grande_area($_REQUEST['gda_codigo']);
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=grande_area&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do grande área</div>
            </div>
            <input type="hidden" name="gda_codigo" value="<?php echo $dados[0]['GDA_CODIGO']; ?>" />
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Identificação:*</div>
                    <span id="campo_identificacao">
                        <div class="input_300">
                            <input type="text" name="gda_identificacao" value="<?php echo $dados[0]['GDA_IDENTIFICACAO']; ?>" />
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
                    <span id="campo_grande_area">
                        <div class="input_300">
                            <input type="text" name="gda_descricao" value="<?php echo $dados[0]['GDA_DESCRICAO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>  
                        </div>
                    </span>
                </label>
            </div>
            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_grande_area = new Spry.Widget.ValidationTextField("campo_grande_area");
                var campo_identificacao = new Spry.Widget.ValidationTextField("campo_identificacao");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_grande_area($_REQUEST['gda_codigo']);
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes do grande_area</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Código:* </div>
                    <span id="grande_area">
                        <div class="input_300">
                            <input type="text" name="gda_codigo" value="<?php echo $dados[0]['GDA_CODIGO']; ?>" disabled="true" />
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
                    <span id="grande_area">
                        <div class="input_300">
                            <input type="text" name="gda_identificacao" value="<?php echo $dados[0]['GDA_IDENTIFICACAO']; ?>" disabled="true" />
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
                    <span id="campo_grande_area">
                        <div class="input_300">
                            <input type="text" name="gda_descricao" value="<?php echo $dados[0]['GDA_DESCRICAO']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>  
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=grande_area&action=view_alterar&gda_codigo=<?php echo $dados[0]['GDA_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var grande_area = new Spry.Widget.ValidationTextField("grande_area");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




