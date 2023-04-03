<form name="prematricula_form" action="comando.php?p=premat_salvar" method="POST">
	
    <input type="hidden" name="p" value="premat_salvar"/>

    <h4>Pré-matrícula do Aluno Ingressante</h4>
    <label for="cmp_nome">Nome: </label>
    <input type="text" name="cmp_nome" value="" size="50pt"/>
    <br><br>

    <label for="cmp_cpf">CPF: </label>
    <input type="text" name="cmp_cpf" value="" size="30pt"/>
    <br><br>

    <input type="submit" name="btn_prematricular" value="Enviar"/>


</form>