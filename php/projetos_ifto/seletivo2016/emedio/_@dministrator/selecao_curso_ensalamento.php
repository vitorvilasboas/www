<?php
session_start();
	if(isset($_GET["n"])){
		$n = $_GET["n"];
	}else{
		$n = "";
	}
	
	if(isset($_GET["s"])){
		$s = $_GET["s"];
	}else{
		$s = "";
	}	

if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
	
	require "cabecalho.php";
?>
      <h2 style="text-align:center; color: #cc0000;">ADMINISTRA&Ccedil;&Atilde;O</h2><br>
        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
        <legend align=center class="text_medio_caps_color">ENSALAMENTO</legend>  
        <?php
            if (isset($_GET["erro"])){
                ?>
                <font color="FF0000">Não foi possível gerar o ensalamento.</br>
                <?php
                switch ($_GET["erro"]){
                    case "1": 
                        echo "Por favor, digite valores para o minimo e máximo de alunos em cada sala.";
                    break;
                    case 2: 
                        echo "Por favor, digite valores para o minimo e máximo de alunos em cada sala.";
                    break;
                    case 3: 
                        echo "O valor maximo de alunos em cada sala deve ser maior ou igual ao valor minimo de alunos em cada sala.";
                    break;
                    case 4: 
                        echo "Por favor, tente outra configuracao diminua o minimo de alunos em cada sala ou aumente o maximo de alunos em cada sala.";
                    break;                
                }
                ?>
                </font>
                <p align="center"><input type=button class="botao" value="Fechar" onClick="javascript:window.close();">
                <?php
            }else{
        ?>              
            <form name="selecao_curso" class="formulario" method="post" action="relatorio_ensalamento.php" target="_blank">
                <input type="hidden" name="origem" value="selecao_curso_ensalamento.php" />
                        <table width="650">
                          <tr>
							<td>Local de Prova: </td>
							<td>
								<?php
									/*$conexao = mysql_pconnect("localhost","root","");
									mysql_select_db("medio_2011_1",$conexao);
									$query = "SELECT cod_cur, nome_cur FROM cursos ORDER BY nome_cur";
									$resultado = mysql_query($query,$conexao);*/
									require "../config/conectaBanco.php";
									$query = "SELECT cod_lpr, cid_lpr, descricao_lpr FROM cidades_provas ORDER BY cid_lpr";
									$resultado = mysql_query($query);
									
								    echo " <select name=\"local_prova\">";
									echo "<option value=\"\" selected>Todos</option>";
									while ($row = mysql_fetch_array($resultado)){
										$descricao_lpr = $row["descricao_lpr"];
                                        $cid_lpr = $row["cid_lpr"];
										$cod_lpr = $row["cod_lpr"];
										echo "<option value=\"$cod_lpr\"> $cid_lpr - $descricao_lpr </option>";
									}
									mysql_close($conexao);
									echo "</select>";
                                 ?>
                            </td>
                          </tr>
                          <tr>
							<td width="150">Curso: </td>
							<td width="400">
								<?php
									require "../config/conectaBanco.php";
									$query = "SELECT cod_cur, nome_cur, turno_cur FROM cursos ORDER BY nome_cur";
									$resultado = mysql_query($query);
									
								    echo " <select name=\"curso\">";
									echo "<option value=\"\" selected>Todos</option>";
									while ($row = mysql_fetch_array($resultado)){
										$nome_cur = $row["nome_cur"];
										$cod_cur = $row["cod_cur"];
                                        $turno_cur = $row["turno_cur"];
										echo "<option value=\"$cod_cur\"> $nome_cur - $turno_cur </option>";
									}
									mysql_close($conexao);
									echo "</select>";
								?>
						    </td>
					      </tr>
                          <tr>
                          	<td>N&uacute;mero M&iacute;nimo de Alunos por Sala: </td> 
                            <td><input type="text" name="minimo_alunos" value="<?php echo $minimo_aluno_sala; ?>"></td>
                          </tr>    
                          <tr>
                          	<td>N&uacute;mero M&aacute;ximo de Alunos por Sala: </td> 
                            <td><input type="text" name="maximo_alunos" value="<?php echo $maximo_aluno_sala; ?>"></td>
                          </tr>                                                  
                          <tr>
                          	<td colspan="2" align="center"><input class="botao" name="gerar" type="submit" value="  Gerar  "></td>
                          </tr>
                       </table>
					</form>
                <?php } ?>
        </fieldset>
		</div>
	</center>        
  </body>
</html>
<?php
}
?>