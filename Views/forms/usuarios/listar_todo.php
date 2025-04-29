<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido</h2>
        <div class="card p-3 mt-3">
            <p><strong>Nombre de usuario:</strong> <?= htmlspecialchars($usuario->getUsername()) ?></p>
            <p><strong>Nombre completo:</strong> <?= htmlspecialchars($usuario->getNombre()) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($usuario->getEmail()) ?></p>

            <!-- Botón para editar -->
            <form action="index.php" method="GET">
                <input type="hidden" name="controller" value="usuario">
                <input type="hidden" name="action" value="editarFormulario">
                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()) ?>">
                <button type="submit" class="btn btn-primary">Editar datos</button>
            </form>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="/act1_devweb/public/index.php?controller=usuario&action=logout" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">Computadores asignados</h2>
        <?php
        require_once __DIR__ . '/../../../Controllers/ComputadorController.php';
        $controlador = new ComputadorController();
        $computadores = $controlador->listarComputadoresPersonalizado($usuario->getId());
        //$computadores = $controlador->listarComputadoresPersonalizado();
        ?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>CPU - Ghz</th>
                    <th>RAM</th>
                    <th>Disco Gbytes</th>
                    <th>Puertos USB</th>
                    <th>Puertos HDMI</th>
                    <th>Monitor</th>
                    <th>Precio USD</th>
                                        
                </tr>
            </thead>
            <tbody>
                <?php if (empty($computadores)): ?>
                    <tr>
                        <td colspan="7" class="text-center">No hay computadores registrados.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($computadores as $c): ?>
                        <tr>
                            <td><?= htmlspecialchars($c->marca) ?></td>
                            <td><?= htmlspecialchars($c->categoria) ?></td>
                            <td><?= htmlspecialchars($c->marcaCpu . ' ' . $c->velocidadCpu) ?></td>
                            <td><?= htmlspecialchars($c->capacidadRam . ' ' . $c->tecnologiaRam) ?></td>
                            <td><?= htmlspecialchars($c->capacidadDisco . ' ' . $c->tecnologiaDisco) ?></td>
                            <td><?= htmlspecialchars($c->numPuertosUSB) ?></td>
                            <td><?= htmlspecialchars($c->numPuertosHDMI) ?></td>
                            <td><?= htmlspecialchars($c->marcaMonitor . ' ' . $c->pulgadas . '"') ?></td>
                            <td>$<?= htmlspecialchars($c->precio) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
