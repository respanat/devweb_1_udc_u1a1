<?php
$mensaje_exito = $_SESSION['mensaje_exito'] ?? null;
$mensaje_error = $_SESSION['mensaje_error'] ?? null;
unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <?php if ($mensaje_exito): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($mensaje_exito) ?>
            </div>
        <?php endif; ?>
        <?php if ($mensaje_error): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($mensaje_error) ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="mb-0">Agregar Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form action="/act1_devweb/public/index.php?controller=usuario&action=agregar" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Crear Usuario</button>
                            </div>
                        </form>
                    </div>
                    <div class="d-grid card-footer text-center">
                        <a href="/act1_devweb/public/index.php?controller=usuario&action=login" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
