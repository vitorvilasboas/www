<?php 
if($_REQUEST['action']=='cadastro'){
?>
        
<section>
    <div class="formulario">
        <form action="index.php?p=projetos&action=cadastrar" method="post" enctype="multipart/form-data">           
            <div class="head_form">
                <div class="titulo_view">Cadastrar Projetos</div>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Projeto:* </div>
                    <span id="campo_projeto">
                        <div class="input_600">
                            <input type="text" name="proj_nome" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Coordenador:* </div>
                    <span id="campo_usuario">
                        <div class="input_300">
                            <select name="proj_usu_codigo" id="campo_usuario" >
                            <?php
                                $selectusuario = $opcao->select_usuarios();
                                $contusuario = count($selectusuario);
                                for($usu=0;$usu<$contusuario;$usu++){
                                    echo '<option value="'.$selectusuario[$usu]['USU_CODIGO'].'">'.$selectusuario[$usu]['USU_NOME'].'</option>';   
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
                    <div class="label_texto"> Diret. Pesquisa:* </div>
                    <span id="campo_diretorio_pesquisa">
                        <div class="input_600">
                            <select name="proj_dip_codigo" id="campo_diretorio_pesquisa" >
                                <?php
                                $selectdiretorio = $opcao->select_diretorio_pesquisa();
                                $contdiretorio = count($selectdiretorio);
                                for($dip=0;$dip<$contdiretorio;$dip++){
                                    echo '<option value="'.$selectdiretorio[$dip]['DIP_CODIGO'].'">'.$selectdiretorio[$dip]['DIP_TITULO'].'</option>';   
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
                    <div class="label_texto"> Campus:* </div>
                    <span id="campo_campus">
                        <div class="input_300">
                            <select name="proj_camp_codigo" id="campo_campus" >
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
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Cursos:* </div>
                    <span id="campo_cursos">
                        <div class="input_300">
                            <select name="proj_curso_codigo" id="campo_cursos" >
                                <?php
                                $selectcursos = $opcao->select_cursos();
                                $contcursos = count($selectcursos);
                                for($cur=0;$cur<$contcursos;$cur++){
                                    echo '<option value="'.$selectcursos[$cur]['CURSO_CODIGO'].'">'.$selectcursos[$cur]['CURSO_NOME'].'</option>';   
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
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tipo Projeto:* </div>
                    <span id="campo_tipo_projeto">
                        <div class="input_600">
                            <select name="proj_tipo" id="campo_tipo_projeto" >
                                <option value="1">Ensino</option>   
                                <option value="2">Pesquisa/Inovação</option>
                                <option value="3">Extensão</option>
                            </select></div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                    <span id="campo_sub_area">
                        <div class="input_600">
                            <select name="proj_sba_codigo" id="campo_sub_area" >
                                <?php
                                $selectsba = $opcao->select_sub_area();
                                $contsba = count($selectsba);
                                for($sba=0;$sba<$contsba;$sba++){
                                    echo '<option value="'.$selectsba[$sba]['SBA_CODIGO'].'">'.$selectsba[$sba]['SBA_DESCRICAO'].'</option>';   
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
                    <div class="label_texto"> Data Inicio.:* </div>
                    <span id="campo_data_inicio">
                        <div class="input_300">
                            <input type="text" name="proj_data_inicio" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data Final:* </div>
                    <span id="campo_data_final">
                        <div class="input_300">
                            <input type="text" name="proj_data_fim" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Situaçao:* </div>
                    <span id="campo_situacao">
                        <div class="input_600">
                            <select name="proj_situacao" id="campo_situacao" >
                                <option value="Em Andamento">Em Andamento</option>   
                                <option value="Concluído">Concluído</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Submetido">Submetido</option>
                                <option value="Em Avaliação">Em Avaliação</option>
                            </select></div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Nº Edital:* </div>
                    <span id="campo_edital">
                        <div class="input_300">
                            <input type="text" name="proj_edital" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Nº Processo:* </div>
                    <span id="campo_processo">
                        <div class="input_300">
                            <input type="text" name="proj_processo" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Livro/Página:* </div>
                    <span id="campo_processo">
                        <div class="input_300">
                            <input type="text" name="proj_livro" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            

            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_projeto = new Spry.Widget.ValidationTextField("campo_projeto");
                var campo_data_inicio = new Spry.Widget.ValidationTextField("campo_data_inicio","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_data_final = new Spry.Widget.ValidationTextField("campo_data_final","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_diretorio_pesquisa = new Spry.Widget.ValidationSelect("campo_diretorio_pesquisa");
                var campo_sub_area = new Spry.Widget.ValidationSelect("campo_sub_area");
                var campo_campus = new Spry.Widget.ValidationSelect("campo_campus");
                var campo_cursos = new Spry.Widget.ValidationSelect("campo_cursos");
                var campo_tipo_projeto = new Spry.Widget.ValidationSelect("campo_tipo_projeto");
                var campo_situacao = new Spry.Widget.ValidationSelect("campo_situacao");
                var campo_edital = new Spry.Widget.ValidationTextField("campo_edital");
                var campo_processo = new Spry.Widget.ValidationTextField("campo_processo");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='view_alterar'){
    $dados = $opcao->select_projetos($_REQUEST['proj_codigo']);
?>
      
<section>
    <div class="formulario">
        <form action="index.php?p=projetos&action=alterar" method="post" enctype="multipart/form-data" >           
            <div class="head_form">
                <div class="titulo_view">Alterar Dados do Projeto</div>
            </div>
            <input type="hidden" name="proj_codigo" value="<?php echo $dados[0]['PROJ_CODIGO']; ?>" />
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Projeto:* </div>
                    <span id="campo_projeto">
                        <div class="input_600">
                            <input type="text" name="proj_nome" value="<?php echo $dados[0]['PROJ_NOME']; ?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Coordenador:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="proj_usu_codigo" id="campo_usuario" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['PROJ_USU_CODIGO']){
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
                    <div class="label_texto"> Diret. Pesquisa:* </div>
                    <span id="campo_diretorio_pesquisa">
                        <div class="input_600">
                            <select name="proj_dip_codigo" id="campo_diretorio_pesquisa" >
                                <?php
                                $selectdiretorio = $opcao->select_diretorio_pesquisa();
                                $contdiretorio = count($selectdiretorio);
                                for($dip=0;$dip<$contdiretorio;$dip++){
                                    $selecionado = '';
                                        if($selectdiretorio[$dip]['DIP_CODIGO']==$dados[0]['PROJ_DIP_CODIGO']){
                                            $selecionado = 'selected';
                                        }

                                    echo '<option value="'.$selectdiretorio[$dip]['DIP_CODIGO'].'" '.$selecionado.'>'.$selectdiretorio[$dip]['DIP_TITULO'].'</option>';   
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
                    <div class="label_texto"> Campus:* </div>
                    <span id="campo_campus">
                        <div class="input_300">
                            <select name="proj_camp_codigo" id="campo_campus" >
                                <?php
                                $selectcampus = $opcao->select_campus();
                                $contcampus = count($selectcampus);
                                for($camp=0;$camp<$contcampus;$camp++){
                                    $selecionado = '';
                                        if($selectcampus[$camp]['CAMP_CODIGO']==$dados[0]['PROJ_CAMP_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                    echo '<option value="'.$selectcampus[$camp]['CAMP_CODIGO'].'" '.$selecionado.'>'.$selectcampus[$camp]['CAMP_NOME'].'</option>';   
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
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Cursos:* </div>
                    <span id="campo_cursos">
                        <div class="input_300">
                            <select name="proj_curso_codigo" id="campo_cursos" >
                                <?php
                                $selectcursos = $opcao->select_cursos();
                                $contcursos = count($selectcursos);
                                for($cur=0;$cur<$contcursos;$cur++){
                                    if($selectcursos[$cur]['CURSO_CODIGO']==$dados[0]['PROJ_CURSO_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                    echo '<option value="'.$selectcursos[$cur]['CURSO_CODIGO'].'" '.$selecionado.'>'.$selectcursos[$cur]['CURSO_NOME'].'</option>';   
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
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Tipo Projeto:* </div>
                    <span id="campo_tipo_projeto">
                        <div class="input_600">
                            <select name="proj_tipo" id="campo_tipo_projeto" >
                                <option value="<?php echo $dados[0]['PROJ_TIPO']; ?>"><?php echo tipo_projeto($dados[0]['PROJ_TIPO']); ?></option>
                                <option value="1">Ensino</option>   
                                <option value="2">Pesquisa/Inovação</option>
                                <option value="3">Extensão</option>
                            </select></div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                    <span id="campo_sub_area">
                        <div class="input_600">
                            <select name="proj_sba_codigo" id="campo_sub_area" >
                                <?php
                                $selectsba = $opcao->select_sub_area();
                                $contsba = count($selectsba);
                                for($sba=0;$sba<$contsba;$sba++){
                                    if($selectsba[$sba]['SBA_CODIGO']==$dados[0]['PROJ_SBA_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                    echo '<option value="'.$selectsba[$sba]['SBA_CODIGO'].'" '.$selecionado.'>'.$selectsba[$sba]['SBA_DESCRICAO'].'</option>';   
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
                    <div class="label_texto"> Data Inicio.:* </div>
                    <span id="campo_data_inicio">
                        <div class="input_300">
                            <input type="text" name="proj_data_inicio" value="<?php echo $dados[0]['PROJ_DATA_INICIO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data Final:* </div>
                    <span id="campo_data_final">
                        <div class="input_300">
                            <input type="text" name="proj_data_fim" value="<?php echo $dados[0]['PROJ_DATA_FIM']; ?>"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Situaçao:* </div>
                    <span id="campo_situacao">
                        <div class="input_600">
                            <select name="proj_situacao" id="campo_situacao" >
                                <option value="<?php echo $dados[0]['PROJ_SITUACAO']; ?>"><?php echo $dados[0]['PROJ_SITUACAO']; ?></option>
                                <option value="Em Andamento">Em Andamento</option>   
                                <option value="Concluído">Concluído</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Submetido">Submetido</option>
                                <option value="Em Avaliação">Em Avaliação</option>
                            
                            </select></div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Nº Edital:* </div>
                    <span id="campo_edital">
                        <div class="input_300">
                            <input type="text" name="proj_edital" value="<?php echo $dados[0]['PROJ_EDITAL']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Nº Processo:* </div>
                    <span id="campo_processo">
                        <div class="input_300">
                            <input type="text" name="proj_processo" value="<?php echo $dados[0]['PROJ_PROCESSO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Livro/Página:* </div>
                    <span id="campo_processo">
                        <div class="input_300">
                            <input type="text" name="proj_livro" value="<?php echo $dados[0]['PROJ_LIVRO']; ?>" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>

            <div class="centralizar"><input class="botaosalvar"  type="submit" name="salvar" value="Salvar" /></div>

            <script type="text/javascript">
                var campo_projeto = new Spry.Widget.ValidationTextField("campo_projeto");
                var campo_data_inicio = new Spry.Widget.ValidationTextField("campo_data_inicio","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_data_final = new Spry.Widget.ValidationTextField("campo_data_final","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_diretorio_pesquisa = new Spry.Widget.ValidationSelect("campo_diretorio_pesquisa");
                var campo_sub_area = new Spry.Widget.ValidationSelect("campo_sub_area");
                var campo_campus = new Spry.Widget.ValidationSelect("campo_campus");
                var campo_cursos = new Spry.Widget.ValidationSelect("campo_cursos");
                var campo_tipo_projeto = new Spry.Widget.ValidationSelect("campo_tipo_projeto");
                var campo_situacao = new Spry.Widget.ValidationSelect("campo_situacao");
                var campo_edital = new Spry.Widget.ValidationTextField("campo_edital");
                var campo_processo = new Spry.Widget.ValidationTextField("campo_processo");
            </script>
        </form>
    </div>
</section>

<?php } else if($_REQUEST['action']=='detalhes'){
    $dados = $opcao->select_projetos($_REQUEST['proj_codigo']);
    $select = $opcao->select_usuarios();
?>
<section>
    <div class="formulario">
        <form action="" method="post">           
            <div class="head_form">
                <div class="titulo_view">Detalhes do Projeto</div>
            </div>
            <input type="hidden" name="proj_codigo" value="<?php echo $dados[0]['PROJ_CODIGO']; ?>"  />
            
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Projeto:* </div>
                    <span id="campo_projeto">
                        <div class="input_600">
                            <input type="text" name="proj_nome" value="<?php echo $dados[0]['PROJ_NOME']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Coordenador:* </div>
                    <span id="cursos">
                        <div class="input_600">
                            <select name="proj_usu_codigo" id="campo_usuario" disabled="true" >
                                <?php
                                    $select = $opcao->select_usuarios();
                                    $cont = count($select);
                                    for($esc=0;$esc<$cont;$esc++){
                                        $selecionado = '';
                                        if($select[$esc]['USU_CODIGO']==$dados[0]['PROJ_USU_CODIGO']){
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
                    <div class="label_texto"> Diret. Pesquisa:* </div>
                    <span id="campo_diretorio_pesquisa">
                        <div class="input_600">
                            <select name="proj_dip_codigo" id="campo_diretorio_pesquisa" disabled="true" >
                                <?php
                                $selectdiretorio = $opcao->select_diretorio_pesquisa();
                                $contdiretorio = count($selectdiretorio);
                                for($dip=0;$dip<$contdiretorio;$dip++){
                                    $selecionado = '';
                                        if($selectdiretorio[$dip]['DIP_CODIGO']==$dados[0]['PROJ_DIP_CODIGO']){
                                            $selecionado = 'selected';
                                        }

                                    echo '<option value="'.$selectdiretorio[$dip]['DIP_CODIGO'].'" '.$selecionado.'>'.$selectdiretorio[$dip]['DIP_TITULO'].'</option>';   
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
                    <div class="label_texto"> Campus:* </div>
                    <span id="campo_campus">
                        <div class="input_300">
                            <select name="proj_camp_codigo" id="campo_campus" disabled="true" >
                                <?php
                                $selectcampus = $opcao->select_campus();
                                $contcampus = count($selectcampus);
                                for($camp=0;$camp<$contcampus;$camp++){
                                    $selecionado = '';
                                        if($selectcampus[$camp]['CAMP_CODIGO']==$dados[0]['PROJ_CAMP_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                    echo '<option value="'.$selectcampus[$camp]['CAMP_CODIGO'].'" '.$selecionado.'>'.$selectcampus[$camp]['CAMP_NOME'].'</option>';   
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
                    <div class="label_texto"> Cursos:* </div>
                    <span id="campo_cursos">
                        <div class="input_300">
                            <select name="proj_curso_codigo" id="campo_cursos" disabled="true">
                                <?php
                                $selectcursos = $opcao->select_cursos();
                                $contcursos = count($selectcursos);
                                for($cur=0;$cur<$contcursos;$cur++){
                                    if($selectcursos[$cur]['CURSO_CODIGO']==$dados[0]['PROJ_CURSO_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                    echo '<option value="'.$selectcursos[$cur]['CURSO_CODIGO'].'" '.$selecionado.'>'.$selectcursos[$cur]['CURSO_NOME'].'</option>';   
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
                    <div class="label_texto"> Tipo Projeto:* </div>
                    <span id="campo_tipo_projeto">
                        <div class="input_600">
                            <select name="proj_tipo" id="campo_tipo_projeto" disabled="true" >
                                <option value="<?php echo $dados[0]['PROJ_TIPO']; ?>"><?php echo tipo_projeto($dados[0]['PROJ_TIPO']); ?></option>
                                <option value="1">Ensino</option>   
                                <option value="2">Pesquisa/Inovação</option>
                                <option value="3">Extensão</option>
                            </select></div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Sub-área:* </div>
                    <span id="campo_sub_area">
                        <div class="input_600">
                            <select name="proj_sba_codigo" id="campo_sub_area" disabled="true" >
                                <?php
                                $selectsba = $opcao->select_sub_area();
                                $contsba = count($selectsba);
                                for($sba=0;$sba<$contsba;$sba++){
                                    if($selectsba[$sba]['SBA_CODIGO']==$dados[0]['PROJ_SBA_CODIGO']){
                                            $selecionado = 'selected';
                                        }
                                    echo '<option value="'.$selectsba[$sba]['SBA_CODIGO'].'" '.$selecionado.'>'.$selectsba[$sba]['SBA_DESCRICAO'].'</option>';   
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
                    <div class="label_texto"> Data Inicio.:* </div>
                    <span id="campo_data_inicio">
                        <div class="input_300">
                            <input type="text" name="proj_data_inicio" value="<?php echo $dados[0]['PROJ_DATA_INICIO']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Data Final:* </div>
                    <span id="campo_data_final">
                        <div class="input_300">
                            <input type="text" name="proj_data_fim" value="<?php echo $dados[0]['PROJ_DATA_FIM']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_1200px">
                <label>
                    <div class="label_texto"> Situaçao:* </div>
                    <span id="campo_situacao">
                        <div class="input_600">
                            <select name="proj_situacao" id="campo_situacao" disabled="true" >
                                <option value="<?php echo $dados[0]['PROJ_SITUACAO']; ?>"><?php echo $dados[0]['PROJ_SITUACAO']; ?></option>
                                <option value="Em Andamento">Em Andamento</option>   
                                <option value="Concluído">Concluído</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Submetido">Submetido</option>
                                <option value="Em Avaliação">Em Avaliação</option>
                            
                            </select></div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Nº Edital:* </div>
                    <span id="campo_edital">
                        <div class="input_300">
                            <input type="text" name="proj_edital" value="<?php echo $dados[0]['PROJ_EDITAL']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Nº Processo:* </div>
                    <span id="campo_processo">
                        <div class="input_300">
                            <input type="text" name="proj_processo" value="<?php echo $dados[0]['PROJ_PROCESSO']; ?>" disabled="true"/>
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Livro/Página:* </div>
                    <span id="campo_processo">
                        <div class="input_300">
                            <input type="text" name="proj_livro" value="<?php echo $dados[0]['PROJ_LIVRO']; ?>" disabled="true" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                        </div>
                    </span>
                </label>
            </div>

            <script type="text/javascript">
                var campo_projeto = new Spry.Widget.ValidationTextField("campo_projeto");
                var campo_data_inicio = new Spry.Widget.ValidationTextField("campo_data_inicio","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_data_final = new Spry.Widget.ValidationTextField("campo_data_final","date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                var campo_diretorio_pesquisa = new Spry.Widget.ValidationSelect("campo_diretorio_pesquisa");
                var campo_sub_area = new Spry.Widget.ValidationSelect("campo_sub_area");
                var campo_campus = new Spry.Widget.ValidationSelect("campo_campus");
                var campo_cursos = new Spry.Widget.ValidationSelect("campo_cursos");
                var campo_tipo_projeto = new Spry.Widget.ValidationSelect("campo_tipo_projeto");
                var campo_situacao = new Spry.Widget.ValidationSelect("campo_situacao");
                var campo_edital = new Spry.Widget.ValidationTextField("campo_edital");
                var campo_processo = new Spry.Widget.ValidationTextField("campo_processo");
            </script>
            
            <div class="centralizar">
                <a class="botaoeditar" href="index.php?p=projetos&action=view_alterar&proj_codigo=<?php echo $dados[0]['PROJ_CODIGO']; ?>">Alterar </a>
            </div>
            <script type="text/javascript">
                var projetos = new Spry.Widget.ValidationTextField("projetos");
            </script>
        </form>
    </div>
</section>
        <?php } ?>




