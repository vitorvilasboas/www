<?php require 'Connections/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="plugins/jquery.meio.mask.js" type="text/javascript"> </script>
        <script src="plugins/SpryValidationTextField.js" type="text/javascript"></script>
        <script src="plugins/SpryValidationSelect.js" type="text/javascript"></script>
        <link rel="stylesheet" href="estilo.css" type="text/css">
        <title>Coordenação de Pesquisa e inovação</title>
    </head>
    <body>

        <?php
           include 'header.php';
           include 'nav.php';
           //include 'logout.php';
           foreach($_REQUEST as $___opt => $___val) {
                $$___opt = $___val;
            }
            if(empty($p)){
                include("layout/login.php");
            }
            elseif(substr($p, 0, 4)=='http' or substr($p, 0, 1)=="/" or substr($p, 0, 1)==".") 
            {
                echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a partir do Menu Principal.</font>'; 
            }
            else {
                 include("layout/$p.php");
            } 
            include 'footer.php';
        ?>
 
    </body>
</html>
