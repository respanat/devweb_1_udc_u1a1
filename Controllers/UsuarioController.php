<?php

session_start();
require_once __DIR__ . '/../Models/Services/UsuarioService.php';
require_once __DIR__ . '/../config.php';

class UsuarioController {
    
    private $usuarioService;

    public function __construct() {
        $this->usuarioService = new UsuarioService();
    }

    public function login() {
        $mensaje = '';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
    
            $esValido = $this->usuarioService->verificarLogin($username, $password);
    
            if ($esValido) {
                $_SESSION['usuario_id'] = $this->usuarioService->obtenerIdPorUsername($username);
                header("Location: /act1_devweb/public/index.php?controller=usuario&action=listarTodo");
                exit;
            } else {
                $mensaje = "Nombre de usuario o contraseña incorrectos.";
            }                  
        } 
        include __DIR__ . '/../Views/forms/usuarios/login.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /act1_devweb/public/index.php?controller=usuario&action=login");
        exit;
    }
    
    public function listarTodo() {
        $id = $_SESSION['usuario_id'];
        $usuario = $this->usuarioService->obtenerUsuarioPorId($id);
        $computadores = $this->usuarioService->obtenerComputadoresAsignados($id);
        include __DIR__ . '/../Views/forms/usuarios/listar_todo.php';
    }
    
    public function agregarUsuario($datos) {
        return $this->usuarioService->crearUsuario($datos);
    }   
    
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mensaje = $this->usuarioService->crearUsuario($_POST);
    
            if ($mensaje === "Usuario creado exitosamente.") {
                $_SESSION['mensaje_exito'] = $mensaje;
            } else {
                $_SESSION['mensaje_error'] = $mensaje;
            }
    
            // Redirigir a la misma vista con mensajes
            header("Location: /act1_devweb/public/index.php?controller=usuario&action=agregar");
            exit();
        }
    
        // Mostrar el formulario de agregar
        include __DIR__ . '/../Views/forms/usuarios/agregar.php';
    }
    

    public function recordarPasswordInterno($email) {
        return $this->usuarioService->enviarRecordatorio($email);
    }

    public function recordarPassword() {
        $mensaje = "";
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            if ($email) {
                $mensaje = $this->usuarioService->enviarRecordatorio($email);
            } else {
                $mensaje = "Correo no proporcionado.";
            }
        }
    
        include __DIR__ . '/../Views/forms/usuarios/recordar_password.php';
    }
   
    public function editarUsuario($id, $datos) {
        return $this->usuarioService->actualizarUsuario($id, $datos);
    }

    public function editarFormulario() {
        $id = $_GET['id'] ?? $_SESSION['usuario_id'];
        $usuario = $this->usuarioService->obtenerUsuarioPorId($id);

        if ($usuario) {
            include __DIR__ . '/../Views/forms/usuarios/editar.php';
        } else {
            echo "Usuario no encontrado.";
        }
    }

    public function editar() {
        $id = $_POST['id'];
        $datos = [
            'username' => $_POST['username'],
            'nombre' => $_POST['nombre'],
            'email' => $_POST['email'],
            'password' => $_POST['password'] ?? ''
        ];
    
        $resultado = $this->editarUsuario($id, $datos);
    
        if ($resultado) {
            $_SESSION['mensaje_exito'] = "Los cambios se guardaron exitosamente.";
        } else {
            $_SESSION['mensaje_error'] = "Hubo un error al guardar los cambios.";
        }

        header("Location: /act1_devweb/public/index.php?controller=usuario&action=editarFormulario&id=" . $_POST['id']);
        exit();
    }

    public function administrar() {
        $usuarios = $this->usuarioService->obtenerTodosLosUsuarios();
        include __DIR__ . '/../Views/forms/usuarios/administrar.php';
    }
  
    public function eliminar() {
        $id = $_GET['id'] ?? null;
    
        if ($id && $this->usuarioService->eliminarUsuarioPorId($id)) {
            $_SESSION['mensaje_exito'] = "Usuario eliminado exitosamente.";
        } else {
            $_SESSION['mensaje_error'] = "No se pudo eliminar el usuario.";
        }
    
        header("Location: /act1_devweb/public/index.php?controller=usuario&action=administrar");
        exit();
    }
    
}
?>
