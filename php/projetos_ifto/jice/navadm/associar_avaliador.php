<?php 
    include 'Connections/conecta.php';
    @session_start();
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
           <h1 class="titulo1">Associar Avaliador</h1>
           <form  class="formulario"method="post" action="">
               <table>
                   <tr>      
                        <th class="th176t">Pesquisar Usuários</th> 
                        <td class="td800">
                            <select class="input_800" name="aval_usu_codigo">
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
                        <th class="th176t">Pesquisar artigo</th> 
                        <td class="td800">
                            <select class="input_800" name="aval_art_codigo">
                            <?php 
                                $sqlartigos = "select art_codigo,titulo from artigos";
                                $resultadoartigos = $con->banco->Execute($sqlartigos);
                                while($registrosartigos = $resultadoartigos->FetchNextObject()){
                                    echo '<option value="'.$registrosartigos->ART_CODIGO.'">'.$registrosartigos->TITULO.' </option>';
                                }
                                ?>    
                            </select >
                        </td>
                   </tr>
                    <tr>      
                        <th class="th176t">Area</th> 
                        <td class="td800">
                            <select class="input_500" name="aval_area_codigo">
                                <?php 
                                $sqlareas = "select * from modalidades";
                                $resultadoareas = $con->banco->Execute($sqlareas);
                                while($registrosareas = $resultadoareas->FetchNextObject()){
                                    echo '<option value="'.$registrosareas->TPT_CODIGO.'">'.$registrosareas->TPT_DESCRICAO.' </option>';
                                }
                                ?>   
                            </select>
                            
                        </td>
                   </tr>
                    <tr>      
                        <th class="th176t">Categoria</th> 
                        <td class="td800">
                            <select class="input_200" name="aval_categoria">
                                <option value="POSTER">POSTER</option>
                                <option value="ORAL">ORAL</option>
                                
                            </select>
                            
                        </td>
                   </tr>
               </table>
               
               <input class="btn" type="submit" name="associar" value="Associar"/>
            </form>
   
    </div>
<?php

    if(isset($_REQUEST['associar'])){
        $aval_usu_codigo = $_REQUEST['aval_usu_codigo'];
        $aval_art_codigo = $_REQUEST['aval_art_codigo'];
        $aval_categoria = $_REQUEST['aval_categoria'];
        $aval_area = $_REQUEST['aval_area_codigo'];
        $sqlITP = "insert into  avaliacao (aval_area,aval_art_codigo,aval_usu_codigo,aval_categoria) values('$aval_area','$aval_art_codigo','$aval_usu_codigo','$aval_categoria')";
        if($resultadoITP = $con->banco->Execute($sqlITP)){
            echo alerta("Avaliador associado");
        }else{
            echo alerta("Erro ao associar avaliador");
        }
        
    }
        }
    }
 ?>
