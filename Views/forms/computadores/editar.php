<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Computador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php if (isset($_SESSION['mensaje_error'])): ?>
    <p style="color:red"><?= $_SESSION['mensaje_error']; unset($_SESSION['mensaje_error']); ?></p>
<?php endif; ?>
<body class="p-4">
    <div class="container">
    <h2 class="mb-4">Editar Computador</h2>
        <form action="/act1_devweb/public/index.php?controller=computador&action=editarComputador&id=<?= $computador->id ?>" method="POST">
        <div class="row mb-3">
                <div class="col">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="<?= $computador->marca ?>" required>
                </div>
                <div class="col">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="<?= $computador->categoria ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="marcaCpu" class="form-label">Marca CPU</label>
                    <input type="text" class="form-control" id="marcaCpu" name="marcaCpu" value="<?= $computador->marcaCpu ?>" required>
                </div>
                <div class="col">
                    <label for="velocidadCpu" class="form-label">Velocidad CPU (GHz)</label>
                    <input type="number" step="0.1" class="form-control" id="velocidadCpu" name="velocidadCpu" value="<?= $computador->velocidadCpu ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="capacidadRam" class="form-label">Capacidad RAM (GB)</label>
                    <input type="number" class="form-control" id="capacidadRam" name="capacidadRam" value="<?= $computador->capacidadRam ?>" required>
                </div>
                <div class="col">
                    <label for="tecnologiaRam" class="form-label">Tecnología RAM</label>
                    <input type="text" class="form-control" id="tecnologiaRam" name="tecnologiaRam" value="<?= $computador->tecnologiaRam ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="capacidadDisco" class="form-label">Capacidad Disco (GB)</label>
                    <input type="number" class="form-control" id="capacidadDisco" name="capacidadDisco" value="<?= $computador->capacidadDisco ?>" required>
                </div>
                <div class="col">
                    <label for="tecnologiaDisco" class="form-label">Tecnología Disco</label>
                    <input type="text" class="form-control" id="tecnologiaDisco" name="tecnologiaDisco" value="<?= $computador->tecnologiaDisco ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="numPuertosUSB" class="form-label">Número Puertos USB</label>
                    <input type="number" class="form-control" id="numPuertosUSB" name="numPuertosUSB" value="<?= $computador->numPuertosUSB ?>" required>
                </div>
                <div class="col">
                    <label for="numPuertosHDMI" class="form-label">Número Puertos HDMI</label>
                    <input type="number" class="form-control" id="numPuertosHDMI" name="numPuertosHDMI" value="<?= $computador->numPuertosHDMI ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="marcaMonitor" class="form-label">Marca Monitor</label>
                    <input type="text" class="form-control" id="marcaMonitor" name="marcaMonitor" value="<?= $computador->marcaMonitor ?>" required>
                </div>
                <div class="col">
                    <label for="pulgadas" class="form-label">Pulgadas Monitor</label>
                    <input type="number" step="0.1" class="form-control" id="pulgadas" name="pulgadas" value="<?= $computador->pulgadas ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <div class="col">
                <label for="precio" class="form-label">Precio (USD)</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= $computador->precio ?>" required>
                </div>
                <div class="col">
                <label>Usuario asignado:
                <select name="usuarios_id" required>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario->id ?>" <?= $usuario->id == $computador->usuarios_id ? 'selected' : '' ?>>
                            <?= $usuario->nombre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                </label><br><br>
                    </div>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <button type=submit" class="btn btn-primary" >Guardar cambios</button>
                    <a href='/act1_devweb/public/index.php?controller=usuario&action=administrar' class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
    </form>
    </div>
</body>
</html>


<!-- Comentario para git-->