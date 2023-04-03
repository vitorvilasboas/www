<form name="form-cad-evento" action="index.php?op=cadastro2" method="POST">
	<h2>Cadastro de Evento - Parte 1</h2>
	<label for="cmp_titulo">Título: </label>
	<input type="text" name="cmp_titulo" value="" size="50pt"/>
	<br><br>
	
	<label for="cmp_area">Área: </label>
	<input type="text" name="cmp_area" value="" size="30pt"/>
	<br><br>
	
	<label for="cmp_dtinicio">Período: </label>
	<input type="date" name="cmp_dtinicio" value=""/> a
	<input type="date" name="cmp_dtfim" value=""/>
	<br><br>
	
	<input type="submit" name="btn_cad_evento" value="Próximo"/>

</form>