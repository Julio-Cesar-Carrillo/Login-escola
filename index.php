<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión - IES Contreras</title>
    </head>

    <body>
        <form action="validacion.php" method="post">
            <!-- Comprueba si el usuario está vacío. -->
            <?php if (isset($_GET['userVacio'])) {echo "Nombre de usuario vacío. <br>"; } ?>
            <!-- Comprueba el formato -->
            <?php if (isset($_GET['userMal'])) {echo "Formato incorrecto de nombre de usuario.<br>"; } ?>
            <label for="user">Usuario:</label>
            <input type="text" name="user" id="user" placeholder="User.">
            
            <br><br>
            
            <!-- Comprueba si la contraseña está vacío. -->
            <?php if (isset($_GET['passwordVacio'])) {echo "Contraseña vacío. <br>"; } ?>
            <!-- Comprueba el formato -->
            <?php if (isset($_GET['passwordCorta'])) {echo "Contraseña corta.<br>"; } ?>
            <label for="contra">Contraseña:</label>
            <input type="text" name="contra" id="contra" placeholder="Contra.">

            <br><br>

            <input type="submit" id="enviar" name="enviar">
        </form>
    </body>
</html>