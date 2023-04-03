<?php
session_start();

require "verifica.php";
require "cabecalho.php";
require "../config/conectaBanco.php";

if (isset($_POST["diretorio"])){  
    $arquivo = $_FILES["arquivo"];
    if ($arquivo["error"] || $arquivo["size"] == 0 || $arquivo["tmp_name"] == NULL ||
        !move_uploaded_file($arquivo["tmp_name"], $_POST["diretorio"].$arquivo["name"])){
        $mensagem_arquivos = "Não foi possível enviar o arquivo para publicação.";
    }
    else{
            $mensagem_arquivos = "Arquivo enviado com sucesso!";
    }
}


?>
      <h2 style="text-align:center; color: #cc0000;">ADMINISTRAÇÃO</h2>    
        <form name="up" method="post" action="up.php" enctype="multipart/form-data">	  		
        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
        	<legend align=center class="text_medio_caps_color">ENVIAR ARQUIVO</legend>
                <p align="left">
                <font color="#0000FF"><?php echo $mensagem_arquivos; ?></font>   <br>                    
                Diretorio: <input type="text" name="diretorio" value="" size="90" maxlenght="100"/><br>
                <input type="file" name="arquivo" id="arquivo" />
                <p align="center"><input class="botao" type="submit" name="submit" value="Enviar">
        </fieldset>
        </form>     
</center>
</body>
</html>
