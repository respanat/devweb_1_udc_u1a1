<!-- Views/forms/computadores/listar_todo.php -->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Computadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2 class="mb-4">Listado de Computadores</h2>
        
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
                                <form action="../../../Controllers/eliminar_computador.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este computador?');">
                                    <input type="hidden" name="id" value="<?= $c->id ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
