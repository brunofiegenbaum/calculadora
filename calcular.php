<?php
$numero1 = $_POST["numero1"] ?? "";
$numero2 = $_POST["numero2"] ?? "";
$operacao = $_POST["operacao"] ?? "";
$resultado = "";

if (!is_numeric($numero1) || !is_numeric($numero2)) {
    $resultado = "Informe os dois números";
} else if ($operacao == "+") {
    $resultado = $numero1 + $numero2;
} else if ($operacao == "-") {
    $resultado = $numero1 - $numero2;
} else if ($operacao == "*") {
    $resultado = $numero1 * $numero2;
} else if ($operacao == "/") {
    if ($numero2 == 0) {
        $resultado = "Não é possível dividir por zero";
    } else {
        $resultado = $numero1 / $numero2;
    }
} else {
    $resultado = "Operação inválida";
}

$conta = "$numero1 $operacao $numero2 =";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form class="calculadora" id="form-calc" method="post" action="calcular.php">
        <input type="hidden" name="numero1" id="numero1">
        <input type="hidden" name="operacao" id="operacao">
        <input type="hidden" name="numero2" id="numero2">

        <p style="color: #f1f1f1; text-align: right; margin-bottom: 8px;">
            <?php echo htmlspecialchars($conta); ?>
        </p>

        <input type="text" class="visor" id="visor" readonly
               style="<?php if (!is_numeric($resultado)) echo 'font-size: 1rem;'; ?>"
               value="<?php echo htmlspecialchars((string) $resultado); ?>">

        <div class="teclado">
            <button type="button" class="tecla limpar" onclick="limpar()">C</button>
            <button type="button" class="tecla op" onclick="operador('/')">÷</button>
            <button type="button" class="tecla op" onclick="operador('*')">×</button>
            <button type="button" class="tecla op" onclick="operador('-')">−</button>

            <button type="button" class="tecla" onclick="digito('7')">7</button>
            <button type="button" class="tecla" onclick="digito('8')">8</button>
            <button type="button" class="tecla" onclick="digito('9')">9</button>
            <button type="button" class="tecla op mais" onclick="operador('+')">+</button>

            <button type="button" class="tecla" onclick="digito('4')">4</button>
            <button type="button" class="tecla" onclick="digito('5')">5</button>
            <button type="button" class="tecla" onclick="digito('6')">6</button>

            <button type="button" class="tecla" onclick="digito('1')">1</button>
            <button type="button" class="tecla" onclick="digito('2')">2</button>
            <button type="button" class="tecla" onclick="digito('3')">3</button>
            <button type="button" class="tecla igual" onclick="calcular()">=</button>

            <button type="button" class="tecla zero" onclick="digito('0')">0</button>
            <button type="button" class="tecla" onclick="digito('.')">.</button>
        </div>

        <a href="index.html" style="display: block; color: #f1f1f1; text-align: center; margin-top: 20px;">Voltar à calculadora</a>
    </form>

    <script src="script.js"></script>
</body>
</html>
