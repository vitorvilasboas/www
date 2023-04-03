<?php
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

/*$SQL_cursos = "
    SELECT inscricoes.cod_cur, deferidas.cod_cur, cursos.cod_cur, cursos.nome_cur, cursos.turno_cur, vagas_cur, deferidas.deferidas, 
    (inscricoes.total - deferidas.deferidas) as  indeferidas, inscricoes.total, (deferidas.deferidas / cursos.vagas_cur) as conc_real, 
    (inscricoes.total / cursos.vagas_cur) as conc_total 
    FROM cursos LEFT JOIN candidatos ON cursos.cod_cur = candidatos.can_curso LEFT JOIN (SELECT cod_cur, SUM(deferido) as deferidas FROM cursos, candidatos WHERE can_curso = cod_cur GROUP BY cod_cur) as deferidas ON cursos.cod_cur = deferidas.cod_cur
    LEFT JOIN (SELECT cod_cur, COUNT(can_insc_deferida) as total FROM cursos, candidatos
    WHERE can_curso = cod_cur GROUP BY cod_cur) as inscricoes ON cursos.cod_cur = inscricoes.cod_cur GROUP BY (cursos.cod_cur) ";*/

$SQL_cursos = "
    SELECT inscricoes.cod_cur, deferidas.cod_cur, cursos.cod_cur, cursos.nome_cur, cursos.turno_cur, vagas_cur, deferidas.deferidas, 
    (inscricoes.total - deferidas.deferidas) as  indeferidas, inscricoes.total, (deferidas.deferidas / cursos.vagas_cur) as conc_real, 
    (inscricoes.total / cursos.vagas_cur) as conc_total 
    FROM cursos LEFT JOIN candidatos ON cursos.cod_cur = candidatos.can_curso LEFT JOIN (SELECT cod_cur, SUM(can_insc_deferida) as deferidas FROM cursos, candidatos WHERE can_curso = cod_cur GROUP BY cod_cur) as deferidas ON cursos.cod_cur = deferidas.cod_cur
    LEFT JOIN (SELECT cod_cur, COUNT(can_insc_deferida) as total FROM cursos, candidatos
    WHERE can_curso = cod_cur GROUP BY cod_cur) as inscricoes ON cursos.cod_cur = inscricoes.cod_cur GROUP BY (cursos.cod_cur) ";

if (isset($_GET["classificacao"])){
    $SQL_cursos = $SQL_cursos."ORDER BY ".$_GET['classificacao'];
}
else{
    $SQL_cursos = $SQL_cursos."ORDER BY nome_cur, turno_cur";
}
    
require_once "../config/conectaBanco.php";

$cursos = mysql_query($SQL_cursos, $conectar);
$num_cursos = mysql_num_rows($cursos);

?>        
<table width="600px"><tr>
        <td><b><a href="buscaInscricao.php?classificacao=nome_cur">Curso</a></b></td>
        <td><b><a href="buscaInscricao.php?classificacao=turno_cur">Turno</a></b></td>
        <td><b><a href="buscaInscricao.php?classificacao=vagas_cur">Vagas</a></b></td>
        <td><b><a href="buscaInscricao.php?classificacao=deferidas">Deferidas</a></b></td>
        <td><b><a href="buscaInscricao.php?classificacao=indeferidas">N&atilde;o Confirmadas</a></b></td>
        <td><b><a href="buscaInscricao.php?classificacao=total">Total</a></b></td>
        <td><b><a href="buscaInscricao.php?classificacao=conc_real">Conc. Real</a></b></td>
        <td><b><a href="buscaInscricao.php?classificacao=conc_total">Conc. Geral</a></b></td></tr>
<?php 

for ($i = 0; $i < $num_cursos; $i++){
	$linha_cursos = mysql_fetch_array($cursos);

        if ($i % 2 == 0){
            echo "<tr align=center bgcolor='#bbff00'><td align='left'>".$linha_cursos['nome_cur']."</td><td align=left>".$linha_cursos['turno_cur']."</td>";        
        }
        else{
            echo "<tr align=center><td align='left'>".$linha_cursos['nome_cur']."</td><td align=left>".$linha_cursos['turno_cur']."</td>";                    
        }
        echo "<td>".$linha_cursos["vagas_cur"]."</td>";        
        echo "<td>".number_format($linha_cursos["deferidas"], 0)."</td>";//" (".$porcentagem_deferidas."%)</td>";
        echo "<td>".number_format($linha_cursos["indeferidas"], 0)."</td>";//." (".$porcentagem_indeferidas."%)</td>";        
        echo "<td>".number_format($linha_cursos["total"], 0)."</td>";
        echo "<td>".number_format($linha_cursos["conc_real"], 2)."</td>";
        echo "<td>".number_format($linha_cursos["conc_total"], 2)."</td></tr>";     
}

if ($i % 2 == 0){
    echo "<tr align=center bgcolor='#bbff00'><td colspan=2><b>Total</b></td>";            
}
else{
    echo "<tr align=center><td colspan=2><b>Total</b></td>";        
}
$sql_totais = "
    SELECT 
        SUM(vagas_cur) as total_vagas, SUM(deferidas) as total_deferidas,
        SUM(total) as total_inscricoes,
        (SUM(total) - SUM(deferidas)) as total_indeferidas,
        (SUM(deferidas) / SUM(vagas_cur)) as total_conc_real,
        (SUM(total) / SUM(vagas_cur)) as total_conc_geral
    FROM
        (SELECT 
        cod_cur, cursos.nome_cur, cursos.turno_cur, cursos.vagas_cur, 
        deferidas.deferidas, 
        (inscricoes.total - deferidas.deferidas) as  indeferidas, inscricoes.total, 
        (deferidas.deferidas / cursos.vagas_cur) as conc_real, 
        (inscricoes.total / cursos.vagas_cur) as conc_total 
        FROM
        cursos LEFT JOIN candidatos ON cursos.cod_cur = candidatos.can_curso
        LEFT JOIN
            (SELECT cod_cur as def_cod_cur, SUM(can_insc_deferida) as deferidas
            FROM cursos, candidatos
            WHERE can_curso = cod_cur 
            GROUP BY def_cod_cur) as deferidas
        ON cursos.cod_cur = deferidas.def_cod_cur
        LEFT JOIN
            (SELECT cod_cur as insc_cod_cur, COUNT(can_insc_deferida) as total
            FROM cursos, candidatos
            WHERE can_curso = cod_cur 
            GROUP BY insc_cod_cur) as inscricoes
        ON cursos.cod_cur = inscricoes.insc_cod_cur 
    GROUP BY (cursos.cod_cur)
    ORDER BY nome_cur) AS cursos_totais";
$totais = mysql_query($sql_totais, $conectar);
$linha_totais = mysql_fetch_array($totais);

echo "<td><b>".$linha_totais["total_vagas"]."</td>";//" (".$porcentagem_deferidas."%)</b></td>";
echo "<td><b>".$linha_totais["total_deferidas"]."</td>";//" (".$porcentagem_deferidas."%)</b></td>";
echo "<td><b>".$linha_totais["total_indeferidas"]."</td>"; //" (".$porcentagem_indeferidas."%)</b></td>";        
echo "<td><b>".$linha_totais["total_inscricoes"]."</b></td>";
echo "<td><b>".number_format($linha_totais["total_conc_real"], 2)."</b></td>";
echo "<td><b>".number_format($linha_totais["total_conc_geral"], 2)."</b></td></tr>";


?>
</table>

<?php
}
?>
