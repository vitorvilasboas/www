$().ready(function(){
	
	$('textarea[name="desateesp_can"]').keypress(function(event){
		key = event.keyCode;
		if($(this).val().length==150 && (key != 8)){
			event.preventDefault();
		}
	});
	
    $('input[type="submit"]').click(function(event){
		if (!document.efetuarInscricao.aceitar_condicoes.checked)
    	{
    		alert("Para efetuar a inscrição, você deve marcar a opção que declara estar acordo com as normas e prazos presentes no edital.");
    		document.efetuarInscricao.aceitar_condicoes.focus();
    		return false;
    	}
    	if (document.efetuarInscricao.nome_can.value == "")
    	{
    		alert("Por favor, informe seu nome completo!");
    		document.efetuarInscricao.nome_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.cpf_can.value == "")
    	{
    		alert("Por favor, informe seu CPF!");
    		document.efetuarInscricao.cpf_can.focus();
    		scroll(0,0);
    		return false;
    	}    	
    	if (document.efetuarInscricao.nasc_can.value == "")
    	{
    		alert("Por favor, infome sua data de nascimento!");
    		document.efetuarInscricao.nasc_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.mae_can.value == "")
    	{
    		alert("Por favor, informe o nome da sua mãe!");
    		document.efetuarInscricao.mae_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.sexo_can.value == "")
    	{
    		alert("Por favor, informe o seu sexo!");
    		document.efetuarInscricao.sexo_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.nat_can.value == "")
    	{
    		alert("Por favor, informe a cidade de seu nascimento!");
    		document.efetuarInscricao.nat_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.ufnat_can.value == "")
    	{
    		alert("Por favor, informe o estado de seu nascimento!");
    		document.efetuarInscricao.ufnat_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.opccur_can_1.value == "")
    	{
    		alert("Por favor, informe a 1ª opção de curso pretendido!");
    		document.efetuarInscricao.opccur_can_1.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.opccur_can_2.value == "")
    	{
    		alert("Por favor, informe a 2ª opção de curso pretendido!");
    		document.efetuarInscricao.opccur_can_2.focus();
    		scroll(0,0);
    		return false;
    	}		
    	if (document.efetuarInscricao.opccur_can_1.value == document.efetuarInscricao.opccur_can_2.value)
    	{
    		alert("A 2ª opção de curso deve ser diferente da primeira!");
    		document.efetuarInscricao.opccur_can_2.focus();
    		scroll(0,0);
    		return false;
    	}		
		/*
    	if (document.efetuarInscricao.locprov_can.value == "")
    	{
    		alert("Por favor, informe a cidade desejada para realização da prova!");
    		document.efetuarInscricao.locprov_can.focus();
    		scroll(0,0);
    		return false;
    	}*/
    	if (document.efetuarInscricao.doc_can.value == "")
    	{
    		alert("Por favor, informe o número do documento de identificação que você irá utilizar no dia da prova!");
    		document.efetuarInscricao.doc_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.efetuarInscricao.orgexp_can.value == "")
    	{
    		alert("Por favor, informe o orgão expeditor do documento de identificação!");
    		document.efetuarInscricao.orgexp_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.efetuarInscricao.ufdoc_can.value == "")
    	{
    		alert("Por favor, informe a UF do documento de identificação!");
    		document.efetuarInscricao.orgexp_can.focus();
    		scroll(0,300);
    		return false;
    	}     	
/*    	if ($('form input[name="zonaend_can"]').val()=="")
    	{
    		alert("Por favor, informe a zona em que você mora!");
    		document.efetuarInscricao.zonaend_can[0].focus();
    		scroll(0,500);
    		return false;
    	}*/
    	if (document.efetuarInscricao.logend_can.value == "")
    	{
    		alert("Por favor, informe a rua ou avenida em que você mora!");
    		document.efetuarInscricao.logend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.numend_can.value == "")
    	{
    		alert("Por favor, informe o número da casa em que você mora!");
    		document.efetuarInscricao.numend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.bairroend_can.value == "")
    	{
    		alert("Por favor, informe o bairro ou setor em que você mora!");
    		document.efetuarInscricao.bairroend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.cidend_can.value == "")
    	{
    		alert("Por favor, informe a cidade em que você mora!");
    		document.efetuarInscricao.cidend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.cepend_can.value == "")
    	{
    		alert("Por favor, informe o CEP da região em que você mora!");
    		document.efetuarInscricao.cepend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.ufend_can.value == "")
    	{
    		alert("Por favor, informe o estado em que você mora!");
    		document.efetuarInscricao.ufend_can.focus();
    		scroll(0,500);
    		return false;
    	}
/*    	if (document.efetuarInscricao.telfixo_can.value == "")
    	{
    		alert("Por favor, informe um telefone próprio ou de recado para contato!");
    		document.efetuarInscricao.telfixo_can.focus();
    		scroll(0,600);
    		return false;
    	}*/
    	if (document.efetuarInscricao.mail_can.value != "" && !checkMail(document.efetuarInscricao.mail_can.value))
    	{
    		alert("Por favor, informe um e-mail válido para contato!");
    		document.efetuarInscricao.mail_can.focus();
    		scroll(0,600);
    		return false;
    	}
    	if (!$('form input[name="hab_can"]').is(':checked'))
    	{
    		alert("Por favor, informe com qual mão você escreve!");
    		document.efetuarInscricao.hab_can[0].focus()
    		scroll(0,700);
    		return false;
    	}
    	if (!$('form input[name="vateesp_can"]').is(':checked'))
    	{
    		alert("Por favor, informe se você necessita ou não de atendimento especial para realizar a prova!");
    		document.efetuarInscricao.vateesp_can[0].focus();
    		scroll(0,700);
    		return false;
    	}
    	if ($('form input[name="vateesp_can"]:checked').val() == "Sim" && document.efetuarInscricao.desateesp_can.value == "")
    	{
    		alert("Por favor, descreva como deverá ser o atendimento especial que necessita para realizar a prova!");
    		document.efetuarInscricao.desateesp_can.focus();
    		return false;
    	}
    	//else if ($('form input[name="vateesp_can"]:checked').val() == "Sim" && document.efetuarInscricao.locprov_can.value != "1")
    	//{
    	//	//alert("Por necessitar de atendimento especial, o local de realização de sua prova deverá ser obrigatoriamente na cidade de Ceres-GO.");
    		//document.efetuarInscricao.locprov_can.focus();
    		//return false;
    	//}
		
    	
     });   
});