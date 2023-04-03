<?php
//if (!isset($_SESSION['inscricao_session']) && !isset($_SESSION['cpf_session']) && !isset($_SESSION['senha_session'])) {
    function formulario_boleto($cod_can){
        require "config/confGlobais.php";
        require "config/conectaBanco.php";
        $sql = "select can_cpf, can_nome, can_inscricao from candidatos where can_inscricao = ".$cod_can;
        $resultado = mysql_query($sql);
        $linha = mysql_fetch_array($resultado);   
?>
        <form method="post" action="https://consulta.tesouro.fazenda.gov.br/gru/gerarHTML.asp" target="_blank">
            <input name="codigo_favorecido" type="hidden" value="<?php echo $codigo_favorecido_gru; ?>" size="8" maxlength="6" readonly="readOnly" />
            <input name="gestao" type="hidden" id="gestao" value="<?php echo $gestao_gru; ?>" size="6" maxlength="5" readonly="readOnly" />
            <input name="nome_favorecido" type="hidden" id="nome_favorecido" style="FONT-WEIGHT: bold" value="<?php echo $nome_favorecido_gru; ?>" size="60" maxlength="45" />
            <input name="codigo_correlacao" type="hidden" id="codigo_correlacao" value="<?php echo $codigo_correlacao_gru; ?>" />
            <input name="vencimento" type="hidden" id="vencimento" value="<?php echo $data_vencimento_gru; ?>" />
            <input name="cnpj_cpf" type="hidden" id="cnpj_cpf" value="<?php echo $linha['can_cpf']; ?>" />
            <input name="nome_contribuinte" type="hidden" id="nome_contribuinte" value="<?php echo $linha['can_nome']; ?>" />
            <input name="codigo_recolhimento" type="hidden" id="codigo_recolhimento" value="<?php echo $codigo_recolhimento_gru; ?>" />
            <input name="nome_recolhimento" type="hidden" id="nome_recolhimento" value="<?php echo $nome_recohimento_gru; ?>" maxlength="45" />
            <input name="referencia" type="hidden" id="referencia" value="<?php echo $linha['can_inscricao']; ?>" />
            <input name="competencia" type="hidden" id="competencia" value="<?php echo $competencia_gru ?>" />
            <input name="boleto" type="hidden" value="3" />
            <input name="valorPrincipal" type="hidden" id="valorPrincipal" value="<?php echo $valor_inscricao; ?>" />
            <input name="valorTotal" type="hidden" id="valorTotal" value="<?php echo $valor_inscricao; ?>" />
            <input name="descontos" type="hidden" id="descontos" />
            <input name="deducoes" type="hidden" id="deducoes" />
            <input name="multa" type="hidden" id="multa" />
            <input name="juros" type="hidden" id="juros" />
            <input name="acrescimos" type="hidden" id="acrescimos" />
            <input name="impressao" type="hidden" value="SA" />
            <input name="pagamento" type="hidden" value="1" />
            <input name="campo" type="hidden" value="CR" />
            <input name="ind" type="hidden" value="0" />
            <input class="btn_boleto borda_radius" type="submit" value="GERAR BOLETO BANC&Aacute;RIO"/>
        </form> 
<?php    
    }
//} else {
 //   echo "<meta http-equiv='refresh' content='0, url=./_cdto/'>";
//}
?>
