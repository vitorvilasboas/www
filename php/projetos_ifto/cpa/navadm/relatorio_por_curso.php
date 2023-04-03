<?php 
require_once 'Connections/conecta.php';
require 'caracteres.php';
?>
     
<div id="pagina">


<?php
if($_REQUEST['fkcurso_codigo']=='1'){
    $curso = "Licenciatura em Computação";
}else if($_REQUEST['fkcurso_codigo']=='2'){
    $curso = "Licenciatura em Ciências Biológicas";
}else if($_REQUEST['fkcurso_codigo']=='3'){
    $curso = "Bacharelado em Agronomia";
}
if($_REQUEST['fktdu_codigo']=='1'){
    $seg = "Discente";
}else if($_REQUEST['fktdu_codigo']=='2'){
    $seg = "Docente";
}else if($_REQUEST['fktdu_codigo']=='3'){
$seg  = "Tecnico Administrativo";
}



     echo $titulo = '<h1 class="titulo1">Relatório de respostas do Seguimento <u>'.$seg.'</u> do curso <u>'.$curso.'.</u></h1>';
if($_REQUEST['fktdu_codigo']=='1'){
	 
for($questao=1;$questao>=1 and $questao<=71; $questao++){
    $sql=("select  ques_nome from questoes where ques_CODIGO=".$questao);
    $resultado=$con->banco->Execute($sql);
    if($registro=$resultado->FetchNextObject()){
    ?>
<form action="graficos.php" method="post" TARGET="_blank">
   
        <label> <?php echo $registro->QUES_NOME; ?></label>
         
        <input type="hidden" name="questao" value="<?php echo $registro->QUES_NOME; ?>" />
        
            
        <?php
    }
        $sql2=("SELECT fkques_codigo, RESP_NOME, Count( fkresp_codigo ) as CONTARESPOSTA FROM itens_quest_respostas
                INNER JOIN respostas ON fkresp_codigo = RESP_CODIGO
                INNER JOIN questoes ON fkques_codigo = QUES_CODIGO
                WHERE fkcurso_codigo ='".$_REQUEST['fkcurso_codigo']."'
                AND fk_ano = '".$_REQUEST['ano']."' and  FKTDU_CODIGO ='".$_REQUEST['fktdu_codigo']."'
                GROUP BY fkques_codigo, FKDIM_CODIGO, QUES_NOME, RESP_NOME
                HAVING fkques_codigo =".$questao);
        $resultado2=$con->banco->Execute($sql2); 
        $total = 0;
        while($registro2=$resultado2->FetchNextObject()){
            
            $table ='

            <input type="hidden" name="'.str_replace($troca, $recebe,$registro2->RESP_NOME).'" value="'.$registro2->CONTARESPOSTA.'" />
        <div style ="width: 90px; float: left; margin:10px 2px; text-align:center;">
           <div style ="width: 90px; border:1px solid #000000; background:#006699; color:#ffffff;">'.$registro2->RESP_NOME.'</div>
        
           <div style ="width: 90px; border:1px solid #000000; background:#f4f4f4; color:#000000;">'.$registro2->CONTARESPOSTA.'</div>
        </div>
    ';

      
        $total = $total + $registro2->CONTARESPOSTA;
        echo $table;
        }
         $total;
        
      ?>
        <div style ="width: auto; float: left; margin:10px 2px;">
            <input class="btn_gerar" type="submit" name="gerar" value="Gerar Gráfico" TARGET="_blank"/>
        </div>
</form>
    <div style="clear: both;">
    </div>
<?php
}
}else if($_REQUEST['fktdu_codigo']=='2'){

for($questao=72;$questao>=72 and $questao<=153; $questao++){
    $sql=("select  ques_nome from questoes where ques_CODIGO=".$questao);
    $resultado=$con->banco->Execute($sql);
    if($registro=$resultado->FetchNextObject()){
    ?>
<form action="graficos.php" method="post" TARGET="_blank">
   
        <label> <?php echo $registro->QUES_NOME; ?></label>
         
        <input type="hidden" name="questao" value="<?php echo $registro->QUES_NOME; ?>" />
        
            
        <?php
    }
        $sql2=("SELECT fkques_codigo, RESP_NOME, Count( fkresp_codigo ) as CONTARESPOSTA FROM itens_quest_respostas
                INNER JOIN respostas ON fkresp_codigo = RESP_CODIGO
                INNER JOIN questoes ON fkques_codigo = QUES_CODIGO
                WHERE  fk_ano = '".$_REQUEST['ano']."' and FKTDU_CODIGO ='".$_REQUEST['fktdu_codigo']."'
                GROUP BY fkques_codigo, FKDIM_CODIGO, QUES_NOME, RESP_NOME
                HAVING fkques_codigo =".$questao);
        $resultado2=$con->banco->Execute($sql2); 
        $total = 0;
        while($registro2=$resultado2->FetchNextObject()){
            
            $table ='

            <input type="hidden" name="'.str_replace($troca, $recebe,$registro2->RESP_NOME).'" value="'.$registro2->CONTARESPOSTA.'" />
        <div style ="width: 90px; float: left; margin:10px 2px; text-align:center;">
           <div style ="width: 90px; border:1px solid #000000; background:#006699; color:#ffffff;">'.$registro2->RESP_NOME.'</div>
        
           <div style ="width: 90px; border:1px solid #000000; background:#f4f4f4; color:#000000;">'.$registro2->CONTARESPOSTA.'</div>
        </div>
    ';

      
        $total = $total + $registro2->CONTARESPOSTA;
        echo $table;
        }
         $total;
        
      ?>
        <div style ="width: auto; float: left; margin:10px 2px;">
            <input class="btn_gerar" type="submit" name="gerar" value="Gerar Gráfico" TARGET="_blank"/>
        </div>
</form>
    <div style="clear: both;">
    </div>
<?php
}
}if($_REQUEST['fktdu_codigo']=='3'){

for($questao=154;$questao>=154 and $questao<=208; $questao++){
    $sql=("select  ques_nome from questoes where ques_CODIGO=".$questao);
    $resultado=$con->banco->Execute($sql);
    if($registro=$resultado->FetchNextObject()){
    ?>
<form action="graficos.php" method="post" TARGET="_blank">
   
        <label> <?php echo $registro->QUES_NOME; ?></label>
         
        <input type="hidden" name="questao" value="<?php echo $registro->QUES_NOME; ?>" />
        
            
        <?php
    }
        $sql2=("SELECT fkques_codigo, RESP_NOME, Count( fkresp_codigo ) as CONTARESPOSTA FROM itens_quest_respostas
                INNER JOIN respostas ON fkresp_codigo = RESP_CODIGO
                INNER JOIN questoes ON fkques_codigo = QUES_CODIGO
                WHERE  fk_ano = '".$_REQUEST['ano']."' and FKTDU_CODIGO ='".$_REQUEST['fktdu_codigo']."'
                GROUP BY fkques_codigo, FKDIM_CODIGO, QUES_NOME, RESP_NOME
                HAVING fkques_codigo =".$questao);
        $resultado2=$con->banco->Execute($sql2); 
        $total = 0;
        while($registro2=$resultado2->FetchNextObject()){
            
            $table ='

            <input type="hidden" name="'.str_replace($troca, $recebe,$registro2->RESP_NOME).'" value="'.$registro2->CONTARESPOSTA.'" />
        <div style ="width: 90px; float: left; margin:10px 2px; text-align:center;">
           <div style ="width: 90px; border:1px solid #000000; background:#006699; color:#ffffff;">'.$registro2->RESP_NOME.'</div>
        
           <div style ="width: 90px; border:1px solid #000000; background:#f4f4f4; color:#000000;">'.$registro2->CONTARESPOSTA.'</div>
        </div>
    ';

      
        $total = $total + $registro2->CONTARESPOSTA;
        echo $table;
        }
         $total;
        
      ?>
        <div style ="width: auto; float: left; margin:10px 2px;">
            <input class="btn_gerar" type="submit" name="gerar" value="Gerar Gráfico" TARGET="_blank"/>
        </div>
</form>
    <div style="clear: both;">
    </div>
    <?php
        }
} 
?>

<center><a href="javascript:history.back();">Voltar</a></center>
    
</div>
