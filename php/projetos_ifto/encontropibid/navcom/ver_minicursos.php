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
                        //require 'Connections/conecta.php';
                        
                        while($opcao->registros = $opcao->resultado->FetchNextobject()){
                    ?>
               <table class="tabelas">  
                    <tr border='1'>
                        <th class="th120t"> Professor</th>
                        <td class="td500"> <?php echo $opcao->registros->MCSO_CONDUTOR;?></td>
                        <th class="th130t">Horário</th>
                        <td class="td150"> <?php echo $opcao->registros->MCSO_HORARIO;?></td>
                        <td class="tdlink"><a href="javascript:if(confirm('Deseja excuir esse registro?'))
                         {location='usucom.php?pc=it_cursos_acao&acao=excluir&iu_codigo=<?php echo $_SESSION['codigo'];?>&mcso_codigo=<?php echo $opcao->registros->MCSO_CODIGO;?>'}"><img src="imagens/excluir2.png"/>&nbsp;&nbsp;Excluir</a></td>
        
                    </tr>
                    <tr>
                        <th class="th130t">Título</th>
                        <td class="td800" colspan="2"> <?php echo $opcao->registros->MCSO_TITULO;?></td>
                        <th class="th100t">Valor</th>
                        <td class="td150"> <?php if($opcao->registros->MCSO_VALOR=='0.00'){echo '<span> Gratuito </span>';} else {echo '<span>'.$opcao->registros->MCSO_VALOR.'</span>';} ?></td>
                        
                    </tr>
                    <tr>
                        <th class="th130t"> Resumo</th><td class="td800" colspan="4"> <?php echo $opcao->registros->MCSO_RESUMO;?></td>
                    </tr> 
                    <tr>
                        <td class="tdespaco" colspan="5">_</td>
                    </tr>
              </table>
                <?php    
                    }
                    $sql=("select sum(mcso_valor) as soma FROM itens_minicursos INNER JOIN usuarios ON IC_USU_CODIGO = USU_CODIGO INNER JOIN minicursos ON IC_MCSO_CODIGO = MCSO_CODIGO WHERE USU_CODIGO = '".$_SESSION['codigo']."'");
                    $resultado = $con->banco->Execute($sql);           
                    foreach($resultado as $chave => $linha){
                        $valor = $linha['soma'];
                        if($valor==''){
                            echo '<h1 class="valor_a_pagar">Total a Pagar R$:  0.00</h1>';
                        }else{                
                            echo '<h1 class="valor_a_pagar">Total a Pagar R$:   '.$valor.'</h1>';
                        }
                    }
                    
                  ?>
            </form>
</div>
<?php 
        }
    }
 ?>