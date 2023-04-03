<?php 
@ob_start();
require("Connections/conecta.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen"/>
        <script src="plugins/jQuery.js" type="text/javascript"> </script>
        <script type="text/javascript" src="plugins/cycle.js"></script>
        <script src="plugins/jquery.meio.mask.js" type="text/javascript"> </script>
        <script src="plugins/SpryValidationTextField.js" type="text/javascript"></script>
        <script src="plugins/SpryValidationSelect.js" type="text/javascript"></script>
        <link href="plugins/SpryValidationTextField.css" rel="stylesheet" type="text/css">
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

        <title>CPA - IFTO/Araguatins</title>
    </head>
    <body>

        <div id="box_geral">
                <?php
                include "logout.php";
                include "topo.php";
                include "navegator.php";
                ?>
                <div id="conteudo">
                    <?php
                       foreach ($_REQUEST as $___opt => $___val) {
                            $$___opt = $___val;
                        }
                        if(empty($p)) {
                            include("layout/login.php");
                        }
                        elseif(substr($p, 0, 4)=='http' or substr($p, 0, 1)=="/" or substr($p, 0, 1)==".") 
                        {
                            echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a partir do Menu Principal.</font>'; 
                        }
                        else {
                             include("layout/$p.php");
                        }                   
                    ?>
                 </div>
                <?php
                include "rodape.php";               
                ?> 
        </div>
    </body>
</html>
