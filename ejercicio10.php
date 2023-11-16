<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Promedios</title>
    <link rel="stylesheet" href="styles/styles_ej10.css">
</head>
<body>
    <div class="container">
        <h1>Cálculo de Promedios</h1>

        <?php
        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['apellidos']) && isset($_POST['nombres']) && isset($_POST['nota1']) && isset($_POST['nota2']) && isset($_POST['nota3'])) {
            // Obtener los datos del formulario
            $apellidos = $_POST['apellidos'];
            $nombres = $_POST['nombres'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];

            // Validar las notas (puedes agregar más validaciones según tus necesidades)

            // Calcular el promedio
            $promedio = ($nota1 + $nota2 + $nota3) / 3;
            ?>

            <h2>Resultados:</h2>
            <ul>
                <li><strong>Nombre:</strong> <?php echo "$nombres $apellidos"; ?></li>
                <li><strong>Nota 1:</strong> <?php echo $nota1; ?></li>
                <li><strong>Nota 2:</strong> <?php echo $nota2; ?></li>
                <li><strong>Nota 3:</strong> <?php echo $nota3; ?></li>
                <li><strong>Promedio:</strong> <?php echo $promedio; ?></li>
            </ul>

            <!-- Botón para volver a calcular -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button type="submit">Volver a Calcular</button>
            </form>

        <?php } else { ?>
            <!-- Formulario -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>

                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" required>

                <label for="nota1">Nota 1:</label>
                <input type="number" id="nota1" name="nota1" required>

                <label for="nota2">Nota 2:</label>
                <input type="number" id="nota2" name="nota2" required>

                <label for="nota3">Nota 3:</label>
                <input type="number" id="nota3" name="nota3" required>

                <button type="submit">Calcular Promedio</button>
            </form>
            <div class="back-link">
            <a href="index.php">Volver al índice</a>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>
