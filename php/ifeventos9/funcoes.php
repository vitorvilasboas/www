<?php
	session_start();
	
	function listar_eventos($conexao){
		$sql = "SELECT * FROM evento";

		$resultado = mysqli_query($conexao, $sql);//executa uma instrução sql

		?>
		<table class="table-striped table-bordered">
			<tr>
				<th><p class="text-center text-uppercase">ID</p></td>
				<th><p class="text-center text-uppercase">Título</p></td>
				<th><p class="text-center text-uppercase">Qtd Vagas</p></td>
				<th><p class="text-center text-uppercase">Área</p></td>
				<th><p class="text-center text-uppercase">Responsavel</p></td>
				<th></td>
				<th></td>
			</tr>
		<?php
			while( $linha = mysqli_fetch_assoc($resultado) ){
				?>
					<tr>
						<td><?=$linha['eve_id']?></td>
						<td><?=$linha['eve_titulo']?></td>
						<td><?=$linha['eve_qtdvagas']?></td>
						<td><?=$linha['eve_area']?></td>
						<td><?=$linha['eve_responsavel']?></td>
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
	
	function excluir_eventos($conexao,$id){
		$sql = "DELETE FROM evento WHERE eve_id={$id}";
		if(mysqli_query($conexao,$sql)){
			echo "<p class='alert alert-success'>Evento de código nº ".$id." foi excluido com sucesso!</p><br>";
			listar_eventos($conexao);
		} else {
			echo "<p class='alert alert-danger'>Falha ao excluir Evento de código nº ".$id."!</p><br>";
			listar_eventos($conexao);
		}
	}

	function select_alterar_eventos($conexao,$id){
		$sql = "SELECT * FROM evento WHERE eve_id={$id}";
		$evento = null;
		$resultado = mysqli_query($conexao, $sql);
		$evento = mysqli_fetch_assoc($resultado);
		return $evento;
	}

	function alterar_eventos($conexao,$id){
		$titulo = $_POST['cmp_titulo'];
		$area = $_POST['cmp_area'];
		$dtinicio = $_POST['cmp_dtinicio'];
		$dtfim = $_POST['cmp_dtfim'];
		$responsavel = $_POST['cmp_nome'];
		$tipo = $_POST['cmp_tipo'];
		$local = $_POST['cmp_local'];
		$endereco = $_POST['cmp_endereco'];
		$vagas = $_POST['cmp_vagas'];

		$sql = "UPDATE evento SET eve_titulo='{$titulo}',eve_area='{$area}',eve_dtinicio='{$dtinicio}',eve_dtfim='{$dtfim}',eve_responsavel='{$responsavel}',eve_tipo='{$tipo}',eve_local='{$local}',eve_endereco='{$endereco}',eve_qtdvagas='{$vagas}' WHERE eve_id={$id}";

		if(mysqli_query($conexao,$sql)){
			echo "<p class='alert alert-success'>Evento de código nº ".$id." foi alterado com sucesso!</p><br>";
			listar_eventos($conexao);
		} else {
			echo "<p class='alert alert-danger'>Falha ao alterar Evento de código nº ".$id."!</p><br>";
			listar_eventos($conexao);
		}
	}

	function inserir_eventos($conexao){
		$titulo = $_POST['cmp_titulo'];
		$area = $_POST['cmp_area'];
		$dtinicio = $_POST['cmp_dtinicio'];
		$dtfim = $_POST['cmp_dtfim'];
		$responsavel = $_POST['cmp_nome'];
		$tipo = $_POST['cmp_tipo'];
		$local = $_POST['cmp_local'];
		$endereco = $_POST['cmp_endereco'];
		$vagas = $_POST['cmp_vagas'];

		$sql = "INSERT INTO evento (eve_titulo, eve_area, eve_dtinicio, eve_dtfim, eve_responsavel, eve_tipo, eve_local, eve_endereco, eve_qtdvagas) VALUES ('{$titulo}','{$area}','{$dtinicio}','{$dtfim}','{$responsavel}','{$tipo}','{$local}','{$endereco}','{$vagas}')";

		if( $resultado = mysqli_query($conexao,$sql) ){
			echo "<p class='alert alert-success'>Evento Inserido com sucesso!</p></br>";
			listar_eventos($conexao);
		} else {
			echo "<p class='alert alert-danger'>Falha ao inserir o evento ".$titulo."</p></br>";
		}
		
		mysqli_close($conexao);
	}

	function verifica_login($usuario, $senha){
			$vet_usuarios = array('admin','vitor','abc','teste','adm');
			$vet_senhas = array('admin','vitor','abc','teste','adm');
			
			$encontrou_usuario = false;
			$encontrou_senha = false;
			
			for($cont_usu=0;$cont_usu<count($vet_usuarios);$cont_usu++){
				if( $usuario == $vet_usuarios[$cont_usu]){
					$encontrou_usuario = true;
				}
			}

			for($cont_sen=0;$cont_sen<sizeof($vet_senhas);$cont_sen++){
				if( $senha == $vet_senhas[$cont_sen]){
					$encontrou_senha = true;
				}
			}

			if($encontrou_usuario && $encontrou_senha){
				estabelecer_sessoes($usuario,$senha);
				msg_login(true);
			} else {
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

	function sair(){
		session_unset();
		session_destroy();
		header('location: index.php');
	}

	function exibe_evento(){
		echo "Título: ".$_POST['cmp_titulo'].'<br><br>';
		echo "Área: ".$_POST['cmp_area'].'<br><br>';
		echo "Data Inicio: ".$_POST['cmp_dtinicio'].'<br><br>';
		echo "Data Fim: ".$_POST['cmp_dtfim'].'<br><br>';
		echo "Nome: ".$_POST['cmp_nome'].'<br><br>';
		echo "Tipo: ".$_POST['cmp_tipo'].'<br><br>';
		echo "Local: ".$_POST['cmp_local'].'<br><br>';
		echo "Endereço: ".$_POST['cmp_endereco'].'<br><br>';
		echo "Qtd. vagas: ".$_POST['cmp_vagas'].'<br><br>';
	}

	
	
	/*$numeros = array();

	$numeros[0] = 3;

	$numeros[1] = 7;

	$numeros[] = 10;

	echo 'Size of: '.sizeof($numeros).'<br>';
	echo 'Count: '.count($numeros);

	for($cont=0;$cont<sizeof($numeros);$cont++){
		echo '<br>Valor da posicao '.$cont.' : '. $numeros[$cont];
	}*/

	
	
			/*foreach($vet_usuarios as $dado_posicao_usuario){
				if( $usuario == $dado_posicao_usuario){
					$encontrou_usuario = true;
				} 
			}
			foreach($vet_senhas as $dado_posicao_senha){
				if( $senha == $dado_posicao_senha){
					$encontrou_senha = true;
				} 
			}*/




/*

	function soma($n1,$n2){
		$soma = $n1 + $n2;
		return $soma;
	}

	$a = 2;
	$b = 5;
	
	$retorno = soma($a,$b);

	echo 'A soma eh: '.$retorno;

	function calc($n1,$n2,$op){
		$result;
		switch ($op) {
			case '+':
				$result= $n1 + $n2;
				break;

			case '-':
				$result= $n1 - $n2;
				break;

			case '*':
				$result= $n1 * $n2;
				break;

			case '/':
				$result= $n1 / $n2;
				break;
			
			default:
				break;


			return $result;
		}
	}

	$a = 2;
	$b = 5;
	$operacao = '/';
	echo 'O resultado eh: ';
	echo calc($a,$b,$operacao);

*/


?>