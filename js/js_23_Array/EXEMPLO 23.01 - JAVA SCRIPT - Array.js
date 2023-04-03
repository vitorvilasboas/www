function TestArray1()
	{
		var frutas = new Array();
		frutas[0] = "maçã"; // Atribuindo uma string para cada posição do vetor de strings
		frutas[1] = "limão";
		frutas[2] = "laranja";
		frutas[3] = "melancia";
			
		alert(frutas[3]);
	}
		
function TestArray2()
	{
		var minhascores = new Array();
		minhascores[0] = "vermelho"; // Atribuindo uma string para cada posição do vetor de strings
		minhascores[1] = "verde";
		minhascores[2] = "azul";
		minhascores[3] = "amarelo";
		minhascores[4] = "preto";
		minhascores[5] = "branco";
			
		var i;
		var saida = "";
		for(i = 0; i < minhascores.length; i++)
		{
			saida = saida + minhascores[i] + "<br>"; // Concatenando strings
		}
			
		document.getElementById("resultado").innerHTML = saida;
	}
	
function TestArray3()
	{
		var frutas = new Array();
		frutas[0] = "maçã";
		frutas[1] = "limão";
		frutas[2] = "laranja";
		frutas[3] = "melancia";
		
		alert(frutas.length); // Retornar o total de elementos em um array
	}
	
function TestArray4()
	{
		var carros1 = ["Fiat", "Ford"]; // Atribuindo uma string para cada posição do vetor de strings
		var carros2 = ["Ferrari", "BMW", "Audi"];
		var carrosFinal = carros1.concat(carros2); // Concatenando carros2 em carros1
			
		var i;
		var saida = "";
		for(i = 0; i < carrosFinal.length; i++)
		{
			saida = saida + carrosFinal[i] + "<br>";
		}
		
		document.getElementById("resultado2").innerHTML = saida;
	}