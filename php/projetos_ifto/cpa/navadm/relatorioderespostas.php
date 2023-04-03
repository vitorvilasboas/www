<?php 
    @session_start();     
    if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){
        header('Location:index.php');
    }else{ 
        if($_SESSION['nivel']=='admin'){                 
 ?>
        <?php 
if(isset($_REQUEST['op'])){
	if($_REQUEST['op']=='iniciar'){
	

?>
			<div id="pagina"> 	

				<h1 class="titulo1">Relatório de respostas por curso</h1>
				<form  class="formulario" method="post" action="usuadm.php?pa=relatorioderespostas&op=proximo">                
                   <table class="tabelas">
                        <tr>
                            <th class="th276t">Seguimento:</th>
                            <td class="td700">
                                <select class="input_700" name="fktdu_codigo">
                                    <option value="1">Discentes</option>
                                    <option value="2">Docentes</option>
                                    <option value="3">Tecnicos Administrativos</option>
                                </select>
                                
                            </td>
                        </tr>  
                        					

                   </table>
                   <input class="btn" type="submit" name="proximo" value="Proximo"/>
				</form>
    

			</div>
	 
	 
		<?php
	}

	else if($_REQUEST['op']='proximo'){
	?>

	 <div id="pagina"> 	

             <h1 class="titulo1">Relatório de respostas por curso</h1>
             <form  class="formulario" method="post" action="usuadm.php?pa=relatorio_por_curso">                
                   <table class="tabelas">
                        <tr>
                            <th class="th276t">Seguimento:</th>
                            <td class="td700">
                                <?php
								
								$seguimento = $_REQUEST['fktdu_codigo'];
								if($seguimento=='1'){
									
									echo '<input type="hidden" name="fktdu_codigo" value="'.$seguimento.'" />'.'Discentes';
								}
								else if($seguimento=='2'){
									
									echo '<input type="hidden" name="fktdu_codigo" value="'.$seguimento.'" />'.'Docentes';
								}
								if($seguimento=='3'){
									
									echo '<input type="hidden" name="fktdu_codigo" value="'.$seguimento.'" />'.'Técnico Administrativo';
								}
								?>
                                
                            </td>
                        </tr> 						
						<?php
								
								
								if($seguimento=='1'){
									
									echo '<tr><th class="th276t">Curso:</th>
                                             <td class="td700">
                                                  <select class="input_700" name="fkcurso_codigo">
                                                     <option value="1">Licenciatura em Computação</option>
                                                     <option value="2">Licenciatura em Ciências Biologicas</option>
                                                     <option value="3">Bacharelado em Agronomia</option>
                                                  </select>
                                
                                        </td></tr>';
								}
								else if($seguimento=='2' or $seguimento=='3'){
									
									echo '';
								}
						?>
						<tr>
                            <th class="th276t">Ano:</th>
                            <td class="td700">
                                <select class="input_700" name="ano">
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                </select>
                                
                            </td>
                        </tr>						

                   </table>
                   <input class="btn" type="submit" name="gerar" value="Gerar"/>
             </form>
   
     </div>

     <?php	
	  }		 
        }
	?>
          
<?php 
    }
 }
 ?>