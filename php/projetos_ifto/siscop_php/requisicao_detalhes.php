<div id="pagina">
        <?php
        if(($opcao->registros2=$opcao->resultado2->FetchNextObject())){
            if(($opcao->registros2->USU_CODIGO == $_SESSION['on_codigo']) || ($_SESSION['on_permissao']=='Root') || ($_SESSION['on_permissao']=='Avaliador') ||(($_SESSION['on_permissao']=='Reprografia')&&(($opcao->registros2->REQ_STATUS)=='Autorizado'))){
                

        ?>
    <center><font class="fonte_titulos">Detalhes da Requisição</font>
    <center><table class="minha_tabela_detalhes" border="1" cellpadding="1px" cellspacing="0px">
        <div>        
        <?php
        while($opcao->registros=$opcao->resultado->FetchNextObject()){
            $data = date("d/m/Y", strtotime($opcao->registros->REQ_DATA));//Convertendo data para o padrão br
            $hora = date("H:i:s", strtotime($opcao->registros->REQ_DATA));//Convertendo data para o padrão br
            $datar = date("d/m/Y", strtotime($opcao->registros->REQ_DTENTREGA));//Convertendo data para o padrão br
            ?>            
            <input type="hidden" name="req_codigo" value="<?php echo $opcao->registros->REQ_CODIGO;?>"/>
            <tr class="minha_linha_titulo" cellpadding="5px" height="30px">
                <td colspan="2">Requisição de Código <?php echo $opcao->registros->REQ_CODIGO;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Requerente</td>
                <?php
                $sql=("select * from usuario where usu_codigo=".$opcao->registros->USU_CODIGO);
                $opcao->resultado2= $opcao->con->banco->Execute($sql);
                if($opcao->registros2=$opcao->resultado2->FetchNextObject()){
                ?> 
                            <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros2->USU_NOME;?></td>
                <?php
                    } else {
                ?>
                        <td class="minha_coluna_detalhes_dados" width="50px"></td>  
                <?php
                    }
                ?>   
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Departamento do Requerente</td>
                <?php
                            $sql1=("select * from departamento where dep_codigo=".$opcao->registros2->DEP_CODIGO);
                            $opcao->resultado4= $opcao->con->banco->Execute($sql1);
                            if($opcao->registros4=$opcao->resultado4->FetchNextObject()){
                ?>
                            <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros4->DEP_NOME;?></td>
                <?php
                    } else {
                ?>
                        <td class="minha_coluna_detalhes_dados" width="50px"></td>  
                <?php
                    }
                ?>   
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Data da Requisição</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $data;?></td>
            </tr> 

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Horário da Requisição</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $hora;?></td>
            </tr> 

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Data da Retirada</td>
                <td class="minha_coluna_detalhes_dados"><?php echo $datar;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Justificativa</td>
                <td class="minha_coluna_detalhes_dados"><?php echo $opcao->registros->REQ_JUST;?></td>
            </tr> 

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Arquivo</td>
                <td class="minha_coluna_detalhes_dados"><a href="arquivos/<?php echo $opcao->registros->REQ_END;?>" target="_blank"><?php echo $opcao->registros->REQ_END;?></a></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nº de Páginas do Arquivo</td>
                <td class="minha_coluna_detalhes_dados"><?php echo $opcao->registros->REQ_MNPAGS;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nº de Cópias</td>
                <td class="minha_coluna_detalhes_dados"><?php echo $opcao->registros->REQ_MNCOPS;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Total de Folhas</td>
                <td class="minha_coluna_detalhes_dados"><?php echo $opcao->registros->REQ_TCOPIAS;?></td>
            </tr>

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Status</td>
                <td class="minha_coluna_detalhes_dados"><?php echo $opcao->registros->REQ_STATUS;?></td>
            </tr>
                
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Avaliado Por</td>
                <?php
                if(isset($opcao->registros->REQ_AUT)){//pegar nome do autorizador... se ele existe na tabela requisicao faça...
                        $sql=("select * from usuario where usu_codigo=".$opcao->registros->REQ_AUT);
                        $opcao->resultado3= $opcao->con->banco->Execute($sql);
                        if($opcao->registros3=$opcao->resultado3->FetchNextObject()){
                ?> 
                            <td class="minha_coluna_detalhes_dados"><?php echo $opcao->registros3->USU_NOME;?></td>
                            
                <?php
                        }
                    } else {
                ?>
                        <td class="minha_coluna_detalhes_dados"></td>  
                <?php
                    }
                ?>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Mensagem ao Operador</td>
                <td class="minha_coluna_detalhes_dados"><?php echo $opcao->registros->REQ_MSG;?></td>
            </tr>           
        <?php
            
        ?>
        </div>
            
    </table>
    <br>
    
<!-- MOSTRANDO BOTÕES PARA O REQUERENTE -->
    <?php
        if($_SESSION['on_permissao']=='Requerente'){
                if($opcao->registros->REQ_STATUS=='Aguardando'){
    ?>
                    <p class="detalhes_baixo">
                        <a href="principal.php?p=requisicao&acao=alterar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Alterar Requisição"></a>
                        <a href="principal.php?p=requisicao&acao=cancelar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button index1 submit" value="Cancelar Requisição" onclick="return confirm('Confirma o cancelamento da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                        <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                    </p><br><br>  
    <?php
                }  else   {
    ?>
                    <p class="detalhes_baixo">
                        <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                    </p><br><br>
    <?php
            }
        }
    ?>
                    
<!-- MOSTRANDO BOTÕES PARA O REPROGRAFIA -->
    <?php
        if($_SESSION['on_permissao']=='Reprografia'){ 
            if($opcao->registros->REQ_STATUS=='Autorizado'){
    ?>
            <p class="detalhes_baixo">
                <a href="principal.php?p=requisicao&acao=imprimir&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Alterar Status para IMPRESSO" onclick="return confirm('Confirma a alteração do Status da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                <a href="principal.php?p=requisicao&acao=listar_pendentes&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Requisições Pendentes"></a>
            </p><br><br>
    <?php
            }
        }
    ?>
            
<!-- MOSTRANDO BOTÕES PARA O AVALIADOR -->
    <?php
        if($_SESSION['on_permissao']=='Avaliador'){ 
            if($opcao->registros->USU_CODIGO==$_SESSION['on_codigo']){
                if($opcao->registros->REQ_STATUS=='Aguardando'){
                    ?>
                        <p class="detalhes_baixo">
                            <a href="principal.php?p=requisicao&acao=autorizar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Autorizar Requisição" onclick="return confirm('Confirma a AUTORIZAÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <a href="principal.php?p=requisicao&acao=rejeitar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button index1 submit" value="Rejeitar Requisição" onclick="return confirm('Confirma a REJEIÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <br><br>
                            <a href="principal.php?p=requisicao&acao=alterar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Alterar Requisição"></a>
                            <a href="principal.php?p=requisicao&acao=cancelar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button index1 submit" value="Cancelar Requisição" onclick="return confirm('Confirma o cancelamento da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                        </p><br><br>
                    <?php
                } else if ($opcao->registros->REQ_STATUS=='Rejeitado'){
                    ?>
                        <p class="detalhes_baixo">
                            <a href="principal.php?p=requisicao&acao=autorizar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Autorizar Requisição" onclick="return confirm('Confirma a AUTORIZAÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                        </p><br><br>
                    <?php    
                } else if ($opcao->registros->REQ_STATUS=='Impresso'){
                    ?>
                        <p class="detalhes_baixo">
                            <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                        </p><br><br>
                    <?php 
                } else {
                    ?>
                        <p class="detalhes_baixo">
                            <a href="principal.php?p=requisicao&acao=rejeitar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Rejeitar Requisição" onclick="return confirm('Confirma a REJEIÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                        </p><br><br>
                    <?php
                }
            } else {
               if($opcao->registros->REQ_STATUS=='Aguardando'){
                    ?>
                        <p class="detalhes_baixo">
                            <a href="principal.php?p=requisicao&acao=autorizar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Autorizar Requisição" onclick="return confirm('Confirma a AUTORIZAÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <a href="principal.php?p=requisicao&acao=rejeitar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button index1 submit" value="Rejeitar Requisição" onclick="return confirm('Confirma a REJEIÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <a href="principal.php?p=requisicao&acao=listar_pendentes&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Requisições Pendentes"></a>
                        </p><br><br>
                    <?php
                } else if ($opcao->registros->REQ_STATUS=='Rejeitado'){
                    ?>
                        <p class="detalhes_baixo">
                            <a href="principal.php?p=requisicao&acao=autorizar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Autorizar Requisição" onclick="return confirm('Confirma a AUTORIZAÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                            <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                        </p><br><br>
                    <?php    
                } else if ($opcao->registros->REQ_STATUS=='Impresso'){
                    ?>
                        <p class="detalhes_baixo">
                            <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                        </p><br><br>
                    <?php 
                } else {
                    ?>
                        <p class="detalhes_baixo">
                            <!--<a href="principal.php?p=requisicao&acao=rejeitar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Rejeitar Requisição" onclick="return confirm('Confirma a REJEIÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>-->
                            <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                        </p><br><br>
                    <?php
                }
            }
        }
    ?>

<!-- MOSTRANDO BOTÕES PARA O ROOT -->
    <?php
        if($_SESSION['on_permissao']=='Root'){ 
            if($opcao->registros->REQ_STATUS=='Aguardando'){
                ?>
                    <p class="detalhes_baixo">
                        <a href="principal.php?p=requisicao&acao=imprimir&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Alterar Status para IMPRESSO" onclick="return confirm('Confirma a alteração do Status da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                        <a href="principal.php?p=requisicao&acao=autorizar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Autorizar Requisição" onclick="return confirm('Confirma a AUTORIZAÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                        <a href="principal.php?p=requisicao&acao=rejeitar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button index1 submit" value="Rejeitar Requisição" onclick="return confirm('Confirma a REJEIÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                        <br><br>
                        <a href="principal.php?p=requisicao&acao=alterar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Alterar Requisição"></a>
                        <a href="principal.php?p=requisicao&acao=cancelar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button index1 submit" value="Cancelar Requisição" onclick="return confirm('Confirma o cancelamento da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                        <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                    </p><br><br>
                <?php
            } else if ($opcao->registros->REQ_STATUS=='Rejeitado'){
                ?>
                    <p class="detalhes_baixo">
                        <a href="principal.php?p=requisicao&acao=autorizar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Autorizar Requisição" onclick="return confirm('Confirma a AUTORIZAÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>
                        <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                    </p><br><br>
                <?php    
            } else if ($opcao->registros->REQ_STATUS=='Impresso'){
                ?>
                    <p class="detalhes_baixo">
                        <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                    </p><br><br>
                <?php 
            } else {
                ?>
                    <p class="detalhes_baixo">
                        <!--<a href="principal.php?p=requisicao&acao=rejeitar&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button blue submit" value="Rejeitar Requisição" onclick="return confirm('Confirma a REJEIÇÃO da requisição <?php echo $opcao->registros->REQ_CODIGO;?>?')"></a>-->
                        <a href="principal.php?p=requisicao&acao=listar_por_usuario&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>"><input type="submit" class="button gray submit" value="Voltar para Minhas Requisições"></a>
                    </p><br><br>
                <?php
            }
        }
    ?>
<?php
    }
?>
    </center>
        <?php
        }
            else {
                ?>
    <br><br>
                <center><font class="fonte_titulos"><b>Acesso Negado!</b></font></center>
                <?php
                        }
        } else {
                ?>
    <br><br>
                <center><font class="fonte_titulos"><b>Nenhuma Requisição Encontrada!</b></font></center>
                <?php
                        }
        ?>
</div>
