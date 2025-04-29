<?php
// admin-login.php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    if ($usuario === 'admin' && $clave === 'admin') {
        // Guardamos sesión si es necesario
        $_SESSION['admin_autenticado'] = true;
        echo "<script>window.opener.location.href = '/act1_devweb/public/index.php?controller=usuario&action=administrar'; window.close();</script>";
        exit;
    } else {
        echo "<script>
            alert('Usuario o contraseña incorrectos');
            window.close();
        </script>";
        exit;
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consola de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-3">
    <form method="POST" class="form">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="clave" class="form-label">Contraseña</label>
            <input type="password" name="clave" class="form-control" required>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
    </form>
</body>
</html>