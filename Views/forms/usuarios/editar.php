<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//var_dump($usuario);
ini_set('display_errors', 1); // Muestra los errores
error_reporting(E_ALL); // Muestra todos los tipos de errores
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">
                    <div class="card-header text-center bg-warning text-white">
                        <h4 class="mb-0">Editar Usuario</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['mensaje_exito'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['mensaje_exito']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                            <div class="text-center mb-3">
                                <a href="/act1_devweb/public/index.php?controller=usuario&action=listarTodo" class="btn btn-outline-success">Regresar</a>
                            </div>
                            <?php unset($_SESSION['mensaje_exito']); ?>
                        <?php endif; ?>

                        <?php
                        if (!isset($usuario)) {
                            die("Usuario no encontrado.");
                        }
                        ?>

                        <form action="/act1_devweb/public/index.php?controller=usuario&action=editar" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->id) ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($usuario->username) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario->nombre) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario->email) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Nueva contraseña (dejar en blanco si no desea cambiarla)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>                           
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center d-flex justify-content-between">
                        <a href="/act1_devweb/public/index.php?controller=usuario&action=listarTodo" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
