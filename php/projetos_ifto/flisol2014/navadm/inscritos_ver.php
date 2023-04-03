<div id="pagina">
    <h1 class="titulo1">Inscritos</h1>
    <form class="formulario" action="" method="post">
        <?php                   
             echo $opcao->filtrar_minicursos();                
        ?>
        <table class="tabelas">
            <tr>
                <th class="th100t">Codigo</th><th class="th600t">Nome</th><th class="th176t">Situação</th><th class="th276t">Confirmação</th>
            </tr>
                <?php
                $minicurso=$_REQUEST['mcso_codigo'];
                echo $opcao->lista_participantes(); 
                while($opcao->registros=$opcao->resultado->FetchNextObject()){
                ?>
            <tr>
                <td class="td100"><?php echo $opcao->registros->USU_CODIGO;?></td>
                <td class="td600"><?php echo fullUpper($opcao->registros->USU_NOME);?></td>
				<td class="td150"><?php echo '<span>'.$opcao->registros->IC_SITUACAO.'</span>';?></td>
                <td class="tdlink"><a><img src="imagens/deletar.png">&nbsp;&nbsp;<a href="javascript:if(confirm('Deseja excuir esse registro?')) {location='usuadm.php?pa=it_cursos_acao&acao=excluir&iu_codigo=<?php echo $opcao->registros->USU_CODIGO;?>&mcso_codigo=<?php echo $minicurso;?>'}">Excluir</a></td>
            </tr>
            <?php
            } 
            ?>
       </table>
   </form>
</div>
