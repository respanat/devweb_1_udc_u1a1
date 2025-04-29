<?php
// Vista sencilla para solicitar el email de recuperación
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recordar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Recordar Contraseña</h2>
    <?php if (!empty($mensaje)) : ?>
    <div style="padding: 10px; background-color: #d4edda; color: #155724; margin-bottom: 10px;">
        <?= htmlspecialchars($mensaje) ?>
    </div>
    <?php endif; ?>
    <form action="/act1_devweb/public/index.php?controller=usuario&action=recordarPassword" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="correo@ejemplo.com">
        </div>
        <button type="submit" class="btn btn-primary">Enviar Recordatorio</button>
        <a href="/act1_devweb/public/index.php?controller=usuario&action=login" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
