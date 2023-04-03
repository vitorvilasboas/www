
<?php
if(isset($_POST['login'])){
    @session_start();
    if (($_POST['usu_cpf'] != '') && ($_POST['usu_senha'] != ''))
	{
	   //Verificação se foi digitado usuario e senha";
           $usu_cpf = $_POST['usu_cpf'];
           $texto_senha = $_POST['usu_senha'];
	   
	   $tamanho_senha = strlen($texto_senha);
	   //alerta avisando a tamanho maximo da senha;
	   if ($tamanho_senha > 12){
	      msgfalha("A Quantidade de caracter excedeu o limite!", "O tamanho máximo da senha é de 12 caracteres!");
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
	   $senha = md5($texto_senha);
           /*Validação do Usuário e a senha; a senha está usando criptografia  
           caso aconteça algum erro verificar a seguinte classe usuarios_classe.php*/
           try{
            $con = conexao();
            $listar = $con->query("select * from usuarios WHERE USU_CPF = '$usu_cpf' and USU_SENHA = '$senha'");                        
            $listar->bindValue(':usu_cpf',$usu_cpf,PDO::PARAM_STR);
            $listar->bindValue(':usu_senha',$usu_senha,PDO::PARAM_STR);
            $listar->execute();
            
            if($listar->rowCount()>0){
                $dados = $listar->fetchAll(PDO::FETCH_ASSOC); 
                  //Session de para verificar qual usuario está logado
                  //session_register('codigo');
                  $_SESSION['codigo'] = $dados[0]['USU_CODIGO'];
                  //session_register('cpf');
                  $_SESSION['cpf'] = $dados[0]['USU_CPF'];
                  //session_register('nome');
                  $nome_user = explode(' ',$dados[0]['USU_NOME']);
		  $_SESSION['nome'] = $nome_user[0];
                  //session_register('senha');
                  $_SESSION['senha'] = $dados[0]['USU_SENHA']; 
                  //session_register('nivel');
                  $nivel=$_SESSION['nivel'] = $dados[0]['USU_NIVEL'];
                  
                  if ($nivel=='admin'){
			$ip = $_SERVER['REMOTE_ADDR'];
                        $ip_reverse = '';
                        $data = date('d/m/Y H:i:s');
                        //$sql_log = "insert into log_sistema (log_ip,log_hora,log_usuario,log_ip_reverse) values ('$ip','$data','".$_SESSION['codigo']."','$ip_reverse')";
                        //$resultado_log = $con->banco->Execute($sql_log);
                        //echo "<meta http-equiv='refresh' content='0;URL=index.php?p=home'>"; 
                        header('Location:index.php?p=home');
                  }
                  else if($nivel=='usuario'){
                        $ip = $_SERVER['REMOTE_ADDR'];
			$ip_reverse = '';
			$data = date('d/m/Y H:i:s');
			//$sql_log = "insert into log_sistema (log_ip,log_hora,log_usuario,log_ip_reverse) values ('$ip','$data','".$_SESSION['codigo']."','$ip_reverse')";
	                //$resultado_log = $con->banco->Execute($sql_log);
                        //echo "<meta http-equiv='refresh' content='0;URL=index.php?p=home'>";  
                        header('Location:index.php?p=home');
                  }else{
                      header('Location:index.php');
                  }
                  
	   }
	  else{
               msgfalha("Não é Possível Logar!", "O usuário não está cadastrado ou a senha é inválida!");
            ////require 'Connections/funcoes.php';//usando a função isolada.
            //require('errousersenha.php');//está é uma classe de funções.php
            }	

         }catch (PDOexcpetion $erro){
                    echo 'Erro : '.$erro->getMessage();	
         } 

    }else{
            msgfalha("Não é Possível Logar!", "Você deve informar o seu CPF e a sua Senha!");
   }                  
	
}
?>
<section>
    <div class="login">
        <form action="" method="post">           
            <div class="head_login">
                <p><img src="imagens/user_login.png" /></p>
                <h1>Acesso ao Sistema</h1>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto"> Login:* <img src="imagens/user.png"/></div>
                    <span id="cpf">
                        <div class="input_300">
                            <input type="text" name="usu_cpf" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>
                            <span class="textfieldInvalidFormatMsg">cpf inválido</span>    
                        </div>
                    </span>
                </label>
            </div>
            <div class="frm_800px">
                <label>
                    <div class="label_texto">Senha:* <img src="imagens/unlock.png"/></div>
                    <span id="senha">
                        <div class="input_300">
                            <input type="password" name="usu_senha" />
                        </div>
                        <div class="valid_msg">
                            <span class="textfieldRequiredMsg">Campo obrigatório.</span>   
                        </div>
                    </span>
                </label><br />
            </div>
            <div class="centralizar"><input class="botaorecuperar"  type="submit" name="login" value="Recuperar Senha" /><input class="botaologin"  type="submit" name="login" value="Entrar" /></div>

            <script type="text/javascript">
                var cpf = new Spry.Widget.ValidationTextField("cpf", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                var senha = new Spry.Widget.ValidationTextField("senha");
            </script>
        </form>
    </div>
</section>


