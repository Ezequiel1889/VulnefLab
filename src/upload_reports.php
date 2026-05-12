<?php
session_start();
// Control de acceso para que no entren sin loguearse
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mantenimiento - Carga de Parches</title>
    <style>
        body { background: #0d1117; color: #c9d1d9; font-family: 'Segoe UI', sans-serif; text-align: center; margin: 0; padding: 20px; }
        .box { 
            background: #161b22; 
            border: 1px solid #30363d; 
            margin: 50px auto; 
            width: 450px; 
            padding: 40px; 
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        h3 { color: #58a6ff; margin-bottom: 20px; }
        .file-input { margin: 20px 0; }
        .btn-subir { 
            background: #238636; 
            color: white; 
            border: none; 
            padding: 12px 25px; 
            border-radius: 6px; 
            font-weight: bold; 
            cursor: pointer; 
            transition: 0.3s;
        }
        .btn-subir:hover { background: #2ea043; }
        .status-msg { 
            margin-top: 25px; 
            padding: 15px; 
            border-radius: 6px; 
            background: rgba(46, 160, 67, 0.15); 
            border: 1px solid #2ea043; 
            color: #3fb950;
            font-weight: bold;
        }
        .error-msg { 
            margin-top: 25px; 
            padding: 15px; 
            border-radius: 6px; 
            background: rgba(248, 81, 73, 0.15); 
            border: 1px solid #f85149; 
            color: #f85149;
        }
        .back-link { display: inline-block; margin-top: 30px; color: #8b949e; text-decoration: none; font-size: 0.9em; }
        .back-link:hover { color: #58a6ff; }
    </style>
</head>
<body>
    <div class="box">
        <h3>🚀 Mantenimiento de Sistema</h3>
        <p style="color: #8b949e;">Cargar parche de seguridad para actualizar el nodo.</p>
        
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="archivo" class="file-input">
            <br>
            <input type="submit" name="subir" value="DESPLEGAR PARCHE" class="btn-subir">
        </form>

        <?php
        if (isset($_POST['subir'])) {
            $directorio = "uploads/";
            
            // Verificamos si existe la carpeta, si no, la crea
            if (!file_exists($directorio)) { 
                mkdir($directorio, 0777, true); 
            }

            $nombre_archivo = basename($_FILES["archivo"]["name"]);
            $target = $directorio . $nombre_archivo;

            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target)) {
                // EL MENSAJE DE ÉXITO QUE QUERÍAS:
                echo "<div class='status-msg'>
                        ✅ ¡Archivo subido con éxito!<br>
                        <span style='font-weight:normal; font-size:0.9em;'>El sistema está procesando '$nombre_archivo'...</span>
                      </div>";
            } else {
                echo "<div class='error-msg'>
                        ❌ Error crítico: No se pudo mover el archivo al servidor.
                      </div>";
            }
        }
        ?>
    </div>
    
    <a href="dashboard.php" class="back-link">← Volver al Panel de Control</a>
</body>
</html>