<?php 
require_once 'Connections/conecta.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>.::Relatório::.</title>
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen">
    </head>
    <body style="background:#FFFFFF;">
       
<div id="pagina">
<center><img src="imagens/topo_relatorio.png"/></center>

<?php 
$sql=("SELECT  cert_codigo,cert_data, usu_nome , mcso_titulo, mcso_condutor
FROM certificados LEFT JOIN usuarios ON CERT_USU_CODIGO = USU_CODIGO
LEFT JOIN minicursos ON CERT_MCSO_CODIGO = MCSO_CODIGO order by CERT_CODIGO");
$resultado=$con->banco->Execute($sql);
while($registro=$resultado->FetchNextObject()){
?>
<table width="720" border="1" cellspacing="0">
<tr>
    <th class="td120t">Protoloco :</th>
    <td class="td70"> <?php echo $registro->CERT_CODIGO; ?></td>
    <th class="td120t">Data :</th>
    <td class="td300"> <?php echo $registro->CERT_DATA; ?></td>
</tr>
<tr>
    <th class="td120t">Nome :</th>
    <td class="td620" colspan="3"> <?php echo $registro->USU_NOME; ?></td>
</tr>
<tr>
    <th class="td120t">Minicurso :</th>
    <td class="td620" colspan="3"> <?php echo $registro->MCSO_TITULO; ?></td>
</tr>
<tr>
    <th class="td120t">Ministrado por:</th>
    <td class="td620" colspan="3"> <?php echo $registro->MCSO_CONDUTOR; ?></td>
</tr>
</table> 
<br />
      <?php
        }
      ?>


<center><a href="javascript:history.back();">Voltar</a></center>
    
</div>
</body>
</html>