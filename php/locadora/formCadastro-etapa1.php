<form name="cad-cliente" action="formCadastro-etapa2.php" method="POST">
	<h2>Cadastro de Cliente - Etapa 1</h2>
	
	<input type="hidden" name="operacao" value="cadastrar">
	
	<label for="cmp_nome">Nome: </label>
	<input type="text" name="cmp_nome" size="50px"><br><br>

	<label for="cmp_cidade">Cidade: </label>
	<input type="text" name="cmp_cidade" size="30px"><br><br>

	<input type="submit" name="btn_next" value="Próximo">

</form>