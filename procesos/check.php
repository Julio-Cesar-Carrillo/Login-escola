<?php
    session_start(); // Iniciamos la sesión.

    if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) 
    {
        header('Location: ../index.php?error=Debes rellenar el formulario para acceder a check.php');
        exit();
    }

    include('conexion.php'); // Incluimos el archivo de conexión a la base de datos.

    $consulta = "SELECT * FROM tbl_profesores WHERE nombre_profe = ?";
    if ($stmt = $conn->prepare($consulta))
    {
        $stmt->bind_param('s', $_SESSION['user']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) 
        {
            $fila = $result->fetch_assoc();
            $contra_profe = $fila['contra_profe'];
            $pass = $_SESSION['pass'];
            $contra_encriptada = hash("sha256", $pass);

            if (hash_equals($contra_encriptada, $contra_profe)) 
            {
                echo "¡Bienvenido, " . $_SESSION['user'] . "! La contraseña es CORRECTA. <br>";
            } 
            
            else 
            {
                header('Location: ../index.php?Usuario o contraseña INCORRECTAS');
            }
        }

        $stmt->close();
    }

    $conn->close();
?>
