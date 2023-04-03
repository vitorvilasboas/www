<div id="pagina">
                <div id="pagina_login">
                    <form method="post" action="">
                        <h1>Login</h1><br />
                        <?php 
if(isset($_POST['login'])){
    @session_start();
    if (($_POST['usu_cpf'] != '') && ($_POST['usu_senha'] != ''))
	{
	   //Verificação se foi digitado usuario e senha";
	   require "Connections/conecta.php";
           $usu_cpf = $_POST['usu_cpf'];
           $texto_senha = $_POST['usu_senha'];
	   
	   $tamanho_senha = strlen($texto_senha);
	   //alerta avisando a tamanho maximo da senha;
	   if ($tamanho_senha > 20)
	   {
	      alerta("O tamanho máximo da senha é de 20 caracteres");
		  voltar();
		  exit;
	   }
	   //SQL Injection
	   /*$texto_senha = trim($texto_senha);

           $texto_senha = str_replace("=","",$texto_senha);
	   $texto_senha = str_replace("*","",$texto_senha);
	   $texto_senha = str_replace("drop","",$texto_senha);	   
	   $texto_senha = str_replace("insert","",$texto_senha);
	   $texto_senha = str_replace("--","",$texto_senha);	   
   	   $texto_senha = str_replace("'","",$texto_senha);
	   $texto_senha = str_replace(" or ","",$texto_senha);	   
	   $texto_senha = str_replace("delete","",$texto_senha);	   
  	   $texto_senha = addslashes($texto_senha);*/
	   
           /*Validação do Usuário e a senha; a senha está usando criptografia  
           caso aconteça algum erro verificar a seguinte classe usuarios_classe.php*/
           
	   //$sql = "select * from integrante WHERE INT_CPF = '$usu_cpf' and INT_SENHA = '".base64_encode($texto_senha)."'";
           $sql = "select * from integrante WHERE INT_CPF = '$usu_cpf' and INT_SENHA = '".md5($texto_senha)."'";
	   $resultado = $con->banco->Execute($sql);
	   if($registro = $resultado->FetchNextObject())
	   {
		  $_SESSION['codigo'] = $registro->INT_CODIGO;
                  $_SESSION['cpf'] = $registro->INT_CPF;
		  $_SESSION['nome'] = $registro->INT_NOME;
                  $_SESSION['senha'] = $registro->INT_SENHA; 
                  $_SESSION['email'] = $registro->INT_EMAIL;                 
                  $_SESSION['curso'] = $registro->INT_CURSO;                 
                  $_SESSION['periodo'] = $registro->INT_PERIODO;
                  $_SESSION['int_eqp_codigo'] = $registro->INT_EQP_CODIGO;
                  
                  $nivel=$_SESSION['atribuicao'] = $registro->INT_ATRIBUICAO;
                  
                  if ($nivel=='admin'){
                      echo "<meta http-equiv='refresh' content='0;URL=usuadm.php'>";                 
                  }
                  else if($nivel=='Representante'){
                      //header('Location:usucom.php'); 
                      echo "<meta http-equiv='refresh' content='0;URL=usucom.php?pc=inscrever_eqp&acao=listar'>";
                  }else{
                      header('Location:index.php');
                  }
	   }
	   else
	   {
               echo '<div class="image_error">
                        <h3>Você digitou o usuário ou a senha invalida! Ou você ainda não está cadastrado</h3>  
                    </div>';
	      //require('erroaologar.php');// está é uma classe de funções.php
	      //  exit;
	   }
	}
	else
            echo '<div class="image_error">
                        <h3>Você não digitou o nome do usuário ou a senha!</h3>  
                    </div>';
            ////require 'Connections/funcoes.php';//usando a função isolada.
            //require('errousersenha.php');//está é uma classe de funções.php
            }

?>
                        <?php
      
                        ?>                      
                        <!--<label class="login_label1">Email :<input id="sprytextfield2" class="input_200_2" type="text" name="usu_email" /></label>-->
                        
                        <label class="login_label1">CPF :<input id="sprytextfield2" class="input_200_2" type="text" name="usu_cpf" /></label>
                        <label class="login_label2">&nbsp;&nbsp;Senha :<input class="input_200_2" type="password" name="usu_senha" /></label>                                 
                        <input class="btn" type="submit" name="login" value="Acessar" />
                        <br />
                        <hr />
                        <center><p><font color=#bb404d>Somente os acadêmicos representantes de turmas previamente cadastrados poderão efetuar login.</font></p></center>
                        <!--<div class="login_link">
                            <a href="index.php?p=inscricoes"><div class="cadastro"></div></a> 
                            <a href="index.php?p=recuperarsenha"><div class="recupera"></div></a>   
                        </div>-->
                        <script type="text/javascript">
                            var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                        </script>                      
                    </form>
                </div>

</div>






