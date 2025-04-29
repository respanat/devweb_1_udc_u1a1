<?php
require_once 'Controllers/UsuarioController.php';

echo "Iniciando prueba de UsuarioController...\n";

try {
    $usuarioController = new UsuarioController();

    if (method_exists($usuarioController, 'agregarUsuario')) {
        echo "Método agregarUsuario existe ✅\n";
    } else {
        echo "Método agregarUsuario NO existe ❌\n";
    }

    if (method_exists($usuarioController, 'login')) {
        echo "Método login existe ✅\n";
    } else {
        echo "Método login NO existe ❌\n";
    }

    if (method_exists($usuarioController, 'recordarPassword')) {
        echo "Método recordarPassword existe ✅\n";
    } else {
        echo "Método recordarPassword NO existe ❌\n";
    }

    if (method_exists($usuarioController, 'editarUsuario')) {
        echo "Método editarUsuario existe ✅\n";
    } else {
        echo "Método editarUsuario NO existe ❌\n";
    }
} catch (Exception $e) {
    echo "Error al probar UsuarioController: " . $e->getMessage() . " ❌\n";
}
?>
