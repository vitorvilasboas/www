
 <?php if($_REQUEST['action']=='ver_membros' or $_REQUEST['action']=='inserir' or $_REQUEST['action']=='excluir'){
    $dados = $opcao->select_diretorio_usuario($_REQUEST['dip_codigo']);
    
?>
<section>
    <div class="formulario">
                  
            <div class="head_form">
                <div class="titulo_view">Diretório</div>
            </div>
            <div class="titulo_projeto"><strong>Diretório: </strong>
                <b><?php echo $dados[0]['DIP_TITULO']; ?></b>
                <a href="index.php?p=diretorio&action=detalhes&dip_codigo=<?php echo $dados[0]['DIP_CODIGO']; ?>">  <img src="imagens/ver.png" /> </a><br />
                <p> 
                    <?php 
                    $area = $opcao->select_area($dados[0]['DIP_SBA_CODIGO']);
                    echo 'Grande Área: <i>'.$area[0]['GDA_IDENTIFICACAO'].'-'.$area[0]['GDA_DESCRICAO'].'</i>, Sub-Área: <i> '.$area[0]['SBA_IDENTIFICACAO'].'-'.$area[0]['SBA_DESCRICAO'].'</i>';  
                    ?>
                </p>
                <p>Líder:<i><?php echo $dados[0]['DIP_LIDER']; ?>,</i> criado em:<i><?php echo $dados[0]['DIP_DATA_CRIACAO']; ?> </i></p>
            </div>
            <form action="index.php?p=membro_diretorio&action=inserir&dip_codigo=<?php echo $dados[0]['DIP_CODIGO']; ?>" method="post"> 
                <fieldset>
                    <legend> Adicionar pesquisadores: </legend>
                    <input type="hidden" name="md_dip_codigo" value="<?php echo $dados[0]['DIP_CODIGO']; ?>"  />
                    <div class="coluna">Usuários<br />
                        <div class="input_300">
                            <select name="md_usu_codigo" id="campo_usuario" >
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
                            <select name="md_tipo" id="campo_usuario" >
                                <option value="Líder">Líder</option>
                                <option value="Vice-Líder">Vice-Líder</option>
                                <option value="Membro">Membro</option>
                            </select>
                        </div>
                    </div>
                    <div class="coluna">Entrada<br />
                        <div class="input_100">
                            <input  type="text" name="md_entrada" />

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
                        $equipeusuario = $opcao->select_pesquisadores($dados[0]['DIP_CODIGO']);
                        $contequipe = count($equipeusuario);
                        if($contequipe==0){
                            echo '<p class="lista_vazia"> Não há pesquisadores! </p>';
                        }
                        for($cte=0;$cte<$contequipe;$cte++){
                            $nome = $opcao->select_nome_usuario($equipeusuario[$cte]['md_usu_codigo']);
                            echo '<li class="listarpessoas">'
                            .$nome[0]['usu_nome'].' | '
                            .$equipeusuario[$cte]['md_tipo'].' | Entrou em: '
                            .$equipeusuario[$cte]['md_entrada'].' '
                            . '<a href="index.php?p=membro_diretorio&action=excluir&md_codigo='.$equipeusuario[$cte]['md_codigo'].'&dip_codigo='.$equipeusuario[$cte]['md_dip_codigo'].'">'
                            . '    <img src="imagens/excluir.png" />'
                            . '</a>'
                            .'<a target="blank" href="declaracao_membro.php?&usu_codigo='.$equipeusuario[$cte]['usu_codigo'].'&dip_codigo='.$equipeusuario[$cte]['md_dip_codigo'].'">'
                            . '<img src="imagens/declaracao.png" />'
                            . '</a>'
                            .'</li>';   
                        } 
                    ?>
                </ol>
            </div>
            
    </div>
</section>

  <?php } ?>