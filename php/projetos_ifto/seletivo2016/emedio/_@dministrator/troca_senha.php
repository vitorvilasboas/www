<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
	require "../config/confGlobais.php";
	require "cabecalho.php";
?>

	<form name="editarInscricao" method="post" action="troca_senha_resp.php">
	                                        
	      <h2 style="text-align:center; color: #cc0000;">ADMINISTRA&Ccedil;&Atilde;O</h2><br>
	        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
	        	<legend class="text_medio_caps_color">Troca Senha do Usu&aacute;rio</legend>
	            <table width="600" border="0" cellspacing="0" cellpadding="0">
				<?php
					if ($_GET["erro"] == 1){
						echo "<tr><td colspan=2><font color=#ff0000>Erro: a senha fornecida n&atilde;o confere com a senha atual.<br><br></td></tr>";
					}
					if ($_GET["erro"] == 2){
						echo "<tr><td colspan=2><font color=#ff0000>Erro: a nova senha n&atilde;o confere com a confirma&ccedil;&atilde;o de nova senha.<br><br></td></tr>";
					}
					if ($_GET["erro"] == -1){
						echo "<tr><td colspan=2><font color=#0000ff>A senha foi alterada com sucesso.<br><br></td></tr>";
					}
				?>
				<tr><td width=30%>Senha Atual:</td> <td><input type="password" name="senha_atual"> </td></tr>
				<tr><td width=30%>Nova Senha:</td> <td><input type="password" name="senha_nova"> </td></tr>			
				<tr><td width=30%>Confirma&ccedil;&atilde;o de Nova Senha:</td> <td><input type="password" name="senha_nova_confirmacao"> </td></tr>	
	        </fieldset>
	  <tr>
	      <td colspan=2 class="text_align_center" height="40"><input class="botao" type="submit" name="submit" value="  Enviar  "></td>
	  </tr>
	<table>
	</form>
	</center>    
	</body>
	</html>
<?php
}
?>
