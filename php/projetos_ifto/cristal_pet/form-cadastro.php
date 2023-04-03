<form name="form-cadastro-ani" action="." method="POST">
	
<input type="hidden" name="op" value="form-cadastro2"/>
  
	<h2>Cadastro de Animal</h2>
  <br>
	<label for="cmp_dono">Nome do proprietário: </label>
	<input type="text" name="cmp_dono" value="" size="40pt"/>
	<br><br>
	
	<label for="cmp_nome_ani">Nome do Animal: </label>
	<input type="text" name="cmp_nome_ani" value="" size="30pt"/>
	<br><br>

  <label for="cmp_idade">Idade: </label>
  <input type="text" name="cmp_idade" value="" size="20pt"/>
  <br><br>
 
  <label for="cmp_tipo" >Tipo:</label>
      <select name="cmp_tipo">
        <option value="Tipo de Animal">Tipo de Animal</option>
        <option value="Gato">Gato</option>
        <option value="Cachorro">Cachorro</option>
      </select>     
     
  <label for="cmp_sexo">Sexo:</label>
     <select name="cmp_sexo" id="sexo"s>
        <option>Selecione...</option>
        <option value="F" >Fêmea</option>
        <option value="M" >Macho</option>
     </select>  

     <br><br> 

  <label for="cmp_servico">Serviços:</label>
      <select name="cmp_servico" id="servico">
        <option>Selecione...</option>
        <option value="Serviços estéticos e de bem estar">Serviços estéticos e de bem estar</option>
        <option value="Serviços Veterinário">Serviços Veterinário</option>
     </select>  
   
	<br><br>
	
	<input type="submit" name="btn_cad_part" value="Enviar"/>

</form>