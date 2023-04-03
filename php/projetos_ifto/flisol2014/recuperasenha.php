<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>.::Login::.</title>
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen">
        <script src="../plugins/jquery-1.5.js" type="text/javascript"> </script>
<script src="../plugins/jquery.meio.mask.js" type="text/javascript"> </script>
<script src="plugins/SpryValidationTextField.js" type="text/javascript"></script>
<script src="plugins/SpryValidationSelect.js" type="text/javascript"></script>
<link href="plugins/SpryValidationTextField.css" rel="stylesheet" type="text/css"> 

<script type="text/javascript">
 	$().ready(function(){
		$('input[name="usu_cpf"]').setMask('cpf'); //  para cpf	
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
    </head>
    <body>
        <div id="box_geral">
                <?php
                require "topo.php";
                ?>
<br />
<div id="pagina">
                <div id="pagina_login">
                    <form method="post" action="">
                        <h1>Recuperar a senha</h1><br />
                        <?php 
if(isset($_POST['recuperar'])){
    if (($_POST['usu_cpf'] != '') && ($_POST['usu_email'] != '')){
	   //Verificação se foi digitado usuario e senha";
	   require "Connections/conecta.php";
           $usu_cpf = $_POST['usu_cpf'];
           $usu_email = $_POST['usu_email'];
           $texto = 'Recuperação de senha do site professorrodrigo.com';                    
           $headers = "From: rodrigocarvalhodias@hotmail.com" . "\r\n" . 
                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=utf-8\r\n" . 
                   "Content-Transfer-Encoding: 8bit\r\n\r\n";	
	   $sql = "select * from usuarios WHERE USU_CPF = '$usu_cpf' and USU_EMAIL = '$usu_email'";
	   $resultado = $con->banco->Execute($sql);
	   if($registros = $resultado->FetchNextObject()){
               $contato = $registros->USU_EMAIL;
               $msg = 'Assunto: O seu cpf é:<br />'
               .$contato.'<br /><br />'.'E-mail:<br />'
               .$usu_email.'<br /><br />Mensagem:<br />'
               ."A sua senha é : ".base64_decode($registros->USU_SENHA) ;
               
               mail($contato,$texto,$msg,$headers);
               echo '<div class="image_error">
                        <h3>A senha foi enviado para o seu e-mail!</h3>  
                    </div>';
                
               
	   }
	   else
	   {
               echo '<div class="image_error">
                        <h3>O e-mail ou CPF não foi encontrado ou você ainda não está cadastrado!</h3>  
                    </div>';
	   }
	}
	else
            echo '<div class="image_error">
                        <h3>Você não digitou o CPF ou o seu e-mail!</h3>  
                    </div>';
            }
?>
                        <?php
      
                        ?>                      
                        <label class="login_label1">CPF :<input id="sprytextfield2" class="input_200_2" type="text" name="usu_cpf" /></label>
                        <label class="login_label2">E-mail :<input id="sprytextfield4"class="input_200_2" type="text" name="usu_email" /></label>                                 
                        <input class="btn" type="submit" name="recuperar"value="Acessar" />
                        
                        <p class="login_link"><a href="index.php?p=inscricoes">Ainda não sou cadastrado! Cadastre agora</a> </p>  
                        <br />
                        
                        <script type="text/javascript">
                            var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                            var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
                        </script>
                        <hr />
                        <p style="padding:10px; color:red; text-align:justify;">
                             Obervação: A senha será enviada para o seu e-mail. 
                        </p>
                    </form>
                </div>

             </div>     
              <br />
        </div>
                <?php 
                require "rodape.php";               
                ?> 
       </div>
    
    </body>
</html>



