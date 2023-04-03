<?php 
   // @session_start();     
   // if(isset($_SESSION['cpf'])and isset($_SESSION['senha']) and isset($_SESSION['nivel'])){
   //     if ($_SESSION['nivel']=='admin'){
   //         echo "<meta http-equiv='refresh' content='0;URL=usuadm.php'>";           
   //     }
   //     else if($_SESSION['nivel']=='usuario'){
   //         echo "<meta http-equiv='refresh' content='0;URL=usucom.php'>";
   //     }
   // }  
   // else {                
 ?>
<div id="pagina">
                <div id="pagina_login">
                    <form method="post" action="">
                        <h1>Login</h1><br />
                        <?php 
if(isset($_REQUEST['login'])){
    @session_start();
    if (($_REQUEST['usu_cpf'] != '') && ($_REQUEST['usu_senha'] != ''))
	{
	   //Verificação se foi digitado usuario e senha"
           $usu_cpf = $_REQUEST['usu_cpf'];
           $texto_senha = $_REQUEST['usu_senha'];
	   
	   $tamanho_senha = strlen($texto_senha);
	   //alerta avisando a tamanho maximo da senha;
	   if ($tamanho_senha > 50)
	   {
	      alerta("O tamanho máximo da senha é de 20 caracteres");
		  voltar();
		  exit;
	   }
	   //SQL Injection
	   $texto_senha = trim($texto_senha);

           $texto_senha = str_replace("=","",$texto_senha);
	   $texto_senha = str_replace("*","",$texto_senha);
	   $texto_senha = str_replace("drop","",$texto_senha);	   
	   $texto_senha = str_replace("insert","",$texto_senha);
	   $texto_senha = str_replace("--","",$texto_senha);	   
   	   $texto_senha = str_replace("'","",$texto_senha);
	   $texto_senha = str_replace(" or ","",$texto_senha);	   
	   $texto_senha = str_replace("delete","",$texto_senha);	   
  	   $texto_senha = addslashes($texto_senha);
	   
           /*Validação do Usuário e a senha; a senha está usando criptografia  
           caso aconteça algum erro verificar a seguinte classe usuarios_classe.php*/
           
	   $sql = "select * from usuarios WHERE USU_CPF = '$usu_cpf' and USU_SENHA = '".md5($texto_senha)."'";
	   $resultado = $con->banco->Execute($sql);
	   if($registro = $resultado->FetchNextObject())
	   {
                  
	          //Session de para verificar qual usuario está logado
                  //session_register('codigo');
		  echo $_SESSION['codigo'] = $registro->USU_CODIGO;
                  //session_register('cpf');
                  echo $_SESSION['cpf'] = $registro->USU_CPF;
                  //session_register('nome');
		  echo $_SESSION['nome'] = $registro->USU_NOME;
                  //session_register('senha');
                  echo $_SESSION['senha'] = $registro->USU_SENHA; 
                  //session_register('nivel');
                  echo $_SESSION['tipo_usuario'] = $registro->FKTDU_CODIGO;
                  
                  echo $nivel=$_SESSION['nivel'] = $registro->USU_NIVEL;
				  
                  
                  
                  
                  if ($nivel=='admin'){
                      header('Location:usuadm.php');
                      //echo "OK";
                      //echo "<meta http-equiv='refresh' content='0;URL=usuadm.php'>";
                  }
                  else if($nivel=='usuario'){
                      header('Location:usucom.php');
                      //echo "<meta http-equiv='refresh' content='0;URL=usucom.php'>";

                  }else{
                      header('Location:index.php');
                      //echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
                  }
                  
	   }
	   else
	   {
               echo alerta('Você digitou o usuário ou a senha invalida! Ou você ainda não está cadastrada');
	      //require('erroaologar.php');// está é uma classe de funções.php
	      //  exit;
	   }
	}
	else
            echo alerta('Você não digitou o nome do usuário ou a senha!');
            ////require 'Connections/funcoes.php';//usando a função isolada.
            //require('errousersenha.php');//está é uma classe de funções.php
            }

?>
                        <?php
      
                        ?>                      
                        <label class="login_label1">CPF:<input id="sprytextfield2" class="input_200_2" type="text" name="usu_cpf" /></label>
                        <label class="login_label2">Senha :<input class="input_200_2" type="password" name="usu_senha" /></label>                                 
                        <input class="btn" type="submit" name="login"value="Acessar" />
                        
                        
                        <p class="login_link"><a href="index.php?p=recuperarsenha">Esqueceu sua senha! Recuperar agora</a> </p>
                        <br />
                        <script type="text/javascript">
                            var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                        </script>
                        <hr />
                        <center>
                            <p>Instruções:</p>
                            <p>Se for seu primeiro acesso ao sistema, o seu login é o número do seu cpf, e a senha é 123456. </p>
                            </center>
    <br />
                    </form>
                </div>

</div>
<?php
//}
?>