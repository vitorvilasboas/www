<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='usuario'){                 
 ?>
<div id="pagina">                                                      
            <form class="inscricao" method="post" action="">
               <h1>Minicursos que vou participar!</h1>
                    <?php
                        require 'Connections/conecta.php';
                        $sql=("select usu_codigo,usu_nome, mcso_horario, mcso_titulo, mcso_condutor, mcso_resumo FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO = '".$_SESSION['codigo']."'");
                        
                        $resultado = $con->banco->Execute($sql);
                        while($registro = $resultado->FetchNextObject()){
                    ?>
               <table class="ver_minicursos">  
                    <tr border='1'>
                        <td class="td100">Horário</td><td class="td140"> <?php echo $registro->MCSO_HORARIO;?></td><td class="td100"> Palestrante</td><td class="td470"> <?php echo $registro->MCSO_CONDUTOR;?></td>
                    </tr>
                    <tr>
                        <td class="td100">Titulo</td><td class="td620" colspan="3"> <?php echo $registro->MCSO_TITULO;?></td>
                    </tr>
                    <tr>
                        <td class="td100"> Resumo</td><td class="td620" colspan="3"> <?php echo $registro->MCSO_RESUMO;?></td>
                    </tr>               
              </table>
               <br />
                <?php    
                    }
                  ?>
            </form>
</div>
<?php
        }
    }
?>