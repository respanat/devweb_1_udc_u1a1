<?php
require_once 'Controllers/ComputadorController.php';

echo "Iniciando prueba de ComputadorController...\n";

try {
    $computadorController = new ComputadorController();

    if (method_exists($computadorController, 'agregarComputador')) {
        echo "Método agregarComputador existe ✅\n";
    } else {
        echo "Método agregarComputador NO existe ❌\n";
    }

    if (method_exists($computadorController, 'buscarComputador')) {
        echo "Método buscarComputador existe ✅\n";
    } else {
        echo "Método buscarComputador NO existe ❌\n";
    }

    if (method_exists($computadorController, 'listarComputadores')) {
        echo "Método listarComputadores existe ✅\n";
    } else {
        echo "Método listarComputadores NO existe ❌\n";
    }

    if (method_exists($computadorController, 'listarComputadoresPersonalizado')) {
        echo "Método listarComputadoresPersonalizado existe ✅\n";
    } else {
        echo "Método listarComputadoresPersonalizado NO existe ❌\n";
    }

    if (method_exists($computadorController, 'editarComputador')) {
        echo "Método editarComputador existe ✅\n";
    } else {
        echo "Método editarComputador NO existe ❌\n";
    }
} catch (Exception $e) {
    echo "Error al probar ComputadorController: " . $e->getMessage() . " ❌\n";
}
?>
