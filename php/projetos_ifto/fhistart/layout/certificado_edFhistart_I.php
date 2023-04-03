<div id="pagina">
    <form class="formulario" action="ver_certificado_edFhistart.php?&opcao=part_evento&edicao=I&ano=2011" target="_blank" width="845" heigth="595" method="post">
        <h1 class="titulo1">Certificado I FHISTART</h1>
        <table class="tabelas">
            <tr>
                <th class="th276t">CPF:* </th><td class="td700"><span id="sprytextfield2"><input class="input_200" type="text" name="cpf" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">cpf inválido.</span></span></td>
            </tr>
            <!--
            <tr>
                <th class="th276t">Nascimento:* </th><td class="td700"><span id="sprytextfield5"><input class="input_200" type="text" name="usu_data_nasc" /><span class="textfieldRequiredMsg">Campo obrigatório.</span><span class="textfieldInvalidFormatMsg">data inválido.</span></span></td>
            </tr>
            -->
       </table>
       <script type="text/javascript">
                var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, pattern:"000.000.000-00"});
                var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
      </script>
      <input class="btn" type="submit" name="emitir" value="Visualizar">
      
    </form>
</div>
    

