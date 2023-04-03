function verificaIE()
{
    return (navigator.appVersion.indexOf("MSIE")!=-1 && navigator.appVersion.indexOf("Opera")==-1);
}

function buscaLinks()
{
    insereIcones(document.body.getElementsByTagName('a'));
}

function insereIcones(tags)
{
    var l=tags.length;
    for(var i=0;i<l;++i)
    {
        var tag=tags[i];
	if (tag.className == "link" || tag.className == "link_caps")
	{
        	var html= tag.innerHTML + '<img src="/img/icone_link.gif" border="0"></img>';
        	tag.innerHTML=html;
	}
    }
}

function carregaEstilizaLinks()
{
    if(verificaIE()) buscaLinks();
}


function expandeDiv(div)
{
	if (document.getElementById(div).className=='invisivel'){
		document.getElementById(div).className='visivel';}
	else{
		document.getElementById(div).className='invisivel';}
}

function limitarOBS(objeto) {
	var limite = 255;
	var erro = "Você ultrapassou o limite de 255 caracteres.";

	tamanho = objeto.value.length;
	if (tamanho>limite) {
		objeto.value = objeto.value.substring(0,limite);
		alert(erro);
		return false;
	}
}

function nivelSenha(senha,tamanhoMinimo) {
	document.getElementById('txtNivelSenha').innerHTML = "";
	document.getElementById('nivelBaixa').style.background = "url('img/fundo_nivel_senha_fraca.jpg')";
	document.getElementById('nivelMedia').style.background = "url('img/fundo_nivel_senha_media.jpg')";
	document.getElementById('nivelForte').style.background = "url('img/fundo_nivel_senha_forte.jpg')";
	
	if (senha.length >= tamanhoMinimo && senha.search(/[a-z]/) != -1 && senha.search(/[A-Z]/) != -1 && senha.search(/[0-9]/) != -1 || senha.length >= tamanhoMinimo && senha.search(/[a-z]/) != -1 && senha.search(/[A-Z]/) != -1 && senha.search(/[@!#$%&*+=?|-]/) || senha.length >= tamanhoMinimo && senha.search(/[a-z]/) != -1 && senha.search(/[@!#$%&*+=?|-]/) != -1 && senha.search(/[0-9]/) || senha.length >= tamanhoMinimo  && senha.search(/[@!#$%&*+=?|-]/) != -1 && senha.search(/[A-Z]/) != -1 && senha.search(/[0-9]/) ) {
		document.getElementById('txtNivelSenha').innerHTML = "Senha de Difícil Dedução";
		document.getElementById('nivelBaixa').style.background = "url('img/nivel_senha_fraca.jpg')";
		document.getElementById('nivelMedia').style.background = "url('img/nivel_senha_media.jpg')";
		document.getElementById('nivelForte').style.background = "url('img/nivel_senha_forte.jpg')";
	} else {
  		if (senha.length >= tamanhoMinimo && senha.search(/[a-z]/) != -1 && senha.search(/[A-Z]/) != -1 || senha.length >= tamanhoMinimo && senha.search(/[a-z]/) != -1 && senha.search(/[0-9]/) != -1 || senha.length >= tamanhoMinimo && senha.search(/[a-z]/) != -1 && senha.search(/[@!#$%&*+=?|-]/) != -1 || senha.length >= tamanhoMinimo && senha.search(/[A-Z]/) != -1 && senha.search(/[0-9]/) != -1 || senha.length >= tamanhoMinimo && senha.search(/[A-Z]/) != -1 && senha.search(/[@!#$%&*+=?|-]/) != -1 || senha.length >= tamanhoMinimo && senha.search(/[0-9]/) != -1 && senha.search(/[@!#$%&*+=?|-]/) != -1) {
			document.getElementById('txtNivelSenha').innerHTML = "Senha de Média Segurança";
			document.getElementById('nivelBaixa').style.background = "url('img/nivel_senha_fraca.jpg')";
			document.getElementById('nivelMedia').style.background = "url('img/nivel_senha_media.jpg')";
			document.getElementById('nivelForte').style.background = "url('img/fundo_nivel_senha_forte.jpg')";
		} else {
			if(senha.length >= tamanhoMinimo) {
				document.getElementById('txtNivelSenha').innerHTML = "Senha de Fácil Dedução";
				document.getElementById('nivelBaixa').style.background = "url('img/nivel_senha_fraca.jpg')";
				document.getElementById('nivelMedia').style.background = "url('img/fundo_nivel_senha_media.jpg')";
				document.getElementById('nivelForte').style.background = "url('img/fundo_nivel_senha_forte.jpg')";
			}
		}
	}
}