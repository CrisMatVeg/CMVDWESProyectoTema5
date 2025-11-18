<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 03</title>
    </head>

    <body>
        <?php
            /*  @author Cristian Mateos Vega
            *  @since 18/11/2025
            */
            require_once '../core/231018libreriaValidacion.php';

            //Inicialización de variables
            $entradaOK = true;
            define("HOST", "10.199.8.248");
            define("DBNAME", "DBCMVDWESProyectoTema5");
            define("USERNAME", "userCMVDWESProyectoTema5");
            define("PASSWORD", "paso");
            define("DSN", "mysql:host=" . HOST . "; dbname=" . DBNAME);
            $login=null;
            $claveIngresada=null;
            $usuario=null;
            $consulta=null;
            $consulta2=null;
            $consulta3=null;

            // ====== 1. Conexión con PDO ======
            try {
                $miDB = new PDO(DSN, USERNAME, PASSWORD);
                $consulta = $miDB->prepare("
                SELECT * FROM T01_Usuarios WHERE T01_CodUsuario = :login AND T01_Password = SHA2(:password,256)
                ");
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
            
            // ====== 2. Solicitar credenciales si no llegan ======
            if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
                header('WWW-Authenticate: Basic realm="Zona Segura"');
                header('HTTP/1.0 401 Unauthorized');
                echo "Debes autenticarte para continuar.";
                exit;
            }
            $login = $_SERVER['PHP_AUTH_USER'];
            $claveIngresada = $_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'];

            // ====== 3. Consultar usuario en la base de datos ======
            $consulta->execute([':login' => $login, ':password'=>$claveIngresada]);
            $usuario = $consulta->fetchAll(PDO::FETCH_OBJ);

            // ====== 4. Validación ======
            if (!$usuario) {
                // Usuario no encontrado
                header('WWW-Authenticate: Basic realm="Zona Segura"');
                header('HTTP/1.0 401 Unauthorized');
                echo "Usuario no válido.";
                exit;
            }

            // ====== 5. Actualizar contador y fecha de conexión ======
            $consulta2 = $miDB->prepare("
            UPDATE T01_Usuarios
            SET T01_NumConexiones = T01_NumConexiones + 1,
                T01_FechaHoraUltimaConexion = NOW()
            WHERE T01_CodUsuario = :login AND T01_Password = SHA2(:password,256)
            ");
            $consulta2->execute([':login' => $login, ':password' => $claveIngresada]);

            $consulta3 = $miDB->prepare("
                SELECT T01_DescUsuario FROM T01_Usuarios WHERE T01_CodUsuario = :login AND T01_Password = SHA2(:password,256)
                ");
            $consulta3->execute([':login' => $login, ':password' => $claveIngresada]);
            $nombreCompleto =  $consulta3->fetchAll(PDO::FETCH_ASSOC);
            echo "<h1>Bienvenid@, " . $nombreCompleto[0]['T01_DescUsuario'] . "</h1>";
            echo "<p>Has accedido correctamente a la zona protegida.</p>";
        ?>
    </body>
</html>