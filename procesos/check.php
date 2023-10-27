<?php
if (!filter_has_var(INPUT_POST, 'EnvioCheck')) // Comprueba si el campo 'EnvioCheck' existe en la solicitud POST
{
    
    header('Location: ../index.php?error=Debes rellenar el formulario para acceder a check.php'); // Si no existe, redirige al usuario a index.php con un mensaje de error y termina el script.
    exit();
} 

else 
{
    session_start(); // Iniciamos la sesión.

    $contra = $_POST['contra']; // Obtenemos la contraseña del formulario.

    include('conexion.php'); // Incluimos el archivo de conexión a la base de datos.

    $consulta = "SELECT * FROM tbl_profesores WHERE nombre_profe = ?"; // Consulta SQL con marcador de posición.

    if ($stmt = $conn->prepare($consulta)) // Preparamos la consulta SQL con un marcador de posición.
    {
        $stmt->bind_param('s', $_SESSION['user']); // Vinculamos el valor de $_SESSION['user'] al marcador de posición.
        
        $stmt->execute(); // Ejecutamos la consulta preparada.
        
        $result = $stmt->get_result(); // Obtenemos el resultado de la consulta.

        if ($result->num_rows === 1) 
        {
            $fila = $result->fetch_assoc(); // Si encontramos una fila que coincide con el usuario en la base de datos.

            $contra_profe = $fila['contra_profe'];  // Obtenemos la contraseña almacenada en la base de datos.

            $contra_encriptada = hash("sha256", $contra); // Encriptamos la contraseña proporcionada por el usuario.

            if (hash_equals($contra_encriptada, $contra_profe)) // Comparamos la contraseña encriptada del usuario con la almacenada en la base de datos.
            {  
                echo "¡Bienvenido, " . $_SESSION['user'] . "! La contraseña es correcta. <br>"; // Si coinciden, se da la bienvenida.
                
            } 
            
            else {
                header('Location: ../index.php?error=Usuario o contraseña incorrectos'); // Si no coinciden, redirige al usuario a index.php con un mensaje de error.
                exit();
            }
        }
        $stmt->close(); // Cerramos la consulta preparada.
    }
    $conn->close(); // Cerramos la conexión a la base de datos.
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CHECK</title>
    </head>

    <body>
        <form action="./cerrar_sesion.php" method="post">
            <input type="submit" name="enviar" id="enviar" value="Cerrar Sesion">
        </form>
    </body>
</html>
