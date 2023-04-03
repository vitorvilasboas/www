<?php 
    include 'Connections/conecta.php';
    @session_start();
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
    <div id="pagina">
           <h1 class="titulo1">Gerar Certificados de Palestrantes/Oficineiros/Minicursos</h1>
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
                        <th class="th176t">TIPO</th> 
                        <td class="td800">
                            <select class="input_100" name="tipo">
                                <option value="minicurso">minicurso</option>
                                <option value="palestra">palestra</option>
                                <option value="oficina">oficina</option>
                            </select>
                            
                        </td>
                   </tr>
                    <tr>      
                        <th class="th176t">Ano do evento</th> 
                        <td class="td800">
                            <select class="input_100" name="mcso_ano">
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                
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
        $mcso_codigo = $_REQUEST['mcso_codigo'];
        $tipo = $_REQUEST['tipo'];
        $chave = gerar_chave_certificado();
        $ano = $_REQUEST['mcso_ano'];
        $sqlITP = "insert into itens_palestrantes values(null,'$usu_codigo','$mcso_codigo','$chave','$ano','$tipo')";
        if($resultadoITP = $con->banco->Execute($sqlITP)){
            echo alerta("Certificado Emitido");
        }else{
            echo alerta("Certificado Não Emitido");
        }
        
    }
        }
    }
 ?>
