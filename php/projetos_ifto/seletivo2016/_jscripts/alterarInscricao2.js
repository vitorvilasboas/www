$().ready(function(){
	
	$('textarea[name="desateesp_can"]').keypress(function(event){
		key = event.keyCode;
		if($(this).val().length==150 && (key != 8)){
			event.preventDefault();
		}
	});

    $("input[type='submit']").click(function(event){
    	if (document.alterarInscricao.telfixo_can.value == ""){
    		alert("Por favor, informe um telefone próprio ou de recado para contato!");
    		document.alterarInscricao.telfixo_can.focus();
    		scroll(0,600);
    		return false;
    	} 
     });   
});