<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 01</title>
    </head>

    <body>
        <?php
            /*  @author Cristian Mateos Vega
            *  @since 17/11/2025
            */
            $aUsuarios = [
                "cristian" => [hash('sha256', 'cristianpaso'), "Cristian Mateos Vega"],
                "admin" => [hash('sha256', 'adminpaso'), "Administrador"],
            ];
            $nombreCompleto = null;

            //si no se han enviado las credenciales hay que pedir autenticación
            if (!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || !array_key_exists($_SERVER['PHP_AUTH_USER'], $aUsuarios) || $aUsuarios[$_SERVER['PHP_AUTH_USER']][0] !== hash('sha256', $_SERVER['PHP_AUTH_PW'])) {
                header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                header('HTTP/1.0 401 Unauthorized');
                echo "Acceso restringido. Debes autenticarte.";
                exit;
            }

            // Si llegamos hasta aquí, usuario válido
            $nombreCompleto = $aUsuarios[$_SERVER['PHP_AUTH_USER']][1];
            echo "<h1>Bienvenid@, $nombreCompleto</h1>";
            echo "<p>Has accedido correctamente a la zona protegida.</p>";
        ?>
    </body>

</html>

 