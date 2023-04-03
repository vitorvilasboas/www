    <div id="pagina">
        <h1 class="titulo1">Caixa Geral</h1>
<table class="tabelas">  
                    <tr>
                        <th class="th600t">Participante</th>
                        <th class="th176t">Valor</th>
                    </tr>
<?php
                        
                     require 'Connections/conecta.php';
                     $usuario = $_SESSION['codigo'];
                     $sql=("select usu_nome,part_valor_pago FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO where part_ano = ".date('Y'));
                     $resultado = $con->banco->Execute($sql);
                     
                        while($registro = $resultado->FetchNextObject()){
                    ?>  
                    <tr>
                        <td class="td800"> <?php echo fullUpper($registro->USU_NOME);?></td>
                        <td class="td150"> <?php echo '<span>'.number_format($registro->PART_VALOR_PAGO,2,',','.').'</span>'; ?></td>
                        
                    </tr>
                    <?php
                    }
                    ?>
            </table>
         <p>Total de Participantes credenciados : <?php echo $cont = $resultado->RecordCount(); ?></p>
        <hr />
        
        <?php    
                    
                    $sql=("select sum(part_valor_pago) as soma FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO where part_ano =".date('Y'));
                    $resultado = $con->banco->Execute($sql);           
                        foreach($resultado as $chave => $linha){
                        $valor = $linha['soma'];
                        if($valor==''){
                            $valor='0.00';
                            echo '<h1 class="valor_a_pagar">Valor em Caixa R$:  '.number_format($valor,2,',','.').'</h1>';
                        }else{                
                            echo '<h1 class="valor_a_pagar">Valor em Caixa R$:   '.number_format($valor,2,',','.').'</h1>';
                        }
                    }
                  ?>
    </div>