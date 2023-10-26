<?php
    if (!filter_has_var(INPUT_POST, 'enviar')) 
    {
        header('Location: '.'./index.php?error=Debes de rellenar el formulario para acceder a validacion.php'); // Comprueba si en post existe 'enviar', si no existe te redirige a index con un mensaje de error.
        exit();
    }

    else 
    {
        $user = $_POST['user'];        
        $contra = $_POST['pass'];
        echo "<form id='EnvioCheck' name='enviar' action='check.php' method='POST'>";
            echo"<input type='hidden' id='user' name='user' value='".$user."'>";
            echo"<input type='hidden' id='contra' name='contra' value='".$contra."'>";
        echo "</form>";
        echo "<script>document.getElementById('EnvioCheck').submit();</script>";
    }
?>
