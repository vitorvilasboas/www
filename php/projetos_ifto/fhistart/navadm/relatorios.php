<div id="pagina">
    <h1 class="titulo1">Selecione o curso que você deseja imprimir o relátorio!</h1>
    <form class="formulario" action="relatorio_por_curso.php" method="post">
        <table>
            <tr class="tabelas">
                <th class="th200t">Selecionar</th>
                <td class="td800">                  
                      <select class="input_800" name="mcso_codigo">
                            <?php
                            require 'it_cursos_classe.php';
                            $opcao=new it_cursos_classe();
                            echo $opcao->listar_minicursos();
                            ?>              
                      </select>
                </td>
            </tr>
        </table>
        <input class="btn" type="submit" name="gerar" value="Gerar">
    </form>    
</div>

