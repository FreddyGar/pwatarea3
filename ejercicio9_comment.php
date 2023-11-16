<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dejar un Comentario</title>
    <link rel="stylesheet" href="styles/styles_ej9.css">
</head>
<body>
    <div class="container">
        <h1>Dejar un Comentario</h1>

        <?php
        // Procesar el formulario cuando se envía
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ejercicio9";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("La conexión falló: " . $conn->connect_error);
            }

            // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $comentario = $_POST['comentario'];

            // Validar los datos (puedes agregar más validaciones según tus necesidades)

            // Insertar el comentario en la base de datos
            $sql = "INSERT INTO comentarios (nombre, comentario) VALUES ('$nombre', '$comentario')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>Comentario enviado correctamente.</p>";
            } else {
                echo "Error al enviar el comentario: " . $conn->error;
            }

            // Cerrar conexión
            $conn->close();
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" required></textarea>

            <button type="submit">Enviar Comentario</button>
        </form>

        <div class="back-link">
            <a href="ejercicio9.php">Volver a la Lista de Comentarios</a>
        </div>
    </div>
</body>
</html>

