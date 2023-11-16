<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 5: Validación de Formulario</title>
    <link rel="stylesheet" type="text/css" href="styles/styles_ej2.css">
</head>
<body>
    <h1>Validación de Formulario</h1>
    <div class="form-container">
        <h2>Formulario de Contacto</h2>
        <form id="registroForm">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="btn_retorno">
        <a href="index.php" class="return-button">Volver al índice</a>
    </div>

    <script src="script/script_ej2.js"></script>
</body>
</html>
