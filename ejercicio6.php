<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="styles/styles_ej6.css">
</head>
<body>
    <?php
    session_start();

    // Verificar si el usuario ya está autenticado
    if (isset($_SESSION['username'])) {
        header("Location: welcome.php");
        exit();
    }

    // Inicializar la variable de error
    $error_message = "";

    // Verificar si se envió el formulario de login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Datos de la base de datos (modifica según tus credenciales)
        $servername = "localhost";
        $username = "root"; // Cambia esto a tu usuario de MySQL
        $password = ""; // Cambia esto a tu contraseña de MySQL
        $dbname = "tarea_practica_3";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        // Obtener datos del formulario
        $user = $_POST['username'];
        $pass = $_POST['password'];

        // Consulta SQL para verificar las credenciales
        $sql = "SELECT * FROM usuarios_login WHERE username = '$user' AND password = '$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Usuario autenticado, iniciar sesión y redirigir
            $_SESSION['username'] = $user;
            header("Location: ejercicio6_welcome.php");
            exit();
        } else {
            // Credenciales incorrectas
            $error_message = "Usuario o contraseña incorrectos";
        }

        // Cerrar conexión
        $conn->close();
    }
    ?>

    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>

        <!-- Contenedor para el mensaje de error -->
        <div class="error-container">
            <?php echo $error_message; ?>
        </div>

        <div class="btn_retorno">
            <a href="index.php" class="return-button">Volver al índice</a>
        </div>
    </div>
</body>
</html>
