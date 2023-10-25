<?php
if (!filter_has_var(INPUT_POST, 'EnvioCheck')) 
{
    header('Location: ' . './index.php?error=Debes rellenar el formulario para acceder a check.php');
    exit();
} 

else 
{ // Incluimos el archivo de conexión a la base de datos.
    include('conexion.php');

    $user = $_POST['user'];
    $contra = $_POST['contra'];

    // Consulta SQL para buscar el usuario en la base de datos
    $consulta = "SELECT * FROM tbl_profesores WHERE nombre_profe = '$user'";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $contra_profe = $fila['contra_profe']; // CONTRASEÑA QUE TIENE EL USUARIO
        $contra_encriptada = hash("sha256", $contra); // ENCRIPTADO DE LA CONTRASEÑA DEL FORMULARIO

        // Comprueba si la contraseña es correcta
        if ((hash_equals($contra_encriptada, $contra_profe))) {
            echo "¡Bienvenido, $user! La contraseña es correcta.";
        }

        else
        {
            header('Location: '.'./index.php?Usuario o contraseña incorrectos');
        }
    }
    // Cierra la conexión a la base de datos
    $conn->close();
}
