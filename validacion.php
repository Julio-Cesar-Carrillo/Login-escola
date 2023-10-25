<?php
    if (!filter_has_var(INPUT_POST, 'enviar')) 
    {
        header('Location: '.'./index.php?error=Debes de rellenar el formulario (validacion.php)'); // Comprueba si en post existe 'enviar', si no existe te redirige a index con un mensaje de error.
        exit();
    }

    else 
    {
        $error = ""; // Iniciamos un array vacío.
    
        include('funciones.php'); // Incluimos el fichero con las funciones.

        // Variables con el valor de usuario. 
        $user = $_POST['user'];

        if (validaCampoVacio($user)) // Comprueba si el campo está vacío.
        {
            if (!$errores)
            {
                $errores .="?userVacio=true";
            } 
            
            else 
            {
                $errores .="&userVacio=true";        
            }
        } 
        
        else 
        {
            if(!preg_match("/^[a-zA-Z]*$/",$user)) // Comprueba el formato, solo acepta letras
            {
                if (!$errores)
                {
                    $errores .="?userMal=true";
                } 
                
                else 
                {
                    $errores .="&userMal=true";        
                }
            }
        }
        
        // Variables con el valor de la contraseña. 
        $contra = $_POST['contra'];
        if (validaCampoVacio($contra)) // Comprueba si el campo está vacío.
        {
            if (!$errores)
            {
                $errores .= "?passwordVacio=true";
            } 
            else 
            {
                $errores .= "&passwordVacio=true";        
            }
        } 

        else 
        {
            if (strlen($contra) < 9) // La contraseña ha de tener 9 carácteres
            {
                if (!$errores)
                {
                    $errores .= "?passwordCorta=true";
                } 
                else 
                {
                    $errores .= "&passwordCorta=true";        
                }
            }
        }

        if ($errores != "") // Comprueba si el array tiene contenido.
        {
            $datosRecibidos = array // Creamos un array con los datos recibidos.
            (
                'user' => $user,
                'contra' => $contra
            );

            $datosDevueltos = http_build_query($datosRecibidos); // Creamos una query con los datos del array.

            header('Location: ./index.php' . $errores . '&' . $datosDevueltos); // Te redirige a index con los mensajes de error en la URL.
        }

        else 
        {
            echo "<form id='EnvioCheck' name='enviar' action='check.php' method='POST'>";
                echo"<input type='hidden' id='user' name='user' value='".$user."'>";
                echo"<input type='hidden' id='contra' name='contra' value='".$contra."'>";
            echo "</form>";
            echo "<script>document.getElementById('EnvioCheck').submit();</script>";
        }
    }
?>
