<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinanzas</title>
    <link rel="stylesheet" href="styles/styles_ej4.css">
</head>
<body>
    <div class="container">
        <h1>Juego de Adivinanzas</h1>
        <p>Adivina el número entre 1 y 10:</p>
        <input type="number" id="numeroInput" min="1" max="10">
        <button onclick="adivinarNumero()">Adivinar</button>
        <p id="resultado"></p>
        <button onclick="reiniciarJuego()">Reiniciar Juego</button>
    </div>
    <div class="btn_retorno">
        <a href="index.php" class="return-button">Volver al índice</a>
    </div>
    <script src="script/script_ej4.js"></script>
</body>
</html>
