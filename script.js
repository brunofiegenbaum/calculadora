// =========================================================
//  Calculadora - JavaScript (pronto, não precisa alterar)
//  Só monta a conta nos campos ocultos e envia o formulário.
//  O cálculo fica por conta do PHP (calcular.php).
// =========================================================

const visor    = document.getElementById("visor");
const numero1  = document.getElementById("numero1");
const operacao = document.getElementById("operacao");
const numero2  = document.getElementById("numero2");

// Símbolos bonitos para mostrar no visor
const simbolos = { "+": "+", "-": "−", "*": "×", "/": "÷" };

// Atualiza o visor com a conta que está sendo montada
function atualizarVisor() {
    let texto = numero1.value;
    if (operacao.value) texto += " " + simbolos[operacao.value] + " " + numero2.value;
    visor.value = texto || "0";
}

// Clique em um número (ou no ponto)
function digito(d) {
    // Antes de escolher a operação, digita no 1º número; depois, no 2º
    const campo = operacao.value ? numero2 : numero1;
    if (d === "." && campo.value.includes(".")) return; // só um ponto
    campo.value += d;
    atualizarVisor();
}

// Clique em + − × ÷
function operador(op) {
    if (numero1.value === "") return; // precisa do 1º número antes
    operacao.value = op;
    atualizarVisor();
}

// Botão C: limpa tudo
function limpar() {
    numero1.value = "";
    operacao.value = "";
    numero2.value = "";
    atualizarVisor();
}

// Botão =: envia o formulário para o PHP
function calcular() {
    document.getElementById("form-calc").submit();
}
