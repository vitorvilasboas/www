<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>

    <div id="pagina">
        <h1 class="titulo1">Home</h1>
        <?php
        $sql_curso = "select curso_codigo,curso_nome from usuarios_dos_cursos inner join 
                      cursos on uc_curso_codigo=curso_codigo inner join usuarios on uc_usu_codigo=usu_codigo where usu_codigo=".$_SESSION['codigo'];
        $resultado=$con->banco->Execute($sql_curso);
        if($registro=$resultado->FetchNextobject()){
             $_SESSION['curso']=$registro->CURSO_CODIGO;
        ?>
        
        <?php
        }
        ?>
        
    </div>

<?php
        }
    }
 ?>