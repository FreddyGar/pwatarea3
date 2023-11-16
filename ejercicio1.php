<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 7: Menú de Navegación Desplegable</title>
    <link rel="stylesheet" type="text/css" href="styles/styles_ej1.css">
</head>
<body>
    <h1>Menú de Navegación Desplegable</h1>
    <div class="navigation-container">
        <ul class="menu">
            <li><a href="#">Inicio</a></li>
            <li class="has-submenu">
                <a href="#">Servicios</a>
                <ul class="submenu">
                    <li><a href="#">Diseño Web</a></li>
                    <li><a href="#">Desarrollo Web</a></li>
                    <li><a href="#">Marketing Digital</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#">Productos</a>
                <ul class="submenu">
                    <li><a href="#">Producto 1</a></li>
                    <li><a href="#">Producto 2</a></li>
                    <li><a href="#">Producto 3</a></li>
                </ul>
            </li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </div>

    <div class="btn_retorno">
        <a href="index.php" class="return-button">Volver al índice</a>
    </div>

    <script src="script/script_ej1.js"></script>
</body>
</html>
