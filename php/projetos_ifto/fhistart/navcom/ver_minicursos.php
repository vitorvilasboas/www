<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>
<div id="pagina"> 
            <h1 class="titulo1">Meus cursos!</h1>
            <form class="formulario" method="post" action="">              
                    <?php
                        require 'Connections/conecta.php';
                        $sql=("select usu_codigo,usu_nome, mcso_horario, mcso_titulo, mcso_condutor, mcso_resumo FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO = '".$_SESSION['codigo']."'");
                        $resultado = $con->banco->Execute($sql);
                        while($registro = $resultado->FetchNextObject()){
                    ?>
               <table class="tabelas">  
                    <tr border='1'>
                        <th class="th130t">Horario</th><td class="td150"> <?php echo $registro->MCSO_HORARIO;?></td><th class="th120t"> Professor</th><td class="td500"> <?php echo $registro->MCSO_CONDUTOR;?></td>
                    </tr>
                    <tr>
                        <th class="th130t">Titulo</th><td class="td800" colspan="3"> <?php echo $registro->MCSO_TITULO;?></td>
                    </tr>
                    <tr>
                        <th class="th130t"> Resumo</th><td class="td800" colspan="3"> <?php echo $registro->MCSO_RESUMO;?></td>
                    </tr> 
                    <tr>
                        <td class="tdespaco" colspan="4">_</td>
                    </tr>
              </table>
                <?php    
                    }
                  ?>
            </form>
</div>
<?php 
        }
    }
 ?>