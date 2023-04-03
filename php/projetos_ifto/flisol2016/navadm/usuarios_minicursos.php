<?php 
    @session_start();
    include 'Connections/conecta.php';
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
           <h1 class="titulo1">Associar usuários a Palestras/Oficinas/Minicursos</h1>
           <form  class="formulario"method="post" action="">
               <table>
                   <tr>      
                        <th class="th176t">Pesquisar Usuários</th> 
                        <td class="td800">
                            <select class="input_800" name="usu_codigo">
                            <?php 
                                $sqlUsuarios = "select usu_codigo,usu_nome from usuarios order by usu_nome";
                                $resultadoUsuarios = $con->banco->Execute($sqlUsuarios);
                                while($registrosUsuarios = $resultadoUsuarios->FetchNextObject()){
                                    echo '<option value="'.$registrosUsuarios->USU_CODIGO.'">'.$registrosUsuarios->USU_NOME.' </option>';
                                }
                            
                            ?>    
                            </select>
                        </td>
                   </tr>
                   <tr>      
                        <th class="th176t">Pesquisar Minicursos</th> 
                        <td class="td800">
                            <select class="input_800" name="mcso_codigo">
                            <?php 
                                $sqlMinicursos = "select mcso_codigo,mcso_titulo,mcso_ano from minicursos";
                                $resultadoMinicursos = $con->banco->Execute($sqlMinicursos);
                                while($registrosMinicursos = $resultadoMinicursos->FetchNextObject()){
                                    echo '<option value="'.$registrosMinicursos->MCSO_CODIGO.'">'.$registrosMinicursos->MCSO_TITULO.' - '.$registrosMinicursos->MCSO_ANO.' </option>';
                                }
                                ?>    
                            </select >
                        </td>
                   </tr>
                    <tr>      
                        <th class="th176t">Situação</th> 
                        <td class="td800">
                            <select class="input_300" name="situacao">
                                <option value="Confirmado">Confirmado</option>
                                <option value="Aguardando confirmação">Aguardando confirmação</option>
                             </select>
                            
                        </td>
                   </tr>
               </table>
               
               <input class="btn" type="submit" name="incluir" value="Inserir"/>
            </form>
   
    </div>
<?php

    if(isset($_REQUEST['incluir'])){
        $usu_codigo = $_REQUEST['usu_codigo'];
        $mcso_codigo = $_REQUEST['mcso_codigo'];
        $situacao = $_REQUEST['situacao'];
        $sqlITP = "insert into itens_minicursos values('$usu_codigo','$mcso_codigo','$situacao')";
        if($resultadoITP = $con->banco->Execute($sqlITP)){
            echo alerta("O usuário foi incluido ao minicurso!");
        }else{
            echo alerta("O usuário não foi incluido");
        }
        
    }
        }
    }
 ?>
