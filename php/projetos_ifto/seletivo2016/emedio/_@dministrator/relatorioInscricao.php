<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
    require "../config/conectaBanco.php";

    if (isset($_POST["deferir"])){
        if ($_POST["deferir"] == "deferir"){
            $sql_deferir = "update candidatos set can_insc_deferida = 1 where can_inscricao = ".$_POST["numero"];
            $resultado_deferir = mysql_query($sql_deferir, $conectar);
        }
        
    }

    if (!isset($_SESSION["SQL"])){
    //"</td><td>".$cotista."</td><td>".$deferido."</td>";                            
        $SQL = "select can_inscricao, can_cpf, can_rg, can_rg_orgexp, can_rg_uf, can_nome, opcao1.nome_cur as curso_1, opcao1.turno_cur as turno_1, can_escrita, can_politica, can_insc_deferida
            from candidatos, cursos as opcao1 where (candidatos.can_curso=opcao1.cod_cur "; 

        if ($_POST["inscricoes"]=="deferidas"){
                $SQL = $SQL." and can_insc_deferida=1";
        }
        else if ($_POST["inscricoes"]=="nao_deferidas"){
                $SQL = $SQL." and can_insc_deferida=0";
        }

        if ($_POST["mao"]=="canhotos"){
            $SQL = $SQL." and can_escrita = 'CANHOTO'";
        }
        else if ($_POST["mao"]=="destros"){
            $SQL = $SQL." and can_escrita = 'DESTRO'";
        }  

        if ($_POST["cota_esc_pub"]=="sim"){
            $SQL = $SQL." and can_politica <> 1";
        }
        else if ($_POST["cota_esc_pub"]=="nao"){
            $SQL = $SQL." and can_politica = 1";
        } 

        if ($_POST["curso"]!="todos"){
            if (isset($_POST["curso"])){
                $SQL = $SQL." and can_curso=".$_POST["curso"];
            }
        }
        $SQL = $SQL.") and (can_inscricao like '%".$_POST["chave_busca"]."%' or 
            candidatos.can_nome like '%".$_POST["chave_busca"]."%' or 
            candidatos.can_cpf like '%".$_POST["chave_busca"]."%' or
            opcao1.turno_cur like '%".$_POST["chave_busca"]."%' or            
            opcao1.nome_cur like '%".$_POST["chave_busca"]."%' or                                                            
            can_rg like '%".$_POST["chave_busca"]."%' or 
            can_rg_orgexp like '%".$_POST["chave_busca"]."%' or 
            can_rg_uf like '%".$_POST["chave_busca"]."%')"; 

        $_SESSION["SQL"] = $SQL;
    }
    else{
        $SQL =  $_SESSION["SQL"];
        
        if (isset($_GET["classificacao"])){
            $SQL = $SQL." order by ".$_GET["classificacao"];
        }    
    }
    $result = mysql_query($SQL, $conectar);
    $num_linhas = mysql_num_rows($result);

    require "../config/confGlobais.php";
    require "cabecalho.php";

    if (isset($resultado_cancelar)){
        if ($resultado_cancelar){
            echo "<h3 style='text-align:center; color: #cc0000;'>Inscri&ccedil;&atilde;o cancelada com sucesso!</h3>";
        }
        else{
            echo "<h3 style='text-align:center; color: #cc0000;'>Houve um erro, n&atilde;o foi poss&iacute;vel cancelar a inscri&ccedil;&atilde;o!</h3>";
        }
    }
    if (isset($resultado_deferir)){
        if ($resultado_deferir){
            echo "<h3 style='text-align:center; color: #cc0000;'>Inscri&ccedil;&atilde;o deferida com sucesso!</h3>";
        }
        else{
            echo "<h3 style='text-align:center; color: #cc0000;'>Houve um erro, n&atilde;o foi poss&iacute;vel deferir a inscri&ccedil;&atilde;o!</h3>";
        }    
    }
    if (isset($resultado_atualizar)){
        if ($resultado_atualizar){
            echo "<h3 style='text-align:center; color: #cc0000;'>Inscri&ccedil;&atilde;o atualizada com sucesso!</h3>";
        } else {
            echo "<h3 style='text-align:center; color: #cc0000;'>Houve um erro, n&atilde;o foi poss&iacute;vel atualizar a inscri&ccedil;&atilde;o!</h3>";
        }        
    }
    ?>

    <table align=center width="1200">
    <tr><td align=center colspan=14><b>RELAT&Oacute;RIO DE INSCRI&Ccedil;&Otilde;ES</b></td></tr>
    <tr align=left>
        <td colspan="3" align="center"><b>A&ccedil;&otilde;es</b></td>            
        <td><b><a href="relatorioInscricao.php?classificacao=can_insc_deferida">Deferido</b></td>    
        <td><b><a href="relatorioInscricao.php?classificacao=can_inscricao">N<sup>o</sup> Inscri&ccedil;&atilde;o</b></td>
        <td><b><a href="relatorioInscricao.php?classificacao=can_cpf">CPF</b></td>
        <td><b><a href="relatorioInscricao.php?classificacao=can_rg">RG</b></td>
        <td><b><a href="relatorioInscricao.php?classificacao=can_nome">Nome</b></td>
        <td><b><a href="relatorioInscricao.php?classificacao=curso_1">Curso</b></td>
        <td><b><a href="relatorioInscricao.php?classificacao=turno_1">Turno</b></td>   
        <td><b><a href="relatorioInscricao.php?classificacao=can_escrita">Habilidade</b></td>
        <td><b><a href="relatorioInscricao.php?classificacao=can_politica">Cotista</b></td>
        
        
    </tr>
    <?php
    	for ($i = 0; $i < $num_linhas; $i++){
    		$linha = mysql_fetch_array($result);
    		if ($linha["can_insc_deferida"] == 1){
    			$deferido = "Sim";
    		}
    		else{
    			$deferido = "N&atilde;o";
    		}
    		if ($linha["can_politica"] != 1){
    			$cotista = "Sim";
    		}
    		else{
    			$cotista = "Nao";
    		}		
    		if ($i % 2 == 1)
    		{
    			echo "<tr valign=center>";
                    }
    		else
    		{
    			echo "<tr valign=center bgcolor=#bbff00>";
    		}
                    echo "<td><form name='deferirInscricao' method='post' action='relatorioInscricao.php'>";	
                    echo "<input type=hidden name=numero value='".$linha["can_inscricao"]."'><input type=hidden name=campo value='inscricao'>";
                    echo "<input class='botao' name=deferir type=submit value=deferir></form></td>";	
                    
                    echo "<td><form name='editarInscricao' method='post' action='editaInscricao.php'>";
                    echo "<input type=hidden name=origem value='relatorioInscricao.php'>";			
                    echo "<input type=hidden name=numero value='".$linha["can_inscricao"]."'><input type=hidden name=campo value='inscricao'>";
                    echo "<input class='botao' type=submit value=editar></form></td>";	

                    echo "<td><form name=cancelarInscricao method='post' action='certeza_cancelar.php'>";
                    echo "<input type=hidden name=inscricao value='".$linha["can_inscricao"]."'>";
                    echo "<input class='botao' type=submit value=cancelar>";
                    echo "</form></td>";                  
                    
                    echo "<td>".
                            $deferido."<td>".
                            $linha["can_inscricao"]."</td><td>".
                            $linha["can_cpf"]."</td><td>".
                            $linha["can_rg"]." ".$linha["can_rg_orgexp"]."-".$linha["can_rg_uf"]."</td><td>".    
                            $linha["can_nome"]."</td><td>".
                            $linha["curso_1"]."</td><td>".
                            $linha["turno_1"]."</td><td>".                               
                            $linha["can_escrita"]."</td><td>".
                            $cotista."</td></tr>";             
    	}
    ?>
    </tr>
    <tr><td align=left colspan=14><b>Total de Inscri&ccedil;&otilde;es: <?php echo $num_linhas; ?></b></td></tr>
    <tr><td align=center colspan=14><a href="buscaInscricao.php">voltar</a></td></tr>
    </table>
    </center>
    </body>
    </html>
<?php
}
?>