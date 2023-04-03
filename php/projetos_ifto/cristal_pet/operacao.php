
<?php
  	//session_start();
	include 'funcoes.php';
	include 'conexaoBD.php';
	if( isset( $_REQUEST['op'] ) ){//existe o parametro op??
		//se existe...
		if( $_REQUEST['op'] == 'home'){//...o valor de op=home??
			require_once 'home.php';//se op=home, inclui home.php 
		} else if ($_REQUEST['op'] == 'animal'){
			require_once 'form-cadastro.php';	
		} else if ($_REQUEST['op'] == 'form-cadastro2'){
			require_once 'form-cadastro2.php';
		} else if ($_REQUEST['op'] == 'listar-eventos'){
			require_once 'conexaoBD.php';
			cadastro_animal(conectaBD());
				
		} else if ($_REQUEST['op'] == 'verifica_login'){
			//echo 'ghjgjhj';
			$usuario = $_POST["cmp_usuario"];
			$senha=$_POST["cmp_senha"];
			

			/*$sql="SELECT * FROM usuario WHERE usu_usuario='{$usuario}' AND usu_senha='{$senha}'";
			$conecta=conectaBD();
			$resultado=mysqli_query($conecta,$sql);
			if(mysqli_num_rows($resultado)){*/
			if($usuario = 'admin' && $senha == '123456'){
				$_SESSION['usuario'] = $usuario;
				$_SESSION['senha'] = $senha;
				?>
				<script type="text/javascript">
					alert("Bem vindo, Voce sera direcionado a pagina inicial!");
				</script>
				<?php

				echo '<meta http-equiv="refresh" content="0; url=index.php?op=home" />';
			} else {
				?>
				<script type="text/javascript">
					alert("Usuario e/ou senha incorreto(s).");
				</script>
				<?php
				echo '<meta http-equiv="refresh" content="0; url=index.php" />';
			}

	    }else if ($_REQUEST['op'] == 'sair'){
			sair();	
			
        }  else {
			echo '<meta http-equiv="refresh" content="0; url=index.php" />'; //redireciona para a		
    	}
    }	

    
		
			
	
?>