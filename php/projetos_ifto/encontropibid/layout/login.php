<?php 
    @session_start();     
    if(isset($_SESSION['cpf'])and isset($_SESSION['senha']) and isset($_SESSION['nivel'])){
        if ($_SESSION['nivel']=='admin'){
            echo "<meta http-equiv='refresh' content='0;URL=usuadm.php'>";           
        }
        else if($_SESSION['nivel']=='usuario'){
            echo "<meta http-equiv='refresh' content='0;URL=usucom.php'>";
        }
    }  
    else {                
 ?>
<div id="pagina">
                <div id="pagina_login">
                    <form method="post" action="">
                        <h1>Login</h1><br />
                        <?php 
if(isset($_POST['login'])){
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
		  $_SESSION['codigo'] = $registro->USU_CODIGO;
                  //session_register('cpf');
                  $_SESSION['cpf'] = $registro->USU_CPF;
                  //session_register('nome');
		  $_SESSION['nome'] = $registro->USU_NOME;
                  //session_register('senha');
                  $_SESSION['senha'] = $registro->USU_SENHA; 
                  //session_register('nivel');
                  $nivel=$_SESSION['nivel'] = $registro->USU_NIVEL;
                  
                  
                  if ($nivel=='admin'){
                      //echo "<meta http-equiv='refresh' content='0;URL=usuadm.php'>";
                      header('Location:usuadm.php');
                  }
                  else if($nivel=='usuario'){
                      //echo "<meta http-equiv='refresh' content='0;URL=usucom.php'>"; 
                      header('Location:usucom.php');

                  }else{
                      //echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
                      header('Location:index.php');
                  }
                  
	   }
	   else
	   {
               echo '<div class="image_error">
                        <h3>Você digitou o usuário ou a senha invalida! Ou você ainda não está cadastrada</h3>  
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
                        <label class="login_label1">CPF :<input id="sprytextfield2" class="input_200_2" type="text" name="usu_cpf" /></label>
                        <label class="login_label2">Senha :<input class="input_200_2" type="password" name="usu_senha" /></label>                                 
                        <input class="btn" type="submit" name="login"value="Acessar" />
                        <br />
                        <hr />
                        <div class="login_link">
                            <a href="index.php?p=inscricoes"><div class="cadastro"></div></a> 
                            <a href="index.php?p=recuperarsenha"><div class="recupera"></div></a>   
                        </div>
                            <br />
                        <script type="text/javascript">
                            var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                        </script>                      
                    </form>
                </div>

</div>

<?php
}
?>




