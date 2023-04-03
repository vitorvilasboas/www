$().ready(function(){
	
	$('textarea[name="desateesp_can"]').keypress(function(event){
		key = event.keyCode;
		if($(this).val().length==150 && (key != 8)){
			event.preventDefault();
		}
	});

    $("input[type='submit']").click(function(event){
        if (!document.alterarInscricao.aceitar_condicoes2.checked){
            alert("Para confirmar a alteracao, voce deve marcar a opcao que declara estar de acordo com as normas e prazos presentes no edital.");
            document.alterarInscricao.aceitar_condicoes2.focus();
            return false;
        }
    	if (document.alterarInscricao.nome_can.value == "") {
    		alert("Por favor, informe seu nome completo!");
    		document.alterarInscricao.nome_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.alterarInscricao.cpf_can.value == "") {
    		alert("Por favor, informe seu CPF!");
    		document.alterarInscricao.cpf_can.focus();
    		scroll(0,0);
    		return false;
    	}    	
    	if (document.alterarInscricao.nasc_can.value == "") {
    		alert("Por favor, informe sua data de nascimento!");
    		document.alterarInscricao.nasc_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.alterarInscricao.mae_can.value == "") {
    		alert("Por favor, informe o nome da sua mae!");
    		document.alterarInscricao.mae_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.alterarInscricao.sexo_can.value == "") {
    		alert("Por favor, informe o seu sexo!");
    		document.alterarInscricao.sexo_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.alterarInscricao.nat_can.value == "") {
    		alert("Por favor, informe a cidade de seu nascimento!");
    		document.alterarInscricao.nat_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.alterarInscricao.ufnat_can.value == "") {
    		alert("Por favor, informe o estado de seu nascimento!");
    		document.alterarInscricao.ufnat_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	
    	if (document.alterarInscricao.doc_can.value == ""){
    		alert("Por favor, informe o numero do documento de identificacao que voce ira utilizar no dia da prova!");
    		document.alterarInscricao.doc_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.alterarInscricao.orgexp_can.value == ""){
    		alert("Por favor, informe o orgao expeditor do documento de identificacao!");
    		document.alterarInscricao.orgexp_can.focus();
    		scroll(0,0);
    		return false;
    	}
    	if (document.alterarInscricao.ufdoc_can.value == ""){
    		alert("Por favor, informe a UF do documento de identificacao!");
    		document.alterarInscricao.orgexp_can.focus();
    		scroll(0,0);
    		return false;
    	}     	
    	if (document.alterarInscricao.logend_can.value == ""){
    		alert("Por favor, informe a rua ou avenida em que voce mora!");
    		document.alterarInscricao.logend_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.alterarInscricao.bairroend_can.value == ""){
    		alert("Por favor, informe o bairro ou setor em que voce mora!");
    		document.alterarInscricao.bairroend_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.alterarInscricao.cidend_can.value == ""){
    		alert("Por favor, informe a cidade em que voce mora!");
    		document.alterarInscricao.cidend_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.alterarInscricao.ufend_can.value == ""){
    		alert("Por favor, informe o estado em que voce mora!");
    		document.alterarInscricao.ufend_can.focus();
    		scroll(0,300);
    		return false;
    	}
    	if (document.alterarInscricao.telfixo_can.value == ""){
    		alert("Por favor, informe um telefone próprio ou de recado para contato!");
    		document.alterarInscricao.telfixo_can.focus();
    		scroll(0,600);
    		return false;
    	}
    	if (document.alterarInscricao.mail_can.value != "" && !checkMail(document.alterarInscricao.mail_can.value)){
    		alert("Por favor, informe um e-mail valido para contato!");
    		document.alterarInscricao.mail_can.focus();
    		scroll(0,400);
    		return false;
    	}
        if (document.alterarInscricao.opccur_can_1.value == "") {
            alert("Por favor, informe a opcao de curso pretendido!");
            document.alterarInscricao.opccur_can_1.focus();
            scroll(0,500);
            return false;
        }
        if (document.alterarInscricao.opccur_can_2.value == "") {
            alert("Por favor, confirme a opcao de curso pretendido!");
            document.alterarInscricao.opccur_can_2.focus();
            scroll(0,500);
            return false;
        }       
        if (document.alterarInscricao.opccur_can_1.value != document.alterarInscricao.opccur_can_2.value) {
            alert("A confirmacao da opção de curso deve ser igual a opcao de curso pretendido!");
            document.alterarInscricao.opccur_can_2.focus();
            scroll(0,500);
            return false;
        }
                
        if (document.alterarInscricao.part_cota.value == ""){
            alert("Por favor, informe a politica afirmativa na qual voce concorrera!");
            document.alterarInscricao.part_cota.focus();
            scroll(0,500);
            return false;
        }
    	if (!$('form input[name="hab_can"]').is(':checked')){
    		alert("Por favor, informe com qual mão voce escreve!");
    		document.alterarInscricao.hab_can[0].focus()
    		scroll(0,600);
    		return false;
    	}
    	if (!$('form input[name="vateesp_can"]').is(':checked')){
    		alert("Por favor, informe se voce necessita ou não de atendimento especial para realizar a prova!");
    		document.alterarInscricao.vateesp_can[0].focus();
    		scroll(0,600);
    		return false;
    	}
    	if ($('form input[name="vateesp_can"]:checked').val() == "S" && document.alterarInscricao.desateesp_can.value == ""){
    		alert("Voce declarou que necessita de atendimento especial. Por favor, descreva sua necessidade especifica ou declare diferente!");
    		document.alterarInscricao.desateesp_can.focus();
    		return false;
    	}
        if (document.alterarInscricao2.cmp_inscricao_can.value == ""){
            alert("Por favor, informe seu numero de inscricao!");
            document.alterarInscricao2.cmp_inscricao_can.focus();
            scroll(0,800);
            return false;
        }
        if (document.alterarInscricao2.senha_can2.value == ""){
            alert("Por favor, informe sua senha de acesso!");
            document.alterarInscricao2.senha_can2.focus();
            scroll(0,800);
            return false;
        }
        /*
        if (document.alterarInscricao.lingua_can.value == "")
        {
            alert("Por favor, informe a opcao de lingua estrangeira!");
            document.alterarInscricao.lingua_can.focus();
            scroll(0,500);
            return false;
        } */
    	//else if ($('form input[name="vateesp_can"]:checked').val() == "Sim" && document.efetuarInscricao.locprov_can.value != "1")
    	//{
    	//	//alert("Por necessitar de atendimento especial, o local de realização de sua prova deverá ser obrigatoriamente na cidade de Ceres-GO.");
    		//document.efetuarInscricao.locprov_can.focus();
    		//return false;
    	//}
     });   
});