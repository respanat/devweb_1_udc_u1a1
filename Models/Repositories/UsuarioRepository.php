<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../Entities/Usuario.php';

class UsuarioRepository {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function findByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM Usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($row = $resultado->fetch_assoc()) {
            return new Usuario(
                $row['id'],
                $row['username'],
                $row['password'],
                $row['nombre'],
                $row['email']
            );
        }

        return null;
    }

    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($row = $resultado->fetch_assoc()) {
            return new Usuario(
                $row['id'],
                $row['username'],
                $row['password'],
                $row['nombre'],
                $row['email']
            );
        }
    
        return null;
    }
    
    public function findByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM Usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);  // ✅ Correcto para mysqli
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($row = $resultado->fetch_assoc()) {
            return new Usuario(
                $row['id'],
                $row['username'],
                $row['password'],
                $row['nombre'],
                $row['email']
            );
        }
    
        return null;
    }
      
    public function save(Usuario $usuario) {
        if ($usuario->id) {
            $stmt = $this->conn->prepare("UPDATE Usuarios SET username = ?, password = ?, nombre = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $usuario->username, $usuario->password, $usuario->nombre, $usuario->email, $usuario->id);
        } else {
            $stmt = $this->conn->prepare("INSERT INTO Usuarios (username, password, nombre, email) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $usuario->username, $usuario->password, $usuario->nombre, $usuario->email);
        }
    
        if ($stmt->execute()) {
            return $stmt->affected_rows > 0;
        }
    
        return false;
    }
    
    public function listarTodos() {
        $result = $this->conn->query("SELECT * FROM Usuarios");
        $usuarios = [];
    
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = new Usuario(
                $row['id'],
                $row['username'],
                $row['password'],
                $row['nombre'],
                $row['email']
            );
        }
    
        return $usuarios;
    }  

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM Usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    
}
?>

