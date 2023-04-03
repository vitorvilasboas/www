<?php
session_start();
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
    if(isset($_SESSION['nome_session']) || isset($_SESSION['cpfcand_session']) || isset($_SESSION['lateralidade_session'])){
        session_destroy();
    }
    require "emedio/config/confGlobais.php";
?>
<html>
	<head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
		<title>Processo Seletivo <?php echo $periodo_letivo; ?> - IFTO Campus Araguatins</title>
		<link rel="stylesheet" type="text/css" href="./_css/estilo.css" />
        <link rel="shortcut icon" href="_img/favicon.ico" type="image/x-icon">
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<SCRIPT language=JavaScript src="_jscripts/jquery.js" type=text/javascript></SCRIPT>
		<SCRIPT language=JavaScript src="_jscripts/maskedinput.js" type=text/javascript></SCRIPT>
		<SCRIPT language=JavaScript src="_jscripts/scriptsFormularios.js" type=text/javascript></SCRIPT>
		<SCRIPT language=JavaScript src="_jscripts/efetuarInscricao.js" type=text/javascript></SCRIPT>
        <SCRIPT language=JavaScript src="_jscripts/alterarInscricao.js" type=text/javascript></SCRIPT>
	</head>
	<body>
		<div id="ficha_inscricao">
            <div class="inscricao_box_interno">       
                <div class="inscricao_cabecalho">
                  <!--<img src="_img/banner1.jpg" width="620" height="125">-->
                </div>
				<div class="div_menu">
            		<div style="text-align:center;" class="div_linha_op1">
            			<a href="emedio/" ><img src="_img/botao_medio.png" class="div_imagem" width="620"></a>
            		</div>
            		<div style="text-align:center;" class="div_linha_op1">
            			<a href="esuperior/" ><img src="_img/botao_superior.png" class="div_imagem" width="620"></a><br><br>
                 		<!--<div class="div_boleto"><a href="login.php"><input type="button" class="btn_boleto borda_radius" name="btn_alterar_senha" value="ÁREA DO CANDIDATO"></a></div>-->         
            		</div>
        		</div>
        		<div style="margin-top:20px;" class="inscricao_rodape">
                    <div style="text-align:center; width:620px; " class="div_linha_rodape">
                    	<span style="font-size: 14px; font-weight:400; color:#708090;">Comissão:</span>
                        <span style="font-size: 14px; font-weight:400; color: #3A5C3D; ">(63) 3474-4822</span>
                        <span style="font-size: 14px; font-weight:400; color:#708090;">&nbsp;|&nbsp; </span>
                        <span style="font-size: 14px; font-weight:400; color: #3A5C3D; ">seletivoaraguatins@ifto.edu.br</span>
                    </div>
                </div>
        	</div>
        </div>
	</body>
</html>
<?php 
} else {
    echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
}
?>