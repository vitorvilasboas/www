<?php
include 'topo.php';
require 'menu.php';

	$cpf = $_POST['cpf_pac'];
	$senha = $_POST['senha_pac'];
		$cpf_lucas = '040.317.371-06';$cpf_caio = '123.213.444-90';$cpf_vitor = '787.87.911-12';$cpf_taylla = '4848.765.98-32';
		$senha_lucas = '1111';$senha_caio = '9991';$senha_vitor = '9992';$senha_taylla = '9993';
		
		if($cpf == $cpf_lucas && $senha == $senha_lucas){
					echo '<meta http-equiv="refresh" content="0; url=res_lucas.php" />';
?>	
					<script type="text/javascript">
					alert("Bem vindo, aperte CTRL+P para imprimir");
				    </script>
<?php				
		}elseif($cpf == $cpf_caio && $senha == $senha_caio){
					echo '<meta http-equiv="refresh" content="0; url=res_caio.php" />';
?>			
					<script type="text/javascript">
					alert("Bem vindo, aperte CTRL+P para imprimir!");
				    </script>		
<?php					
		}elseif($cpf == $cpf_vitor && $senha == $senha_vitor){
					echo '<meta http-equiv="refresh" content="0; url=res_vitor.php" />';
?>
					<script type="text/javascript">
					alert("Bem vindo, aperte CTRL+P para imprimir");
				    </script>
<?php					
		}elseif($cpf == $cpf_taylla && $senha == $senha_taylla){
					echo '<meta http-equiv="refresh" content="0; url=res_taylla.php" />';		
?>					
					<script type="text/javascript">
					alert("Bem vindo, aperte CTRL+P para imprimir");
				    </script>

<?php
		}else{
?>			
					<script type="text/javascript">
					alert(" Seu CPF e/ou Senha incorreto(s).");
				    </script>
<?php
					
			echo '<meta http-equiv="refresh" content="0; url=index.php?op=home.php" />';
		}
		include 'rodape.php';
?>								
	
				
	
				