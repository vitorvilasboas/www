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
             <h1 class="titulo1">Cursos dos campi</h1>
             <form  class="formulario" method="post" action="usuadm.php?pa=cursos_dos_campi_acao&acao=gravar_incluir">                
                   <table class="tabelas">
                        <tr>
                            <th class="th276t">Campus:</th>
                            <td class="td700">
                                <select class="input_700" name="fkcampus_codigo">
                                    <?php echo $opcao->listar_campus(); ?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <th class="th276t">Curso:</th>
                            <td class="td700">
                                <select class="input_700" name="fkcurso_codigo">
                                    <?php echo $opcao->listar_cursos(); ?>
                                </select>
                                
                            </td>
                        </tr>

                   </table>
                   <input class="btn" type="submit" name="salvar" value="Cadastrar"/>
             </form>
    
           <?php
           }
           ?>
     </div>
<?php 
    }
 }
 ?>