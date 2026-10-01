<?php
$numero1 = $_POST["numero1"];
$numero2 = $_POST["numero2"];
$operacao = $_POST["operacao"];

if ($operacao == "+") {
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
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculadora" style="color: white; text-align: center;">
        <?php
        if ($operacao == "/" && $numero2 == 0) {
            echo $resultado;
        } else {
            echo "$numero1 $operacao $numero2 = $resultado";
        }
        ?>
        <br><br>
        <a href="index.html" style="color: white;">Voltar</a>
    </div>
</body>
</html>
