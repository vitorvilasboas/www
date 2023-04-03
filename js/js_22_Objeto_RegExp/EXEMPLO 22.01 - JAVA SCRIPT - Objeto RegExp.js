function TestRegExp1()
	{                           // Frase onde será feita a busca por um padrão de caracteres
		var string = "Deus tá vendo você visitando o perfil da pessoa para ver se ela é bonita antes de aceitar a solicitação de amizade";
		var padrao = /antes/i;    // A palavra "antes" é o padrão a ser buscado
		alert(str.match(padrao)); // O modificador /i serve para ligar o insensitive case		
	}                             // insensitive case faz o metodo str.match ignorar a diferença entre letras maisculas e minusculas
			
function TestRegExp2()
	{                  // Frase onde será feita a busca por um padrão de caracteres
		var string = "Filho, homem que é homem, não chora. Mas pai, estou chorando porque perdi seus mil reais.";
		var padrao = /homem/g; // A palavra "homem" é o padrão a ser buscado
		alert(str.match(patt)); // O modificador /g faz o método str.match retornar
	} 							// todos os padrões encontrados na string, e não apenas o 1º
			
function TestRegExp3()
	{
		var padrao = new RegExp("saio", "i"); // o modificador "i" habilita o insensitive case 
		alert(padrao.test("Adoro sair, mas quando não saio, eu fico em casa"));
	}	// O método padrao.test irá verificar se a palavra "saio" existe dentro da string
		// que lhe foi repassada, retornará o valor true ou false
		
function TestRegExp4()
	{
		var patt = new RegExp("pra", "i"); // o modificador "i" habilita o insensitive case
		alert(padrao.exec("Já que ninguém me quer, estou fazendo declarações de amor pra minha cachorra."));
	}   // o método padra.exec retornará a palavra "pra" se ela existir na string que lhe foi repassada
	    // caso não encontre, ela retornará o valor null
		