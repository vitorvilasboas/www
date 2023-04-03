

<?php 
require ('Connections/conecta.php');
@session_start();     
	 if((!$_SESSION['cpf'])&&(!$_SESSION['senha'])&&(!($_SESSION['nivel']))){

		 header('Location:index.php');
	 }
	 else
	 { 
             if($_SESSION['nivel']=='usuario'){
                 
	 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen">
        <script type="text/javascript" src="plugins/jQuery.js"></script>
        <script type="text/javascript" src="plugins/jcarousellite.js"></script>
              <script type="text/javascript">
                 $(function() {
                    $("#carousel").jCarouselLite({
                        btnNext: ".next",
                        btnPrev: ".prev",
                        auto:5000,
                        speed:1000,
                        visible:1
                        });
                 });

             </script>
<!-- TinyMCE -->
<script type="text/javascript" src="plugins/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,link,unlink,anchor,image,|,forecolor,backcolor",
		theme_advanced_buttons2 : "save,newdocument,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,tablecontrols,fullscreen",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",


		



		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
     <script src="plugins/SpryValidationRadio.js" type="text/javascript"></script>
     <link href="plugins/SpryValidationRadio.css" rel="stylesheet" type="text/css" />

        <title>Área Administrativa</title>
    </head>
    <body>
        <div id="box_geral">
                <?php
                include "logout.php";
                include "topo.php";
                include "menuusuario.php";
                
                ?>
               
                <div id="conteudo">
                    <?php
                       foreach ($_REQUEST as $___opt => $___val) {
                            $$___opt = $___val;
                        }
                        if(empty($pc)) {
                            include("navcom/home.php");
                        }
                        elseif(substr($pc, 0, 4)=='http' or substr($pc, 0, 1)=="/" or substr($pc, 0, 1)==".") 
                        {
                            echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a partir do Menu Principal.</font>'; 
                        }
                        else {
                             include("navcom/$pc.php");
                        }                   
                    ?>
                 </div> 
                <?php
                include "rodape.php";               
                ?> 
        </div>
    </body>
</html>

        <?php
         } 
         } 
        ?>
