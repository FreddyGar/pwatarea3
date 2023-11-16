<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios</title>
    <link rel="stylesheet" href="styles/styles_ej9.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Comentarios</h1>

        <?php
        // Iniciar la sesión si no está iniciada
        session_start();

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root"; // Cambia esto a tu usuario de MySQL
        $password = ""; // Cambia esto a tu contraseña de MySQL
        $dbname = "tarea_practica_3";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        // Obtener comentarios de la base de datos
        $sql = "SELECT * FROM comentarios";
        $result = $conn->query($sql);

        // Verificar si hay comentarios
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Fecha</th><th>Comentario</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['fecha']}</td>";
                echo "<td>{$row['comentario']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay comentarios disponibles.</p>";
        }

        // Cerrar conexión
        $conn->close();
        ?>

        <!-- Enlace para agregar un nuevo comentario -->
        <div class="back-link">
            <a href="ejercicio9_comment.php">Agregar Comentario</a>
        </div>

        <!-- Enlace para volver al formulario de comentarios -->
        <div class="back-link">
            <a href="index.php">Volver al índice</a>
        </div>
    </div>
</body>
</html>
