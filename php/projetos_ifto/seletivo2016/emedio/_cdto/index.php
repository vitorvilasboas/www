<?php 
session_start();
if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
    echo "<meta http-equiv='refresh' content='0, url=../'>";
} else {
    require "../config/confGlobais.php";
    require "../config/conectaBanco.php";
    include_once "../boletoVI.php";
    $dtn_logado = isset($_SESSION['dtnascimento_logado'])?date('d/m/Y',strtotime(str_replace('-','/',$_SESSION['dtnascimento_logado']))):'00/00/0000';
    $dti_logado = isset($_SESSION['dtinscricao_logado'])?date('d/m/Y',strtotime(str_replace('-','/',$_SESSION['dtinscricao_logado']))):'00/00/0000';
?>
    <?php include("header.php"); ?>
    <div id="ficha_inscricao" class="borda_radius">
        <div class="inscricao_box_interno">
            <div class="inscricao_cabecalho"><img src="../img/cabecalho.jpg"></div>
            
            <div class="inscricao_cabecalho"><p>&Aacute;REA DO CANDIDATO</p></div>

            <?php
            include_once "../config/verifica.php";
            if (verifica_sistema() == 0) { //verifica se o sistema está fora do ar
            ?>
                <div class="div_dados">
                    <fieldset class="borda_radius"><p><?php echo $texto_manutencao; ?></p></fieldset>
                </div>
            <?php
            } else { 
            ?>
                <div class="div_dados">
                    <fieldset class="borda_radius">
                        <div class="div_linha_dados">
                            <div><label>N<sup>o</sup> Inscri&ccedil;&atilde;o:</label><span><?php echo $_SESSION['inscricao_session']; ?></span></div>
                            <div class="recuo60l"><label>Data da Inscrição:</label><span><?php echo $dti_logado; ?></span></div>
                            <div class="recuo60l"><label>Status:</label>
                                <?php if(!$_SESSION['insc_deferida_logado']) { ?>
                                        <span style="color:#CC0000; font-weight:400;"> <?php echo "AGUARDANDO PAGAMENTO"; ?></span>
                                <?php } else { ?>
                                        <span style="color:#338B3D; font-weight:400;"> <?php echo "INSCRIÇÃO CONFIRMADA"; ?></span>
                                <?PHP } ?>
                            </div>
                        </div>
                        <div class="div_linha_dados">
                            <div><label>Nome:</label><span><?php echo $_SESSION['nome_logado']; ?></span></div>
                            <div class="recuo25l"><label>CPF:</label><span><?php echo $_SESSION['cpf_session']; ?></span></div>
                            <div class="recuo25l"><label>Data de Nascimento:</label><span><?php echo $dtn_logado; ?></span></div>
                        </div>
                        <div class="div_linha_dados">
                            <div><label>N<sup>o</sup> do RG:</label><span><?php echo $_SESSION['rg_logado']; ?></span></div>
                            <div class="recuo25l"><label>&Oacute;rg&atilde;o Expedidor (RG):</label><span><?php echo $_SESSION['rgorg_logado']; ?></span></div>
                            <div class="recuo25l"><label>UF (RG):</label><span><?php echo $_SESSION['rguf_logado']; ?></span></div>
                        </div>
                        <div class="div_linha_dados">
                            <div><label>Nome da M&atilde;e:</label><span><?php echo $_SESSION['mae_logado']; ?></span></div>
                        </div>
                        <div class="div_linha_dados">
                            <div><label>Op&ccedil;&atilde;o de Curso:</label><span><?php echo $_SESSION['curso_logado']; ?></span></div>
                        </div>
                        <div class="div_linha_dados" style="height: 70px;">
                            <div><label>Pol&iacute;tica Afirmativa:</label><span><?php echo $_SESSION['polafirmativa_logado']; ?></span></div>
                        </div>
                        <div class="div_linha_dados">
                            <div><label>Lateralidade Dominante:</label><span><?php echo $_SESSION['lateralidade_logado']; ?></span></div>
                        </div>
                        <div class="div_linha_dados">
                            <div><label>Voc&ecirc; necessita de atendimento especial para realizar a prova?</label><span><?php if($_SESSION['atespec_logado'] == 'S') echo 'SIM'; else echo 'N&Atilde;O'; ?></span></div>
                        </div>
                        <?php
                        if ($_SESSION['atespec_logado'] == "S"){
                            $desateesp_can = nl2br($_SESSION['atespecdesc_logado']);
                            echo "<div class=\"div_linha_dados\">
                                    <div><label>Descri&ccedil;&atilde;o de como dever&aacute; ser o atendimento especial para realiza&ccedil;&atilde;o da prova:</label><span>$desateesp_can</span></div>
                                  <div>";
                        }
                        ?>
                    </fieldset>
                </div>
                <div class="div_dados">
                    <fieldset class="borda_radius">
                        <div class="div_linha_dados">
                            <div><label>Endereço:</label>
                                <span><?php echo $_SESSION['logradouro_logado'].', '.$_SESSION['numero_logado'].', '.$_SESSION['bairro_logado'].', '.$_SESSION['cidade_logado'].'-'.$_SESSION['uf_logado'].', CEP: '.$_SESSION['cep_logado']; ?></span>
                            </div>
                        </div>
                        <div class="div_linha_dados">
                            <div><label>Telefones:</label><span><?php echo $_SESSION['fone1_logado']; ?> <?php if($_SESSION['fone2_logado'] != '') echo ' / '.$_SESSION['fone2_logado']; ?></span></div>
                            <div class="recuo25l"><label>E-mail:</label><span><?php echo $_SESSION['email_logado']; ?></span></div>
                        </div>
                    </fieldset>
                </div>
                <div class="div_menu">
                    <div style="text-align:center; width:620px;" class="div_linha">
                        <?php
                            include_once "../config/verifica.php";
                            if (verifica_boleto()) {
                                if(!$_SESSION['insc_deferida_logado']) {
                        ?>
                                    <div class="div_boleto"><?php formulario_boleto($_SESSION['inscricao_session']); ?></div>
                        <?php   } else {    ?>
                                    <div class="div_boleto"><a href=geraCartao.php><input type="button" class="btn_cartao borda_radius" name="btn_gerar_cartao" value="GERAR CARTÃO DE ACESSO"><!--<img src="../img/cartao_acesso.png" />--></a></div>
                        <?php   }
                            } 
                        ?>
                    </div>
                    <div style="text-align:center; width:620px;" class="div_linha_op2">    
                        <div style="margin-right:0px;"><a href="alteraSenha.php"><input type="button" class="btn_alterar borda_radius" name="btn_alterar_senha" value="ALTERAR SENHA"></a></div>
                        <?php if (verifica_alteracao_inscricao()) {  ?>
                                <div style="margin-left:10px;"><a href="alteraInscricao.php"><input type="button" class="btn_alterar borda_radius" name="btn_alterar_senha" value="ALTERAR DADOS DA INSCRIÇÃO"></a></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="div_bloco" style="margin-bottom:10px;">
                    <p style="font-weight:400">Você pode alterar os dados de sua inscrição até as 23h59min do dia 06 de Novembro de 2015.</p>
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
                                        echo    "<div class='div_linha_dados' style='margin-left:15px;'>
                                                    <span>".$linha["texto_aviso"]."</span> <!--<span style='color:#BCBCBC; font-weight:300;'> (em ".$data_aviso." )-->
                                                </div>";
                                    }
                                ?>      
                        <?php } ?>
                </div>
                <hr>
                <div class="div_arquivos">
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
                                        echo    "<div class='div_linha_dados' style='margin-left:15px;'>
                                                    <span><a href='../docs/".$linha["nome_arquivo"]."' target='_blank'>".$linha["titulo_arquivo"]."</span> 
                                                    <span style='color:#BCBCBC; font-weight:300;'> ( ".$data_arquivo." )</span></a>
                                                </div>";
                                    }
                                ?>           
                        <?php } ?>
                </div>
            <?php 
            } // fim ELSE verifica_sistema
            ?>
            <div class="inscricao_rodape">
                <div style="text-align:right; width:620px; display:block">
                    <div style="display:inline-block;">
                        <input type="button" class="btn_voltar borda_radius" name="btn_voltar" value="&raquo; Sair &laquo;" onClick='confirmar()'>
                    </div>
                </div>
            </div>
            <div style="margin-top:20px;" class="inscricao_rodape">
                <div style="text-align:center; width:620px; " class="div_linha_rodape">
                    <span style="font-size: 14px; font-weight:400; color:#708090;">Comissão:</span>
                    <span style="font-size: 14px; font-weight:400; color: #3A5C3D; ">(63) 3474-4822</span>
                    <span style="font-size: 14px; font-weight:400; color:#708090;">&nbsp;|&nbsp; </span>
                    <span style="font-size: 14px; font-weight:400; color: #3A5C3D; ">seletivoaraguatins@ifto.edu.br</span>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
}
?>
<script language="javascript">
    function confirmar(){
        var confirma = confirm('Tem certeza que deseja sair?');
        if (confirma) {
            document.location.href = 'logout.php?go=out';
        }
    }
</script>


