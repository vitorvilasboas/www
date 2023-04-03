<form name="form-cad-evento2" action="index.php?op=cadastro3" method="POST">
	<h2>Cadastro de Evento - Parte 2</h2>

	<input type="hidden" name="cmp_titulo" 
		value="<?php echo $_POST['cmp_titulo'];?>" />

	<input type="hidden" name="cmp_area" 
		value="<?php echo $_POST['cmp_area'];?>" />

	<input type="hidden" name="cmp_dtinicio" 
		value="<?php echo $_POST['cmp_dtinicio'];?>" />

	<input type="hidden" name="cmp_dtfim" 
		value="<?php echo $_POST['cmp_dtfim'];?>" />

	<label for="cmp_nome">Responsavel: </label>
	<input type="text" name="cmp_nome" value="" size="50pt"/>
	<br><br>
	
	<input type="submit" name="btn_cad_evento" value="Próximo"/>

</form>