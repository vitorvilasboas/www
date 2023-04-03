<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=campus&action=cadastrar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar campus</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> campus:* </div>
                    <span id="campus">
                        <div class="input_300">
                            <input type="text" name="camp_nome" />
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
                var campus = new Spry.Widget.ValidationTextField("campus");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_campus($_REQUEST['camp_codigo']);
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=campus&action=alterar" method="post">           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do campus</div>
            </div>
            <input type="hidden" name="camp_codigo" value="<?php echo $dados[0]['CAMP_CODIGO']; ?>" />
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> campus:* <img src="imagens/user.png"/></div>
                    <span id="campus">
                        <div class="input_300">
                            <input type="text" name="camp_nome" value="<?php echo $dados[0]['CAMP_NOME']; ?>" />
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
                var campus = new Spry.Widget.ValidationTextField("campus");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_campus($_REQUEST['camp_codigo']);
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes do campus</div>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Código:* </div>
                    <span id="campus">
                        <div class="input_300">
                            <input type="text" name="camp_codigo" value="<?php echo $dados[0]['CAMP_CODIGO']; ?>" disabled="true" />
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
                    <span id="campus">
                        <div class="input_300">
                            <input type="text" name="camp_nome" value="<?php echo $dados[0]['CAMP_NOME']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=campus&action=view_alterar&camp_codigo=<?php echo $dados[0]['CAMP_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var campus = new Spry.Widget.ValidationTextField("campus");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




