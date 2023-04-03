<h1>teste de e-mail </h1>
<?php
           $texto = 'Recuperação de senha do site professorrodrigo.com';                    
           $headers = "From: vilsonsoares@gmail.com" . "\r\n" . 
                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=utf-8\r\n" . 
                   "Content-Transfer-Encoding: 8bit\r\n\r\n";	

               $contato = 'vilsonsoares@ifto.edu.br';
               $msg = 'Assunto: O seu cpf é:<br />'
               .$contato.'<br /><br />'.'E-mail:<br />'
               .$usu_email.'<br /><br />Mensagem:<br />'
               ."A sua senha é : ".md5($registros->USU_SENHA) ;
               
               $email = mail($contato,$texto,$msg,$headers);
			   if($email){
               echo '<div class="image_error">
                        <h3>A senha foi enviado para o seu e-mail!</h3>  
                    </div>';
                }else{
                    echo '<div class="image_error">
                        <h3>Não foi enviado!</h3>  
                    </div>';
                }
  
?>
  



