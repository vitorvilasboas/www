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
<center><img src="imagens/topo_rel_jice.png"/></center>

<?php 
$sql=("select mcso_titulo,mcso_condutor from minicursos where MCSO_CODIGO='".$_REQUEST['mcso_codigo']."'");
$resultado=$con->banco->Execute($sql);
if($registro=$resultado->FetchNextObject()){
?>
<table width="798" border="1" cellspacing="0">
<tr><td colspan="4"><label> Curso : <?php echo $registro->MCSO_TITULO.'<br />Ministrado por: '.$registro->MCSO_CONDUTOR; ?></label></td></tr>

<?php } ?>

    <tr>
        <th class="td70t">Codigo</th><td class="td300t">Nome</td><th>Situação</th><td class="td300t">Assinatura</td>
        <?php
 
        $sql=("select  usu_codigo,usu_nome,ic_situacao from usuarios inner join  itens_minicursos on  IC_USU_CODIGO= USU_CODIGO where IC_MCSO_CODIGO='".$_REQUEST['mcso_codigo']."' order by USU_NOME");
        $resultado=$con->banco->Execute($sql); 
        while($registro=$resultado->FetchNextObject()){
 ?>
    </tr>
    <tr>
        <th><?php echo $registro->USU_CODIGO;?></th><td><?php echo strtoupper($registro->USU_NOME);?></td><td><?php echo $registro->IC_SITUACAO;?></td><td>.</td>
    </tr>
      <?php
        }
      ?>
</table>
<center><a href="javascript:history.back();">Voltar</a></center>
    
</div>
</body>
</html>