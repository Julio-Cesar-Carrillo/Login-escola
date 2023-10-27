<?php
    session_start(); // Iniciamos la sesión.

    if (!isset($_POST['enviar'])) 
    {
        header('Location: ../index.php?error=Debes rellenar el formulario para acceder a validacion.php');
        exit();
    }

    if (isset($_POST['user'])) 
    {
        $_SESSION['user'] = $_POST['user'];
    }

    if (isset($_POST['pass'])) 
    {
        $pass = $_POST['pass'];
        $_SESSION['pass'] = $pass;
    }

    header("Location: check.php");
    exit();
?>
