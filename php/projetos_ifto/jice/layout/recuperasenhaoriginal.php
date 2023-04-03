<div id="pagina">
    <?php
if(isset($_POST['recuperar'])){
    if (($_POST['usu_cpf'] != '') && ($_POST['usu_email'] != '')&&
            ($_POST['usu_nome'] != '')&&($_POST['usu_data_nasc'] != '')
            &&($_POST['usu_celular'] != '')){
	   //Verificação se foi digitado usuario e senha";
	   require "Connections/conecta.php";
           $usu_cpf = $_POST['usu_cpf'];
           $usu_email = $_POST['usu_email'];
           $usu_cpf = $_POST['usu_cpf'];
           $usu_nome = $_POST['usu_nome'];
           $usu_data_nasc = $_POST['usu_data_nasc'];
           $usu_celular = $_POST['usu_celular'];
	   $sql = "select * from usuarios WHERE USU_CPF = '$usu_cpf' and USU_EMAIL = '$usu_email' and USU_NOME='$usu_nome' and USU_CELULAR='$usu_celular' and USU_DATA_NASC='$usu_data_nasc'";
	   $resultado = $con->banco->Execute($sql);
	   if($registros = $resultado->FetchNextObject()){
                         
               
               $sql="update usuarios set USU_SENHA = '".md5('123456')."' where USU_CPF='$usu_cpf' and USU_EMAIL='$usu_email'";
               $resultado = $con->banco->Execute($sql);
               echo '<div style="text-align:center;">
                        <h3>A senha foi alterada com sucesso!<br />
                        A sua nova senha é : 123456<br />
                        Para sua segurança altere a senha no
                        primeiro acesso.
                        </h3>  
                    </div>';
               
               
	   }
	   else
	   {
               echo '<div class="image_error">
                        <h3>Os seus dados não foram encontrados ou você ainda não está cadastrado!</h3>  
                    </div>';
	   }
	}
	else
            echo '<div class="image_error">
                        <h3>Você não digitou seus dados!</h3>  
                    </div>';
            }
?>
                <div id="pagina_login">
                    <form method="post" action="">
                        <h1>Recuperar a senha</h1><br />

                                             
                        <label class="login_label1">CPF :<input id="sprytextfield2" class="input_200_2" type="text" name="usu_cpf" /></label>
                        <label class="login_label2">E-mail :<input id="sprytextfield4"class="input_200_2" type="text" name="usu_email" /></label>                                 
                        <label class="login_label1">Nome :<input id="sprytextfield5" class="input_200_2" type="text" name="usu_nome" /></label>
                        <label class="login_label1">Data Nasc :<input id="sprytextfield6" class="input_200_2" type="text" name="usu_data_nasc" /></label>
                        <label class="login_label1">Telefone :<input id="sprytextfield7" class="input_200_2" type="text" name="usu_celular" /></label>
                        
                        <input class="btn" type="submit" name="recuperar"value="Recuperar" />
                        
                        <p class="login_link"><a href="index.php?p=inscricoes">Ainda não sou cadastrado! Cadastre agora</a> </p>  
                        <br />
                        <p>Se você não conseguir recuperar a sua senha. Entre em<br />
                             contato com o e-mail: vilsonsoares@gmail.com
                        </p>  
                        <br />
                        <script type="text/javascript">
                            var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                            var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
                            var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");    
                            var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
                            var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "phone_number", {format:"phone_custom", useCharacterMasking:true, pattern:"(00) 0000-0000"});    
                        </script>
                        <hr />
                        
                    </form>
                </div>

</div>

