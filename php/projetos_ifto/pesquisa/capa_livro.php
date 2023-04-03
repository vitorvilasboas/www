
<?php
require('plugins/fpdf/fpdf.php');

$pdf = new FPDF("P","mm","A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(25, 10, 25);

$titulo4 = 'COORDENAÇÃO DE PESQUISA E INOVAÇÃO';
$titulo4 = iconv('UTF-8','ISO-8859-1' , $titulo4);
$pdf->Cell(160,8,$titulo4,0,0,'C');
$pdf->Ln(20);

//-------------Tipo do Documento ------------------------------
$pdf->SetFont('TIMES','U',18);
$declaracao = 'PROJETO DE PESQUISA';
$declaracao = iconv('UTF-8','ISO-8859-1' , $declaracao);
$pdf->Cell(160,8,$declaracao,0,0,'C');
$pdf->Ln(30);
//-------------------Dados Dinamicos----------------------------
require_once 'Connections/config.php';
include('layout/projetos_usuario_classe.php');
$opcao = new projetos_usuario_classe();
$proj_codigo = $_REQUEST['proj_codigo'];
$usu_codigo = $_REQUEST['usu_codigo'];
$usuarios = $opcao->select_usuarios($usu_codigo);
$projeto_usuario = $opcao->select_pesquisadores($proj_codigo);
$projetos = $opcao->select_projetos_usuario($proj_codigo);
$coordenador_projeto = $opcao->select_usuarios($projetos[0]['PROJ_USU_CODIGO']);
//variaveis
$nome = $usuarios[0]['USU_NOME'];
$tipo = $usuarios[0]['USU_TIPO'];
$sexo = $usuarios[0]['USU_SEXO'];
if($sexo=='F'){
    $s = 'a';
}else{
    $s = '';
}

if($tipo==1){
    $docente = $opcao->select_docentes($usu_codigo);
    $tipo = 'SIAPE '.$docente[0]['DOC_SIAPE'].', Pesquisador'.$s.' e Professor'.$s.' do Ensino Básico, Técnico e Tecnológico';
}else if($tipo==2){
    $estudante = $opcao->select_curso_estudante($usu_codigo);
    $curso = $opcao->select_cursos($estudante[0]['EST_CURSO_CODIGO']);
    $tipo = 'matrícula '.$estudante[0]['EST_MATRICULA'].' Estudante do curso '.$curso[0]['CURSO_NOME'];
}else if($tipo==3){
    $tipo = 'Pesquisador e Técnico em Educação';
}
$cpf = $usuarios[0]['USU_CPF'];

               

if($projeto_usuario[0]['pu_bolsa']=='Sim'){
    $tipo_participacao = 'bolsista';
}else if($projeto_usuario[0]['pu_bolsa']=='Não'){
    $tipo_participacao = 'participante';
}
$projeto = $projetos[0]['PROJ_NOME'];
$datainicial = $projetos[0]['PROJ_DATA_INICIO'];
$datafinal = $projetos[0]['PROJ_DATA_FIM'];
$carga_horaria = '';
$data = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
$d = date('m')-1;


$nomeProjeto = 'Título: "'.$projeto.'"';
$nomeProjeto = iconv('UTF-8','ISO-8859-1' , $nomeProjeto);
$pdf->SetFont('TIMES','B',16);
$pdf->MultiCell(160,7,strip_tags($nomeProjeto));
$pdf->Ln(20);
$NomeCoordenador = 'Coordenador: '.$coordenador_projeto[0]['USU_NOME'].'';
$NomeCoordenador = iconv('UTF-8','ISO-8859-1' , $NomeCoordenador);
$pdf->SetFont('TIMES','B',16);
$pdf->MultiCell(160,7,strip_tags($NomeCoordenador));
$pdf->Ln(25);
$NomeExecutor = 'Participante(s) '. $opcao->executores($proj_codigo).'';
      
$NomeExecutor = iconv('UTF-8','ISO-8859-1' , $NomeExecutor);
$pdf->SetFont('TIMES','',14);
$pdf->MultiCell(160,7,strip_tags($NomeExecutor));
$pdf->Ln(20);
$dataInicioProjeto = 'Data Inicial: '.$datainicial.'';
$dataInicioProjeto = iconv('UTF-8','ISO-8859-1' , $dataInicioProjeto);
$pdf->SetFont('TIMES','',14);
$pdf->MultiCell(160,7,strip_tags($dataInicioProjeto));
$pdf->Ln(0);
$dataFimProjeto = 'Data Final: '.$datafinal.'';
$dataFimProjeto = iconv('UTF-8','ISO-8859-1' , $dataFimProjeto);
$pdf->SetFont('TIMES','',14);
$pdf->MultiCell(160,7,strip_tags($dataFimProjeto));
$pdf->Ln(30);
//-----------Veracidade da declaração ----------------------------


$pdf->Output();
?>

