<?php
require_once __DIR__ . '/../Repositories/UsuarioRepository.php';

class UsuarioService {
    private $usuarioRepository;

    public function __construct() {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function crearUsuario($datos) {
        $usuarioPorUsername = $this->usuarioRepository->findByUsername($datos['username']);
        if ($usuarioPorUsername) {
            return "El nombre de usuario ya está registrado. Por favor, elige otro.";
        }
    
        $usuarioPorEmail = $this->usuarioRepository->findByEmail($datos['email']);
        if ($usuarioPorEmail) {
            return "El correo electrónico ya está registrado. Intenta con otro.";
        }
    
        $usuario = new Usuario(null, $datos['username'], $datos['password'], $datos['nombre'], $datos['email']);
        
        $resultado = $this->usuarioRepository->save($usuario);
    
        if ($resultado) {
            return "Usuario creado exitosamente.";
        } else {
            return "Error al crear el usuario. Intenta nuevamente.";
        }
    }
    
    public function verificarLogin($username, $password) {
        $usuario = $this->usuarioRepository->findByUsername($username);
        if ($usuario && $usuario->password === $password) {
            return true;
        }
        return false;
    }

    public function enviarRecordatorio($email) {
        $usuario = $this->usuarioRepository->findByEmail($email);
    
        if (!$usuario) {
            return "No se encontró ninguna cuenta con ese correo.";
        }
    
        $claveTemporal = bin2hex(random_bytes(4)); // genera una clave de 8 caracteres
        $usuario->setPassword($claveTemporal);
        $this->usuarioRepository->save($usuario);
    
        return "Se ha asignado la siguiente clave temporal: $claveTemporal - Utilízala para iniciar sesión y luego cámbiala.";
    }

    public function actualizarUsuario($id, $datos) {
        $password = isset($datos['password']) && $datos['password'] !== ''
            ? $datos['password']
            : $this->usuarioRepository->findById($id)->getPassword();
    
        $usuario = new Usuario(
            $id,
            $datos['username'],
            $password,
            $datos['nombre'],
            $datos['email']
        );
    
        return $this->usuarioRepository->save($usuario);
    }
    
    public function obtenerUsuarioPorId($id) {
        return $this->usuarioRepository->findById($id);
    }
    
    public function obtenerIdPorUsername($username) {
        $usuario = $this->usuarioRepository->findByUsername($username);
        return $usuario ? $usuario->id : null;
    }

    public function obtenerTodosLosUsuarios() {
        return $this->usuarioRepository->listarTodos();
    }
    
    public function eliminarUsuarioPorId($id) {
        return $this->usuarioRepository->eliminar($id);
    }
    
    
    // Método que obtendrá la información de los computadores asignados
    public function obtenerComputadoresAsignados($usuarioId) {
        // Lógica de obtención de computadores (por ahora, solo devuelve un mensaje)
        return "En construcción"; 
    }
}
?>
