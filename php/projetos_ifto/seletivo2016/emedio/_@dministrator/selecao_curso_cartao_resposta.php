<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {

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
require "cabecalho.php";
?>
      <h2 style="text-align:center; color: #cc0000;">ADMINISTRA&Ccedil;&Atilde;O</h2><br>
        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
        <legend align=center class="text_medio_caps_color">CART&Atilde;O RESPOSTA</legend>            
            <form name="selecao_curso" class="formulario" method="post" action="relatorio_cartao_resposta.php" target="_blank">
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
							<td>Curso: </td>     
                            <td>
                                <?php                                                                                                               
                                	$query = "SELECT cod_cur, nome_cur, turno_cur FROM cursos ORDER BY nome_cur";
									$resultado = mysql_query($query);
									
								    echo " <select name=\"curso\">";
									//echo "<option value=\"\" selected>Todos</option>";
									while ($row = mysql_fetch_array($resultado)){
										$nome_cur = $row["nome_cur"];
										$cod_cur = $row["cod_cur"];
                                        $turno_cur = $row["turno_cur"];
										echo "<option value=\"$cod_cur\"> $nome_cur - $turno_cur </option>";
									}
									mysql_close($conexao);
									echo "</select> <br>";
								?>
						    </td>
					      </tr>
						   <tr><td colspan="2" align="center"><br>
                               <input class="botao" name="gerar" type="submit" value="  Gerar  "></td>                                                          
							</tr>
                         </table>
					</form>
        </fieldset>
					
    		 </div>
</center>        
</body>
</html>
<?php
}
?>