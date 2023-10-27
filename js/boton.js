// Espera a que se cargue todo el documento antes de ejecutar el código
document.addEventListener("DOMContentLoaded", function() {
    // Obtiene referencias a los campos de usuario, contraseña y al botón de envío
    const userField = document.getElementById("user");
    const passField = document.getElementById("pass");
    const submitBtn = document.getElementById("submitBtn");

    // Agrega un evento de escucha para el evento "input" en los campos de usuario y contraseña
    userField.addEventListener("input", validateForm);
    passField.addEventListener("input", validateForm);

    // Define la función "validateForm" que se ejecutará cuando cambie el contenido de los campos de usuario y contraseña
    function validateForm() {
        // Comprueba si ambos campos no están vacíos (sin espacios en blanco)
        if (userField.value.trim() !== "" && passField.value.trim() !== "") {
            // Habilita el botón de envío si ambos campos no están vacíos
            submitBtn.removeAttribute("disabled");
        } else {
            // Deshabilita el botón de envío si al menos uno de los campos está vacío
            submitBtn.setAttribute("disabled", "disabled");
        }
    }
});
