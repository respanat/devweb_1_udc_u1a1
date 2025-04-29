<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Computador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2 class="mb-4">Agregar Computador</h2>

        <!-- Formulario para agregar computador -->
        <form action="/act1_devweb/public/index.php?controller=computador&action=agregarComputador" method="POST">
            <div class="row mb-3">
                <div class="col">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>
                <div class="col">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="marcaCpu" class="form-label">Marca CPU</label>
                    <input type="text" class="form-control" id="marcaCpu" name="marcaCpu" required>
                </div>
                <div class="col">
                    <label for="velocidadCpu" class="form-label">Velocidad CPU (GHz)</label>
                    <input type="number" step="0.1" class="form-control" id="velocidadCpu" name="velocidadCpu" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="capacidadRam" class="form-label">Capacidad RAM (GB)</label>
                    <input type="number" class="form-control" id="capacidadRam" name="capacidadRam" required>
                </div>
                <div class="col">
                    <label for="tecnologiaRam" class="form-label">Tecnología RAM</label>
                    <input type="text" class="form-control" id="tecnologiaRam" name="tecnologiaRam" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="capacidadDisco" class="form-label">Capacidad Disco (GB)</label>
                    <input type="number" class="form-control" id="capacidadDisco" name="capacidadDisco" required>
                </div>
                <div class="col">
                    <label for="tecnologiaDisco" class="form-label">Tecnología Disco</label>
                    <input type="text" class="form-control" id="tecnologiaDisco" name="tecnologiaDisco" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="numPuertosUSB" class="form-label">Número Puertos USB</label>
                    <input type="number" class="form-control" id="numPuertosUSB" name="numPuertosUSB" required>
                </div>
                <div class="col">
                    <label for="numPuertosHDMI" class="form-label">Número Puertos HDMI</label>
                    <input type="number" class="form-control" id="numPuertosHDMI" name="numPuertosHDMI" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="marcaMonitor" class="form-label">Marca Monitor</label>
                    <input type="text" class="form-control" id="marcaMonitor" name="marcaMonitor" required>
                </div>
                <div class="col">
                    <label for="pulgadas" class="form-label">Pulgadas Monitor</label>
                    <input type="number" step="0.1" class="form-control" id="pulgadas" name="pulgadas" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio (USD)</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>

            <!-- Opcional: seleccionar usuario responsable -->
            <div class="mb-3">
                <label for="id_usuario" class="form-label">Responsable (opcional)</label>
                <input type="number" class="form-control" id="id_usuario" name="id_usuario">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Computador</button>
            <a href="/act1_devweb/public/index.php?controller=usuario&action=administrar" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
