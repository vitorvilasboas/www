

<?php
# PHPlot example: Pie chart, embedded image with image map
require_once 'plugins/phplot/phplot.php';

# This global string accumulates the image map AREA tags.
$image_map = "";

# Data for pie chart:
if(isset($_REQUEST['excelente'])){
    $excelente = $_REQUEST['excelente']; 
}else{$excelente='0';}

if(isset($_REQUEST['bom'])){
$bom = $_REQUEST['bom'];
}else{$bom='0';}

if(isset($_REQUEST['regular'])){
$regular = $_REQUEST['regular'];
}else{$regular='0';}

if(isset($_REQUEST['ruim'])){
$ruim = $_REQUEST['ruim'];
}else{$ruim='0';}

if(isset($_REQUEST['muito-ruim'])){
$muitoruim = $_REQUEST['muito-ruim'];
}else{$muitoruim='0';}

if(isset($_REQUEST['nao-sei'])){
$naosei = $_REQUEST['nao-sei'];
}else {$naosei = '0';}

if(isset($_REQUEST['nsa'])){
$nsa = $_REQUEST['nsa'];
}else{$nsa='0';}
$questao=$_REQUEST['questao'];

// Note column 0, labels, are not used by PHPlot itself, but are
// displayed in the data table, and extracted for the legend.
$data = array(
   array('Excelente', $excelente),
   array('Bom', $bom),
   array('Regular', $regular),
   array('Ruim', $ruim),
   array('Muito Ruim', $muitoruim),
   array('Não sei', $naosei),
   array('NSA', $nsa),
);


function store_map($im, $data, $shape, $segment, $unused,
                   $xc, $yc, $wd, $ht, $start_angle, $end_angle)
{
    global $image_map;

    # Choose the largest step_angle <= 20 degrees that divides the segment
    # into equal parts. (20 degrees is chosen as a threshold.)
    # Note start_angle > end_angle due to reversal (360-A) of arguments.
    $arc_angle = $start_angle - $end_angle;
    $n_steps = (int)ceil($arc_angle / 20);
    $step_angle = $arc_angle / $n_steps;

    # Radius along horizontal and vertical, plus a tiny adjustment factor.
    $rx = $wd / 2 + 2;
    $ry = $ht / 2 + 2;
    # Push the initial point into the array: the center of the pie.
    $points = array($xc, $yc);

    # Loop by step_angle from end_angle to start_angle.
    # Don't use "$theta += $step_angle" because of cumulative error.
    # Note $theta and $done_angle are in radians; $step_angle and $end_angle
    # are in degrees.
    $done_angle = deg2rad($start_angle);

    for ($i = 0; ; $i++) {
      # Advance to next step, but not past the end:
      $theta = min($done_angle, deg2rad($end_angle + $i * $step_angle));

      # Generate a point at the current angle:
      $points[] = (int)($xc + $rx * cos($theta));
      $points[] = (int)($yc + $ry * sin($theta));

      # All done after generating a point at done_angle.
      if ($theta >= $done_angle) break;
    }

    # Demonstration data: Title (and tool-tip text), alt text, URL:
    # Fetch segment value from data arrayL
    $value = $data[$segment][1];
        if($segment==0){
            $segment="Excelente";
        }
        else if($segment==1){
            $segment="Bom";
        }
        else if($segment==2){
            $segment="Regular";
        }
        else if($segment==3){
            $segment="Ruim";
        }
        else if($segment==4){
            $segment="Muito Ruim";
        }
        else if($segment==5){
            $segment="Não Sei";
        }
        else if($segment==6){
            $segment="NSA";
        }
    $title = " $segment = $value";
    $alt = "Region for segment $segment";
    $href = "javascript:alert(' $segment = $value')";
    $coords = implode(',', $points);

    # Generate the image map area:
    $image_map .= "  <area shape=\"poly\" coords=\"$coords\""
               .  " title=\"$title\" alt=\"$alt\" href=\"$href\">\n";
}

# Create and configure the PHPlot object.
$plot = new PHPlot(640, 480);
# Disable error images, since this script produces HTML:
$plot->SetFailureImage(False);
# Disable automatic output of the image by DrawGraph():
$plot->SetPrintImage(False);
# Set up the rest of the plot:
#$plot->SetTitle($_REQUEST['questao']);
$plot->SetImageBorderType('plain');
$plot->SetDataValues($data);
$plot->SetDataType('text-data-single');
$plot->SetPlotType('pie');
$colors = array('Excelente', 'Bom', 'Regular', 'Ruim', 'Muito Ruim','Nao Sei','NSA');
$plot->SetLegend($colors);
$plot->SetShading(10);

# Set the data_points callback which will generate the image map.
# Include the data array as the pass-through argument, for tooltip text:
$plot->SetCallback('data_points', 'store_map', $data);
# Produce the graph; this also creates the image map via callback:
$plot->DrawGraph();

# Now output the HTML page, with image map and embedded image:
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
     "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="estilo.css" type="text/css" media="screen"/>
    <title>Gráficos</title>
</head>
<body>
    <div id="box_geral">
    <?php 
    include "logout.php";
    include "topo.php"; 
    ?>
        <div id="conteudo">
                <div id="pagina">
                    <h1 class="titulo1"><?php echo $_REQUEST['questao']; ?></h1>
                    <map name="map1">
                        <?php echo $image_map; ?>
                    </map>

                    <center>
                        <img class="img_border" src="<?php echo $plot->EncodeImage();?>" alt="Plot Image" usemap="#map1">
                    </center>
                </div>
        </div>
        <?php
             include "rodape.php";               
        ?>

   </div>
</body>
</html>