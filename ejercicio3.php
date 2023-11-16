<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
    <link rel="stylesheet" type="text/css" href="styles/styles_ej3.css">
    <script>
        // Función para incrementar el contador de visitas en localStorage
        function incrementarContador() {
            if (typeof Storage !== "undefined") {
                // Comprobar si localStorage es compatible con el navegador
                if (localStorage.getItem("visitas")) {
                    // Si ya existe la clave "visitas" en localStorage, incrementar el valor
                    var visitas = parseInt(localStorage.getItem("visitas"));
                    visitas++;
                    localStorage.setItem("visitas", visitas);
                } else {
                    // Si no existe la clave "visitas" en localStorage, crearla y establecer el valor en 1
                    localStorage.setItem("visitas", 1);
                }
            } else {
                console.error("¡LocalStorage no es compatible con este navegador!");
            }
        }

        // Llamar a la función al cargar la página
        window.onload = function () {
            incrementarContador();
            // Actualizar el contenido de la etiqueta con el número de visitas desde localStorage
            document.getElementById("contador-visitas").innerText = localStorage.getItem("visitas");
        };
    </script>
</head>
<body>
    <div class="container">
        <h1>Contador de visitas</h1>
        <p>Número de visitas: <span id="contador-visitas"><?php echo isset($_SESSION['visitas']) ? $_SESSION['visitas'] : 0; ?></span></p>
    </div>
    <div class="btn_retorno">
        <a href="index.php" class="return-button">Volver al índice</a>
    </div>
</body>
</html>
