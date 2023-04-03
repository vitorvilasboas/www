<div id="pagina">
    <h1 class="titulo1">Materias Para Download</h1>
    <form class="formulario">         
        <table class="tabelas" >
           <?php 
           require 'Connections/conecta.php';
           $sql = ("select * from periodicos order by per_codigo desc;");
	   $resultado = $con->banco->Execute($sql); 
           while($registros = $resultado->FetchNextobject()){
           ?> 
            <tr>
                
                <th class="th176t">Postato dia:</th>
                <td class="td400"><?php echo $registros->PER_DATA;?></td>
                <td class="td400"><a href="uploads/periodicos/<?php echo $registros->PER_DOC;?>"><img src="imagens/pdfico.png"/>&nbsp;&nbsp; Baixar o Arquivo</a></td>
            </tr>        
            <tr>
                <th class="th176t"">Autores:</th>
                <td class="td800" colspan="2"><?php echo $registros->PER_AUTORES;?></td>	
            </tr>
            <tr>
                <th class="th176t">Titulo:</th>
                <td class="td800" colspan="2"><?php echo $registros->PER_TITULO;?></td>	
            </tr>
            <tr>
                <th class="th176t">Resumo:</th>
                <td class="td800" colspan="2"><?php echo $registros->PER_RESUMO;?></td>	
            </tr>
            <tr>
                <td class="tdespaco" colspan="3">_</td>
            </tr>
            <?php
           }
           ?>
        </table> 
    </form>

</div>
