<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
        <div id="pagina"> 	

             <h1 class="titulo1">Selecione o curso que você pretente responder o questionário</h1>
             <form  class="formulario" method="post" action="usuadm.php?pa=questionario_acao&acao=iniciar">                
                   <table class="tabelas">
                        <tr>
                            <th class="th276t">Curso:</th>
                            <td class="td700">
                                <select class="input_700" name="fkcurso_codigo">
                                    <?php
                                         $sql_curso = "select curso_codigo,curso_nome from usuarios_dos_cursos inner join 
                                         cursos on uc_curso_codigo=curso_codigo inner join usuarios on uc_usu_codigo=usu_codigo where usu_codigo=".$_SESSION['codigo'];
                                         $resultado=$con->banco->Execute($sql_curso);
                                         while($registro=$resultado->FetchNextobject()){
                                          
                                         ?>
                                         <option value="<?php echo $registro->CURSO_CODIGO;?>"><?php echo $registro->CURSO_NOME;?></option>
                                         <?php
                                         }
                                         ?>
                                </select>
                                
                            </td>
                        </tr>

                   </table>
                   <input class="btn" type="submit" name="salvar" value="Continuar"/>
             </form>

     </div>
<?php 
    }
 }
 ?>
