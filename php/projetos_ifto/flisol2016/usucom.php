<?php 
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="icon" href="FAVICOM.gif" type="image/gif" />
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen"/>
        <script src="plugins/jquery-1.5.js" type="text/javascript"> </script>
        <script src="plugins/jquery.meio.mask.js" type="text/javascript"> </script>
        <script src="plugins/SpryValidationTextField.js" type="text/javascript"></script>
        <script src="plugins/SpryValidationSelect.js" type="text/javascript"></script>
        <link href="plugins/SpryValidationTextField.css" rel="stylesheet" type="text/css">
		<script src="plugins/SpryValidationRadio.js" type="text/javascript"></script>
        <link href="plugins/SpryValidationRadio.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="plugins/jcarousellite.js"></script>
        <script type="text/javascript">
        	$(document).ready(function(){
				$('#slideshow').cycle({
					fx: 'fade',
					sleep: 3000,
					pager: '#pager'
				});
			});
        </script>      
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


<script type="text/javascript">
 	$().ready(function(){
		$('input[name="cpf"]').setMask('cpf'); //  para cpf	
		$('input[name="usu_data_nasc"]').setMask('date'); // data
                $('input[name="usu_telefone"]').setMask('phone');
                $('input[name="usu_celular"]').setMask('phone');
                $('input[name="usu_cep"]').setMask('cep');
</script>
<script type="text/javascript">
 	})
	
	function replaceAll(string, token, newtoken) { // ???
	while (string.indexOf(token) != -1) {
		string = string.replace(token, newtoken);
	}
	return string;
}


function valida_cpf(obj){
	var numeros, digitos, soma, i, resultado, digitos_iguais;
	var cpf
	var valid
	cpf = obj.value
	cpf=replaceAll(cpf,'.',''); // tira os pontos
	cpf=replaceAll(cpf,'-',''); // tira o tra?o
	valid = obj;
	digitos_iguais = 1;
	if (cpf.length==0){
		alert("Nao deixe o campo vazio!");
		valid.focus();
		//valid.value="";
		return false;
	}
	if (cpf.length <11){
		alert("O CPF deve conter 14 d?gitos!");
		valid.focus();
		valid.value="";
		return false;
	}
	for (i = 0; i < cpf.length - 1; i++)
		if (cpf.charAt(i) != cpf.charAt(i + 1))	{
			digitos_iguais = 0;
			break;
		}
		if (!digitos_iguais){
			numeros = cpf.substring(0,9);
			digitos = cpf.substring(9);
			soma = 0;
			for (i = 10; i > 1; i--){
				soma += numeros.charAt(10 - i) * i;
				resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			}
			if (resultado != digitos.charAt(0)){
				alert("CPF inválido.");
				valid.focus();
				return false;
			}
			numeros = cpf.substring(0,10);
			soma = 0;
			for (i = 11; i > 1; i--){
				soma += numeros.charAt(11 - i) * i;
				resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			}
			if (resultado != digitos.charAt(1)){
				alert("CPF inválido.");
				valid.focus();
				return false;
			}
			return true;
		}else
		alert("CPF inválido.");
		valid.focus();
		return false;
		
}
 
 
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
        <title>.::Login::.</title>
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
                            echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a pcrtir do Menu Principcl.</font>'; 
                        }
                        else {
                             include("navcom/$pc.php");
                        }                   
                    ?>
                 </div> 
            </div> 
          </div>
                <?php
                include "rodape.php";               
                ?> 
       
    </body>
</html>

        <?php
         }
         }
        ?>
