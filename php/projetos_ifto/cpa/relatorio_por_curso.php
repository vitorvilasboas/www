<?php 
require_once 'Connections/conecta.php';
require 'caracteres.php';
?>
     
<div id="pagina">
<center><img src="imagens/ifto.png"/></center>


<?php
if($_REQUEST['fktdu_codigo']=='1'){
for($questao=1;$questao>=1 and $questao<=71; $questao++){
    $sql=("select  ques_nome from questoes where ques_CODIGO=".$questao);
    $resultado=$con->banco->Execute($sql);
    if($registro=$resultado->FetchNextObject()){
    ?>
<form action="graficos.php" method="post" TARGET="_blank">
   
        <label> <?php echo $registro->QUES_NOME; ?></label>
         
        <input type="hidden" name="questao" value="<?php echo $registro->QUES_NOME; ?>" />
        <table width="270" border="1" cellspacing="0">
        <?php
    }
        $sql2=("SELECT fkques_codigo, RESP_NOME, Count( fkresp_codigo ) as CONTARESPOSTA FROM itens_quest_respostas
                INNER JOIN respostas ON fkresp_codigo = RESP_CODIGO
                INNER JOIN questoes ON fkques_codigo = QUES_CODIGO
                WHERE fkcurso_codigo ='".$_REQUEST['fkcurso_codigo']."'
                AND fkd_ano = '".$_REQUEST['ano']."' and FKTDU_CODIGO ='".$_REQUEST['fktdu_codigo']."'
                GROUP BY fkques_codigo, FKDIM_CODIGO, QUES_NOME, RESP_NOME
                HAVING fkques_codigo =".$questao);
        $resultado2=$con->banco->Execute($sql2); 
        $total = 0;
        while($registro2=$resultado2->FetchNextObject()){
            
            $table ='

            <input type="hidden" name="'.str_replace($troca, $recebe,$registro2->RESP_NOME).'" value="'.$registro2->CONTARESPOSTA.'" />
    <tr>
        <td class="td70">'.$registro2->CONTARESPOSTA.'</td>
        <td class="td200">'.$registro2->RESP_NOME.'</td>
    </tr>';

      
        $total = $total + $registro2->CONTARESPOSTA;
        echo $table;
        }
        echo $total;
        
      ?>
            
 </table>
        <input class="btn_gerar" type="submit" name="gerar" value="Gerar Grafico" TARGET="_blank"/>
</form>
<?php
}
}else if($_REQUEST['fktdu_codigo']=='2'){
for($questao=72;$questao>=72 and $questao<=153; $questao++){
    $sql=("select  ques_nome from questoes where ques_CODIGO=".$questao);
    $resultado=$con->banco->Execute($sql);
    if($registro=$resultado->FetchNextObject()){
    ?>

   
        <label> <?php echo $registro->QUES_NOME; ?></label>
    

        <table width="270" border="1" cellspacing="0">
        <?php
    }
        $sql2=("SELECT fkques_codigo, RESP_NOME, Count( fkresp_codigo ) as CONTARESPOSTA FROM itens_quest_respostas
                INNER JOIN respostas ON fkresp_codigo = RESP_CODIGO
                INNER JOIN questoes ON fkques_codigo = QUES_CODIGO
                WHERE fkcurso_codigo ='".$_REQUEST['fkcurso_codigo']."'
                AND fkd_ano = '".$_REQUEST['ano']."' and FKTDU_CODIGO ='".$_REQUEST['fktdu_codigo']."'
                GROUP BY fkques_codigo, FKDIM_CODIGO, QUES_NOME, RESP_NOME
                HAVING fkques_codigo =".$questao);
        $resultado2=$con->banco->Execute($sql2); 
        while($registro2=$resultado2->FetchNextObject()){
 ?>
    
    <tr>
        <td class="td70"><?php echo $registro2->CONTARESPOSTA;?></td>
        <td class="td200"><?php echo $registro2->RESP_NOME;?></td>
    </tr>
      <?php
        }    
      ?>
      </table>
<?php
}
}if($_REQUEST['fktdu_codigo']=='3'){
for($questao=154;$questao>=154 and $questao<=208; $questao++){
    $sql=("select  ques_nome from questoes where ques_CODIGO=".$questao);
    $resultado=$con->banco->Execute($sql);
    if($registro=$resultado->FetchNextObject()){
    ?>

   
        <label> <?php echo $registro->QUES_NOME; ?></label>
    

        <table width="270" border="1" cellspacing="0">
        <?php
    }
        $sql2=("SELECT fkques_codigo, RESP_NOME, Count( fkresp_codigo ) as CONTARESPOSTA FROM itens_quest_respostas
                INNER JOIN respostas ON fkresp_codigo = RESP_CODIGO
                INNER JOIN questoes ON fkques_codigo = QUES_CODIGO
                WHERE fkcurso_codigo ='".$_REQUEST['fkcurso_codigo']."'
                AND fkd_ano = '".$_REQUEST['ano']."' and FKTDU_CODIGO ='".$_REQUEST['fktdu_codigo']."'
                GROUP BY fkques_codigo, FKDIM_CODIGO, QUES_NOME, RESP_NOME
                HAVING fkques_codigo =".$questao);
        $resultado2=$con->banco->Execute($sql2); 
        while($registro2=$resultado2->FetchNextObject()){
 ?>
    
    <tr>
        <td class="td70"><?php echo $registro2->CONTARESPOSTA;?></td>
        <td class="td200"><?php echo $registro2->RESP_NOME;?></td>
    </tr>
      <?php
        }    
      ?>
 </table>
    <?php
        }
} else echo "Você não informou um seguimento"
      ?>
</table>
</table>
<center><a href="javascript:history.back();">Voltar</a></center>
    
</div>
