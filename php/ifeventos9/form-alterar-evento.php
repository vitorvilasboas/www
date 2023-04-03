<?php
	if(isset($_SESSION["evento_alterar"])){
		$evento = $_SESSION["evento_alterar"];
		?>
		<form name="form-cad-participante" action="." method="POST">
	
			<input type="hidden" name="op" value="alterar-eventos"/>

			<input type="hidden" name="id" value="<?=$evento['eve_id']?>"/>

			<h2>Alteração de Cadastro de Evento</h2>
			<label for="cmp_titulo">Título: 
				<input type="text" name="cmp_titulo" value="<?=$evento['eve_titulo']?>" size="50pt"/>
			</label><br><br>
			
			<label for="cmp_area">Área: 
				<input type="text" name="cmp_area" value="<?=$evento['eve_area']?>" size="30pt"/>
			</label><br><br>
			
			<label for="cmp_dtinicio">Período: 
				<input type="text" name="cmp_dtinicio" value="<?=$evento['eve_dtinicio']?>"/> a
				<input type="text" name="cmp_dtfim" value="<?=$evento['eve_dtfim']?>"/>
			</label><br><br>

			<label for="cmp_nome">Responsável: 
				<input type="text" name="cmp_nome" value="<?=$evento['eve_responsavel']?>" size="50pt"/>
			</label><br><br>

			<label for="cmp_tipo">Tipo: 
				<input type="text" name="cmp_tipo" value="<?=$evento['eve_tipo']?>" size="50pt"/>
			</label><br><br>

			<label for="cmp_local">Local: 
				<input type="text" name="cmp_local" value="<?=$evento['eve_local']?>" size="50pt"/>
			</label><br><br>

			<label for="cmp_Endereco">Endereço: 
				<input type="text" name="cmp_endereco" value="<?=$evento['eve_endereco']?>" size="100pt"/>
			</label><br><br>

			<label for="cmp_vagas">Qtd. Vagas: 
				<input type="number" name="cmp_vagas" value="<?=$evento['eve_qtdvagas']?>" size="50pt"/>
			</label><br><br>
			
			<input type="submit" name="btn_alter_evento" value="Alterar"/>

		</form>
		<?php
	} else {
		?>
		<script type="text/javascript">
			alert("Por favor, selecione o evento a alterar!");
		</script>
		<?php
		echo '<meta http-equiv="refresh" content="0; url=index.php?op=listar-eventos" />';
	}
?>