<?php
session_start();
require "config/confGlobais.php";
require "config/conectaBanco.php";

if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {

    if(isset($_SESSION['nome_session']) || isset($_SESSION['cpfcand_session']) || isset($_SESSION['lateralidade_session'])){
        unset($_SESSION['nome_session']);
        unset($_SESSION['cpfcand_session']);
        unset($_SESSION['dtnascimento_session']);
        unset($_SESSION['rg_session']);
        unset($_SESSION['rgorg_session']);
        unset($_SESSION['rguf_session']);
        unset($_SESSION['mae_session']);
        unset($_SESSION['curso_session']);
        unset($_SESSION['polafirmativa_session']);
        unset($_SESSION['lateralidade_session']);
        unset($_SESSION['atespec_session']);
        unset($_SESSION['atespecdesc_session']);
        session_destroy();
    }
?>
    <?php include("header.php"); ?>
        <div id="ficha_inscricao" class="borda_radius">
            <div class="inscricao_box_interno">       
                <div class="inscricao_cabecalho">
                  <img src="img/cabecalho.jpg">
                </div>
                <?php
                include_once "config/verifica.php";
                if (verifica_sistema() == 0) { //verifica se o sistema está fora do ar
                ?>
                    <div class="div_dados"><p><?php echo $texto_manutencao; ?></p></div>
                <?php
                } else {
                ?>
                    <div class="div_inicio">
                            <?php   if (verifica_inscricao() == 0) {     ?>
                                        <span style="color:#505050">INSCRIÇÕES: de 28/09 à 30/10/2015</span>
                                        <?php /*echo date("d/m/Y", $data_inicio_inscricoes);*/?>  
                            <?php   } else if (verifica_inscricao() == 1) {      ?>
                                        <span style="color:#003333;">INSCRIÇÕES ABERTAS</span>
                                        <div class="div_inicio_botao">
                                            <a href="preInscricaoI.php"><input type="button" class="btn_inscrever borda_radius" name="btn_alterar_senha" value="INSCREVA-SE AQUI"></a>
                                        </div>
                            <?php   } else {    ?>
                                        <span>INSCRIÇÕES ENCERRADAS</span>   
                            <?php   }   ?>
                        <br><div style="text-align:center; width:620px;" class="div_linha_op1">
                            <?php   if (verifica_consulta_inscricao()) {      ?>
                                        <div class="div_boleto"><a href="login.php"><input type="button" class="btn_area borda_radius" name="btn_alterar_senha" value="ÁREA DO CANDIDATO"></a></div>
                            <?php   }   ?>
                        </div>
                    </div>
                    <div class="div_avisos">
                            <?php
                                $SQL = "select * from avisos order by data_aviso desc";
                                $resultado_avisos = mysql_query($SQL);
                                $num_avisos = mysql_num_rows($resultado_avisos);
                                if ($num_avisos){
                            ?>        
                                    <!--<div class="div_linha_dados"><label>Avisos:</label></div>-->
                                    <?php
                                        for ($i = 0; $i < $num_avisos; $i++){
                                            $linha = mysql_fetch_array($resultado_avisos);
                                            $data_aviso = date("d/m/Y", strtotime($linha["data_aviso"]));
                                            echo    "<div class='div_linha_dados_op1' style='margin-left:10px;'>
                                                        <span>- ".$linha["texto_aviso"]."</span> <!--<span style='color:#BCBCBC; font-weight:300;'> (em ".$data_aviso." )-->
                                                    </div>";
                                        }
                                    ?>      
                            <?php } ?>
                    </div>
                    <div class="div_arquivos" style="margin-bottom:20px;">
                            <?php
                                $SQL = "select * from arquivos order by data_arquivo desc";
                                $resultado_arquivos = mysql_query($SQL);
                                $num_arquivos = mysql_num_rows($resultado_arquivos);
                                if ($num_arquivos){
                            ?>
                                    <div class="div_linha_dados"><label>Documentos Importantes:</label></div>
                                    <?php
                                        for ($i = 0; $i < $num_arquivos; $i++){
                                            $linha = mysql_fetch_array($resultado_arquivos);
                                            $data_arquivo = date("d/m/Y", strtotime($linha["data_arquivo"]));
                                            echo    "<div class='div_linha_dados_op1' style='margin-left:5px; margin-top:0px;'>
                                                        <span>- <a href='docs/".$linha["nome_arquivo"]."' target='_blank'>".$linha["titulo_arquivo"]."</span> 
                                                        <span style='color:#BCBCBC; font-weight:300;'> ( ".$data_arquivo." )</span></a>
                                                    </div>";
                                        }
                                    ?>           
                            <?php } ?>
                    </div>
                    <?php 
                    } // fim ELSE verifica_sistema
                    ?>
                    <hr> 
                    <div  class="inscricao_rodape">
                        <div style="text-align:center; width:620px; " class="div_linha_rodape">
                            <span style="font-size: 14px; font-weight:400; color:#708090;">Comissão:</span>
                            <span style="font-size: 14px; font-weight:400; color: #3A5C3D; ">(63) 3474-4822</span>
                            <span style="font-size: 14px; font-weight:400; color:#708090;">&nbsp;|&nbsp; </span>
                            <span style="font-size: 14px; font-weight:400; color: #3A5C3D; ">seletivoaraguatins@ifto.edu.br</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div_voltar">
                <div style="text-align:left; width:620px;" class="div_linha">
                  <div>
                    <a href="<?php echo "../"; ?>"><input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&laquo; Voltar &laquo;"></a>
                  </div>
                </div>
            </div>
        </body>
    </html>
<?php 
} else {
    echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
}
?>