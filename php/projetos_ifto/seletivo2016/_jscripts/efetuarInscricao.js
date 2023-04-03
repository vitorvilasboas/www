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
    		alert(unescape("Para efetuar a inscricao, voce deve concordar com as normas e prazos presentes no edital."));
    		document.efetuarInscricao.aceitar_condicoes.focus();
    		return false;
    	}
    	if (document.efetuarInscricao.nome_can.value == '')
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
    		alert("Por favor, informe sua data de nascimento!");
    		document.efetuarInscricao.nasc_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.mae_can.value == "")
    	{
    		alert("Por favor, informe o nome da sua mae!");
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
    		alert("Por favor, informe a cidade onde voce nasceu!");
    		document.efetuarInscricao.nat_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.ufnat_can.value == "")
    	{
    		alert("Por favor, informe o estado onde voce nasceu!");
    		document.efetuarInscricao.ufnat_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	
        /*
        if (document.efetuarInscricao.lingua_can.value == "")
        {
            alert("Por favor, informe a opção de língua estrangeira!");
            document.efetuarInscricao.lingua_can.focus();
            scroll(0,500);
            return false;
        }*/		
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
    		alert("Por favor, informe o numero do documento de identificacao que voce ira utilizar no dia da prova!");
    		document.efetuarInscricao.doc_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.orgexp_can.value == "")
    	{
    		alert("Por favor, informe o orgao expeditor do documento de identificacao!");
    		document.efetuarInscricao.orgexp_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.efetuarInscricao.ufdoc_can.value == "")
    	{
    		alert("Por favor, informe a UF do documento de identificacao!");
    		document.efetuarInscricao.orgexp_can.focus();
    		scroll(0,0);
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
    		alert("Por favor, informe a rua ou avenida na qual voce mora!");
    		document.efetuarInscricao.logend_can.focus();
    		scroll(0,300);
    		return false;
    	}
        /*
    	if (document.efetuarInscricao.numend_can.value == "")
    	{
    		alert("Por favor, informe o número da casa em que você mora!");
    		document.efetuarInscricao.numend_can.focus();
    		scroll(0,300);
    		return false;
    	}*/
    	if (document.efetuarInscricao.bairroend_can.value == "")
    	{
    		alert("Por favor, informe o bairro ou setor no qual voce mora!");
    		document.efetuarInscricao.bairroend_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.efetuarInscricao.cidend_can.value == "")
    	{
    		alert("Por favor, informe a cidade na qual voce mora!");
    		document.efetuarInscricao.cidend_can.focus();
    		scroll(0,300);
    		return false;
    	}
        /*
    	if (document.efetuarInscricao.cepend_can.value == "")
    	{
    		alert("Por favor, informe o CEP da região em que você mora!");
    		document.efetuarInscricao.cepend_can.focus();
    		scroll(0,500);
    		return false;
    	}*/
    	if (document.efetuarInscricao.ufend_can.value == "")
    	{
    		alert("Por favor, informe o estado no qual voce mora!");
    		document.efetuarInscricao.ufend_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.efetuarInscricao.telfixo_can.value == "")
    	{
    		alert("Por favor, informe um telefone para contato!");
    		document.efetuarInscricao.telfixo_can.focus();
    		scroll(0,600);
    		return false;
    	}
        if (document.efetuarInscricao.mail_can.value == "")
        {
            alert("Por favor, informe um e-mail para contato!");
            document.efetuarInscricao.mail_can.focus();
            scroll(0,400);
            return false;
        }
    	if (document.efetuarInscricao.mail_can.value != "" && !checkMail(document.efetuarInscricao.mail_can.value))
    	{
    		alert("O e-mail informado nao e valido. Por favor, informe um e-mail valido para contato!");
    		document.efetuarInscricao.mail_can.focus();
    		scroll(0,400);
    		return false;
    	}
        if (document.efetuarInscricao.opccur_can_1.value == "")
        {
            alert("Por favor, informe o curso pretendido!");
            document.efetuarInscricao.opccur_can_1.focus();
            scroll(0,500);
            return false;
        }
        if (document.efetuarInscricao.opccur_can_2.value == "")
        {
            alert("Por favor, confirme o curso pretendido!");
            document.efetuarInscricao.opccur_can_2.focus();
            scroll(0,500);
            return false;
        }       
        if (document.efetuarInscricao.part_cota.value == "")
        {
            alert("Por favor, informe a politica afirmativa na qual voce concorrera!");
            document.efetuarInscricao.part_cota.focus();
            scroll(0,500);
            return false;
        }     
       if (document.efetuarInscricao.opccur_can_1.value != document.efetuarInscricao.opccur_can_2.value)
        {
            alert("A confirmacao da opcao de curso nao corresponde a opcao de curso!");
            document.efetuarInscricao.opccur_can_2.focus();
            scroll(0,500);
            return false;
        }
    	if (!$('form input[name="hab_can"]').is(':checked'))
    	{
    		alert("Por favor, informe com qual mao voce escreve!");
    		document.efetuarInscricao.hab_can[0].focus()
    		scroll(0,600);
    		return false;
    	}
    	if (!$('form input[name="vateesp_can"]').is(':checked'))
    	{
    		alert("Por favor, informe se voce necessita ou nao de atendimento especial para realizar a prova!");
    		document.efetuarInscricao.vateesp_can[0].focus();
    		scroll(0,600);
    		return false;
    	}
    	if ($('form input[name="vateesp_can"]:checked').val() == "S" && document.efetuarInscricao.desateesp_can.value == "")
    	{
    		alert("Voce declarou que necessita de atendimento especial. Por favor, descreva sua necessidade especifica ou declare diferente!");
    		document.efetuarInscricao.desateesp_can.focus();
    		return false;
    	}
        
        if (document.efetuarInscricao.senha_can.value == "")
        {
            alert("Por favor, informe a senha de acesso!");
            document.efetuarInscricao.senha_can.focus();
            scroll(0,800);
            return false;
        } else {
            if (document.efetuarInscricao.senha_can.value.length < 8) {
                alert("A senha deve conter no míinimo 8 caracteres! ");
                document.efetuarInscricao.senha_can.focus();
                scroll(0,800);
                return false;
            }
        }
        
        if (document.efetuarInscricao.conf_senha_can.value == "")
        {
            alert("Por favor, confirme a senha de acesso!");
            document.efetuarInscricao.conf_senha_can.focus();
            scroll(0,800);
            return false;
        }
        
        if (document.efetuarInscricao.senha_can.value != document.efetuarInscricao.conf_senha_can.value)
        {
            alert("A confirmacao de senha nao corresponde a senha informada! ");
            document.efetuarInscricao.conf_senha_can.focus();
            scroll(0,800);
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