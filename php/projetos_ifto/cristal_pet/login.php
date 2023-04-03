<center>
    <form name="form_login" action="operacao.php" method="POST">
    	<input type="hidden" name="op" value="verifica_login"/>
        <h2>Acesso ao Sistema</h2><br><br>
        <label>Usuário:<br><input type="text" name="cmp_usuario"/></label><br>
        <label>Senha:<br><input type="password" name="cmp_senha"/></label><br><br>
        <input type="submit" name="entrar" value="Entrar"/><br>
    </form>
</center>