<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
    require "cabecalho.php";
    require "../config/conectaBanco.php";
    $mensagem_avisos = "";
    $mensagem_arquivos = "";
    if (isset($_POST["texto_aviso"])){
        $SQL = $SQL."INSERT INTO avisos (data_aviso, texto_aviso) VALUES ('".
                date("Y-m-d")."', '".$_POST["texto_aviso"]."')";
        $resultado = mysql_query($SQL);
        
        if ($resultado == true){
            $mensagem_avisos = "Aviso publicado com sucesso!";
        }
        else{
            $mensagem_avisos = "Não foi possível publicar o aviso.";
        }
    }

    if (isset($_POST["titulo_arquivo"])){  
        $arquivo = $_FILES["arquivo"];
        if ($arquivo["error"] || $arquivo["size"] == 0 || $arquivo["tmp_name"] == NULL ||
            !move_uploaded_file($arquivo["tmp_name"], "../docs/".$arquivo["name"])){
            $mensagem_arquivos = "Não foi possível enviar o arquivo para publicação.";
        }
        else{
            $SQL = "INSERT INTO arquivos (data_arquivo, titulo_arquivo, nome_arquivo) VALUES 
                ('".date("Y-m-d")."', '".$_POST["titulo_arquivo"]."', '".$arquivo["name"]."')";
            $resultado = mysql_query($SQL);

            if ($resultado == true){
                $mensagem_arquivos = "Arquivo publicado com sucesso!";
            }
            else{
                $mensagem_arquivos = "Não foi possível publicar o arquivo.";
            }                
        }
    }


    ?>
          <h2 style="text-align:center; color: #cc0000;">ADMINISTRA&Ccedil;&Atilde;O</h2><br>
            <form name="situacao_sistema" method="post" action="publicar.php">	  		
            <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
            	<legend align=center class="text_medio_caps_color">PUBLICAR AVISO</legend>
                    <p align="left">
                    <font color="#0000FF"><?php echo $mensagem_avisos; ?></font>   <br>
                    Data: <?php echo date("d/m/Y"); ?><br><br>
                    Texto:<br>
                    <textarea name="texto_aviso" rows="4" cols="70"></textarea>
                    <br><br>
                    <p align="center"><input class="botao" type="submit" name="submit" value="Enviar">
            </fieldset>
            </form>
          
            <form name="situacao_sistema" method="post" action="publicar.php" enctype="multipart/form-data">	  		
            <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
            	<legend align=center class="text_medio_caps_color">PUBLICAR ARQUIVO PARA DOWNLOAD</legend>
                    <p align="left">
                    <font color="#0000FF"><?php echo $mensagem_arquivos; ?></font>   <br>                    
                    Data: <?php echo date("d/m/Y"); ?><br><br>
                    T&iacute;tulo: <input type="text" name="titulo_arquivo" value="" size="90" maxlenght="100"/><br><br>
                    <input type="file" name="arquivo" id="arquivo" /><br><br>
                    <p align="center"><input class="botao" type="submit" name="submit" value="Enviar">
            </fieldset>
            </form>     
    </center>
    </body>
    </html>
<?php
}
?>
