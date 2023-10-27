<?php
    if (!filter_has_var(INPUT_POST, 'enviar')) 
    {
        header('Location: ../index.php?error=Debes de rellenar el formulario para acceder a validacion.php');
        exit();
    } 
    
    else 
    {
        // Iniciamos sesion para poder trabajar con las variables $_SESSION
        session_start();

        echo "Adiós " . $_SESSION['user'] . "<br>"; // Se despide del usuario cogiendo la variable de sesión
        
        echo "<a href='../index.php'>Volver</a>"; // Te redirige a index.php

        // Destruir todas las variables de sesion
        session_unset();

        // Destruir la sesión
        session_destroy();
    }
    exit();
?>