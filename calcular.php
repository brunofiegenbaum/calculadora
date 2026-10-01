<?php
$numero1 = $_POST["numero1"] ?? "";
$numero2 = $_POST["numero2"] ?? "";
$operacao = $_POST["operacao"] ?? "";

$mensagem = "";

if (!is_numeric($numero1) || !is_numeric($numero2)) {
    $mensagem = "Informe os dois números.";
} else {
    $numero1 = (float) $numero1;
    $numero2 = (float) $numero2;

    switch ($operacao) {
        case "+":
            $resultado = $numero1 + $numero2;
            break;
        case "-":
            $resultado = $numero1 - $numero2;
            break;
        case "*":
            $resultado = $numero1 * $numero2;
            break;
        case "/":
            if ($numero2 == 0) {
                $mensagem = "Não é possível dividir por zero";
            } else {
                $resultado = $numero1 / $numero2;
            }
            break;
        default:
            $mensagem = "Operação inválida.";
    }

    if ($mensagem == "") {
        $mensagem = "$numero1 $operacao $numero2 = $resultado";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Calculadora PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculadora">
        <div style="color: #f1f1f1; text-align: center; font-size: 1.3rem; margin-bottom: 20px; overflow-wrap: anywhere;">
            <?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?>
        </div>
        <a href="index.html" class="tecla igual" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            Voltar
        </a>
    </div>
</body>
</html>
