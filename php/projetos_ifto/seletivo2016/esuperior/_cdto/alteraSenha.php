<?php
session_start();
require_once "../config/conectaBanco.php";
if (isset($_SESSION['inscricao_session']) && isset($_SESSION['cpf_session']) && isset($_SESSION['senha_session'])) {

  include_once "../config/verifica.php";
  if (verifica_inscricao() != 1){
      require $pagina_inicial;    
      exit;
  }

  $erro = '';
?>
  <?php include("header.php"); ?>
    <div id="ficha_inscricao" class="borda_radius">
      <div class="inscricao_box_interno">       
        <form method="post" action="alteraSenhaEnviar.php?go=passwd">
          <div class="inscricao_cabecalho"><img src="../img/cabecalho.jpg"></div>
          <div class="inscricao_rodape">
            <div style="text-align:right; width:620px; display:block">
                <div style="display:inline-block;">
                    <input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&raquo; Sair &laquo;" onClick='confirmar()'>
                </div>
            </div>
          </div>
          <div class="div_bloco_login">
            <fieldset class="borda_radius">
              <legend>&nbsp;Alterar Senha&nbsp;</legend>
              <p style="text-align: center; color:red; font-size: 12px; height:12px;"><?php echo $erro;?></p>
              <div class="div_linha" style="height:60px;">
                <div><label for="as_inscricao" style="font-size:14px; margin-left:25px;">N<sup>o</sup> Inscri&ccedil;&atilde;o:</label>
                  <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="as_inscricao" id="as_inscricao" type="text" onkeypress='return SomenteNumero(event)'>
                </div>
              </div>
              <div class="div_linha" style="height:60px;">
                <div><label for="as_senha_old" style="font-size:14px; margin-left:25px;">Senha Atual:</label>
                  <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="as_senha_old" id="as_senha_old" type="password">
                </div>
              </div>
              <div class="div_linha" style="height:60px;">
                <div><label for="as_senha1" style="font-size:14px; margin-left:25px;">Nova Senha:</label>
                  <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="as_senha1" id="as_senha1" type="password">
                </div>
              </div>
              <div class="div_linha" style="height:60px;">
                <div><label for="as_senha2" style="font-size:14px; margin-left:25px;">Repita a Nova Senha:</label>
                  <input style="width:250px; height:30px; margin-left:25px;" class="campos_form" name="as_senha2" id="as_senha2" type="password">
                </div>
              </div>
              <div class="div_linha" style="text-align:right;">
                <div>
                  <input type="submit" class="btn_prosseguir borda_radius" name="btnAlterar" id="btnAlterar" value="Alterar" />
                </div>
              </div>
            </fieldset>
          </div>  
        </form>
      </div>
    </div>
    <div class="div_voltar">
      <div style="text-align:left; width:620px;" class="div_linha">
        <div>
          <input type="button" class="btn_cancel borda_radius" name="btn_cancel" value="Cancelar" onClick="history.go(-1)">
        </div>
      </div>
    </div>
    
  </body>
  </html>
<?php 
} else {
  echo "<meta http-equiv='refresh' content='0, url=./'>";
}
?>

<script type="text/javascript">
function SomenteNumero(evt){
    var tecla=(window.event)?event.keyCode:evt.which; 
    if((tecla>47 && tecla<58)) return true;
    else{
      if (tecla==8 || tecla==0 || tecla==13) return true;
      else  return false;
    }
  }
  function confirmar(){
        var confirma = confirm('Tem certeza que deseja sair?');
        if (confirma) {
            document.location.href = 'logout.php?go=out';
        }
    }
</script>