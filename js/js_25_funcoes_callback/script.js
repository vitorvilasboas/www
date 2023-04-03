function minhascores(cor1, cor2, callback)
	{
		alert("Minhas cores favoritas são: " + cor1 + ", " + cor2);
		callback();
	}
		
function meuscarros(carro1, carro2, callback)
	{
		alert("Meus carros favoritos são: " + carro1 + ", " + carro2);
		callback(); // este callback será executado apos o alert acima
	}
		
function meus_outros_carros()
	{
		alert("Meus outros carros favoritos são: Ferrari e Porsche");
	}