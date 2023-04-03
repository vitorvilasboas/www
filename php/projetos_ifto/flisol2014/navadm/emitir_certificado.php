<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        require('index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
   <div id="pagina">
         <h1 class="titulo1">Confirmar Usuários</h1>
         <form  class="formulario"method="post" action="usuadm.php?pa=certificado_por_curso">               
               <table class="tabelas">
                   <tr>
                        <th class="th276t">Pesquisar</th>
                        <td class="td700">
                            <select class="input_700" name="mcso_codigo">
                                <?php
                                $sql = "select * from minicursos  order by MCSO_CODIGO";
			        $resultado = $con->banco->Execute($sql); 	
			        while($registros = $resultado->FetchNextObject())
			            {		  
                                      echo '<option value="'.$registros->MCSO_CODIGO.'">'.$registros->MCSO_TITULO.' - '.$registros->MCSO_ANO.'</option>'; 
			  
			           }
                                ?>
                            </select> 
                       </td> 
                   </tr>
               </table>
             <input class="btn" type="submit" name="confirmar" value="Confirmar"/>
         </form>
   
   </div>
<?php 
  }
}
?>
