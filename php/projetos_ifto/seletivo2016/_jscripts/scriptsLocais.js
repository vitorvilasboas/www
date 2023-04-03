function MaskInscricao(objeto, evt) { 
	return Mascara(objeto, evt, '##.####-#');
}

function selecionaTipoBusca(tipo) {
	switch(tipo)
	{
		case "inscricao":
			document.buscaComprovanteInscricao.ins_can.disabled = false;
			document.buscaComprovanteInscricao.nome_can.disabled = true;
			document.buscaComprovanteInscricao.buscaInscricao.style.visibility = "visible";
			document.buscaComprovanteInscricao.buscaNome.style.visibility = "hidden";
			break;
		case "nome":
			document.buscaComprovanteInscricao.ins_can.disabled = true;
			document.buscaComprovanteInscricao.nome_can.disabled = false;
			document.buscaComprovanteInscricao.buscaInscricao.style.visibility = "hidden";
			document.buscaComprovanteInscricao.buscaNome.style.visibility = "visible";
			break;
	}
}

function validaBuscaComprovanteInscricao()
{
	for(i = 0; i < document.buscaComprovanteInscricao.opcbusca.length; i++){
		if (document.buscaComprovanteInscricao.opcbusca[i].checked) {
			var opcbusca = document.buscaComprovanteInscricao.opcbusca[i].value;
			break;

    		} else
			var opcbusca = "";
	}

	if (opcbusca == "ins_can" && document.buscaComprovanteInscricao.ins_can.value == "")
	{
		alert("Por favor, informe o número de inscrição do candidato!");
		document.buscaComprovanteInscricao.ins_can.focus();
		return false;
	}
	else if (opcbusca == "nome_can" && document.buscaComprovanteInscricao.nome_can.value == "")
	{
		alert("Por favor, informe o nome do candidato!");
		document.buscaComprovanteInscricao.nome_can.focus();
		return false;
	}
	return true; 
}