<div id="pagina">
    <div id="pagina_login">
        <form method="post" action="">
            <h1>Recuperar a senha</h1><br />
            <?php 
            if(isset($_POST['recuperar'])){
                if (($_POST['usu_cpf'] != '') && ($_POST['usu_email'] != '')){
                    //Verificação se foi digitado usuario e senha";
                    require "Connections/conecta.php";
                    $emailsender = "vilsonsoares@ifto.edu.br";
                    $fromName = "Vilson Soares de Siqueira";
                    $fromMail = "vilsonsoares@ifto.edu.br";
                    $usu_cpf = $_POST['usu_cpf'];
                    $usu_email = $_POST['usu_email'];
                    $usu_senha ='';
                    $texto = 'Recuperação de senha do Sistema de Eventos';
                    $contato = $usu_email;          

                    $header = 'MIME-Version: 1.1'."\r\n";
                    $header .= 'From: '.$fromName.'<'.$fromMail.'>'."\r\n";
                    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $header .= 'X-Mailer: PHP/' . phpversion ();
                    $header .= "Return-Path: " . $emailsender . "\r\n";;
                    $sql1 = "select * from usuarios WHERE USU_CPF = '$usu_cpf' and USU_EMAIL = '$usu_email'";
                    $resultado1 = $con->banco->Execute($sql1);
                    $registros1 = $resultado1->FetchNextObject();
                    if(!empty($registros1)){
                        //print_r($registros1);
                        $senha = geraSenha();
                        $msg = 'Assunto: O seu cpf é:<br />'
                        .$usu_cpf.'<br /><br />'.'E-mail:<br />'
                        .$usu_email.'<br /><br />Mensagem:<br />'
                        ."A sua senha é : $senha ";                         
                        //echo alerta($msg);
                        $email = mail($contato,$texto,$msg,$header,"-r". $emailsender); 
                        //print_r($email);
                        
                        if($email){
                            $sql2="update usuarios set USU_SENHA = '".md5($senha)."' where USU_CPF='$usu_cpf' and USU_EMAIL='$usu_email'";
                            $resultado2 = $con->banco->Execute($sql2);
                            echo '<div class="image_error">
                                <h3>A senha foi enviado para o seu e-mail!</h3>  
                            </div>';
                        }else{
                            '<div class="image_error">
                                <h3>Não foi enviado!</h3>  
                            </div>';
                        }
               
                    }else{
                        echo '<div class="image_error">
                                <h3>O e-mail ou CPF não foi encontrado ou você ainda não está cadastrado!</h3>  
                            </div>';
                    }
	        }else{
                    echo '<div class="image_error">
                             <h3>Você não digitou o CPF ou o seu e-mail!</h3>  
                         </div>';
                }
            }
?>
                    
            <label class="login_label1">CPF :<input id="sprytextfield2" class="input_200_2" type="text" name="usu_cpf" /></label>
            <label class="login_label2">E-mail :<input id="sprytextfield4"class="input_200_2" type="text" name="usu_email" /></label>                                 
            <input class="btn" type="submit" name="recuperar" value="Recuperar" />

            <p class="login_link"><a href="index.php?p=inscricoes">Ainda não sou cadastrado! Cadastre agora</a> </p>  
            <br />

            <script type="text/javascript">
                var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
            </script>
            <hr />
            <p style="padding:10px; color:red; text-align:justify;">
                 Obervação: A senha será enviada para o seu e-mail! <br />
                 Caso o e-mail não esteja na caixa de entrada, por favor verifique sua caixa de Spam! 
            </p>
        </form>
    </div>

</div>
