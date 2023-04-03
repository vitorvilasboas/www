﻿<div id="pagina">
    <form class="formulario">
        <h1 class="titulo1">Programação do Evento</h1>
        <table class="tabelas">
            <tr>
                <th colspan="4" class="td100">Dias 20 à 21 de outubro de 2016</th>  
            <tr> 
                
            </tr>
                <td class="th176t">Arquivo</td>
                <td class="td300">
                    <ul>
                        
                        <li> <a href="programacao.pdf"> Download da programação do evento.</a> </li>
                        <hr>
                        
                    </ul>
                </td>
                
                
            </tr>
                      
        </table>
                              
                <table size="100%" border="0" cellspacing="1" >
                   <tr>
                      <th style ="font-size: 13px; background:#d2d2d2; padding: 5px; width: 100px;">Data e Horário</th>
                      <th style ="font-size: 13px; background:#d2d2d2;padding: 5px; width: 450px; ">Palestra/Oficina/Minicurso</th>
                      <th style ="font-size: 13px; background:#d2d2d2;padding: 5px; width: 100px; ">Nº de Vagas</th>
                  </tr>
                  <?php
                   require 'Connections/conecta.php';
                   $sql=("select * from minicursos where MCSO_ANO = '2016' order by mcso_horario");
                   $resultado= $con->banco->Execute($sql);
                   while($registros=$resultado->FetchNextObject()){
                   ?>
                  <tr>
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px; text-align: center;"><?php echo $registros->MCSO_HORARIO;?></td>  
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px;"><?php echo $registros->MCSO_TITULO.' / '.$registros->MCSO_CONDUTOR;?></td>
                    <td style ="font-size: 12px; background:#f4f4f4; padding: 3px; text-align: center;"><?php echo $registros->MCSO_VAGAS;?></td>
                  </tr>
              <?php
                   }
              ?>
              </table>
              <br /> 
    </form>
</div>

