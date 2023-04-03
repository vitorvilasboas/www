
<div id="pagina"> 
    <h1 class="titulo1">Cadastro de projetos</h1>
    <form  class="formulario"method="post" action="usuadm.php?pa=projetos_acao&acao=gravar_incluir" enctype="multipart/form-data">    
        <table class="tabelas">
            <tr>                                 
                <input type="hidden" name="proj_codigo" />               
    		<th class="th176t"> Titulo:</th>
                <td class="td800"><input class="input_800" type="text" name="proj_titulo" /></td>
            <tr/>
            <tr>
    		<th class="th176t"> Foto:</th>
                <td class="td800"><input class="input_800" type="file" name="proj_foto" /></td>
            <tr/>
            <tr>
                <th class="th176t"> Descrição:</th>
                <td class="td800"><textarea class="input_800" rows="15" cols="60" name="proj_texto" ></textarea></td>
            </tr>
        </table>
    	<input class="btn" type="submit" name="salvar" value="Publicar"/>
    </form>

 </div>

