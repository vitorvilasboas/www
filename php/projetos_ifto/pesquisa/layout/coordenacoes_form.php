<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=coordenacoes&action=cadastrar" method="post" enctype="multipart/form-data">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar Coordenação</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Coordenação:* </div>
                    <span id="campo_portaria">
                        <div class="input_600">
                            <input type="text" name="coord_nome" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="campo_usuario">
                        <div class="input_600">
                            <select name="coord_usu_codigo" id="campo_usuario" >
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
                    <div class="label_texto"> Portaria:* </div>
                    <span id="campo_portaria">
                        <div class="input_600">
                            <input type="text" name="coord_portaria" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data Port.:* </div>
                    <span id="campo_data_portaria">
                        <div class="input_300">
                            <input type="text" name="coord_data_portaria" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Ass. Digital:* </div>
                    <span id="campo_assinatura">
                        <div class="input_300">
                            <input type="file" name="coord_assinatura" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>

            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_portaria = new Spry.Widget.ValidationTextField("campo_portaria");
                var campo_data_portaria = new Spry.Widget.ValidationTextField("campo_data_portaria","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_usuario = new Spry.Widget.ValidationSelect("campo_usuario");
                var campo_assinatura = new Spry.Widget.ValidationTextField("campo_assinatura");
                
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_coordenacoes($_REQUEST['coord_codigo']);
    $select = $opcao->select_usuarios();
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=coordenacoes&action=alterar" method="post" enctype="multipart/form-data" >           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados da Coordenação</div>
            </div>
            <input type="hidden" name="coord_codigo" value="<?php echo $dados[0]['COORD_CODIGO']; ?>" />
            <input type="hidden" name="coord_nome_anterior" value="<?php echo $dados[0]['COORD_ASSINATURA']; ?>" />
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Coordenaçao:* </div>
                    <span id="campo_portaria">
                        <div class="input_600">
                            <input type="text" name="coord_nome" value="<?php echo $dados[0]['COORD_NOME'];?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="campo_usuario">
                        <div class="input_600">
                            <select name="coord_usu_codigo" id="campo_usuario" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['COORD_USU_CODIGO']){
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
                    <div class="label_texto"> Portaria:* </div>
                    <span id="campo_portaria">
                        <div class="input_600">
                            <input type="text" name="coord_portaria" value="<?php echo $dados[0]['COORD_PORTARIA'];?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data Port.:* </div>
                    <span id="campo_data_portaria">
                        <div class="input_300">
                            <input type="text" name="coord_data_portaria" value="<?php echo $dados[0]['COORD_DATA_PORTARIA'];?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Ass. Digital:* </div>
                    <span id="campo_assinatura">
                        <div class="input_300">
                            <input type="file" name="coord_assinatura" /> 
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
                
            </div>
            <div class="frm_img">
                <div class="label_assinatura"> Assinatura:* </div>
                <div class="input_img">
                    <img src="uploads/assinaturas/<?php echo $dados[0]['COORD_ASSINATURA'];?>" />
                </div>
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
    $dados = $opcao->select_coordenacoes($_REQUEST['coord_codigo']);
    $select = $opcao->select_usuarios();
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes da Coordenação</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Coordenação:* </div>
                    <span id="campo_portaria">
                        <div class="input_600">
                            <input type="text" name="coord_nome" value="<?php echo $dados[0]['COORD_NOME'];?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Usuários:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="coord_usu_codigo" id="campo_usuario" disabled="true" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['COORD_USU_CODIGO']){
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
                    <div class="label_texto"> Portaria:* </div>
                    <span id="campo_portaria">
                        <div class="input_600">
                            <input type="text" name="coord_portaria" value="<?php echo $dados[0]['COORD_PORTARIA'];?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data Port.:* </div>
                    <span id="campo_data_portaria">
                        <div class="input_300">
                            <input type="text" name="coord_data_portaria" value="<?php echo $dados[0]['COORD_DATA_PORTARIA'];?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Ass. Digital:* </div>
                    <span id="campo_assinatura">
                        <div class="input_300">
                            <input type="file" name="coord_assinatura" value="<?php echo $dados[0]['COORD_ASSINATURA'];?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_img">
                <div class="label_assinatura"> Assinatura:* </div>
                <div class="input_img">
                    <img src="uploads/assinaturas/<?php echo $dados[0]['COORD_ASSINATURA'];?>" />
                </div>
            </div>
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=coordenacoes&action=view_alterar&coord_codigo=<?php echo $dados[0]['COORD_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var coordenacoes = new Spry.Widget.ValidationTextField("coordenacoes");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




