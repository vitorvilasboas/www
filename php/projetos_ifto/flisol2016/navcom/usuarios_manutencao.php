<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>

  <div id="pagina">
        <h1 class="titulo1">Manutenção de Usuários</h1>
         <form class="formulario" action="usucom.php?pc=usuarios_acao&acao=pesquisar" method="post">
                <div class="busca_manutencao">                  
                    <div class="img_pesquisa"> 
                        <img  src="imagens/query.png"/>
                    </div>
                    <div class="div_pesquisa">
                        <input class="input_pesquisa" type="text" name="busca"/>
                    </div>
                    <div class="div_busca">
                        <input  class="input_busca" type="submit" name="pesquisa" value="Pesquisar"/>
                    </div>
                    <div class="novo_registro">
                        <a href="usucom.php?pc=usuarios_acao&acao=alterar&usu_codigo=<?php echo $_SESSION['codigo']?>"><img src="imagens/editar2.png"/>&nbsp;&nbsp;Alterar</a>
                    </div>
                    
                </div>
          </form>
                <?php 
                while($opcao->registros = $opcao->resultado->FetchNextobject())
                {//Inicia o laço de repetição
                ?>
                <table class="tabelas">
                    <tr>
                        <th class="th100t">Nome:</th>
                        <td class="td600" colspan="5"><?php echo $opcao->registros->USU_NOME;?></td>
                       
                    </tr>
                    <tr>
                        <th class="th100t">CPF</th>
                        <td class="td300" colspan="5"><?php echo $opcao->registros->USU_CPF;?></td>
                    </tr>
                    <tr>
                        <th class="th100t">Matrícula</th>
                        <td class="td300" colspan="5"><?php echo $opcao->registros->USU_MATRICULA;?></td>
                    </tr>
                    <tr>
                        <th class="th100t">E-mail</th>
                        <td class="td500"><?php echo $opcao->registros->USU_EMAIL;?></td>
                        <th class="th100t">Cidade</th>
                        <td class="td200"colspan="3"><?php echo $opcao->registros->USU_CIDADE;?></td>
                    </tr>
                    <tr>    
                        
                        <th class="th100t">Endereço</th>
                        <td class="td300"><?php echo $opcao->registros->USU_ENDERECO;?></td>
                        <th class="th100t">UF</th>
                        <td class="td70"><?php echo $opcao->registros->USU_UF;?></td>
                        <th class="th100t">CEP</th>
                        <td class="td150"><?php echo $opcao->registros->USU_CEP;?></td>
                    </tr>
                    <tr>   
                        <th class="th100t">Tel. Celular</th>
                        <td class="td200"><?php echo $opcao->registros->USU_CELULAR;?></td>
                        <th class="th100t">Tel. Fixo</th>
                        <td class="td200"><?php echo $opcao->registros->USU_TELEFONE;?></td>
                        <th class="th100t">Data Nasc.</th>
                        <td class="td200"><?php echo $opcao->registros->USU_DATA_NASC;?></td>
                    </tr>
                    <tr>
                        <th class="th100t">Sexo</th>
                        <td class="td300"><?php echo $opcao->registros->USU_SEXO;?></td>
                        <th class="th100t">Matricula</th>
                        <td class="td150"><?php echo $opcao->registros->USU_MATRICULA;?></td>
                        <th class="th100t">Port. Nec.</th>
                        <td class="td150"><?php echo $opcao->registros->USU_PORTADOR;?></td>
                    </tr>
                    <tr>
                        <td class="tdespaco" colspan="6">_</td>
                    </tr>
                </table>
                <?php
                }//fecha o laço de repetição
                ?>
                
      </div>
<?php 
        }
    }
 ?>
