function buscar_elementos_por_id()
	{				// a busca por ID é a mais recomendada
		var x = document.getElementById("frase1"); // Coletando um elemento do DOM com id = frase1
		alert(x.innerHTML); // Exibindo o conteudo html do elemento x
	}						// o método innerHTML permite acessar/manipular o conteúdo de algum elemento html
		
function buscar_elementos_pela_tag() // Outra forma de acessar os elementos do DOM
	{									
		var x = document.getElementById("principal"); // 1º Acessamos o elemento que possui o id = principal
		var y = x.getElementsByTagName("p");          // 2º Acessamos todos os elementos que possuem a tag p
		
		alert(y[2].innerHTML); // Exibindo o conteudo HTML da 3º posição da string y
	}
		
	