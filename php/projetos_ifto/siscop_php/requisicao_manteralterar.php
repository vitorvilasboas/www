<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script language="javascript" type="text/javascript">
// construindo o calendário
function popdate(obj,div,tam,ddd)
{
    if (ddd) 
    {
        day = ""
        mmonth = ""
        ano = ""
        c = 1
        char1 = ""
        for (s=0;s<parseInt(ddd.length);s++)
        {
            char1 = ddd.substr(s,1)
            if (char1 == "/") 
            {
                c++; 
                s++; 
                char1 = ddd.substr(s,1);
            }
    
            if (c==1) day    += char1
            if (c==2) mmonth += char1
            if (c==3) ano    += char1
        }
        ddd = mmonth + "/" + day + "/" + ano
    }
  
    if(!ddd) {today = new Date()} else {today = new Date(ddd)}
    date_Form = eval (obj)
    if (date_Form.value == "") { date_Form = new Date()} else {date_Form = new Date(date_Form.value)}
  
    ano = today.getFullYear();
    mmonth = today.getMonth ();
    day = today.toString ().substr (8,2)
  
    umonth = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro")
    days_Feb = (!(ano % 4) ? 29 : 28)
    days = new Array (31, days_Feb, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)

    if ((mmonth < 0) || (mmonth > 11))  alert(mmonth)
    if ((mmonth - 1) == -1) {month_prior = 11; year_prior = ano - 1} else {month_prior = mmonth - 1; year_prior = ano}
    if ((mmonth + 1) == 12) {month_next  = 0;  year_next  = ano + 1} else {month_next  = mmonth + 1; year_next  = ano}
    txt  = "<table bgcolor='#efefff' style='border:solid #8FC549; border-width:2' cellspacing='0' cellpadding='3' border='0' width='"+tam+"' height='"+tam*1.1 +"'>"
    txt += "<tr bgcolor='#FFFFFF'><td colspan='7' align='center'><table border='0' cellpadding='0' width='100%' bgcolor='#FFFFFF'><tr>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano-1).toString())+"') class='Cabecalho_Calendario' title='Ano Anterior'><<</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_prior+1).toString() + "/" + year_prior.toString())+"') class='Cabecalho_Calendario' title='Mês Anterior'><</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_next+1).toString()  + "/" + year_next.toString())+"') class='Cabecalho_Calendario' title='Próximo Mês'>></a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano+1).toString())+"') class='Cabecalho_Calendario' title='Próximo Ano'>>></a></td>"
    txt += "<td width=20% align=right><a href=javascript:force_close('"+div+"') class='Cabecalho_Calendario' title='Fechar Calendário'><b>X</b></a></td></tr></table></td></tr>"
    txt += "<tr><td colspan='7' align='right' bgcolor='#ccccff' class='mes'><a href=javascript:pop_year('"+obj+"','"+div+"','"+tam+"','" + (mmonth+1) + "') class='mes'>" + ano.toString() + "</a>"
    txt += " <a href=javascript:pop_month('"+obj+"','"+div+"','"+tam+"','" + ano + "') class='mes'>" + umonth[mmonth] + "</a> <div id='popd' style='position:absolute'></div></td></tr>"
    txt += "<tr bgcolor='#8FC549'><td width='14%' class='dia' align=center><b>Dom</b></td><td width='14%' class='dia' align=center><b>Seg</b></td><td width='14%' class='dia' align=center><b>Ter</b></td><td width='14%' class='dia' align=center><b>Qua</b></td><td width='14%' class='dia' align=center><b>Qui</b></td><td width='14%' class='dia' align=center><b>Sex<b></td><td width='14%' class='dia' align=center><b>Sab</b></td></tr>"
    today1 = new Date((mmonth+1).toString() +"/01/"+ano.toString());
    diainicio = today1.getDay () + 1;
    week = d = 1
    start = false;

    for (n=1;n<= 42;n++) 
    {
        if (week == 1)  txt += "<tr bgcolor='#efefff' align=center>"
        if (week==diainicio) {start = true}
        if (d > days[mmonth]) {start=false}
        if (start) 
        {
            dat = new Date((mmonth+1).toString() + "/"+ d + "/" + ano.toString())
            day_dat   = dat.toString().substr(0,10)
            day_today  = date_Form.toString().substr(0,10)
            year_dat  = dat.getFullYear ()
            year_today = date_Form.getFullYear ()
            colorcell = ((day_dat == day_today) && (year_dat == year_today) ? " bgcolor='#FFCC00' " : "" )
            if((d=="1")||(d=="2")||(d=="3")||(d=="4")||(d=="5")||(d=="6")||(d=="7")||(d=="8")||(d=="9")){
                d = '0' + d;
            }
            if((((mmonth+1).toString())=='1')||(((mmonth+1).toString())=='2')||(((mmonth+1).toString())=='3')||(((mmonth+1).toString())=='4')||(((mmonth+1).toString())=='5')||(((mmonth+1).toString())=='6')||(((mmonth+1).toString())=='7')||(((mmonth+1).toString())=='8')||(((mmonth+1).toString())=='9')){
                txt += "<td"+colorcell+" align=center><a href=javascript:block('"+  d + "/0" + (mmonth+1).toString() + "/" + ano.toString() +"','"+ obj +"','" + div +"') class='data'>"+ d.toString() + "</a></td>"
                d ++
            } else {
                txt += "<td"+colorcell+" align=center><a href=javascript:block('"+  d + "/" + (mmonth+1).toString() + "/" + ano.toString() +"','"+ obj +"','" + div +"') class='data'>"+ d.toString() + "</a></td>"
                d ++ 
            }  
        } 
        else 
        { 
            txt += "<td class='data' align=center> </td>"
        }
        week ++
        if (week == 8) 
        { 
            week = 1; txt += "</tr>"} 
        }
        txt += "</table>"
        div2 = eval (div)
        div2.innerHTML = txt 
}
  
// função para exibir a janela com os meses
function pop_month(obj, div, tam, ano)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=80>"
  for (n = 0; n < 12; n++) { txt += "<tr><td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+("01/" + (n+1).toString() + "/" + ano.toString())+"')>" + umonth[n] +"</a></td></tr>" }
  txt += "</table>"
  popd.innerHTML = txt
}

// função para exibir a janela com os anos
function pop_year(obj, div, tam, umonth)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=160>"
  l = 1
  for (n=1991; n<2012; n++)
  {  if (l == 1) txt += "<tr>"
     txt += "<td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+(umonth.toString () +"/01/" + n) +"')>" + n + "</a></td>"
     l++
     if (l == 4) 
        {txt += "</tr>"; l = 1 } 
  }
  txt += "</tr></table>"
  popd.innerHTML = txt 
}

// função para fechar o calendário
function force_close(div) 
    { div2 = eval (div); div2.innerHTML = ''}
    
// função para fechar o calendário e setar a data no campo de data associado
function block(data, obj, div)
{ 
    force_close (div)
    obj2 = eval(obj)
    obj2.value = data 
}


function validar() {
    var just = form1.cmp_justificativa.value;
    var npag = form1.cmp_npag.value;
    var ncopia = form1.cmp_ncopias.value;
    var dt = form1.data1.value;
    var cont = 0;
    var dthoje = new Date();
   
    
    if ((just == "")||(just == " ")) {
        form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
        form1.cmp_justificativa.id = "validate_invalid";
        form1.cmp_justificativa.focus();
    } else {
        form1.cmp_justificativa.id = "validate_valid";
        cont++;
    }
    
    if ((npag=="")||(npag==" ")){
        form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
        form1.cmp_npag.id = "validate_invalid";
    } else {
        form1.cmp_npag.id = "validate_valid";
        cont++;
    }
    
    if ((ncopia=="")||(ncopia==" ")){    
        form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
        form1.cmp_ncopias.id = "validate_invalid";
    } else {
        form1.cmp_ncopias.id = "validate_valid";
        cont++;
    }
    
    if ((dt=="")||(dt.toString().length)<10){    
        form1.action = "principal.php?p=requisicao&acao=<?php echo $acao?>";
        form1.data1.id = "validate_invalid";
    } else {
        form1.data1.id = "validate_valid";
        cont++;
    }
    
    if(cont!=4){
        alert('Preencha os campos obrigatórios!');
        form1.cmp_justificativa.focus();
        return false
    } else {
        form1.action = "principal.php?p=requisicao&acao=<?php echo 'bd_'.$acao?>&req_codigo=<?php echo $opcao->registros->REQ_CODIGO;?>";
        return true;
    }
        
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

function CampoData(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    //if((tecla>46 && tecla<58)) return true;
    //else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
   // }
}
</script>

<?php
    if(!isset($_SESSION["on_nome"]) || !isset($_SESSION["on_codigo"])) { // Verifica se existem os dados da sessão de login
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';//URL mostrado apenas de exemplo
    } else  {      
?>
        <div id="wrap">
            <?php
            if(isset($_REQUEST['acao'])){
                if(($opcao->registros->USU_CODIGO == $_SESSION['on_codigo']) || ($_SESSION['on_permissao']=='Root')){
                        ?>
                            <font class="fonte_titulos"><b>Alterar Cadastro da Requisição</b></font>
                            <form name="form1" id="f1" class="validate" action="" method="post" enctype="multipart/form-data">
                                <p>
                                    <label>Justificativa:</label>
                                    <input id="a" type="text" name="cmp_justificativa" class="required" value="<?php echo $opcao->registros->REQ_JUST;?>"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <p>
                                    <label>Quantidade de páginas do material:</label>
                                    <input id="b" type="text" name="cmp_npag" class="required" onkeypress='return SomenteNumero(event)' value="<?php echo $opcao->registros->REQ_MNPAGS;?>" readonly="readonly"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                <p>
                                    <label>Número de cópias:</label>
                                    <input id="c" type="text" name="cmp_ncopias" class="required" onkeypress='return SomenteNumero(event)' value="<?php echo $opcao->registros->REQ_MNCOPS;?>" readonly="readonly"/>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                </p>
                                    <label>Data da Retirada:</label>
                                    <input type="text" NAME="data1" MAXLENGTH="11" value="" onkeypress='return CampoData(event)' > 
                                    <input TYPE="button" NAME="btnData1" class="button gray reset" VALUE="..." Onclick="javascript:popdate('document.form1.data1','pop1','150',document.form1.data1.value)">
                                    <span id="pop1" style="position:absolute"></span>
                                    <br><font id="fonte"> Campo Obrigatório</font>
                                <p>
                                    <label>Mensagem ao Operador:</label>
                                    <textarea rows="4" cols="50" name="cmp_msg" class="required" ><?php echo $opcao->registros->REQ_MSG;?></textarea>
                                </p>
                                <p>
                                            <label>Upload do Arquivo:</label>
                                            <input type="file" name="cmp_arquivo">
                                </p><br>
                                <?php
                                    if($opcao->registros->REQ_END!=''){
                                ?>
                                        <font class="fonte_msg_erro"><b>Arquivo já enviado: </b></font>
                                        <a href="arquivos/<?php echo $opcao->registros->REQ_END;?>" target="_blank"><?php echo $opcao->registros->REQ_END;?></a><br><br>
                                <?php
                                    }
                                ?>
                                <p><button class="button blue submit" onclick="return validar()">Salvar Alterações</button></p>
                            </form>
                            <br>
                            <p class="detalhes_baixo">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="principal.php?p=requisicao&acao=listar_por_usuario"><button class="button gray" onclick="return confirm('Realmente cancelar edição?')">Cancelar</button></a>
                            </p>
                            <br>
                                <?php 
                } else {
                    ?>
                        <br><br>
                        <center><font class="fonte_titulos"><b>Acesso Negado!</b></font></center>
                    <?php
                }
            }
            ?>
        </div>
<?php
    }
?>