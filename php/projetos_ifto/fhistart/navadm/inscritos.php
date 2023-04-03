<div id="pagina">
    <h1 class="titulo1">Ver os inscritos por cursos</h1>
    <form class="formulario" action="usuadm.php?pa=it_cursos_acao&acao=ver" method="post">
            <table>
                <tr>
                    <th class="th276t">Selecionar</th>
                    <td class="td700">
                        <select class="input_700"name="mcso_codigo">
                            <?php                
                                echo $opcao->listar_minicursos();
                            ?>                
                        </select>
                    </td>              
                </tr>
            </table>
            <input class="btn" type="submit" name="inscritos" value="Inscritos">    
       <center><a href="javascript:history.back();">Voltar</a></center>
   </form>
</div>
