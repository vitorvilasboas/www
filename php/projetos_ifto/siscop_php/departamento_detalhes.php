<div id="pagina">
    <?php
    if($opcao->registros=$opcao->resultado2->FetchNextObject()){      
    ?>
    
    <center><font class="fonte_titulos">Manter Departamento - Detalhes</font>
    <center><table class="minha_tabela_detalhes" border="1" cellpadding="1px" cellspacing="0px">
        <div>        
        <?php
        while($opcao->registros=$opcao->resultado->FetchNextObject()){
            ?>            
            <input type="hidden" name="dep_codigo" value="<?php echo $opcao->registros->DEP_CODIGO;?>"/>
            <tr class="minha_linha_titulo" cellpadding="5px" height="30px">
                <td colspan="2"></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Nome</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->DEP_NOME;?></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Código</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->DEP_CODIGO;?></td>
            </tr>
            
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Descrição</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->DEP_DESCRICAO;?></td>
            </tr>   
                       
            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre">Instituição</td>
                <td class="minha_coluna_detalhes_dados" width="50px"><?php echo $opcao->registros->DEP_INSTITUICAO;?></td>
            </tr> 

            <tr class="minha_linha_detalhes" height="30px">
                <td class="minha_coluna_mestre" width="100px">Total de Usuários Vinculados</td>
                <?php
                $sql=("select * from usuario where dep_codigo=".$opcao->registros->DEP_CODIGO);
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
        <a href="principal.php?p=departamento&acao=alterar&dep_codigo=<?php echo $opcao->registros->DEP_CODIGO;?>"><input type="submit" class="button blue submit" value="Editar Cadastro do Departamento"></a>
        <a href="principal.php?p=departamento&acao=excluir&dep_codigo=<?php echo $opcao->registros->DEP_CODIGO;?>"><input type="submit" class="button index1 submit" value="Excluir Departamento" onclick="return confirm('Confirma exclusão do Departamento <?php echo $opcao->registros->DEP_NOME;?>?')"></a>
        <a href="principal.php?p=departamento&acao=manter_buscar"><input type="submit" class="button gray submit" value="Buscar outro departamento"></a>
    </p>
    <br><br>   
    </center>
        <?php
        }
       } else {
           ?>
                        <br>
                        <center><font class="fonte_msg_erro"><b>Nenhum departamento encontrado!</b></font>
                        <br><br>
                                <p class="detalhes_baixo">
                                        <a href="principal.php?p=departamento&acao=manter_buscar"><button class="button gray reset">Buscar Novamente</button></a>
                                </p></center>
                        <br>
           <?php
       }
    ?>
</div>
