<?php
    session_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IES Contreras</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">

        <!-- FUENTE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Lora&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="f-login">
            <div class="logo">
                <img src="img/logo.png" alt="Error al cargar el logo" srcset="">
            </div>
            
            <div class="formulario">
                <form id="login" action="validacion.php" method="post">
                    <h2>Iniciar Sesión</h2>
                    <div class="mb-3">
                        <label for="exampleInputUser1" class="form-label">Nombre de usuario:</label>
                        <input type="text" name="user" class="form-control" id="user" aria-describedby="userHelp">
                        <!-- <div id="userHelp" class="form-text">No comparta sus credenciales con nadie.</div> -->
                        <p style="display: none; color: red;" id="alertauser">¡El formato de usuario que intenta introducir no es valido!</p>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" name="pass" class="form-control" id="pass">
                        <p style="display: none; color: red;" id="alertapass">¡La contraseña debe de tener almenos 9 caracteres!</p>
                    </div>
                    <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary" style="background-color: #034b66; border-color: #023b56;" name="enviar">Enviar</button>
                </form>
            </div>
        </div>

        <script>
            function validarUser(user) 
            {
                const regex = /^[a-zA-Z]*$/;
                return regex.test(user);
            }

            // Obtener el formulario por su ID
            const userF = document.getElementById('user');
            const passF = document.getElementById('pass');

            // Agregar un manejador de eventos para el envío del formulario
            userF.addEventListener('input', function () 
            {
                // Obtener los valores de los campos de entrada
                const user = document.getElementById('user');
                console.log(user.value);
                const alertauser = document.getElementById('alertauser');

                if (validarUser(user.value)) 
                {
                    console.log("Usuario no valido.");
                    alertauser.style.display = 'none';

                }
                
                else if (user.value.length < 1) 
                {
                    alertauser.style.display = 'none';
                }
                
                else 
                {
                    alertauser.style.display = 'block';
                    console.log("El usuario no es válido.");
                }
            });

            passF.addEventListener('input', function () 
            {
                // Obtener los valores de los campos de entrada
                const pass = document.getElementById('pass');
                console.log(pass.value.length);
                const alertapass = document.getElementById('alertapass');

                if (pass.value.length < 1) 
                {
                    alertapass.style.display = 'none';
                }
                
                else if (pass.value.length < 9) {
                    console.log("La contraseña debe de tener almenos 9 caracteres");
                    alertapass.style.display = 'block';
                } 
                
                else 
                {
                    alertapass.style.display = 'none';
                }

            });
        </script>
    </body>
</html>