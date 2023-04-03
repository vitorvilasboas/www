<?php 
require_once 'Connections/conecta.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>.::Relatório::.</title>
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen">
    </head>
    <body style="background:#FFFFFF;">
       
<div id="pagina">
<center><img src="imagens/topo_relatorio.png"/></center>

<table width="798" border="1" cellspacing="0">
<tr><td colspan="3"><label> Relatório de Caixa</label></td></tr>



    <tr>
        <td class="th100t">Código</td><td class="th600t">Nome</td><td class="th200t">Valor R$</td>
           <?php
              $sql=("select usu_codigo,usu_nome,part_valor_pago FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO where part_ano = '".date('Y')."' order by usu_nome");
              $resultado = $con->banco->Execute($sql);
              while($registro = $resultado->FetchNextObject()){
            ?>  
            <tr>
                <td class="td100"> <?php echo $registro->USU_CODIGO;?></td>
                <td class="td500"> <?php echo strtoupper($registro->USU_NOME);?></td>
                <td class="td100"> <?php echo '<span>'.number_format($registro->PART_VALOR_PAGO,2,',','.').'</span>'; ?></td>

            </tr>
            <?php
            }
            ?>
            <tr>
                <td class="td800" colspan="3">
                    <?php

                    $sql=("select sum(part_valor_pago) as soma FROM caixa INNER JOIN usuarios ON PART_USU_CODIGO = USU_CODIGO where part_ano = '".date('Y')."'");
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
                </td>
            </tr>
            
</table>

<center><a href="javascript:history.back();">Voltar</a></center>
    
</div>
</body>
</html>