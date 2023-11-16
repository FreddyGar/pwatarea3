<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: ejercicio6.php");
    exit();
}

// Procesar el cierre de sesión si se hace clic en el botón
if (isset($_POST['logout'])) {
    // Destruir la sesión
    session_destroy();
    
    // Redirigir al formulario de inicio de sesión (ejercicio6.php en este caso)
    header("Location: ejercicio6.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles_ej6.css">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
    <form method="post" action="">
        <button type="submit" name="logout">Cerrar sesión</button>
    </form>
</body>
</html>
