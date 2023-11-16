<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="styles/styles_ej7.css">
</head>
<body>
    <div class="container">
        <h1>Registro Exitoso</h1>
        <p>¡Gracias por registrarte!</p>

        <?php
        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root"; // Cambia esto a tu usuario de MySQL
        $password = ""; // Cambia esto a tu contraseña de MySQL
        $dbname = "tarea_practica_3";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        // Consulta SQL para obtener todos los usuarios
        $sql = "SELECT * FROM usuarios_reg";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Correo Electrónico</th><th>Contraseña</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["email"] . "</td><td>" . $row["contrasena"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No hay usuarios registrados.";
        }

        // Cerrar conexión
        $conn->close();
        ?>

        <a href="ejercicio7.php">Volver al formulario de registro</a>
    </div>
</body>
</html>

