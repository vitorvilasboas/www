<div id="pagina">
    <form class="formulario">
        <h1 class="titulo1">Programação do evento</h1>
        
                <center><h3>Dias 04 de Dezembro de 2015</h3></center>                            
            <table class="tabelas">
            
            <tr>
                <th class="th120t">Período<br /></th><th class="th300t">Dia 04/12</th>
            </tr>
            <tr>
                <td class="th100t">Manhã</td>
                <td class="td300">
                    <ul class="td380">
                        <li> 7:30h Recepção das Caravanas.</li>
                        <li>7:30h às 8:00h - Credenciamento</li>
                        <li>8:00h às 9:00h - Abertura/Apresentação Cultural</li>
                        <li>9:00h às 11:00h -  Palestra de abertura: </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="th100t">Tarde</td>
                <td class="td300">
                    <ul class="td380">
                        <li>14:00h às 18:00h - Mesas redondas concomitantes (discussão 
                            sobre formação de professores, 
                            apresentação dos subprojetos e socialização de experiências).
                        </li>
                        <li>18:00h - Encerramento </li>
                   </ul>

                </td>
            </tr>
        </table>
                <table border="0" cellspacing="1" >
                  <tr>
                      <th style ="width: 220px; font-size: 15px; background:#d2d2d2; padding: 5px;">Data e Horário</th>
                      <th style ="width: 510px;font-size: 15px; background:#d2d2d2;padding: 5px;">Oficinas/Minicursos</th>
                      <th style ="width: 100px; font-size: 15px; background:#d2d2d2;padding: 5px;">Valor R$</th>
                      <th style ="width: 100px; font-size: 15px; background:#d2d2d2;padding: 5px;">Nº de Vagas</th>
                  </tr>
              <?php
                   require 'Connections/conecta.php';
                   $sql=("select * from minicursos where mcso_ano = '2015' order by mcso_horario");
                   $resultado= $con->banco->Execute($sql);
                   while($registros=$resultado->FetchNextObject()){
               ?>
                  <tr>
                    <td style ="font-size: 14px; background:#f4f4f4; padding: 3px; text-align: center;"><?php echo $registros->MCSO_HORARIO;?></td>  
                    <td style ="font-size: 14px; background:#f4f4f4; padding: 3px;"><?php echo $registros->MCSO_TITULO;?></td>
                    <td style ="font-size: 14px; background:#f4f4f4; padding: 3px; text-align: center;"><?php if($registros->MCSO_VALOR=='0.00'){echo '<span> Gratuito </span>';} else {echo '<span>'.$registros->MCSO_VALOR.'</span>';} ?></td>
                    <td style ="font-size: 14px; background:#f4f4f4; padding: 3px; text-align: center;"><?php echo $registros->MCSO_VAGAS;?></td>
                  </tr>
              <?php
                   }
              ?>
              </table>
    </form>
</div>
