<?php
require_once __DIR__ . '/../Models/Services/ComputadorService.php';
require_once __DIR__ . '/../Models/Entities/Computador.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Models/Services/UsuarioService.php';

class ComputadorController {
    private $computadorService;
    private $usuarioService;

    public function __construct() {
        $this->computadorService = new ComputadorService();
        $this->usuarioService = new UsuarioService();
    }

    public function agregarComputador($datos) {
        $resultado = $this->computadorService->crearComputador($datos);
    
        if ($resultado) {
            $_SESSION['mensaje_exito'] = "Computador guardado exitosamente.";
            header("Location: /act1_devweb/public/index.php?controller=usuario&action=administrar");
            exit();
        } else {
            $_SESSION['mensaje_error'] = "Error al guardar computador.";
            // Recarga el formulario
            $usuarios = $this->usuarioService->obtenerTodosLosUsuarios();
            require_once __DIR__ . '/../Views/forms/computadores/agregar.php';
        }
    }
    public function buscarComputador($id) {
        return $this->computadorService->buscarComputadorPorId($id);
    }

    public function listarComputadores() {
        return $this->computadorService->listarTodos();
    }

    public function listarComputadoresPersonalizado($idUsuario) {
        require_once __DIR__ . '/../Models/Services/ComputadorService.php';
        $servicio = new ComputadorService();
        return $servicio->obtenerComputadoresPorUsuario($idUsuario);
    }

    public function editarComputador($datos = null) {
        $id = $_GET['id'] ?? null;
    
        if (!$id) {
            echo "ID no proporcionado.";
            return;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $datos !== null) {
            // Guardar cambios
            $resultado = $this->computadorService->actualizarComputador($id, $datos);
    
            if ($resultado) {
                $_SESSION['mensaje_exito'] = "Computador actualizado exitosamente.";
                header("Location: /act1_devweb/public/index.php?controller=usuario&action=administrar");
                exit();
            } else {
                $_SESSION['mensaje_error'] = "Error al actualizar el computador.";
            }
        }
    
        // Mostrar formulario para editar
        $usuarios = $this->usuarioService->obtenerTodosLosUsuarios();
        $computador = $this->computadorService->buscarComputadorPorId($id);
    
        if (!$computador) {
            echo "Computador no encontrado.";
            return;
        }
    
        require_once __DIR__ . '/../Views/forms/computadores/editar.php';
    }
     
    public function eliminarComputador() {
        $id = $_GET['id'] ?? null;
    
        if ($id && $this->computadorService->eliminarComputadorPorId($id)) {
            $_SESSION['mensaje_exito'] = "Computador eliminado exitosamente.";
        } else {
            $_SESSION['mensaje_error'] = "No se pudo eliminar el computador.";
        }
    
        header("Location: /act1_devweb/public/index.php?controller=usuario&action=administrar");
        exit();
    }

    public function mostrarFormularioAgregar() {
        $usuarios = $this->usuarioService->obtenerTodosLosUsuarios();
        require_once __DIR__ . '/../Views/forms/computadores/agregar.php';
    }
    
}
?>
