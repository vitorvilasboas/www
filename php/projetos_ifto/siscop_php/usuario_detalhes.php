<div id="pagina">
    <?php
    if($opcao->registros=$opcao->resultado2->FetchNextObject()){      
    ?>
    
    <center><font class="fonte_titulos">Manter Usuário - Detalhes do Usuário</font>
    <center><table class="minha_tabela_detalhes" border="1" cellpadding="1px" cellspacing="0px">
        <div>        
        <?php
        while($opcao->registros=$opcao->resultado->FetchNextObject()){
            ?>            
            <input type="hidden" name="usu_codigo" value="<?php echo $opcao->registros->USU_CODIGO;?>"/>
            <tr class="minha_linha_titulo" cellpadding="5px" height="30px">
                <td colspan="2"></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nome</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->USU_NOME;?></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Código</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->USU_CODIGO;?></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Permissão</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->USU_PERMISSAO;?></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Lotação</td>
                <?php
                $sql=("select * from departamento where dep_codigo=".$opcao->registros->DEP_CODIGO);
                $opcao->resultado3= $opcao->con->banco->Execute($sql);
                if($opcao->registros3=$opcao->resultado3->FetchNextObject()){
                ?> 
                            <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros3->DEP_NOME;?></td>
                <?php
                    } else {
                ?>
                        <td class="minha_coluna_detalhes_dados" width="50px"></td>  
                <?php
                    }
                ?>   
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Perfil</td>
                <?php
                if(($opcao->registros->ADM_CODIGO!=null)){
                    ?>
                            <td class="minha_coluna_detalhes_dados" width="50px">Técnico Administrativo</td>
                        </tr>
                        <tr class="minha_linha_detalhes" height="30px">
                            <td class="minha_coluna_mestre">Cargo</td>
                            <?php
                            $sql=("select * from administrativo where adm_codigo=".$opcao->registros->ADM_CODIGO);
                            $opcao->resultado0= $opcao->con->banco->Execute($sql);
                            if($opcao->registros0=$opcao->resultado0->FetchNextObject()){
                            ?> 
                                        <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros0->ADM_CARGO;?></td>
                            <?php
                                } else {
                            ?>
                                    <td class="minha_coluna_detalhes_dados" width="50px"></td>  
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                } else if(($opcao->registros->PROF_CODIGO!=null)){
                ?>
                            <td class="minha_coluna_detalhes_dados" width="50px">Professor</td>
                        </tr>
                        <tr class="minha_linha_detalhes" height="30px">
                            <td class="minha_coluna_mestre">Área</td>
                            <?php
                            $sql=("select * from professor where prof_codigo=".$opcao->registros->PROF_CODIGO);
                            $opcao->resultado0= $opcao->con->banco->Execute($sql);
                            if($opcao->registros0=$opcao->resultado0->FetchNextObject()){
                            ?> 
                                        <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros0->PROF_AREA;?></td>
                            <?php
                                } else {
                            ?>
                                    <td class="minha_coluna_detalhes_dados" width="50px"></td>  
                            <?php
                                }
                            ?>
                        </tr>
                <?php
                } else {
                ?>
                            <td class="minha_coluna_detalhes_dados" width="50px"></td>
                         </tr>
                <?php
                }
                ?>   
                       
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">CPF</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->USU_CPF;?></td>
            </tr> 

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Matrícula SIAPE</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->USU_SIAPE;?></td>
            </tr> 

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Email</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->USU_EMAIL;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Função</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->USU_FUNCAO;?></td>
            </tr> 

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre" width="100px">Total de Requisições</td>
                <?php
                $sql=("select * from requisicao where usu_codigo=".$opcao->registros->USU_CODIGO);
                $opcao->resultado0= $opcao->con->banco->Execute($sql);
                $contador = 0;
                while($opcao->registros0=$opcao->resultado0->FetchNextObject()){
                    $contador++;
                }
                ?> 
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $contador;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nº de Requisições com Status "Aguardando"</td>
                <?php
                $sql=("select * from requisicao where req_status='Aguardando' and usu_codigo=".$opcao->registros->USU_CODIGO);
                $opcao->resultado0= $opcao->con->banco->Execute($sql);
                $contador = 0;
                while($opcao->registros0=$opcao->resultado0->FetchNextObject()){
                    $contador++;
                }
                ?> 
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $contador;?></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nº de Requisições com Status "Autorizado"</td>
                <?php
                $sql=("select * from requisicao where req_status='Autorizado' and usu_codigo=".$opcao->registros->USU_CODIGO);
                $opcao->resultado0= $opcao->con->banco->Execute($sql);
                $contador = 0;
                while($opcao->registros0=$opcao->resultado0->FetchNextObject()){
                    $contador++;
                }
                ?> 
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $contador;?></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nº de Requisições com Status "Rejeitado"</td>
                <?php
                $sql=("select * from requisicao where req_status='Rejeitado' and usu_codigo=".$opcao->registros->USU_CODIGO);
                $opcao->resultado0= $opcao->con->banco->Execute($sql);
                $contador = 0;
                while($opcao->registros0=$opcao->resultado0->FetchNextObject()){
                    $contador++;
                }
                ?> 
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $contador;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nº de Requisições com Status "Impresso"</td>
                <?php
                $sql=("select * from requisicao where req_status='Impresso' and usu_codigo=".$opcao->registros->USU_CODIGO);
                $opcao->resultado0= $opcao->con->banco->Execute($sql);
                $contador = 0;
                while($opcao->registros0=$opcao->resultado0->FetchNextObject()){
                    $contador++;
                }
                ?> 
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $contador;?></td>
            </tr>                   
        </div>          
    </table>
    <br>
    <p class="detalhes_baixo">
        <a href="principal.php?p=usuario&acao=alterar&usu_codigo=<?php echo $opcao->registros->USU_CODIGO;?>"><input type="submit" class="button blue submit" value="Editar Cadastro do Usuário"></a>
        <a href="principal.php?p=usuario&acao=excluir&usu_codigo=<?php echo $opcao->registros->USU_CODIGO;?>"><input type="submit" class="button index1 submit" value="Excluir Usuário" onclick="return confirm('Confirma exclusão do Usuário <?php echo $opcao->registros->USU_NOME;?>?')"></a>
        <a href="principal.php?p=usuario&acao=manter_buscar"><input type="submit" class="button gray submit" value="Buscar outro usuário"></a>
    </p>
    <br><br>   
    </center>
        <?php
        }
       } else {
           ?>
                        <br>
                        <center><font class="fonte_msg_erro"><b>Nenhum usuário encontrado!</b></font>
                        <br><br>
                                <p class="detalhes_baixo">
                                        <a href="principal.php?p=usuario&acao=manter_buscar"><button class="button gray reset">Buscar Novamente</button></a>
                                </p></center>
                        <br>
           <?php
       }
    ?>
</div>
