<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes</title>
    <link rel="stylesheet" href="styles/styles_ej5.css">
</head>
<body>
    
    <div class="gallery-container">
        <h1>Galería de Imágenes</h1>
        <div class="btn_retorno">
            <a href="index.php" class="return-button">Volver al índice</a>
        </div>
        <ul class="image-list">
            <?php
            $directorio = "img/"; 
            $imagenes = glob($directorio . "*.{jpg,png,gif}", GLOB_BRACE);

            foreach ($imagenes as $imagen) {
                echo "<li><img src='$imagen' alt='Imagen'></li>";
            }
            ?>
        </ul>
    </div>

    <script src="script/script_ej5.js"></script>
</body>
</html>
