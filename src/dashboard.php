<?php
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location: index.php");
    exit();
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - VulnefLab</title>
    <style>
        body { background: #0d1117; color: #c9d1d9; font-family: 'Segoe UI', sans-serif; margin: 0; padding: 20px; }
        .container { max-width: 900px; margin: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #30363d; padding-bottom: 10px; margin-bottom: 30px; }
        .box { background: #161b22; border: 1px solid #30363d; border-radius: 8px; padding: 25px; margin-bottom: 20px; }
        h2, h3 { color: #58a6ff; margin-top: 0; }
        .frase-espejo { color: #8b949e; font-style: italic; text-align: center; margin: 20px 0; font-size: 1.1em; text-shadow: 0 0 10px rgba(88, 166, 255, 0.2); }
        .log-viewer { background: #0d1117; border: 1px solid #30363d; padding: 15px; color: #d1d5da; font-family: 'Courier New', monospace; white-space: pre-wrap; margin-top: 15px; min-height: 120px; border-radius: 4px; }
        .btn { background: #21262d; color: #c9d1d9; padding: 8px 16px; border-radius: 6px; text-decoration: none; border: 1px solid #30363d; display: inline-block; cursor: pointer; }
        .btn:hover { background: #30363d; }
        .footer-section { text-align: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid #30363d; }
        .maint-link { color: #484f58; font-size: 0.85em; text-decoration: none; display: block; margin-top: 30px; }
        .maint-link:hover { color: #58a6ff; }
        .troll-btn { color: #e3b341; text-decoration: none; font-size: 0.9em; border: 1px solid #e3b341; padding: 8px 15px; border-radius: 4px; display: inline-block; cursor: pointer; font-weight: bold; }
        .troll-btn:hover { background: rgba(227, 179, 65, 0.1); }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>🛡️ VulnefLab Dashboard</h2>
            <a href="logout.php" class="btn">Salir</a>
        </div>

        <p class="frase-espejo">"Si buscas el tesoro, mira detrás del espejo de la realidad..."</p>

        <div class="box" data-debug-key="FLAG{UGR_WEB_ANALYSIS_SUCCESS}">
            <h3>Monitor de Auditoría</h3>
            <p>Estado de los registros del servidor:</p>
            <a href="?view=system_status.txt" class="btn">[ Cargar Reporte de Estado ]</a>
            
            <div class="log-viewer">
                <?php
                if (isset($_GET['view'])) {
                    $file = "logs/" . $_GET['view'];
                    if (file_exists($file)) { include($file); } 
                    else { echo "<span style='color:#f85149;'>[!] Error:</span> El nodo solicitado no responde."; }
                } else { echo "Esperando solicitud del administrador de sistemas..."; }
                ?>
            </div>
        </div>

        <input type="hidden" id="backup_path" value="/var/backups/secret_data/root_flag.txt">

        <div class="footer-section">
            <div class="troll-btn" onclick="alert('¿En serio pensaste que la ruta iba a estar en un cartelito? Seguí participando, lince.');">
               🔍 ESCANEAR RUTAS CRÍTICAS DEL ROOT
            </div>
            <a href="upload_reports.php" class="maint-link">Acceso a Mantenimiento</a>
        </div>
    </div>
</body>
</html>