<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
require "../config/confGlobais.php";
?>
<html>
<head>
	<title>Seletivo <?php echo $periodo_letivo; ?> Araguatins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="shortcut icon" href="../../_img/favicon.ico" type="image/x-icon">
	<SCRIPT language=JavaScript src="../../_jscripts/jquery.js" type=text/javascript></SCRIPT>
	<SCRIPT language=JavaScript src="../../_jscripts/scriptsFormularios.js" type=text/javascript></SCRIPT>
	<SCRIPT language=JavaScript src="../../_jscripts/efetuarInscricao.js" type=text/javascript></SCRIPT>
</head>
<body style="background-image: url('../img/dot.gif'); margin-top: 0px; margin-left: 0px">
	<p align=center>      <img src="../img/cabecalho.jpg">
	<form action="login.php" method="post">
		<center>
			<table align=center>
				<?php 
				if(isset($_GET["erro"] )){
					if ($_GET["erro"] == 1){
						echo "<tr><td colspan=2><font color=#FF0000>Erro: Senha ou login inválidos.</font></td></tr>";
					}
				}
				?>
				<tr><td>Login:</td> <td><input type="text" name="login"></td></tr>
				<tr><td>Senha:</td> <td><input type="password" name="senha"></td></tr>	
				<tr><td colspan=2><p align=center><input type="submit" value="OK"></td></tr>	
			</table>
		</center>
	</form>
</body>
</html>