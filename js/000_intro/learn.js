console.log('Legal!!') // ; é opcional
console.log(1 + 3)
/* Comentário bloco */

{
    /* Bloco de código */
    console.log("Passo #01")
    console.log("Passo #02")
}

// Dados e Variáveis
var x = 10
let y = 2.67  // moderna ideal
z = 3.8

var precoFinal = x + y // JS é Case Sensitive
console.log(precoFinal)

let preco = 19.90
let desconto = 0.4
let precoComDesconto = preco * (1 - desconto)

let nome = "Caderno" // String
let categoria = "Papelaria"
console.log("Produto: " + nome
    + ", Categoria: " + categoria
    + ", Preço: " + preco
    + ", Desconto: " + desconto)


// Verificando tipos (number, boolean, string)
console.log(typeof 31) // tudo number ñ diferencia int e flutuante
console.log(typeof 31.5)

let estaChovendo = true
console.log(typeof estaChovendo)
console.log(typeof "Teste")

estaChovendo = false

const A = 3 // constante (imutável) - convensão maiúscula

const PI = 3.141592
let raio = 10
// let areaCirc = PI * raio * raio
let areaCirc = Math.PI * raio * raio
console.log("O valor da área é " + areaCirc + "m2.")

let a = 7
let b = 94

let aux = a
a = b
b = aux
// [a, b] = [b, a]

console.log(a)
console.log(b)


