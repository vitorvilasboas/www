<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
    require "../config/conectaBanco.php";
    function dateformat($data){ // formata datas do mysql(padrão americano) para o formato brasileiro....
        $data    = explode("-", $data);
        $datanova = array_reverse($data);
        return $datanova[0]."/".$datanova[1]."/".$datanova[2];
    }
     
        if ($_POST["local_prova"] == ""){
            $query = "SELECT DISTINCT cod_lpr FROM cidades_provas";
            $resultado_local_prova = mysql_query($query);
        }
        else {
            $query = "SELECT DISTINCT cod_lpr FROM cidades_provas where cod_lpr = ".$_POST["local_prova"]; 
            $resultado_local_prova = mysql_query($query);
        }        
        $num_local_prova = mysql_num_rows($resultado_local_prova);     

        $textoAtencao = "";

    	require("fpdf.php");

    	$pdf=new FPDF("P","cm","A4");
       	
    	//recuperando o codigo da turma
    	/* $conexao = mysql_pconnect("localhost","root","");
    	   mysql_select_db("medio_2011_1",$conexao);
    	   $query = "SELECT DISTINCT cod_can, nome_can, nasc_can, sexo_can, nome_cur, turno_cur FROM candidatos, cursos, cidades_provas WHERE opccur_can = cod_cur AND opccur_can = $_POST[curso] AND deferido = 1";
    	   $resultado = mysql_query($query,$conexao);*/
	
        for ($i = 0; $i < $num_local_prova; $i++){
            $linha_local_prova = mysql_fetch_array($resultado_local_prova);
            
            if ($_POST["curso"] == ""){
              $query = "SELECT DISTINCT can_inscricao, can_nome, can_dtnascimento, can_sexo, nome_cur, turno_cur, can_locprova, can_rg, can_rg_uf, can_rg_orgexp, can_cpf, can_politica
                FROM candidatos, cursos, cidades_provas 
                WHERE can_curso = cod_cur AND can_insc_deferida = 1 AND can_locprova = ".$linha_local_prova["cod_lpr"]." order by can_nome";
            } else {
              $query = "SELECT DISTINCT can_inscricao, can_nome, can_dtnascimento, can_sexo, nome_cur, turno_cur, can_rg, can_rg_uf, can_rg_orgexp, can_cpf, can_politica 
                FROM candidatos, cursos, cidades_provas 
                WHERE can_curso = cod_cur AND can_curso = $_POST[curso] AND can_insc_deferida = 1 AND can_locprova = ".$linha_local_prova["cod_lpr"]." order by can_nome"; 
            }
            $resultado = mysql_query($query);
									
            while ($row = mysql_fetch_array($resultado)){
                $pdf->AddPage();
                $sql_pol = "SELECT * FROM politica WHERE pol_id=".$row['can_politica']." LIMIT 1";
                $query_pol = mysql_query($sql_pol);
                $row_pol = mysql_fetch_array($query_pol);
                
                $pdf->SetLeftMargin(1.5);
                //$pdf->Cell(1,1, "","TL",0,'C');
                $pdf->Image("../../_img/cabecalho_cartao.jpg",2.5,null,7);
                $pdf->Ln();
                $pdf->SetLeftMargin(8.3);
                $pdf->SetFont('Arial','B',16);
                $pdf->Cell(10, 1, 'Folha de Redação',0,0,'L');

                /* Linha 1: Inicio */
                  $pdf->SetLeftMargin(0.0); //1ª Marca Preta
                  $pdf->Ln();
                  $pdf->Cell(0.5,0.3, "",1,0,'C', true); //marca
                  $pdf->Cell(1.5,0.3, "",0,0,'C');
                  
                  $pdf->SetFont('Arial','',10); // (tipo da fonte, configuração da fonte, tamanho da fonte)
                  $pdf->Cell(2.2,0.5, 'Nº Inscrição: ');// (tamanho horizontal, posição vertical (0 a 1), texto)
                  $pdf->SetFont('Arial','B',10);
                  $pdf->Cell(2.5,0.5, utf8_decode($row["can_inscricao"]));

                  $pdf->SetFont('Arial','',10);
                  $pdf->Cell(1,0.5, 'CPF: ');
                  $pdf->SetFont('Arial','B',10);
                  $pdf->Cell(3.8,0.5, $row["can_cpf"]);

                  $pdf->SetFont('Arial','',10);
                  $pdf->Cell(2,0.5, 'Doc. Ident.: ');
                  $pdf->SetFont('Arial','B',10);
                  $pdf->Cell(5,0.5, $row["can_rg"]." ".$row["can_rg_orgexp"]."/".$row["can_rg_uf"]);
                  /* Linha 1: Fim */
                  
                  $pdf->Ln();
                  /* Linha 2: Inicio */
                  $pdf->SetLeftMargin(2.0);
                  
                  $pdf->SetFont('Arial','',10);
                  $pdf->Cell(1.2,0.5, 'Nome: ');
                  $pdf->SetFont('Arial','B',10);
                  $pdf->Cell(11.7,0.5, utf8_decode($row["can_nome"]));
                  
                  $pdf->SetFont('Arial','',10);
                  $pdf->Cell(2,0.5, 'Data Nasc.: ');
                  $pdf->SetFont('Arial','B',10);
                  $pdf->Cell(3,0.5, utf8_decode(dateformat($row["can_dtnascimento"])));
                  /* Linha 2: Fim */

                  $pdf->Ln();
                  /* Linha 3: Inicio */
                  $pdf->SetLeftMargin(2.0);
                  
                  $pdf->SetFont('Arial','',10);
                  $pdf->Cell(1.2,0.5, 'Curso: ');
                  $pdf->SetFont('Arial','B',10);
                  $pdf->Cell(12.8,0.5, utf8_decode($row["nome_cur"])."  -  ".$row["turno_cur"]);
                  /* Linha 3: Fim */

                  $pdf->Ln();
                  /* Linha 4: Inicio */
                  $pdf->SetLeftMargin(2.0);
                  $pdf->SetFont('Arial','',10);
                  $pdf->Cell(2.6,0.5, 'Pol. Afirmativa: ');
                  $pdf->SetFont('Arial','B',10);
                  //$pdf->Cell(15,0.5, utf8_decode($row_pol["pol_nome"]));
                  //$pdf->SetXY(3.2,0);
                  $pdf->MultiCell(14,0.5, utf8_decode($row_pol["pol_nome"]),0,'c');
                  /* Linha 4: Fim */

                $pdf->SetLeftMargin(2.0);
                $pdf->Ln();
                $pdf->SetFont('Arial','B',9);
                
                $pdf->MultiCell(17.5,0.5, 'Atenção: Esta é a folha oficial de redação. Faça sua redação no espaço delimitado abaixo, com caneta preta, letra legível, evitando emendas e rasuras.',0,'c');
                //$pdf->Cell(10,0.5, "Atenção: Esta é a folha de redação que será corrigida. Faça sua redação no espaço destinado para",0,0,'L');
                //$pdf->Cell(10,0.5, "este fim, com caneta preta, letra legível, evitando emendas e rasuras.",0,0,'L');

                $pdf->SetLeftMargin(1.5);
                $pdf->SetFont('Arial','',10);
                $pdf->Ln();

                for($j = 1; $j <= 30; $j++){
                    $pdf->Cell(0.5,0.5, $j,1,0,'R');
                    $pdf->Cell(17.5,0.5, "",1,0,'R');
                    $pdf->Ln();
                }

                $pdf->Ln();
                $pdf->SetLeftMargin(3.5);
                
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(15,0.5, "_____________________________________________________________",0,0,'C');
                $pdf->Ln();
                $pdf->Cell(15,0.5, "Assinatura do Candidato (conforme documento de identificação)",0,0,'C');
                $pdf->Ln();
                $pdf->Ln();

                $pdf->Cell(2,0.5,"Nota Final", 1, 0, 'R');
                $pdf->Cell(3,0.5,"", 1, 0, 'R');
                $pdf->Cell(4,0.5,"Assinatura Avaliador", 1, 0, 'R');
                $pdf->Cell(6,0.5,"", 1, 0, 'R');
                $pdf->Ln();
                $pdf->Ln();
                $pdf->Ln();
                $pdf->Ln();
            }
        }
        $pdf->Output();        
}
?>