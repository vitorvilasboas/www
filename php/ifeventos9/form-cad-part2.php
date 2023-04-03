<form name="form-cad-participante2" action="." method="POST">
	
<input type="hidden" name="cmp_nome" value="<?php echo $_POST['cmp_nome'];?>"/>

<input type="hidden" name="cmp_cpf" value="<?php echo $_POST['cmp_cpf'];?>"/>

	<input type="hidden" name="op" value="cad-form-part3"/>

	<h2>Cadastro de Participante - Parte 2</h2>
	<label for="cmp_dtnasc">Data Nascimento: </label>
	<input type="date" name="cmp_dtnasc" value="" size="50pt"/>
	<br><br>
	
	<label for="cmp_graduacao">Graduação: </label>
	<input type="text" name="cmp_graduacao" value="" size="30pt"/>
	<br><br>
	
	<input type="submit" name="btn_cad_part" value="Próximo"/>


</form>