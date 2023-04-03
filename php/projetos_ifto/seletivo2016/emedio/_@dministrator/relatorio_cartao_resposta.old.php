<?php
require "verifica.php";

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
	require "../conectaBanco.php";

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
   	$pdf->AddPage();
    
        for ($i = 0; $i < $num_local_prova; $i++){
            $linha_local_prova = mysql_fetch_array($resultado_local_prova);
            
            if ($_POST["curso"] == ""){
                $query = "SELECT DISTINCT cod_can, nome_can, nasc_can, sexo_can, 
                        nome_cur, turno_cur, locprov_can
                        FROM candidatos, cursos, cidades_provas 
                        WHERE opccur_can_1 = cod_cur AND deferido = 1 AND
                        locprov_can = ".$linha_local_prova["cod_lpr"]." order by nome_can";
            }
            else {
                $query = "SELECT DISTINCT cod_can, nome_can, nasc_can, sexo_can, 
                    nome_cur, turno_cur FROM candidatos, cursos, cidades_provas 
                    WHERE opccur_can_1 = cod_cur AND 
                    opccur_can_1 = $_POST[curso] AND deferido = 1 
                    AND locprov_can = ".$linha_local_prova["cod_lpr"]."                
                    order by nome_can"; 
            }

            $resultado = mysql_query($query);
            while ($row = mysql_fetch_array($resultado)){
//                echo $row["nome_can"]." - ".$row["turno_cur"]."<br><br>";
//                continue;
                    $pdf->SetLeftMargin(1.5);
            $pdf->Ln();
                    $pdf->Cell(1,1, "","TL",0,'C');
                $pdf->Image("../imagens/cabecalho_cartao.jpg",3.5,null,14);
            $pdf->Ln();
            $pdf->SetLeftMargin(7.5);
            $pdf->Ln();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(10, 1, 'Cartão-Resposta',0,0,'L');

                    $pdf->SetLeftMargin(0.0);
            $pdf->Ln();
                    $pdf->Cell(0.5,0.3, "",1,0,'C', true);
                    $pdf->Cell(1.5,0.3, "",0,0,'C');
                    $pdf->SetFont('Arial','',10);
            $pdf->Cell(2,0.5, 'Num. Inscr.: ');
            $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(10,0.5, utf8_decode($row["cod_can"]));
                    $pdf->SetFont('Arial','',10);
                $pdf->Cell(2,0.5, 'Sexo: ');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(4,0.5, $row["sexo_can"]);

            $pdf->SetLeftMargin(2.0);
            $pdf->Ln();

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(2,0.5, 'Nome: ');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,0.5, $row["nome_can"]);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(2,0.5, 'Data Nasc.: ');
            $pdf->SetFont('Arial','B',10);
                $pdf->Cell(3,0.5, utf8_decode(dateformat($row["nasc_can"])));


            $pdf->Ln();

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(2,0.5, 'Curso: ');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,0.5, $row["nome_cur"]);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(2,0.5, 'Turno: ');
            $pdf->SetFont('Arial','B',10);
                $pdf->Cell(3,0.5, $row["turno_cur"]);

            $pdf->Ln();
            $pdf->Ln();
            $pdf->SetLeftMargin(3.5);
            $pdf->Ln();
                $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,0.5, "Preencha o Cartão-Resposta corretamente e sem rasuras.",0,0,'L');
            $pdf->Ln();
            $pdf->Cell(10,0.5, "Exemplo:",0,0,'L');
            $pdf->Ln();
            $pdf->SetLeftMargin(5.5);
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

                    $pdf->SetLeftMargin(0.0);
                    $pdf->SetFont('Arial','',8);
            $pdf->Ln();
                    $pdf->Cell(0.5,0.3, "",1,0,'C', true);
                    $pdf->Cell(3.0,0.3, "",0,0,'C');

                for($j = 1; $j <= 20; $j++){
                      $pdf->Cell(0.2,0.3, $j,0,0,'R');
                      $pdf->Cell(0.1,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "A",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "B",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "C",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "D",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "E",1,0,'C');

                      $pdf->Cell(1,0.5, "",0,0,'C');

                      $pdf->Cell(0.2,0.3, $j+20,0,0,'R');
                      $pdf->Cell(0.1,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "A",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "B",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "C",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "D",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "E",1,0,'C');

                      $pdf->Cell(1,0.5, "",0,0,'C');

                  $pdf->Cell(0.2,0.3, $j+40,0,0,'R');
                      $pdf->Cell(0.1,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "A",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "B",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "C",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "D",1,0,'C');
                      $pdf->Cell(0.2,0.5, "",0,0,'C');
                      $pdf->Cell(0.5,0.3, "E",1,0,'C');

                          $pdf->Ln();
                          $pdf->Cell(0.5,0.2, "",0,0,'C');
                              $pdf->SetLeftMargin(3.5);
                          $pdf->Ln();
            }

            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->SetLeftMargin(3.5);
            $pdf->Ln();
                $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,0.5, "Este Cartão-Resposta só será considerado válido com a assinatura do candidato.",0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
                $pdf->SetFont('Arial','',10);
            $pdf->Cell(15,0.5, "_____________________________________________________________",0,0,'C');
            $pdf->Ln();
            $pdf->Cell(15,0.5, "Assinatura do Candidato (conforme documento de identificação)",0,0,'C');
                    $pdf->Ln();
                    $pdf->Ln();
                    $pdf->Ln();
                    $pdf->Ln();

            }
        }
	$pdf->Output();
?>
