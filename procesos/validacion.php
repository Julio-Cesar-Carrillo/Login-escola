<?php
    if (!filter_has_var(INPUT_POST, 'enviar')) {
        header('Location: ../index.php?error=Debes de rellenar el formulario para acceder a validacion.php');
        exit();
    } else {
        $user = $_POST['user'];
        $contra = $_POST['pass'];

        // Pasa el usuario y la contraseña a check.php utilizando una solicitud POST
        echo "<form id='EnvioCheck' name='EnvioCheck' action='check.php' method='POST'>";
        echo "<input type='hidden' name='user' value='" . $user . "'>";
        echo "<input type='hidden' name='contra' value='" . $contra . "'>";
        echo "<input type='hidden' name='EnvioCheck' value='1'>"; // Agrega una bandera para indicar que esta es una presentación de formulario
        echo "</form>";

        // Envía automáticamente el formulario
        echo "<script>document.getElementById('EnvioCheck').submit();</script>";
    }
?>
