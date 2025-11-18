<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 00</title>
    </head>

    <body>
        <?php
        /*  @author Cristian Mateos Vega
         *  @since 17/11/2025
         */
        
        echo '<h1>$_SERVER</h1>';
        echo '<table><tr><th>Variable $_SERVER</th><th>Valor</th></tr>';
        foreach ($_SERVER as $clave => $valor) {
            echo "<tr><th>$$clave</th><td>" . $valor . "</td></tr>";
        }
        echo '</table>';
        
        echo '<h1>$_COOKIE</h1>';
        echo '<table><tr><th>Variable $_COOKIE</th><th>Valor</th></tr>';
        foreach ($_COOKIE as $clave => $valor) {
            echo "<tr><th>$$clave</th><td>" . $valor . "</td></tr>";
        }
        echo '</table>';
        
        echo '<h1>$_REQUEST</h1>';
        echo '<table><tr><th>Variable $_REQUEST</th><th>Valor</th></tr>';
        foreach ($_REQUEST as $clave => $valor) {
            echo "<tr><th>$$clave</th><td>" . $valor . "</td></tr>";
        }
        echo '</table>';
        
        echo '<h1>$_GET</h1>';
        echo '<table><tr><th>Variable $_GET</th><th>Valor</th></tr>';
        foreach ($_GET as $clave => $valor) {
            echo "<tr><th>$$clave</th><td>" . $valor . "</td></tr>";
        }
        echo '</table>';

        echo '<h1>$_POST</h1>';
        echo '<table><tr><th>Variable $_POST</th><th>Valor</th></tr>';
        foreach ($_POST as $clave => $valor) {
            echo "<tr><th>$$clave</th><td>" . $valor . "</td></tr>";
        }
        echo '</table>';

        echo '<h1>$_FILES</h1>';
        echo '<table><tr><th>Variable $_FILES</th><th>Valor</th></tr>';
        foreach ($_FILES as $clave => $valor) {
            echo "<tr><th>$$clave</th><td>" . $valor . "</td></tr>";
        }
        echo '</table>';

        echo '<h1>$_ENV</h1>';
        echo '<table><tr><th>Variable $_ENV</th><th>Valor</th></tr>';
        foreach ($_ENV as $clave => $valor) {
            echo "<tr><th>$$clave</th><td>" . $valor . "</td></tr>";
        }
        echo '</table>';
        
        
        echo phpinfo();
        ?>
    </body>

</html>