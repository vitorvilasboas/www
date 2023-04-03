function TestGlobal1()
	{								
		var resultado = "Eu tenho 15 anos de idade: " + isNaN(15) + "\n"; // o /n acrescenta uma quebra de linha na frase
		resultado = resultado + "Entrei no 1º ano aos 14 anos: " + isNaN(1) + "\n";
		resultado = resultado + "Lá na escola eu sou o maior pegador, defendo todas as bolas que chutam: " + isNaN("pegador");
		alert(resultado);
	}	// a função isNaN() testa se o valor do seu argumento não é um numero valido
		// a função isNaN() retorna false se o seu argumento tiver um valor númerico 
		// a função isNaN() retorna true se o seu argumento tiver um valor literal 
		
function TestGlobal2()
	{
		var resultado = "Moça, você ficaria comigo? Claro, ficaria bem longe de você, que tal " + parseFloat("10") + " mil km." + "\n";
		resultado = resultado + "Fui doar " + parseFloat("5") + " reais pro Criança Esperança e eles me chamaram de pobre." + "\n";
		resultado = resultado + "Prefiro ficar atoa do que não fazer nada: " + parseFloat("ficar");
		alert(resultado);
		// a função parseFloat processa uma string e retornar um valor em ponto flutuante
	}   // Se colocar um simbolo que não representa um numero, parseFloat retornar a resposta NaN,
		// Nan significa: não é um número
			
function TestGlobal3()
	{
		var saida = escape("Oi, sou o Vasco só estou dando uma olhada na série A e já volto...");
		alert(saida);
	} // a função escape codifica uma string para ser transmitida por uma rede de computadores
	  // existem outras funções mais preparadas para isso como o encodeURI()
			