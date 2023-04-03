<?php
session_start();
require "verifica.php";
require "../config/confGlobais.php";
require "../config/conectaBanco.php";

if (isset($_POST["cancelar"])){
    if ($_POST["cancelar"] == "Sim"){
        $SQL = "delete from candidatos where cod_can = ".$_POST["inscricao"];
        $resultado_cancelar = mysql_query($SQL, $conectar);
    }
    require "relatorioInscricao.php";
    exit;    
}

$SQL = "select nome_can, cod_can, cpf_can, curso_1.nome_cur, curso_1.turno_cur, 
        curso_2.nome_cur, curso_2.turno_cur, part_cota, deferido
        from candidatos, cursos as curso_1, cursos as curso_2 
        where opccur_can_1 = curso_1.cod_cur and opccur_can_2 = curso_2.cod_cur
        and cod_can=".$_POST["inscricao"];

$resultado = mysql_query($SQL, $conectar);

$dados = mysql_fetch_array($resultado);

require "cabecalho.php";
?>
<br><br>
<table width="622" border="0" cellspacing="0" cellpadding="4" style="background-color: #FFFFFF">
  <tr>
    <td width="622">
      <h3 style="text-align:center; color: #cc0000;">Deseja cancelar a seguinte inscrição?</h3>
        <fieldset style="background-color: #FFFFFF; border: 1px solid #000000; width: 600px">
            <table width="600" border="0" cellspacing="0" cellpadding="0">
                <tr><td width=30%>Nome:</td> <td><?php echo $dados[nome_can]; ?> </td></tr>
                <tr><td width=30%>Nº Inscrição:</td> <td><?php echo $dados[cod_can]; ?> </td></tr>			
                <tr><td width=30%>CPF:</td> <td><?php echo $dados[cpf_can]; ?> </td></tr>	
                <tr><td width=30%>1ª Opção:</td> <td><?php echo $dados["curso_1.nome_cur"]." - ".$dados["curso_1.turno_cur"]; ?> </td></tr>						
                <tr><td width=30%>2ª Opção:</td> <td><?php echo $dados["curso_2.nome_cur"]." - ".$dados["curso_2.turno_cur"]; ?> </td></tr>						
                <?php if (isset($texto_cota)){ ?>                    
                <tr><td width=30%>Cotista:</td><td>  <?php if ($dados["part_cota"]==1) {echo "Sim";} else {echo "Não";} ?> </td></tr>			
                <?php } ?>        
                <tr><td width=30%>Situação:</td><td>  <?php if ($dados["deferido"]==1) {echo "Confirmada";} else {echo "Aguardando pagamento";} ?> </td></tr>                    
                <tr align="center"><td colspan=2 align="center"><br>
                <form name="cancelar_inscricao" action="certeza_cancelar.php" method="post">    
                    <input type="hidden" name="inscricao" value="<?php echo $_POST["inscricao"]; ?>">
                    <input class='botao' type=submit name="cancelar" value="Sim">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class='botao' type=submit name="cancelar" value="Não">             
                </form>
            </td></tr>
        </fieldset>
<table>
</center>    
</body>
</html>
