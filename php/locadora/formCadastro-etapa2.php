
<form name="cad-cliente" action="operacao.php" method="POST">
	<h2>Cadastro de Cliente - Etapa 2</h2>

	<input type="hidden" name="operacao" value="<?= $_POST['operacao'] ?>">

	<input type="hidden" name="cmp_nome" value="<?= $_POST['cmp_nome'] ?>">

	<input type="hidden" name="cmp_cidade" value="<?= $POST_['cmp_cidade'] ?>">

	<label for="cmp_salario">Salario: </label>
	<input type="number" name="cmp_salario"><br><br>

	<input type="submit" name="btn_cadastrar" value="Cadastrar">

</form>