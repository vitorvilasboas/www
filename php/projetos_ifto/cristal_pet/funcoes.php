<?php
	session_start();
	
	function cadastro_animal($conexao){
		$sql = "SELECT * FROM animal";

		$resultado = mysqli_query($conexao, $sql);//executa uma instrução sql

		?>
		<table class="table-striped table-bordered">
			<tr>
				<th><p class="text-center text-uppercase">ID</p></td>
				<th><p class="text-center text-uppercase"> Nome do Proprietario</p></td>
				<th><p class="text-center text-uppercase"> Nome do Animal</p></td>
				<th><p class="text-center text-uppercase">Idade</p></td>
				<th><p class="text-center text-uppercase">Tipo<p></td>
			    <th><p class="text-center text-uppercase">Sexo<p></td>
			    <th><p class="text-center text-uppercase">Serviços<p></td>


				<th></td>
				<th></td>
			</tr>
		<?php
			while( $linha = mysqli_fetch_assoc($resultado) ){
				?>
					<tr>
						<td><?=$linha['ani_id']?></td>
						<td><?=$linha['ani_proprietario']?></td>
						<td><?=$linha['ani_animal']?></td>
						<td><?=$linha['ani_idade']?></td>
						<td><?=$linha['ani_tipo']?></td>
						<td><?=$linha['ani_sexo']?></td>
                        <td><?=$linha['ani_sexo']?></td>
                        <td><?=$linha['ani_servicos']?></td>

						<td><a href="index.php?op=selecionar-alterar-eventos&id=<?=$linha['eve_id']?>">Alterar</a></td>
						<td><a href="index.php?op=excluir-eventos&id=<?=$linha['eve_id']?>">Excluir</a></td>
					</tr>
				<?php
			}
		?>
		</table>
		<?php
		mysqli_close($conexao);
	}

	function verifica_login($usuario, $senha){

        	$ousuario= array('joao','maria','thais','matheus','felipe');
			$asenha=array('12345','0009','2333','777','2222');
			$acesso_usuario=false;
			$acesso_senha=false;

			for($cont=0;$cont<sizeof($ousuario);$cont++){
				if ($usuario == $ousuario[$cont]){
					$acesso_usuario = true;
				}
			}
			for($cont=0;$cont<sizeof($asenha);$cont++){
				if ($senha == $asenha[$cont]) {
						$acesso_senha=true;
				}	
				
			}

			if($acesso_usuario && $acesso_senha ){
				estabelecer_sessoes($usuario,$senha);
				msg_login(true);
			} else{
				msg_login(false);
			}
	}

	function msg_login($valido){
		if($valido == true){
			?>
				<script type="text/javascript">
					alert("Bem vindo, Voce sera direcionado a pagina inicial!");
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Usuario e/ou senha incorreto(s).");
				</script>
			<?php
		}
		
		echo '<meta http-equiv="refresh" content="0; url=index.php" />';
	}

	function estabelecer_sessoes($u, $s){
		$_SESSION['usuario'] = $u;
		$_SESSION['senha'] = $s;
	}

	function selecao(){
		$conexao = conexaoBD();
		
		$sql = "SELECT * FROM animal";
		
		$resultado = mysqli_query($conexao, $sql);
		
		$qtd_registros = mysqli_num_rows($resultado); 
		
		//selecao_obter_registros($resultado);
		selecao_while($resultado);
		//selecao_for($qtd_registros,$resultado);
		//selecao_while_vetor($resultado);

		mysql_close($conexao);
	}


   function sair(){
		session_unset();
		session_destroy();
		header('location: index.php');
	}

?>