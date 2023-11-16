<?php
session_start();

// Inicializar variables
$nombre = $email = $password = $confirmPassword = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre
    if (empty($_POST["nombre"])) {
        $errors["nombre"] = "El nombre es requerido";
    } else {
        $nombre = test_input($_POST["nombre"]);
    }

    // Validar correo electrónico
    if (empty($_POST["email"])) {
        $errors["email"] = "El correo electrónico es requerido";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Formato de correo electrónico inválido";
        }
    }

    // Validar contraseña
    if (empty($_POST["password"])) {
        $errors["password"] = "La contraseña es requerida";
    } else {
        $password = $_POST["password"];
    }

    // Validar confirmación de contraseña
    if (empty($_POST["confirmPassword"])) {
        $errors["confirmPassword"] = "Por favor, confirme la contraseña";
    } else {
        $confirmPassword = $_POST["confirmPassword"];
        if ($password != $confirmPassword) {
            $errors["confirmPassword"] = "Las contraseñas no coinciden";
        }
    }

    // Si no hay errores, procesar el registro
    if (empty($errors)) {
        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root"; // Cambia esto a tu usuario de MySQL
        $password = ""; // Cambia esto a tu contraseña de MySQL
        $dbname = "tarea_practica_3";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        // Hash de la contraseña (seguridad)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Consulta SQL para insertar el usuario en la base de datos
        $sql = "INSERT INTO usuarios_reg (nombre, email, contrasena) VALUES ('$nombre', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Redirigir a una página de éxito o hacer lo que sea necesario
            header("Location: ejercicio7_registro_exitoso.php");
            exit();
        } else {
            echo "Error al registrar el usuario: " . $conn->error;
        }

        // Cerrar conexión
        $conn->close();
    }
}

// Función para limpiar los datos de entrada
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="styles/styles_ej7.css">
</head>
<body>
    <div class="registro-container">
        <h1>Formulario de Registro</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                <span class="error"><?php echo isset($errors["nombre"]) ? $errors["nombre"] : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo isset($errors["email"]) ? $errors["email"] : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password">
                <span class="error"><?php echo isset($errors["password"]) ? $errors["password"] : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirmar Contraseña:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
                <span class="error"><?php echo isset($errors["confirmPassword"]) ? $errors["confirmPassword"] : ""; ?></span>
            </div>

            <button type="submit">Registrar</button>
            <div class="btn_retorno">
            <a href="index.php" class="return-button">Volver al índice</a>
        </div>
        </form>
    </div>
</body>
</html>
