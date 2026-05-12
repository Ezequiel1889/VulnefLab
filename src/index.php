<?php
session_start();
// Ocultamos reportes de errores de PHP para que sea Blind SQLi
error_reporting(0);
$conn = mysqli_connect("db", "root", "root", "vulneflab_db");

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    // VULNERABILIDAD: SQL INJECTION PURA
    // Usamos comillas simples para que el bypass sea estándar
    $query = "SELECT * FROM usuarios WHERE usuario = '$user' AND password = '$pass'";
    
    // El @ oculta el mensaje azul que viste antes
    $result = @mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['auth'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Credenciales incorrectas. Acceso denegado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Intranet Corporativa - Acceso</title>
    <style>
        body { 
            background: #0d1117; 
            color: #c9d1d9; 
            font-family: 'Segoe UI', sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .login-box { 
            background: #161b22; 
            padding: 50px; /* Más espacio interno */
            border-radius: 12px; 
            border: 1px solid #30363d; 
            text-align: center; 
            box-shadow: 0 20px 50px rgba(0,0,0,0.7);
            width: 400px; /* Ancho fijo más grande */
        }
        h2 { color: #58a6ff; margin-bottom: 30px; font-size: 2em; }
        input { 
            display: block; 
            width: 100%; 
            margin-bottom: 20px; 
            padding: 15px; /* Inputs más grandes */
            background: #0d1117; 
            border: 1px solid #30363d; 
            color: white; 
            border-radius: 8px; 
            box-sizing: border-box;
            font-size: 1.1em;
        }
        button { 
            background: #238636; 
            color: white; 
            border: none; 
            padding: 15px; 
            border-radius: 8px; 
            width: 100%; 
            font-weight: bold; 
            font-size: 1.2em;
            cursor: pointer; 
        }
        button:hover { background: #2ea043; }
        .error-msg { color: #f85149; margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🔒 ACCESO</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Usuario" autocomplete="off">
            <input type="password" name="pass" placeholder="Contraseña">
            <button type="submit" name="login">ENTRAR AL SISTEMA</button>
        </form>
        <?php if(isset($error)) echo "<p class='error-msg'>$error</p>"; ?>
    </div>
</body>
</html>