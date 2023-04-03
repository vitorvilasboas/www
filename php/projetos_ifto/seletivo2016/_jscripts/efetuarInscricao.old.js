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
    		alert("Para efetuar a inscri��o, voc� deve marcar a op��o que declara estar acordo com as normas e prazos presentes no edital.");
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
    		alert("Por favor, informe o nome da sua m�e!");
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
    		alert("Por favor, informe a 1� op��o de curso pretendido!");
    		document.efetuarInscricao.opccur_can_1.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.opccur_can_2.value == "")
    	{
    		alert("Por favor, informe a 2� op��o de curso pretendido!");
    		document.efetuarInscricao.opccur_can_2.focus();
    		scroll(0,0);
    		return false;
    	}		
    	if (document.efetuarInscricao.opccur_can_1.value == document.efetuarInscricao.opccur_can_2.value)
    	{
    		alert("A 2� op��o de curso deve ser diferente da primeira!");
    		document.efetuarInscricao.opccur_can_2.focus();
    		scroll(0,0);
    		return false;
    	}		
		/*
    	if (document.efetuarInscricao.locprov_can.value == "")
    	{
    		alert("Por favor, informe a cidade desejada para realiza��o da prova!");
    		document.efetuarInscricao.locprov_can.focus();
    		scroll(0,0);
    		return false;
    	}*/
    	if (document.efetuarInscricao.doc_can.value == "")
    	{
    		alert("Por favor, informe o n�mero do documento de identifica��o que voc� ir� utilizar no dia da prova!");
    		document.efetuarInscricao.doc_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.efetuarInscricao.orgexp_can.value == "")
    	{
    		alert("Por favor, informe o org�o expeditor do documento de identifica��o!");
    		document.efetuarInscricao.orgexp_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.efetuarInscricao.ufdoc_can.value == "")
    	{
    		alert("Por favor, informe a UF do documento de identifica��o!");
    		document.efetuarInscricao.orgexp_can.focus();
    		scroll(0,300);
    		return false;
    	}     	
/*    	if ($('form input[name="zonaend_can"]').val()=="")
    	{
    		alert("Por favor, informe a zona em que voc� mora!");
    		document.efetuarInscricao.zonaend_can[0].focus();
    		scroll(0,500);
    		return false;
    	}*/
    	if (document.efetuarInscricao.logend_can.value == "")
    	{
    		alert("Por favor, informe a rua ou avenida em que voc� mora!");
    		document.efetuarInscricao.logend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.numend_can.value == "")
    	{
    		alert("Por favor, informe o n�mero da casa em que voc� mora!");
    		document.efetuarInscricao.numend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.bairroend_can.value == "")
    	{
    		alert("Por favor, informe o bairro ou setor em que voc� mora!");
    		document.efetuarInscricao.bairroend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.cidend_can.value == "")
    	{
    		alert("Por favor, informe a cidade em que voc� mora!");
    		document.efetuarInscricao.cidend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.cepend_can.value == "")
    	{
    		alert("Por favor, informe o CEP da regi�o em que voc� mora!");
    		document.efetuarInscricao.cepend_can.focus();
    		scroll(0,500);
    		return false;
    	}
    	if (document.efetuarInscricao.ufend_can.value == "")
    	{
    		alert("Por favor, informe o estado em que voc� mora!");
    		document.efetuarInscricao.ufend_can.focus();
    		scroll(0,500);
    		return false;
    	}
/*    	if (document.efetuarInscricao.telfixo_can.value == "")
    	{
    		alert("Por favor, informe um telefone pr�prio ou de recado para contato!");
    		document.efetuarInscricao.telfixo_can.focus();
    		scroll(0,600);
    		return false;
    	}*/
    	if (document.efetuarInscricao.mail_can.value != "" && !checkMail(document.efetuarInscricao.mail_can.value))
    	{
    		alert("Por favor, informe um e-mail v�lido para contato!");
    		document.efetuarInscricao.mail_can.focus();
    		scroll(0,600);
    		return false;
    	}
    	if (!$('form input[name="hab_can"]').is(':checked'))
    	{
    		alert("Por favor, informe com qual m�o voc� escreve!");
    		document.efetuarInscricao.hab_can[0].focus()
    		scroll(0,700);
    		return false;
    	}
    	if (!$('form input[name="vateesp_can"]').is(':checked'))
    	{
    		alert("Por favor, informe se voc� necessita ou n�o de atendimento especial para realizar a prova!");
    		document.efetuarInscricao.vateesp_can[0].focus();
    		scroll(0,700);
    		return false;
    	}
    	if ($('form input[name="vateesp_can"]:checked').val() == "Sim" && document.efetuarInscricao.desateesp_can.value == "")
    	{
    		alert("Por favor, descreva como dever� ser o atendimento especial que necessita para realizar a prova!");
    		document.efetuarInscricao.desateesp_can.focus();
    		return false;
    	}
    	//else if ($('form input[name="vateesp_can"]:checked').val() == "Sim" && document.efetuarInscricao.locprov_can.value != "1")
    	//{
    	//	//alert("Por necessitar de atendimento especial, o local de realiza��o de sua prova dever� ser obrigatoriamente na cidade de Ceres-GO.");
    		//document.efetuarInscricao.locprov_can.focus();
    		//return false;
    	//}
		
    	
     });   
});