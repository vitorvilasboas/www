<?php 
    @session_start();
    include 'Connections/conecta.php';
    if((!$_SESSION['cpf'])&&(!$session['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
           <h1 class="titulo1">Gerar Certificados dos Organizadores</h1>
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
                        <th class="th176t">Ano do evento</th> 
                        <td class="td800">
                            <select class="input_100" name="ano">
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                
                            </select>
                            
                        </td>
                   </tr>
                   <tr>      
                        <th class="th176t">Carga horária</th> 
                        <td class="td800">
                            <select class="input_100" name="carga_horaria">
								<option select value="20">20</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="14">14</option>
                                <option value="16">16</option>
                                <option value="18">18</option>
                                <option value="24">24</option>
                                <option value="30">30</option>
                                <option value="32">32</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="60">60</option>
                                
                            </select>
                            
                        </td>
                   </tr>
               </table>
               
               <input class="btn" type="submit" name="certificar" value="Certificar"/>
            </form>
   
    </div>
<?php

    if(isset($_REQUEST['certificar'])){
        $usu_codigo = $_REQUEST['usu_codigo'];
        $chave = gerar_chave_certificado();
        $ano = $_REQUEST['ano'];
        $cargahoraria = $_REQUEST['carga_horaria'];
        $sqlITP = "insert into itens_organizadores values(null,'$usu_codigo','$ano','$chave','$cargahoraria')";
        if($resultadoITP = $con->banco->Execute($sqlITP)){
            echo alerta("Certificado Emitido");
        }else{
            echo alerta("Certificado Não Emitido");
        }
        
    }
        }
    }
 ?>
