﻿<?php 
    include 'Connections/conecta.php';
    @session_start();
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
           <h1 class="titulo1">Notas</h1>
           <form  class="formulario"method="post" action="">
               <table>
                   <tr>      
                        <th class="th176t">Pesquisar avaliador</th> 
                        <td class="td800">
                            <select class="input_800" name="not_usu_codigo">
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
                            <select class="input_800" name="not_art_codigo">
                            <?php 
                                $sqlartigos = "select art_codigo,titulo,id_submissao from artigos order by titulo asc";
                                $resultadoartigos = $con->banco->Execute($sqlartigos);
                                while($registrosartigos = $resultadoartigos->FetchNextObject()){
                                    echo '<option value="'.$registrosartigos->ART_CODIGO.'">'.$registrosartigos->TITULO.' - '.$registrosartigos->ID_SUBMISSAO.' </option>';
                                }
                                ?>    
                            </select >
                        </td>
                   </tr>
				   <tr>      
                        <th class="th176t">Tipo trabalho</th> 
                        <td class="td800">
                            <select class="input_400" name="not_tipo_trabalho">
									<option value = "POSTER">POSTER</option>
									<option value = "ORAL">ORAL</option>
                            </select >
                        </td>
                   </tr>
                    <tr>      
                        <th class="th176t">Nota</th> 
                        <td class="td800">
                            <input class="input_200" type="text" name="not_nota" />
                            
                        </td>
                   </tr>
                    
               </table>
               
               <input class="btn" type="submit" name="associar" value="Lançar nota"/>
            </form>
   
    </div>
<?php

    if(isset($_REQUEST['associar'])){
        $not_usu_codigo = $_REQUEST['not_usu_codigo'];
        $not_art_codigo = $_REQUEST['not_art_codigo'];
		$tipo = $_REQUEST['not_tipo_trabalho'];
        $not_nota = $_REQUEST['not_nota'];
        $sqlITP = "insert into  notas (not_art_codigo,not_usu_codigo,not_tipo_trabalho,not_nota) values('$not_art_codigo','$not_usu_codigo','$tipo','$not_nota')";
        if($resultadoITP = $con->banco->Execute($sqlITP)){
            echo alerta("A nota foi lançada");
        }else{
            echo alerta("Erro ao lançar a nota");
        }
        
    }
        }
    }
 ?>
