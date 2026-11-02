<?php
session_start();

// Calcula "a op b". Devuelve null si no se puede (división por cero).
function calcular(float $a, string $op, float $b): ?float
{
    switch ($op) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            return $b == 0 ? null : $a / $b;
    }
    return $b;
}

function formatear(float $n): string
{
    $texto = rtrim(rtrim(sprintf('%.10F', $n), '0'), '.');
    return $texto === '-0' ? '0' : $texto;
}

$pantalla = $_POST['pantalla'] ?? '0';  // número que se ve en pantalla
$acumulado = $_POST['acumulado'] ?? ''; // primer número de la operación
$operacion = $_POST['operacion'] ?? ''; // operación pendiente (+ - * /)
$nuevo = ($_POST['nuevo'] ?? '0') === '1'; // true: la próxima cifra empieza un número nuevo
$historial = $_POST['historial'] ?? ''; // expresión ya confirmada, ej: "5 + 7 +"
$tecla = $_POST['tecla'] ?? '';

// Símbolos para mostrar
$simbolos = ['+' => '+', '-' => '−', '*' => '×', '/' => '÷'];

if (!is_numeric($pantalla)) {
    $pantalla = '0';
}

if ($tecla !== '') {
    if ((ctype_digit($tecla) || $tecla === '.') && $nuevo && $operacion === '') {
        $historial = '';
    }

    if (ctype_digit($tecla)) {
        $pantalla = ($nuevo || $pantalla === '0') ? $tecla : $pantalla . $tecla;
        $nuevo = false;
    } elseif ($tecla === '.') {
        if ($nuevo) {
            $pantalla = '0.';
        } elseif (strpos($pantalla, '.') === false) {
            $pantalla .= '.';
        }
        $nuevo = false;
    } elseif ($tecla === 'C') {
        $pantalla = '0';
        $acumulado = '';
        $operacion = '';
        $historial = '';
        $nuevo = false;
    } elseif ($tecla === 'DEL') {
        $pantalla = (!$nuevo && strlen($pantalla) > 1) ? substr($pantalla, 0, -1) : '0';
        if ($pantalla === '-') {
            $pantalla = '0';
        }
    } elseif ($tecla === 'NEG') {
        if ((float) $pantalla != 0) {
            $pantalla = $pantalla[0] === '-' ? substr($pantalla, 1) : '-' . $pantalla;
        }
    } elseif (in_array($tecla, ['+', '-', '*', '/'], true)) {
        if ($operacion !== '' && $nuevo) {
            $historial = preg_replace('/\S+$/u', $simbolos[$tecla], $historial);
            $operacion = $tecla;
        } else {
            $ingresado = $pantalla;
            $error = false;
            if ($operacion !== '') {
                $r = calcular((float) $acumulado, $operacion, (float) $pantalla);
                if ($r === null) {
                    $error = true;
                } else {
                    $pantalla = formatear($r);
                }
            }
            if ($error) {
                $pantalla = 'Error';
                $acumulado = '';
                $operacion = '';
                $historial = '';
            } else {
                $historial = ($historial !== '' && $operacion !== '' ? $historial . ' ' : '')
                    . $ingresado . ' ' . $simbolos[$tecla];
                $acumulado = $pantalla;
                $operacion = $tecla;
            }
            $nuevo = true;
        }
    } elseif ($tecla === '=') {
        if ($operacion !== '') {
            $historial = ($historial !== '' ? $historial . ' ' : '') . $pantalla;
            $r = calcular((float) $acumulado, $operacion, (float) $pantalla);
            if ($r === null) {
                $pantalla = 'Error';
                $historial = '';
            } else {
                $pantalla = formatear($r);
            }
            $acumulado = '';
            $operacion = '';
            $nuevo = true;
        }
    }
}

if (in_array($pantalla, ['', '-', '-0'], true)) {
    $pantalla = '0';
}

// Post/Redirect/Get: tras cada tecla guardamos el estado y recargamos con GET.
// El estado se usa una sola vez; si la página se recarga o se visita de nuevo, empieza en 0.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['calc'] = compact('pantalla', 'acumulado', 'operacion', 'historial', 'nuevo');
    header('Location: calculadora.php');
    exit;
}
if (isset($_SESSION['calc'])) {
    extract($_SESSION['calc']);
    unset($_SESSION['calc']);
}

$expresion = ($operacion !== '' && !$nuevo) ? $historial . ' ' . $pantalla : $historial;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora - Site Edison Fernandez</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<main class="container py-5">
    <h1 class="mb-4 text-center">Calculadora</h1>

    <form method="post" action="calculadora.php" class="calculadora mx-auto">
        <input type="hidden" name="pantalla" value="<?php echo htmlspecialchars($pantalla); ?>">
        <input type="hidden" name="acumulado" value="<?php echo htmlspecialchars($acumulado); ?>">
        <input type="hidden" name="operacion" value="<?php echo htmlspecialchars($operacion); ?>">
        <input type="hidden" name="historial" value="<?php echo htmlspecialchars($historial); ?>">
        <input type="hidden" name="nuevo" value="<?php echo $nuevo ? '1' : '0'; ?>">

        <div class="calc-pantalla">
            <div class="calc-expresion"><?php echo htmlspecialchars($expresion); ?>&nbsp;</div>
            <div class="calc-numero"><?php echo htmlspecialchars($pantalla); ?></div>
        </div>

        <div class="calc-teclas">
            <button class="btn btn-secondary" type="submit" name="tecla" value="C">C</button>
            <button class="btn btn-secondary" type="submit" name="tecla" value="DEL">⌫</button>
            <button class="btn btn-secondary" type="submit" name="tecla" value="NEG">±</button>
            <button class="btn btn-warning" type="submit" name="tecla" value="/">÷</button>

            <button class="btn btn-light" type="submit" name="tecla" value="7">7</button>
            <button class="btn btn-light" type="submit" name="tecla" value="8">8</button>
            <button class="btn btn-light" type="submit" name="tecla" value="9">9</button>
            <button class="btn btn-warning" type="submit" name="tecla" value="*">×</button>

            <button class="btn btn-light" type="submit" name="tecla" value="4">4</button>
            <button class="btn btn-light" type="submit" name="tecla" value="5">5</button>
            <button class="btn btn-light" type="submit" name="tecla" value="6">6</button>
            <button class="btn btn-warning" type="submit" name="tecla" value="-">−</button>

            <button class="btn btn-light" type="submit" name="tecla" value="1">1</button>
            <button class="btn btn-light" type="submit" name="tecla" value="2">2</button>
            <button class="btn btn-light" type="submit" name="tecla" value="3">3</button>
            <button class="btn btn-warning" type="submit" name="tecla" value="+">+</button>

            <button class="btn btn-light calc-cero" type="submit" name="tecla" value="0">0</button>
            <button class="btn btn-light" type="submit" name="tecla" value=".">.</button>
            <button class="btn btn-success" type="submit" name="tecla" value="=">=</button>
        </div>
    </form>
</main>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
