<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles/styles_ej8.css">
</head>
<body>
    <h1>Lista de Productos</h1>

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

    // Obtener productos de la base de datos
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>{$row['nombre']}</strong> - {$row['precio']} USD<br>";
            echo "{$row['descripcion']}<br>";
            echo "<a href='ejercicio8_product.php?id={$row['id']}'>Ver Detalles</a> | ";
            echo "<a href='ejercicio8_cart.php?action=add&id={$row['id']}'>Agregar al Carrito</a>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay productos disponibles.";
    }

    // Cerrar conexión
    $conn->close();
    ?>

    <div class="cart-link">
        <a href="ejercicio8_cart.php">Ver Carrito</a>
    </div>
    <div class="btn_retorno">
            <a href="index.php" class="return-button">Volver al índice</a>
        </div>
</body>
</html>
