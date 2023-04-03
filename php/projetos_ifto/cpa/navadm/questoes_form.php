<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
        <div id="pagina"> 	
        <?php
        if ($_REQUEST['acao']=='incluir'){			
        ?>
             <h1 class="titulo1">Cadastro de questões</h1>
             <form  class="formulario" method="post" action="usuadm.php?pa=questoes_acao&acao=gravar_incluir">                
                   <table class="tabelas">
                        <tr>
                            <th class="th276t">Pergunta:</th><td class="td700"><input class="input_700" type="text" name="ques_nome" /></td>
                        </tr> 
                        <tr>
                            <th class="th276t">Dimensão:</th>
                            <td class="td700">
                                <select class="input_400" name="fkdim_codigo">
                                    <option value="1">Dimensão 01</option>
                                    <option value="2">Dimensão 02</option>
                                    <option value="3">Dimensão 03</option>
                                    <option value="4">Dimensão 04</option>
                                    <option value="5">Dimensão 05</option>
                                    <option value="6">Dimensão 06</option>
                                    <option value="7">Dimensão 07</option>
                                    <option value="8">Dimensão 08</option>
                                    <option value="9">Dimensão 09</option>
                                    <option value="10">Dimensão 10</option>
                                    <option value="11">Dimensão 11</option>
                                </select>
                            </td>
                        </tr
                        <tr>
                            <th class="th276t">Categoria:</th>
                            <td class="td700">
                                <select class="input_400" name="fktdu_codigo">
                                    <option value="1">Estudante</option>
                                    <option value="2">Professor</option>
                                    <option value="3">Tecnico Administrativo</option>                              
                                </select>
                            </td>
                        </tr>
                   </table>
                   <input class="btn" type="submit" name="salvar" value="Cadastrar"/>
             </form>
    
           <?php
           }
           ?>

<?php 
    }
 }
 ?>