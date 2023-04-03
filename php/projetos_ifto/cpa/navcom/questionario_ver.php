
<div id="pagina">
  <div class="formulario">
    <h1 class="titulo1">Ver o questionário e as respostas</h1>
          
<?php
$num=0;  $i=1; 
  while($opcao->registros = $opcao->resultado->FetchNextObject()){  
 ?> 
     <div class="questoes">
        <p><?php $num=$i++;?><?php echo $opcao->registros->QUES_NOME; ?> <br />
            <span> 
                (Avaliação para o curso de :                   
                    <?php
                       $curso = $opcao->registros->FKCURSO_CODIGO;
                       $sql_curso = "select curso_nome from cursos where CURSO_CODIGO=".$curso;
                       $resultado=$con->banco->Execute($sql_curso);
                       if($registro=$resultado->FetchNextObject()){
                       echo $registro->CURSO_NOME; 
                       }
                 ?>)
            </span>
        </p>
        <i>Resp.&nbsp;&nbsp;</i><span><?php echo $opcao->registros->RESP_NOME; ?></span>
     </div>
<?php

 }
 
?>
</table>
  </div>
</div>
