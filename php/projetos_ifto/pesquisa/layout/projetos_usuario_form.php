
 <?php if($_REQUEST['action']=='ver_projeto' or $_REQUEST['action']=='inserir' or $_REQUEST['action']=='excluir'){
    $dados = $opcao->select_projetos_usuario($_REQUEST['proj_codigo']);
    
?>
<section>
    <div class="formulario">
                  
            <div class="head_form">
                <div class="titulo_view">Projeto</div>
            </div>
            <div class="titulo_projeto"><strong>Título: </strong>
                <b><?php echo $dados[0]['PROJ_NOME']; ?></b>
                <a href="index.php?p=projetos&action=detalhes&proj_codigo=<?php echo $dados[0]['PROJ_CODIGO']; ?>">  <img src="imagens/ver.png" /> </a><br />
                <p> 
                    <?php 
                    $area = $opcao->select_area($dados[0]['PROJ_SBA_CODIGO']);
                    echo 'Grande Área: <i>'.$area[0]['GDA_IDENTIFICACAO'].'-'.$area[0]['GDA_DESCRICAO'].'</i>, Sub-Área: <i> '.$area[0]['SBA_IDENTIFICACAO'].'-'.$area[0]['SBA_DESCRICAO'].'</i>';  
                    ?>
                </p>
                <p> Vigência:<i><?php echo $dados[0]['PROJ_DATA_INICIO'].' - '.$dados[0]['PROJ_DATA_FIM']; ?></i>, Situação:<i><?php echo $dados[0]['PROJ_SITUACAO']; ?></i> </p>
            </div>
            <form action="index.php?p=projetos_usuario&action=inserir&proj_codigo=<?php echo $dados[0]['PROJ_CODIGO']; ?>" method="post"> 
                <fieldset>
                    <legend> Adicionar pesquisadores: </legend>
                    <input type="hidden" name="pu_proj_codigo" value="<?php echo $dados[0]['PROJ_CODIGO']; ?>"  />
                    <div class="coluna">Usuários<br />
                        <div class="input_300">
                            <select name="pu_usu_codigo" id="campo_usuario" >
                                <?php
                                $selectusuario = $opcao->select_todos_usuario();
                                $contusuario = count($selectusuario);
                                for($usu=0;$usu<$contusuario;$usu++){
                                    echo '<option value="'.$selectusuario[$usu]['USU_CODIGO'].'">'.$selectusuario[$usu]['USU_NOME'].'</option>';   
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="coluna">Tipo<br />
                        <div class="input_150">
                            <select name="pu_tipo_participacao" id="campo_usuario" >
                                <option value="Coordenador">Coordenador</option>
                                <option value="Executor">Executor</option>
                            </select>
                        </div>
                    </div>
                    <div class="coluna">Bolsista<br />
                        <div class="input_50">
                            <select name="pu_bolsa" id="campo_usuario" >
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="coluna"> Modalidades<br />
                        <div class="input_150">
                            <select name="pu_descricao" id="campo_usuario" >
                                <option value="Nenhum">Nenhum</option>
                                <option value="PAP/APL">PAP/APL</option>
                                <option value="PIC/IFTO">PIC/IFTO</option>
                                <option value="ICJ/IFTO">ICJ/IFTO</option>
                                <option value="PIC/CNPQ">PIC/CNPQ</option>
                                <option value="PAP/INOVA">PAP/INOVA</option>
                            </select>
                        </div>
                    </div> 
                    <div class="coluna">
                        <br />
                        <input class="botaoadicionar"  type="submit" name="adicionar" value="Adicionar" />
                    </div>
                </fieldset>          
            
               
        </form>
            <h1 class="titulo_pesquisadores">Pesquisador(es)</h1>
            <div class="pessoas">
                
                <ol>
                   <?php
                        $equipeusuario = $opcao->select_pesquisadores($dados[0]['PROJ_CODIGO']);
                        $contequipe = count($equipeusuario);
                        if($contequipe==0){
                            echo '<p class="lista_vazia"> Não há pesquisadores! </p>';
                        }
                        for($cte=0;$cte<$contequipe;$cte++){
                            $nome = $opcao->select_nome_usuario($equipeusuario[$cte]['pu_usu_codigo']);
                            echo '<li class="listarpessoas">'
                            .$nome[0]['usu_nome'].' | '
                            .$equipeusuario[$cte]['pu_tipo_participacao'].' | Bolsista: '
                            .$equipeusuario[$cte]['pu_bolsa'].' '
                            . '<a href="index.php?p=projetos_usuario&action=excluir&pu_codigo='.$equipeusuario[$cte]['pu_codigo'].'&proj_codigo='.$equipeusuario[$cte]['pu_proj_codigo'].'">'
                            . '    <img src="imagens/excluir.png" />'
                            . '</a>';
                            if($dados[0]['PROJ_SITUACAO']=='Em Andamento'){
                            echo '<a target="blank" href="declaracao.php?&usu_codigo='.$equipeusuario[$cte]['usu_codigo'].'&proj_codigo='.$equipeusuario[$cte]['pu_proj_codigo'].'">'
                            . '<img src="imagens/declaracao.png" />'
                            . '</a>';
                            }else if($dados[0]['PROJ_SITUACAO']=='Concluído'){
                                echo '<a target="blank" href="certidao.php?&usu_codigo='.$equipeusuario[$cte]['usu_codigo'].'&proj_codigo='.$equipeusuario[$cte]['pu_proj_codigo'].'">'
                            . '<img src="imagens/certidao.png" />'
                            . '</a>';
                            }
                            echo '</li>';   
                        } 
                    ?>
                </ol>
                
            </div>
        <?php 
            echo '<a target="blank" href="capa_livro.php?&usu_codigo='.$dados[0]['PROJ_USU_CODIGO'].'&proj_codigo='.$dados[0]['PROJ_CODIGO'].'"> Imprimir capa</a>';
        ?>    
    </div>
</section>

  <?php } ?>