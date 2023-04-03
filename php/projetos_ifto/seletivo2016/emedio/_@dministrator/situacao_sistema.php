<?php
session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {
    require "../config/verifica.php";
    require "../config/confGlobais.php";
    require "cabecalho.php";
    $mensagem = "";
    if (isset($_POST["no_ar_sistema"])){
        $SQL = "UPDATE sistema SET no_ar_sistema=".$_POST["no_ar_sistema"]." WHERE idsistema=".$codigo_sistema;
        require "../config/conectaBanco.php";
        $resultado = mysql_query($SQL);
        
        if ($resultado == true){
            $mensagem = "Sistema autalizado com sucesso.";
        }
        else{
            $mensagem = "Não foi poss&iacute;vel atualizar o sistema.";
            
        }
    }


    if (verifica_sistema()){
        $on_line = "checked=true";
        $manutencao = "";
        $mensagem = $mensagem." O sistema est&aacute; on-line.";
    }
    else{
        $on_line = "";
        $manutencao = "checked=true";    
        $mensagem = $mensagem." O sistema est&aacute; em manuten&ccedil;&atilde;o."; 
    }

    ?>
          <h2 style="text-align:center; color: #cc0000;">ADMINISTRA&Ccedil;&Atilde;O</h2><br>
            <form name="situacao_sistema" method="post" action="situacao_sistema.php">	  		
            <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
            	<legend align=center class="text_medio_caps_color">SITUA&Ccedil;&Atilde;O DO SISTEMA</legend>
                    <p align="left">
                    <font color="#0000FF"><?php echo $mensagem; ?></font><br><br>                   
                    <input type="radio" name="no_ar_sistema" value="1" style="vertical-align: middle" <?php echo $on_line; ?>>Sistema on-line<br>
                    <input type="radio" name="no_ar_sistema" value="0" style="vertical-align: middle" <?php echo $manutencao; ?>>Sistema em manuten&ccedil;&atilde;o<br></p>

                    <p align="center"><input class="botao" type="submit" name="submit" value="  Atualizar  ">
                        

            </fieldset>
    		</form>
    </center>
    </body>
    </html>
<?php
}
?>
