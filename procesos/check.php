<?php
    if (!filter_has_var(INPUT_POST, 'EnvioCheck')) // Comprueba si en el POST existe EnvioCheck
    {
        header('Location: ../index.php?error=Debes rellenar el formulario para acceder a check.php'); // Si no existe te redirige a index.php con un mensaje de error.
        exit();
    } 
    
    else 
    {
        session_start(); // Iniciamos la sesión.

        $contra = $_POST['contra'];

        // Incluimos el archivo de conexión a la base de datos.
        include('conexion.php');

        // Consulta SQL para buscar el usuario en la base de datos
        $consulta = "SELECT * FROM tbl_profesores WHERE nombre_profe = '" . $_SESSION['user'] . "'"; // Crea una consulta a la base de datos con los parámetros.
        $resultado = $conn->query($consulta); // Realiza la consulta.

        if ($resultado->num_rows === 1) // Si un resultado coincide comprueba si la contraseña introducida y la asignada al profesor son la misma.
        {
            $fila = $resultado->fetch_assoc();
            $contra_profe = $fila['contra_profe']; // CONTRASEÑA QUE TIENE EL USUARIO
            $contra_encriptada = hash("sha256", $contra); // ENCRIPTADO DE LA CONTRASEÑA DEL FORMULARIO

            // Comprueba si la contraseña es correcta
            if (hash_equals($contra_encriptada, $contra_profe)) 
            {
                echo "¡Bienvenido, " . $_SESSION['user'] . "! La contraseña es correcta."; // Si lo son te da la bienvenida.
            }

            else
            {   
                header('Location: ../index.php?error=Usuario o contraseña incorrectos'); // Si no lo son te redirige a index.php con un mensaje de error.
                exit();
            }
        } 
        $conn->close();   
    }
?>
