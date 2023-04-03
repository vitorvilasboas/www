<?php // content="text/plain; charset=utf-8"
require 'Connections/Conecta.php';



require_once ('plugins/jpgraph/src/jpgraph.php');
require_once ('plugins/jpgraph/src/jpgraph_canvas.php');
require_once ('plugins/jpgraph/src/jpgraph_bar.php');


        $sql_execelente = ("SELECT COUNT(FKRESP_CODIGO) as excelente from itens_quest_respostas 
        WHERE  FKRESP_CODIGO=1 AND  FKQUES_CODIGO= 1 ");
        $resultado_execelente = $con->banco->Execute($sql_execelente);
        $registro_excelente = $resutado_excelente->FetchNextObject();
        $excelente = $registro_excelente->excelente;
        
        
        $sql_bom = ("SELECT COUNT(FKRESP_CODIGO)  AS bom from itens_quest_respostas 
        WHERE  FKRESP_CODIGO=2 AND FKQUES_CODIGO= 1 ");
        $resultado_execelente = $con->banco->Execute($sql_bom);
        $registro_bom = $resutado_bom->FetchNextObject();
        $bom = $registro_bom->bom;
        
        $sql_regular = ("SELECT COUNT(FKRESP_CODIGO)  AS 'Regular' from itens_quest_respostas 
        WHERE  FKRESP_CODIGO=3 AND FKQUES_CODIGO= 1 ");
        $resultado_execelente = $con->banco->Execute($sql_regular);
        foreach($resultado_regular as $resp_regular){
            $bom = $resp_bom['Regular'];
        }
        
        $sql_ruim = (" SELECT COUNT(FKRESP_CODIGO) As 'Ruim' from itens_quest_respostas 
        WHERE  FKRESP_CODIGO=4 AND FKQUES_CODIGO= 1 ");
        $resultado_ruim = $con->banco->Execute($sql_ruim);
        foreach($resultado_ruim as $resp_ruim){
            $ruim = $resp_ruim['Ruim'];
        }
        
        $sql_muito_ruim = ("SELECT COUNT(FKRESP_CODIGO) As 'muito_ruim' from itens_quest_respostas 
        WHERE  FKRESP_CODIGO=5 AND FKQUES_CODIGO= 1") ;
        $resultado_Muito_ruim = $con->banco->Execute($sql_muito_ruim);
        foreach($resultado_muito_ruim as $resp_muito_ruim){
            $muito_ruim = $resp_muito_ruim['Ruim'];
        }
        
        $sql_nao_sei = ("SELECT COUNT(FKRESP_CODIGO) AS 'nao_sei' from itens_quest_respostas 
        WHERE  FKRESP_CODIGO=6 AND FKQUES_CODIGO= 1") ;
        $resultado_nao_sei = $con->banco->Execute($sql_nao_sei);
        foreach($resultado_nao_sei as $resp_nao_sei){
            $nao_sei = $resp_nao_sei['nao_sei'];
        }
        
        $sql_nsa = ("SELECT COUNT(FKRESP_CODIGO) AS 'nsa' from itens_quest_respostas 
        WHERE  FKRESP_CODIGO=7 AND FKQUES_CODIGO= 1") ;
        $resultado_Muito_ruim = $con->banco->Execute($sql_nsa);
        foreach($resultado_nsa as $resp_nsa){
            $nsa = $resp_muito_nsa['nsa'];
        }

/*

$sql_resposta = "SELECT RESP_NOME,COUNT(RESP_NOME) from itens_quest_respostas 
inner join respostas on RESP_CODIGO = FKRESP_CODIGO WHERE FKQUES_CODIGO= 7 
GROUP BY RESP_NOME ORDER BY RESP_CODIGO";
$resutado = $con->banco->Execute($sql_resposta);
while($registro = $resutado->FetchNextObject()){
        
       $excelente=$registro->RESP_NOME == 'Excelente';
       $bom=$registro->RESP_NOME == 'Bom';
       $regular=$registro->RESP_NOME == 'Regular';
       $ruim = $registro->RESP_NOME == 'Ruim';
       $muito_ruim = $registro->RESP_NOME == 'Muito Ruim';
       $nao_sei = $registro->RESP_NOME == 'Não sei';
       $nsa=$registro->RESP_NOME == 'NSA';
       
*/
       $dados= $excelente.','.$bom.','.$regular.','.$ruim.','.$muito_ruim.','.$nao_sei.','.$nsa;

$data1y=array($dados);
$graph = new Graph(500, 200, 'auto');
$graph->SetScale('textlin');

$theme_class = new AquaTheme;
$graph->SetTheme($theme_class);

// after setting theme, you can change details as you want
$graph->SetFrame(true, 'lightgray');                        // set frame visible

$graph->xaxis->SetTickLabels(array('Excelente','Bom','Regular','Ruim','Muito Ruim', 'Não sei', 'NSA')); // change xaxis lagels
$graph->title->Set("52 - o apoio a estudantes em situação economica desfavorecida");                    // add title

// add barplot
$bplot = new BarPlot($data1y);
$graph->Add($bplot);

// you can change properties of the plot only after calling Add()
$bplot->SetWeight(0);
$bplot->SetFillGradient('#FFAAAA:0.7', '#FFAAAA:1.2', GRAD_VER);    

$graph->Stroke();



?>