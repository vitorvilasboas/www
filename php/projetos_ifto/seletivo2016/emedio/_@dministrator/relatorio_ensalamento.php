<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
    require "../config/confGlobais.php";
    require "../config/conectaBanco.php";    
    
     function dateformat($data){ // formata datas do mysql(padrão americano) para o formato brasileiro....
                $data    = explode("-", $data);
                $datanova = array_reverse($data);
                return $datanova[0]."/".$datanova[1]."/".$datanova[2];
     }

     if (!isset($_POST["maximo_alunos"]) || !isset($_POST["minimo_alunos"])){
        header ("Location: ".$_POST['origem']."?erro=1");
        exit;         
     }
     if ($_POST["maximo_alunos"] == 0 || $_POST["minimo_alunos"] == 0){
        header ("Location: ".$_POST['origem']."?erro=2");
        exit;          
     }
     if ($_POST["maximo_alunos"] < $_POST["minimo_alunos"]){
        header ("Location: ".$_POST['origem']."?erro=3");
        exit;          
     } 
     /*Pensar no modelo matemático do erro 4
     if ($_POST["maximo_alunos"] < $_POST["minimo_alunos"]){
        header ("Location: ".$_POST['origem']."?erro=4");
        exit;          
     } */
     
    if ($_POST["local_prova"] == ""){
        $query = "SELECT DISTINCT cod_lpr, descricao_lpr, cid_lpr FROM cidades_provas";
        $resultado_local_prova = mysql_query($query);
    }
    else {
        $query = "SELECT DISTINCT cod_lpr, descricao_lpr, cid_lpr FROM cidades_provas where cod_lpr = ".$_POST["local_prova"]; 
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
  
        //Gerando ensalamento
        $num_alunos = mysql_num_rows($resultado);
        $aluno_sala = $_POST["maximo_alunos"];
        while($num_alunos % $aluno_sala < $_POST["minimo_alunos"] && $num_alunos % $aluno_sala != 0){
            $aluno_sala--;
        }

        $nova_sala = 1;
        $sala = 1;
        $aluno_pagina = 1;
        $nova_pagina = 1;
        while ($row = mysql_fetch_array($resultado)){
            if($nova_sala || $nova_pagina){
                $pdf->AddPage();         
                $pdf->SetLeftMargin(1.5);
                $pdf->Ln();
                $pdf->Cell(1,1, "","TL",0,'C');
                $pdf->Image("../../_img/cabecalho_cartao.jpg",2.5,null,7);
                $pdf->SetFont('Arial','B',14);     
                $pdf->SetLeftMargin(5.7);        
                $pdf->Cell(10, 1, 'LISTAGEM DE CANDIDATOS POR SALA',0,0,'L');

                $pdf->SetLeftMargin(1.5);
                $pdf->Ln();                    
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(14,0.5, 'Local da Prova: '.$linha_local_prova["cid_lpr"]." - ".$linha_local_prova["descricao_lpr"]);                
                    $pdf->Cell(2,0.5, 'Sala: '.$sala);                

                $pdf->Ln();
                    $pdf->SetLeftMargin(0.0);                 
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(1.0,0.5, 'Ord.');                     
                    $pdf->Cell(1.5,0.5, 'Insc.');
                    $pdf->Cell(4.5,0.5, 'Doc. Ident.'); 
                    $pdf->Cell(10,0.5, 'Nome');  
                    //$pdf->Cell(3,0.5, 'Identidade');                                        
                $nova_pagina = 0;
                $aluno_pagina = 1;
                if ($nova_sala){
                    $nova_sala = 0;
                    $ordem = 1;                       
                }
            }
            $pdf->Ln();
                $pdf->SetLeftMargin(1.5);                 
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(1.0,0.65, $ordem.'.');   
                $pdf->Cell(1.5,0.65, $row["can_inscricao"]); 
                $pdf->Cell(4.5,0.65, $row["can_rg"]." ".$row["can_rg_orgexp"]."/".$row["can_rg_uf"]); 
                $pdf->Cell(10,0.65, $row["can_nome"]);  
                //$pdf->Cell(3,0.65, $row["doc_can"]." ".$row["orgexp_can"]."-".$row["ufdoc_can"]);              

            if ($aluno_pagina == $n_alunos_pagina){
                $nova_pagina = 1;
            }
            if ($ordem == $aluno_sala){
                $nova_sala = 1;
                $sala++;
                $ordem = 1;
                $aluno_pagina = 1;
                continue;
            }
            $ordem++;
            $aluno_pagina++;
        }

        //Gerando atas
        // $pdf=new FPDF("P","cm","A4");  
        $resultado = mysql_query($query);
        $num_alunos = mysql_num_rows($resultado);

        $nova_sala = 1;
        $sala = 1;
        $aluno_pagina = 1;
        $nova_pagina = 1;
        while ($row = mysql_fetch_array($resultado)){
            if($nova_sala  || $nova_pagina){
                $pdf->AddPage();         
                $pdf->SetLeftMargin(1.5);
                $pdf->Ln();
                $pdf->Cell(1,1, "","TL",0,'C');
                $pdf->Image("../../_img/cabecalho_cartao.jpg",2.5,null,7);
                //$pdf->Ln();
                $pdf->SetFont('Arial','B',14);      
                $pdf->SetLeftMargin(7.5);        
                $pdf->Cell(10, 1, 'FOLHA DE FREQUÊNCIA',0,0,'L');

                $pdf->SetFont('Arial','B',9);
                $pdf->SetLeftMargin(1.5);
                $pdf->Ln();                    
                $pdf->Cell(14,0.5, 'Local da Prova: '.$linha_local_prova["cid_lpr"]." - ".$linha_local_prova["descricao_lpr"]);                
                $pdf->Cell(2,0.5, 'Sala: '.$sala);                

                $pdf->Ln(); 
                $pdf->SetLeftMargin(0.0);                 
                $pdf->SetFont('Arial','B',7);
                $pdf->Cell(0.6,0.5, 'Ord.');   
                $pdf->Cell(1,0.5, 'Insc.');  
                $pdf->Cell(6,0.5, 'Nome');  
                $pdf->Cell(3,0.5, 'Identidade');
                $pdf->Cell(10,0.5, 'Assinatura');    
                $aluno_pagina = 1;
                $nova_pagina = 0;
                if ($nova_sala){
                    $nova_sala = 0;
                    $ordem = 1;                       
                }   
            }
            $pdf->Ln();
                $pdf->SetLeftMargin(1.5);                 
                $pdf->SetFont('Arial','',7);
                $pdf->Cell(0.6,0.65, $ordem.'.');   
                $pdf->Cell(1.0,0.65, $row["can_inscricao"]);  
                $pdf->Cell(6,0.65, $row["can_nome"]);  
                $pdf->Cell(3,0.65, $row["can_rg"]." ".$row["can_rg_orgexp"]."-".$row["can_rg_uf"]);  
                $pdf->Cell(10,0.65, "__________________________________________________________");              

            if ($aluno_pagina == $n_alunos_pagina){
                $nova_pagina = 1;
            }
            if ($ordem == $aluno_sala){
                $nova_sala = 1;
                $sala++;
                $ordem = 1;
                $aluno_pagina = 1;
                continue;
            }
            $ordem++;
            $aluno_pagina++;
        }   
    }
	$pdf->Output();
}
?>