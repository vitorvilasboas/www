<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {

     function dateformat($data){ // formata datas do mysql(padrão americano) para o formato brasileiro....
                $data    = explode("-", $data);
                $datanova = array_reverse($data);
                return $datanova[0]."/".$datanova[1]."/".$datanova[2];
     }


	//recuperando o codigo da turma
	/*
	$conexao = mysql_pconnect("localhost","root","");
	mysql_select_db("medio_2011_1",$conexao);
	$query = "SELECT DISTINCT cod_can, nome_can, nasc_can, sexo_can, nome_cur, turno_cur FROM candidatos, cursos, cidades_provas WHERE opccur_can = cod_cur AND opccur_can = $_POST[curso] AND deferido = 1";
	$resultado = mysql_query($query,$conexao);*/
	require "../config/conectaBanco.php";

        if ($_POST["local_prova"] == ""){
            $query = "SELECT DISTINCT cod_lpr FROM cidades_provas";
            $resultado_local_prova = mysql_query($query);
        }
        else {
            $query = "SELECT DISTINCT cod_lpr FROM cidades_provas where cod_lpr = ".$_POST["local_prova"]; 
            $resultado_local_prova = mysql_query($query);
        }        
        $num_local_prova = mysql_num_rows($resultado_local_prova);

        require("fpdf.php");
        
        $pdf=new FPDF("P","cm","A4");
        

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
                //echo $row["nome_can"]." - ".$row["turno_cur"]."<br><br>";
                //continue;

                /****** Cabeçalho: Início ********/
                  /* Imagem: Inicio */
                  $pdf->SetLeftMargin(1.5);
                  $pdf->Cell(1,1, "","TL",0,'C');
                  $pdf->Image("../../_img/cabecalho_cartao.jpg",2.5,null,7);
                  /* Imagem: Fim */
                  
                  /* Linha Título: Inicio */
                  $pdf->SetLeftMargin(8.3); // Margem cartão resposta
                  $pdf->SetFont('Arial','B',16);
                  $pdf->Cell(10, 1, 'Cartão-Resposta',0,0,'L');
                  /* Linha Título: Fim */
                  
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
                
                  /* Linha Exemplo: Inicio */
                  $pdf->Ln();
                  $pdf->SetLeftMargin(3.2);
                  $pdf->SetFont('Arial','B',10);
                  $pdf->Cell(10.8,0.3, "Preencha o Cartão-Resposta corretamente conforme exemplo:",0,0,'L');
                  //$pdf->Ln();
                  //$pdf->Cell(2,0.5, "Exemplo:",0,0,'L');
                  //$pdf->SetLeftMargin(2.2);
                  $pdf->SetFont('Arial','',8);
                  $pdf->Cell(0.2,0.3, "1",0,0,'R');
                  $pdf->Cell(0.1,0.5, "",0,0,'C');
                  $pdf->Cell(0.5,0.3, "A",1,0,'C');
                  $pdf->Cell(0.2,0.5, "",0,0,'C');
                  $pdf->Cell(0.5,0.3, "B",1,0,'C', true);
                  $pdf->Cell(0.2,0.5, "",0,0,'C');
                  $pdf->Cell(0.5,0.3, "C",1,0,'C');
                  $pdf->Cell(0.2,0.5, "",0,0,'C');
                  $pdf->Cell(0.5,0.3, "D",1,0,'C');
                  $pdf->Cell(0.2,0.5, "",0,0,'C');
                  $pdf->Cell(0.5,0.3, "E",1,0,'C');
                  $pdf->Cell(0.1,1, "",0,0,'C');
                  /* Linha Exemplo: Fim */

                  $pdf->SetLeftMargin(0.0);//2ª Marca Preta
                  $pdf->SetFont('Arial','',8);
                  $pdf->Ln();
                  $pdf->Cell(0.5,0.3, "",1,0,'C', true);// marca
                  $pdf->Cell(3.0,0.3, "",0,0,'C');
    				      /* Cabeçalho: Fim */
                  
                  /* Gabarito: Inicio (De acordo com o curso) */
      				    $pdf->SetLeftMargin(5.0);
                  
                  if($_POST["curso"] != "3"){// Se o curso for Técnico Integrado - 50 questões
                    for($j = 1; $j <= 25; $j++){
                        $pdf->Cell(0.2,0.3, $j,0,0,'R');
                        $pdf->Cell(0.1,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "A",1,0,'C');// 1=borda, C=central, R=Right, L=Left
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "B",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "C",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "D",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "E",1,0,'C');

                        $pdf->Cell(1,0.5, "",0,0,'C');
        	
        	              $pdf->SetLeftMargin(5.0);
                        $pdf->Cell(0.2,0.3, $j+25,0,0,'R');
                        $pdf->Cell(0.1,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "A",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "B",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "C",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "D",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "E",1,0,'C');

                        $pdf->Cell(1,0.5, "",0,0,'C');

                        /*  $pdf->Cell(0.2,0.3, $j+34,0,0,'R');
                        $pdf->SetLeftMargin(5.0);
                        $pdf->Cell(0.1,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "A",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "B",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "C",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "D",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "E",1,0,'C');*/
                        $pdf->Ln();
                        $pdf->Cell(0.5,0.2, "",0,0,'C');
                      //$pdf->SetLeftMargin(3.5);
                        $pdf->Ln();
                    }
                  } else { // Se o curso for o Técnico Subsequente - 45 questões
                    for($j = 1; $j <= 20; $j++){
                        $pdf->Cell(0.2,0.3, $j,0,0,'R');
                        $pdf->Cell(0.1,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "A",1,0,'C');// 1=borda, C=central, R=Right, L=Left
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "B",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "C",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "D",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "E",1,0,'C');

                        $pdf->Cell(1,0.5, "",0,0,'C');

                        $pdf->SetLeftMargin(5.0);
                        $pdf->Cell(0.2,0.3, $j+25,0,0,'R');
                        $pdf->Cell(0.1,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "A",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "B",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "C",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "D",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "E",1,0,'C');

                        $pdf->Cell(1,0.5, "",0,0,'C');

                        $pdf->Ln();
                        $pdf->Cell(0.5,0.2, "",0,0,'C');
                        //$pdf->SetLeftMargin(3.5);
                        $pdf->Ln();
                    }
                    for($j = 1; $j <= 5; $j++){
                        $pdf->Cell(0.2,0.3, $j+20,0,0,'R');
                        $pdf->Cell(0.1,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "A",1,0,'C');// 1=borda, C=central, R=Right, L=Left
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "B",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "C",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "D",1,0,'C');
                        $pdf->Cell(0.2,0.5, "",0,0,'C');
                        $pdf->Cell(0.8,0.4, "E",1,0,'C');

                        $pdf->Cell(1,0.5, "",0,0,'C');

                        $pdf->Ln();
                        $pdf->Cell(0.5,0.2, "",0,0,'C');
                        //$pdf->SetLeftMargin(3.5);
                        $pdf->Ln();
                    }              
                  }
                  /* Gabarito: Fim */

                $pdf->Ln();
                $pdf->Ln();
                //$pdf->SetLeftMargin(2);
                $pdf->Ln();
                $pdf->Ln();
                //$pdf->SetFont('Arial','B',11);
                //$pdf->Cell(15,0.5, "Escreva abaixo sua Política Afirmativa.",0,0,'L');
                $pdf->Ln();
                $pdf->SetLeftMargin(2.5);
                $pdf->Ln();
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(16,0.5, "________________________________________________________________________",0,0,'C');
                $pdf->Ln();
                $pdf->Cell(16,0.5, "Política Afirmativa Declarada pelo Candidato (Conforme Orientação do Fiscal)",0,0,'C');
                $pdf->Ln();
                $pdf->Ln();
                $pdf->Ln();
                $pdf->Ln();

            }
        }
	$pdf->Output();
}
?>