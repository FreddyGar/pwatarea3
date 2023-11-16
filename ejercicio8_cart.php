<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Función para agregar un producto al carrito
function addToCart($product_id) {
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
}

// Función para eliminar un producto del carrito
function removeFromCart($product_id) {
    $index = array_search($product_id, $_SESSION['cart']);
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
    }
}

// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto a tu usuario de MySQL
$password = ""; // Cambia esto a tu contraseña de MySQL
$dbname = "tarea_practica_3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Verificar si se realizó una acción
if (isset($_GET['action']) && isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Realizar la acción correspondiente
    switch ($_GET['action']) {
        case 'add':
            addToCart($product_id);
            break;
        case 'remove':
            removeFromCart($product_id);
            break;
        default:
            // Acción no válida
            break;
    }
}

// Obtener detalles de los productos en el carrito
$cart_products = array();
foreach ($_SESSION['cart'] as $product_id) {
    $sql = "SELECT * FROM productos WHERE id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cart_products[] = $row;
    }
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles/styles_ej8.css">
</head>
<body>
    <h1>Carrito de Compras</h1>

    <?php
    if (count($cart_products) > 0) {
        echo "<ul>";
        foreach ($cart_products as $product) {
            echo "<li>";
            echo "<strong>{$product['nombre']}</strong> - {$product['precio']} USD<br>";
            echo "<a href='ejercicio8_product.php?id={$product['id']}'>Ver Detalles</a> | ";
            echo "<a href='ejercicio8_cart.php?action=remove&id={$product['id']}'>Eliminar del Carrito</a>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "El carrito está vacío.";
    }
    ?>

    <div class="cart-link">
        <a href="ejercicio8.php">Volver a la Lista de Productos</a>
    </div>
</body>
</html>
