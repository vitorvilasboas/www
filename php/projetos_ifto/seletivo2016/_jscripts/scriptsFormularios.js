//Funções para mascarar os campos

function Mascara(objeto, evt, mask) {
 
	var LetrasU = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var LetrasL = 'abcdefghijklmnopqrstuvwxyz';
	var Letras  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	var Numeros = '0123456789';
	var Fixos  = '().-:/ '; 
	var Charset = " !\"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_/`abcdefghijklmnopqrstuvwxyz{|}~";

	evt = (evt) ? evt : (window.event) ? window.event : "";
	var value = objeto.value;
	if (evt) {
		var ntecla = (evt.which) ? evt.which : evt.keyCode;
		tecla = Charset.substr(ntecla - 32, 1);
		if (ntecla < 32) return true;

		var tamanho = value.length;
		if (tamanho >= mask.length) return false;

		var pos = mask.substr(tamanho,1); 
		while (Fixos.indexOf(pos) != -1) {
			value += pos;
			tamanho = value.length;
			if (tamanho >= mask.length) return false;
			pos = mask.substr(tamanho,1);
		}

		switch (pos) {
		case '#' :
			if (Numeros.indexOf(tecla) == -1) return false;
			break;
		case 'A' :
			if (LetrasU.indexOf(tecla) == -1) return false;
			break;
		case 'a' :
			if (LetrasL.indexOf(tecla) == -1) return false;
			break;
		case 'Z' :
			if (Letras.indexOf(tecla) == -1) return false;
			break;
		case '*' :
			objeto.value = value;
			return true;
			break;
		default :
			return false;
			break;
		}
	}
	objeto.value = value; 
	return true;
}


function MaskCPF(objeto, evt) { 
	return Mascara(objeto, evt, '###.###.###-##');
}


function MaskTelefone(objeto, evt) { 
	return Mascara(objeto, evt, '(##) ####-####');
}


function MaskCEP(objeto, evt) { 
	return Mascara(objeto, evt, '#####-###');
}


function MaskData(objeto, evt) { 
	return Mascara(objeto, evt, '##/##/####');
}

function MaskHoraHM(objeto, evt) { 
	return Mascara(objeto, evt, '##:##');
}


function ValidarCPF(Objcpf) {
	var cpf = Objcpf.value;
	exp = /\.|\-/g
	cpf = cpf.toString().replace( exp, "" );
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1=0, soma2=0;
	var vlr =11;
    
	for(i=0;i<9;i++) {
		soma1+=eval(cpf.charAt(i)*(vlr-1));
		soma2+=eval(cpf.charAt(i)*vlr);
		vlr--;
	}    
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2=(((soma2+(2*soma1))*10)%11);

	if (Objcpf.value != "") {
		var digitoGerado=(soma1*10)+soma2;
		if(digitoGerado!=digitoDigitado) {    
			alert('O CPF '+Objcpf.value+' é inválido! Por favor, verifique o valor informado.');
			Objcpf.value = "";
		}
	}        
}


function ValidarData(digData)
{
	var bissexto = 0;
	var data = digData.value;
	var tam = data.length;
	if (tam == 10)
	{
		var dia = data.substr(0,2)
		var mes = data.substr(3,2)
		var ano = data.substr(6,4)
		if ((ano > 1900)||(ano < 2100))
		{
			switch (mes)
			{
				case '01':
				case '03':
				case '05':
				case '07':
				case '08':
				case '10':
				case '12':
					if  (dia <= 31)
					return true;
					break;
                
				case '04':        
				case '06':
				case '09':
				case '11':
					if  (dia <= 30)
					return true;
					break;
				case '02':
					if ((ano % 4 == 0) || (ano % 100 == 0) || (ano % 400 == 0))
						bissexto = 1;
					if ((bissexto == 1) && (dia <= 29))
						return true;                
					if ((bissexto != 1) && (dia <= 28))
						return true;         
					break;                        
			}
		}
	}
	if (tam > 0)
	{    
		alert("A data "+data+" é inválida! Por favor, verifique o valor informado.");
		digData.value = "";
    		return false;
	}
}

function ValidarHoraHM(digHora) {
	var hora = digHora.value;
	var tam = hora.length;

	var h = hora.substr(0,2)
	var m = hora.substr(3,2)

	if ((h >= 24 || m > 59) || tam < 5 && tam > 0)
	{    
		alert("A hora "+hora+" é inválida! Por favor, verifique o valor informado.");
		digHora.value = "";
    		return false;
	}
}

function ValidarMail(strmail) {
	valMail = strmail.value;
	if (valMail != ""){
		if (valMail.indexOf('@')==-1 || valMail.indexOf('.')==-1) {
			alert("O e-mail "+valMail+" é inválido! Por favor, verifique o valor informado.");
			strmail.value = "";
    			return false;
		}
	}
}


function novoProcessamento()
{
	top.document.getElementById('d_processamento').style.display = 'none';
	top.document.getElementById('bt_submit').removeAttribute('disabled');
	top.document.getElementById('pri_cam').focus();
}

function converteMaiuscula(campo){
	campo.value = campo.value.toUpperCase();	
}

function checkMail(mail){
	var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);

	if(typeof(mail) == "string"){
		if(er.test(mail))
			return true;
    		else if(typeof(mail) == "object")
        		if(er.test(mail.value))
                    		return true;
	} else
        return false;
}

function apenasNumeros(e) {
	navegador = /msie/i.test(navigator.userAgent);
	if (navegador)
		var  tecla = event.keyCode;
	else
		var tecla = e.which;

	if(tecla > 47 && tecla < 58)
		return true;
	else {
		if (tecla != 8) // backspace
			return false;
		else
			return true;
	}
}


//Funções que destacam os campos dos formulários

function markCamHover(obj)
{
	if (document.documentElement);
  	{
  		obj.style.backgroundImage="url('img/fundo_input_hover.jpg')";
  	}
}


function markCamOut(obj)
{
	if (document.documentElement);
  	{
  		obj.style.backgroundImage="url('img/fundo_input_gray.jpg')";
  	}
}

function setStar(clas_over,cod_cli)
{
	for (i=1; i<=5; i++)
		document.getElementById("star_"+i+""+cod_cli).src = "img/icone_star_gray.gif";

	for (i=1; i<=clas_over; i++)
		document.getElementById("star_"+i+""+cod_cli).src = "img/icone_star.gif";
}

function clearStar(clas_out,cod_cli)
{
	setStar(clas_out,cod_cli);
}

function selecionaOrigemMiniatura(origem)
{
	switch(origem)
	{
		case "arquivo":
			document.getElementById('url_miniatura').className = "invisivel";
			document.getElementById('arquivo_miniatura').className = "visivel";
			document.getElementById('patch_min').focus();
			break;
		case "url":
			document.getElementById('arquivo_miniatura').className = "invisivel";
			document.getElementById('url_miniatura').className = "visivel";
			document.getElementById('url_min').focus();
			break;
	}
}


function selecionaOrigemImagem(origem)
{
	switch(origem)
	{
		case "none":
			document.getElementById('url_imagem').className = "invisivel";
			document.getElementById('arquivo_imagem').className = "invisivel";
			break;
		case "arquivo":
			document.getElementById('url_imagem').className = "invisivel";
			document.getElementById('arquivo_imagem').className = "visivel";
			document.getElementById('patch').focus();
			break;
		case "url":
			document.getElementById('arquivo_imagem').className = "invisivel";
			document.getElementById('url_imagem').className = "visivel";
			document.getElementById('url').focus();
			break;
	}
}


function selecionaOrigemAudio(origem)
{
	switch(origem)
	{
		case "arquivo":
			document.getElementById('url_audio').className = "invisivel";
			document.getElementById('arquivo_audio').className = "visivel";
			document.getElementById('patch_aud').focus();
			break;
		case "url":
			document.getElementById('arquivo_audio').className = "invisivel";
			document.getElementById('url_audio').className = "visivel";
			document.getElementById('url_aud').focus();
			break;
		default:
			document.getElementById('arquivo_audio').className = "invisivel";
			document.getElementById('url_audio').className = "invisivel";
			document.getElementById('bt_submit').focus();
	}
}


function validaAudio(obj)
{
	var valor = obj.value;
	var ex = valor.substr(valor.length - 4).toLowerCase();

	if (ex != ".mp3")
	{
		alert("O tipo de audio que você selecionou ("+ex+") não é aceito. O formato de audio que é aceito é .mp3");
		window.location.reload();
	}
}