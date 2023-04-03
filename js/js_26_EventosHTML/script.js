function testOnload()
	{																			// o \n insere uma quebra de linha
		alert("A vida é feita de desafios e eu te desafio a beijar seu cotovelo. \nPágina carregada");
	}
			
function mostrar_tecla_pressionada(event)
	{
		var x = event.which; // coletando qual tecla foi pressionada e guardando em x
		var tecla_pressionada = String.fromCharCode(x); // convertendo o codigo do caractere coletado para uma string
		alert("A tecla " + tecla_pressionada + " foi pressionada");
	}
			