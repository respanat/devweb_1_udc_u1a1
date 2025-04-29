<?php if (!empty($mensaje)) : ?>
    <div style="padding: 10px; background-color: #f8d7da; color: #721c24; margin-bottom: 10px;">
        <?= htmlspecialchars($mensaje) ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Iniciar Sesión</h2>
        <form action="index.php?controller=usuario&action=login" method="POST" class="mt-4">
            <div class="form-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Ingrese su nombre de usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Ingrese su contraseña">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                <!--<a href="/act1_devweb/public/index.php?controller=usuario&action=administrar" class="btn btn-warning float-end">Administrar</a>-->
                <a href="../Views/forms/usuarios/admin-login.php"
                    onclick="window.open(this.href, 'adminLogin', 'width=400,height=300'); return false;"
                class="btn btn-warning float-end">Administrar</a>
            </div>
            <div class="text-center mt-3">
                <a href="/act1_devweb/Views/forms/usuarios/agregar.php" class="btn btn-outline-secondary">Registrarse</a>
            </div>
            <div class="text-center mt-3">
                <a href="/act1_devweb/public/index.php?controller=usuario&action=recordarPassword" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>

    
    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
