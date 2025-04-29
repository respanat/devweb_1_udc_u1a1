<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Administrar Usuarios</h2>
        <a href="/act1_devweb/public/index.php?controller=usuario&action=login" class="btn btn-secondary">Cerrar Administrador</a>
    </div>    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario->id) ?></td>
                <td><?= htmlspecialchars($usuario->username) ?></td>
                <td><?= htmlspecialchars($usuario->nombre) ?></td>
                <td><?= htmlspecialchars($usuario->email) ?></td>
                <td>
                    
                    <a href="/act1_devweb/public/index.php?controller=usuario&action=eliminar&id=<?= $usuario->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Listado de Computadores</h2>
                    <a href="/act1_devweb/public/index.php?controller=computador&action=mostrarFormularioAgregar" class="btn btn-success">Agregar Computador</a>
                </div>        
        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'eliminado'): ?>
            <div class="alert alert-success">Computador eliminado correctamente.</div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'error'): ?>
            <div class="alert alert-danger">Hubo un error al eliminar el computador.</div>
        <?php endif; ?>

        <?php
        require_once __DIR__ . '/../../../Controllers/ComputadorController.php';
        $controlador = new ComputadorController();
        $computadores = $controlador->listarComputadores();
        ?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>CPU - Ghz</th>
                    <th>RAM</th>
                    <th>Disco Gbytes</th>
                    <th>Puertos USB</th>
                    <th>Puertos HDMI</th>
                    <th>Monitor</th>
                    <th>Precio USD</th>
                    <th>Responsable</th>
                    <th>Acciones</th>
                    
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
                            <td><?= htmlspecialchars($c->id) ?></td>
                            <td><?= htmlspecialchars($c->marca) ?></td>
                            <td><?= htmlspecialchars($c->categoria) ?></td>
                            <td><?= htmlspecialchars($c->marcaCpu . ' ' . $c->velocidadCpu) ?></td>
                            <td><?= htmlspecialchars($c->capacidadRam . ' ' . $c->tecnologiaRam) ?></td>
                            <td><?= htmlspecialchars($c->capacidadDisco . ' ' . $c->tecnologiaDisco) ?></td>
                            <td><?= htmlspecialchars($c->numPuertosUSB) ?></td>
                            <td><?= htmlspecialchars($c->numPuertosHDMI) ?></td>
                            <td><?= htmlspecialchars($c->marcaMonitor . ' ' . $c->pulgadas . '"') ?></td>
                            <td>$<?= htmlspecialchars($c->precio) ?></td>
                            <td><?= htmlspecialchars($c->nombreUsuario ?? 'Sin aisgnar') ?></td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                <a href="/act1_devweb/public/index.php?controller=computador&action=eliminarComputador&id=<?= $c->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este computador?');">Eliminar</a>
                                <a href="/act1_devweb/public/index.php?controller=computador&action=editarComputador&id=<?= $c->id ?>" class="btn btn-sm btn-warning me-1">Editar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
