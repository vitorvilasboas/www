<?php

if(isset($_GET["acao"])){
  switch($_GET["acao"]){
    case "cartao_resposta":
        require "selecao_curso_cartao_resposta.php";
    exit;
    case "folha_redacao":
        require "selecao_curso_folha_redacao.php";
    exit;    
    case "sistema":
        require "situacao_sistema.php";
    exit;        
  }
}


session_start();
if(!isset($_SESSION["idusuarios"]) || !isset($_SESSION["nome_usuario"]))// Verifica se existe os dados da sessão de login
{   
    header("Location: form_login.php");// Usuário não logado! Redireciona para a página de login
    exit;
} else {

require "../config/confGlobais.php";

unset($_SESSION["SQL"]);
unset($_SESSION["ordem"]);

require "cabecalho.php";

?>
      <h2 style="text-align:center; color: #cc0000;">ADMINISTRA&Ccedil;&Atilde;O</h2><br>
        <form name="relatorioInscricao" method="post" action="relatorioInscricao.php">	  		
          <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
          	<legend align=center class="text_medio_caps_color">INSCRI&Ccedil;&Otilde;ES</legend>
              <table width="600" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td><input type="radio" name="mao" value="canhotos" style="vertical-align: middle">Canhotos</td>
                        <td><input type="radio" name="mao" value="destros" style="vertical-align: middle">Destros</td> 
                        <td><input type="radio" name="mao" value="todos" checked=true style="vertical-align: middle">Todos</td>
                      </tr>
                      <tr>
                        <td><input type="radio" name="cota_esc_pub" value="sim" style="vertical-align: middle">Cotistas</td>
                        <td><input type="radio" name="cota_esc_pub" value="nao" style="vertical-align: middle">Ampla Concorr&ecirc;ncia</td> 
                        <td><input type="radio" name="cota_esc_pub" value="todos" checked=true style="vertical-align: middle">Todos</td>
                      </tr>    
                      <tr>
                        <td><input type="radio" name="inscricoes" value="deferidas" style="vertical-align: middle">Deferidas</td>
                        <td><input type="radio" name="inscricoes" value="nao_deferidas" style="vertical-align: middle">N&atilde;o Deferidas</td>
                        <td><input type="radio" name="inscricoes" value="todas" checked=true style="vertical-align: middle">Todas</td>
                      </tr>
                    </table>
                    <br>              
                    <table>
                      <tr>
                        <td>Curso:</td>
                        <td>
                          <select size="1" name="curso" class="combo" style="font-size: 12px; width: 490px">
                              <option value="todos">Todos</option>
                              <?php
                                require "../config/conectaBanco.php";
                                $sql = "SELECT cod_cur, nome_cur, turno_cur FROM cursos ORDER BY nome_cur ASC";
                                $query = mysql_query($sql);

                                WHILE ($sql = mysql_fetch_array($query)){
                                      $cod_cur = $sql["cod_cur"];
                                      $nome_cur = $sql["nome_cur"];
        							                $turno_cur = $sql["turno_cur"];

                                      echo "<option value=\"$cod_cur\">$nome_cur - $turno_cur</option>\n";
                                }
                              ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Buscar por:</td>
                        <td><input class="caixa" name="chave_busca" style="font-size: 12px; width: 490px;" type="text" maxlength="100" onKeyUp="converteMaiuscula(this)"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
				          <td class="text_align_center" height="40"><input class="botao" type="submit" name="submit" value="Buscar"></td>
                </tr>
              </table>
          </fieldset>
		    </form>
        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
		      <legend align=center class="text_medio_caps_color">RELAT&Oacute;RIO GERAL DE INSCRI&Ccedil;&Otilde;ES</legend>
          <?php require "relatoriogeral.php"; ?>
		    </fieldset>
    </center>
  </body>
</html>
<?php
}
?>