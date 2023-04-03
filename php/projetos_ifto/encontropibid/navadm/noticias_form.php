
<div id="pagina"> 
    <h1 class="titulo1">Cadastro de noticias</h1>
    <form class="formulario" method="post" action="usuadm.php?pa=noticias_acao&acao=gravar_incluir" enctype="multipart/form-data">                 
        <table>
            <tr>
    		<th class="th176t"> Titulo:</th>
                <td class="td800"><input class="input_800" type="text" name="not_titulo" /></td>
            </tr>
            <tr>
    		<th class="th176t"> Foto:</th>
                <td class="td800"><input class="input_800" type="file" name="img" /></td>
            </tr>
            <tr>
                <th class="th176t">Notícias:</th>
                <td class="td800"> <textarea  class="input_800" rows="10" cols="20" name="not_noticia" ></textarea></td>
           </tr>
        </table>
    	<input class="btn" type="submit" name="salvar" value="Publicar"/>
    </form>

 </div>

