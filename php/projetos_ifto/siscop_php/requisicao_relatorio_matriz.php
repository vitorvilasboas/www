<?php
  ob_start();
  
   include ('requisicao_relatorio_pdf.php');
   $content = ob_get_clean();
   require_once('html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L','A4','fr', array(1, 1, 1, 1));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('SISCOP_relatorio_requisicoes.pdf');
    }
   catch(HTML2PDF_exception $e) {
        echo $e;
       exit;
    }
?>
