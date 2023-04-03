// Bolo - 300 gr por pessoa + de 6 horas - 500
// Salgado - 30 un por Pessoa + 6 horas - 50 un
// Refrigerante/agua - 1000 ml por pessoa + 6 horas 1500ml
// Crianças valem por 0,5

let inputAdultos = document.getElementById("adultos");
let inputCriancas = document.getElementById("criancas");
let inputDuracao = document.getElementById("duracao");

let resultado = document.getElementById("resultado");

function calcular() {
    console.log("Calculando...");

    let adultos = inputAdultos.value;
    let criancas = inputCriancas.value;
    let duracao = inputDuracao.value;


    let qdtTotalBolo = boloPP(duracao) * adultos + (boloPP(duracao) / 2 * criancas);
    let qdtTotalSalgado = salgadoPP(duracao) * adultos;
    let qdtTotalBebida = bebidaPP(duracao) * adultos + (bebidaPP(duracao) / 2 * criancas);


    resultado.innerHTML = `<p>${qdtTotalBolo / 1000} Kg de bolo</p>`
    resultado.innerHTML += `<p>${Math.ceil(qdtTotalSalgado / 355)} centos de salgados</p>`
    resultado.innerHTML += `<p>${Math.ceil(qdtTotalBebida / 2000)} garrafas de bebidas (2l)</p>`
}

function boloPP(duracao) {
    if (duracao >= 6) {
        return 500;
    } else {
        return 300;
    }
}

function salgadoPP(duracao) {
    if (duracao >= 6) {
        return 50;
    } else {
        return 30;
    }
}
function bebidaPP(duracao) {
    if (duracao >= 6) {
        return 1500;
    } else {
        return 1000;
    }
}