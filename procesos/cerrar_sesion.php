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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar sessión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    

        <p style="text-align: center; font-size: 2vw;">Adiós <?php echo $_SESSION['user']; ?>, hasta la próxima!<br></p> <!-- Se despide del usuario cogiendo la variable de sesión -->
        
        <p style="text-align: center;">Si quieres volver al login presiona a Daniel</p><br> <!-- Te redirige a index.php -->

        <a href='../index.php'>
            <img src='../img/danieh.jpeg' width='10%' style='float: center; margin-left: 45%; border-radius: 10px;'>
        </a>
</body>
</html>
<?php
        // Destruir todas las variables de sesion
        session_unset();

        // Destruir la sesión
        session_destroy();
    }
    exit();
?>