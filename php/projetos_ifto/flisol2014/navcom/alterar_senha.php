
<div id="pagina">
    <h1 class="titulo1">Alterar senha</h1>
    <form class="formulario" action="usucom.php?pc=usuarios_acao&acao=gravar_alterar_senha" method="post">
            <table>
                <tr>
                    <th class="th276t">Senha atual</th>
                    <td class="td700">
                        <input type="password" name="senha_atual" />
                    </td>              
                </tr>
                <tr>
                    <th class="th276t">Nova Senha</th>
                    <td class="td700">
                        <input type="password" name="nova_senha" />
                    </td>              
                </tr>
                <tr>
                    <th class="th276t">Repetir a Senha</th>
                    <td class="td700">
                        <input type="password" name="repetir_senha" />
                    </td>              
                </tr>
            </table>
            <input class="btn" type="submit" name="enviar" value="Alterar Senha"> 
            
       <center><a href="javascript:history.back();">Voltar</a></center>
   </form>
</div>