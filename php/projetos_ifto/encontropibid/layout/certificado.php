<div id="pagina">
    <form class="formulario" action="index.php?p=ver_participacao" width="845" heigth="595" method="post">
        <h1 class="titulo1">Certificado</h1>
        <table class="tabelas">
            <tr>
                <th class="th276t">CPF:* </th><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="cpf" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">cpf inválido.</span></span></td>
            </tr>
       
       </table>
       <script type="text/javascript">
                var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
      </script>
      <input class="btn" type="submit" name="emitir" value="Visualizar">
      
    </form>
</div>
    

