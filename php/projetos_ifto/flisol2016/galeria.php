<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen"/>
        <script type="text/javascript" src="plugins/jQuery.js"></script>
        <script type="text/javascript" src="plugins/cycle.js"></script>
              <script type="text/javascript">
        	$(document).ready(function(){
				$('#slideshow').cycle({
					fx: 'fade',
					sleep: 3000,
					pager: '#pager'
				});
			});
        </script>
    </head>
    <body>
        <div id="box_geral">
            <?php
                include "topo.php";
                //include "tema.php";
                include "navegator.php";
                include "menuinicio.php";
            ?>
                <div id="conteudo">
                     <div id="pagina">

                          <h1>Galeria de fotos</h1>
    
                          <div id="box_galeria">
                               <div id="slideshow">

                                    <?php
                                    require_once 'admin/Connections/conecta.php';
                                    $sql=("select * from fotos");
                                    $resultado=$con->banco->Execute($sql);
                                    while($registros = $resultado->FetchNextobject()){				
                                    ?>
        	
                                    <img src="<?php echo 'admin/uploads/fotos/'.$registros->FOTO_NOME;?>" />            
                                    <?php			
                                    }
                                    ?>
           
                                </div>
                                <span id="pager"></span>	
                           </div>
                      </div>
                </div>
               <?php
               include "rodape.php";               
               ?> 
        </div>      
    </body>
</html>