<form name="form-cad-participante2" action="." method="POST">
<h2>Cadastro de Participante - Parte 3</h2>	

<input type="hidden" name="op" value="cad-form-part4"/>

<input type="hidden" name="cmp_nome" value="<?php echo $_POST['cmp_nome'];?>"/>

<input type="hidden" name="cmp_cpf" value="<?php echo $_POST['cmp_cpf'];?>"/>

<input type="hidden" name="cmp_dtnasc" value="<?php echo $_POST['cmp_dtnasc'];?>"/>

<input type="hidden" name="cmp_graduacao" value="<?php echo $_POST['cmp_graduacao'];?>"/>

	

	<label for="cmp_endereco">Endereço: </label>
	<input type="text" name="cmp_endereco" value="" size="50pt"/>
	<br><br>
	
	<label for="cmp_cidade">Cidade: </label>
	<input type="text" name="cmp_cidade" value="" size="30pt"/>
	<br><br>

	<label for="cmp_uf">UF: </label>
	<input type="text" name="cmp_uf" value="" size="30pt"/>
	<br><br>
	
	<input type="submit" name="btn_cad_part" value="Próximo"/>


</form>