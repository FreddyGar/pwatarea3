// script_ej4.js
let numeroAleatorio = Math.floor(Math.random() * 10) + 1; // Cambiado a let para permitir reasignación
let intentos = 0;

function adivinarNumero() {
    const numeroUsuario = parseInt(document.getElementById("numeroInput").value);

    if (numeroUsuario === numeroAleatorio) {
        mostrarResultado("¡Felicidades! Has adivinado el número.");
    } else {
        intentos++;
        mostrarResultado(`Intenta de nuevo. Intentos realizados: ${intentos}`);
    }
}

function reiniciarJuego() {
    numeroAleatorio = Math.floor(Math.random() * 10) + 1; // Reasignar el valor
    intentos = 0;
    document.getElementById("numeroInput").value = "";
    document.getElementById("resultado").innerHTML = "";
}

function mostrarResultado(mensaje) {
    document.getElementById("resultado").innerHTML = mensaje;
}
