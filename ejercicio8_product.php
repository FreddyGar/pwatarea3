<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="styles/styles_ej8.css">
</head>
<body>
    <?php
    // Verificar si se proporciona un ID de producto
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root"; // Cambia esto a tu usuario de MySQL
        $password = ""; // Cambia esto a tu contraseña de MySQL
        $dbname = "tarea_practica_3";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        // Obtener detalles del producto
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM productos WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>{$row['nombre']}</h1>";
            echo "<p><strong>Precio:</strong> {$row['precio']} USD</p>";
            echo "<p><strong>Descripcion:</strong> {$row['descripcion']}</p>";
            echo "<p><a href='ejercicio8_cart.php?action=add&id={$row['id']}'>Agregar al Carrito</a></p>";
        } else {
            echo "Producto no encontrado.";
        }

        // Cerrar conexión
        $conn->close();
    } else {
        echo "ID de producto no proporcionado.";
    }
    ?>

    <div class="cart-link">
        <a href="ejercicio8_cart.php">Ver Carrito</a>
    </div>
</body>
</html>
