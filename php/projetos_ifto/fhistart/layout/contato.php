<div id="pagina">    
   <h1 class="titulo1">Fale Conosco</h1>
   <?php 
if(isset($_POST['contato_site'])){
    
        require'Connections/config.php';
	
	$email_nome   = strip_tags(trim($_POST['email_nome']));
	$email_email  = strip_tags(trim($_POST['email_email']));
	$email_msg    = strip_tags(trim($_POST['email_msg']));
	$email_data   = date('Y-m-d H:i:s');
	$email_status = 'pendente';
	$cod_data   = date('d-H-i');
	$email_cod    = $cod_data.'-'.$email_email;
	
	$sql_emailcontato = "SELECT email_cod FROM email WHERE email_cod = :email_cod";
	
	try{
		$query_emailcontato = $conecta->prepare($sql_emailcontato);
		$query_emailcontato->bindValue(':email_cod',$email_cod,PDO::PARAM_STR);
		$query_emailcontato->execute();
		
		$cont_email = $query_emailcontato->rowCount(PDO::FETCH_ASSOC);		
		
		}catch (PDOexcpetion $error_emailcontado){
		  echo 'Erro ao selecionar o codigo do email';	
		}
		
		
if($cont_email >= '1'){
     echo '<div class="image_error">Por favor aguarde algúns minutos para enviar uma nova mensagem! Obrigado!</div><!--envaido-->';
}else{
	
	$sql_enviaemail  = "INSERT email (email_nome, email_email, email_msg, email_data, email_status, email_cod) ";
	$sql_enviaemail .= "VALUES ('$email_nome', '$email_email', '$email_msg', '$email_data', '$email_status', '$email_cod')";
	
	try{
		$query_cadastraContato = $conecta->prepare($sql_enviaemail);
		$query_cadastraContato->bindValue(':email_nome',$email_nome,PDO::PARAM_STR);
		$query_cadastraContato->bindValue(':email_mail',$email_email,PDO::PARAM_STR);
		$query_cadastraContato->bindValue(':email_Msg',$email_msg,PDO::PARAM_STR);
		$query_cadastraContato->bindValue(':email_data',$email_data,PDO::PARAM_STR);
		$query_cadastraContato->bindValue(':email_status',$email_status,PDO::PARAM_STR);
		$query_cadastraContato->bindValue(':email_cod',$email_cod,PDO::PARAM_STR);
		$query_cadastraContato->execute();
		
		echo '<div class="image_error">Seu e-mail foi enviado com sucesso! Responderemos em breve!</div><!--envaido-->';
		
		}catch(PDOexception $error_enviaemail){
		  'Erro ao enviar seu e-mail, favor tente mais tarde ou nos informe pelo suporte@vilsonsoares.com';
		}
	
  }
}?>
    
     <div class="contato_texto">
         <h1 class="titulo1">Contatos</h1>
     <h2 class="titulo2">Telefones:</h2>

    <p>
    (xx63) - XXXX XXXX<br />
    Quitéria Alcântara
    </p>
    
    <h2 class="titulo2">Local de reliazação do Evento</h2>

    <p>
    Povoado Santa Tereza Km 05<br />
    Araguatins - TO<br />
    Zona Rural<br />
    Cep: 77.950-000<br />
    Fone:(63)3474-4800<br />
    </p>
    
    <h2 class="titulo2">E-mail:</h2>

    <p>
    quiterialcan@hotmail.com
   </p>


     </div><!--fecha anuncies-->
   
  
     <div class="contato_form">
     <h1 class="titulo1">Envie uma mensagem!</h1>
     <form  method="post" action="" enctype="multipart/form-data">
        <label>Nome:
          <input class="input_600"type="text" name="email_nome" />
        </label>       
        <label>E-mail:
          <input class="input_600" type="text" name="email_email" />
        </label>           
        <label>Mensagem:
          <textarea class="input_600" name="email_msg" rows="5"></textarea>
        </label>         
          <input type="submit" name="contato_site" value="Fale conosco" class="btn" />
            
     </form>
     </div>

</div><!--fecha pagina-->    
     
