<?php
require_once __DIR__ . '/../Entities/Computador.php';
require_once __DIR__ . '/../../config.php';

class ComputadorRepository {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function save(Computador $computador) {
        if ($computador->id) {
            $stmt = $this->conn->prepare("UPDATE Computadores SET marca = ?, categoria = ?, marcaCpu = ?, velocidadCpu = ?, tecnologiaRam = ?, capacidadRam = ?, tecnologiaDisco = ?, capacidadDisco = ?, numPuertosUSB = ?, numPuertosHDMI = ?, marcaMonitor = ?, pulgadas = ?, precio = ?, usuarios_id = ? WHERE id = ?");
            $stmt->bind_param(
                "sssssssisisdiii",
                $computador->marca,
                $computador->categoria,
                $computador->marcaCpu,
                $computador->velocidadCpu,
                $computador->tecnologiaRam,
                $computador->capacidadRam,
                $computador->tecnologiaDisco,
                $computador->capacidadDisco,
                $computador->numPuertosUSB,
                $computador->numPuertosHDMI,
                $computador->marcaMonitor,
                $computador->pulgadas,
                $computador->precio,
                $computador->usuarios_id,
                $computador->id
            );
        } else {
            $stmt = $this->conn->prepare("INSERT INTO Computadores (marca, categoria, marcaCpu, velocidadCpu, tecnologiaRam, capacidadRam, tecnologiaDisco, capacidadDisco, numPuertosUSB, numPuertosHDMI, marcaMonitor, pulgadas, precio, usuarios_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssssssisisdiii",
                $computador->marca,
                $computador->categoria,
                $computador->marcaCpu,
                $computador->velocidadCpu,
                $computador->tecnologiaRam,
                $computador->capacidadRam,
                $computador->tecnologiaDisco,
                $computador->capacidadDisco,
                $computador->numPuertosUSB,
                $computador->numPuertosHDMI,
                $computador->marcaMonitor,
                $computador->pulgadas,
                $computador->precio,
                $computador->usuarios_id
            );
        }
    
        if ($stmt->execute()) {
            return $stmt->affected_rows > 0;
        }
    
        return false;
    }
    
    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM Computadores WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    
    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Computadores WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            return new Computador(
                $row['id'],
                $row['marca'],
                $row['categoria'],
                $row['marcaCpu'],
                $row['velocidadCpu'],
                $row['tecnologiaRam'],
                $row['capacidadRam'],
                $row['tecnologiaDisco'],
                $row['capacidadDisco'],
                $row['numPuertosUSB'],
                $row['numPuertosHDMI'],
                $row['MarcaMonitor'],
                $row['pulgadas'],
                $row['precio'],
                $row['usuarios_id']
            );
        }
    
        return null;
    }
    
    /*public function findById($id) {
        // Placeholder: simulación de búsqueda
        return null;
    }*/

    public function findAll() {
        $computadores = [];
        $sql = "SELECT c.*, u.nombre AS nombreUsuario
                FROM Computadores c
                LEFT JOIN Usuarios u ON c.usuarios_id = u.id";
        $result = $this->conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $computador = new Computador(
                    $row['id'],
                    $row['marca'],
                    $row['categoria'],
                    $row['marcaCpu'],
                    $row['velocidadCpu'],
                    $row['tecnologiaRam'],
                    $row['capacidadRam'],
                    $row['tecnologiaDisco'],
                    $row['capacidadDisco'],
                    $row['numPuertosUSB'],
                    $row['numPuertosHDMI'],
                    $row['MarcaMonitor'],
                    $row['pulgadas'],
                    $row['precio'],
                    $row['usuarios_id']
                );
    
                // Asigna el nombre del usuario como propiedad extra (aunque no esté en el constructor)
                $computador->nombreUsuario = $row['nombreUsuario'] ?? null;
    
                $computadores[] = $computador;
            }
        }
    
        return $computadores;
    }
    public function findByCriteria($criterio) {
        // Placeholder: simulación de búsqueda personalizada
        return [];
    }

    public function findByUsuarioId($idUsuario) {
        $sql = "SELECT * FROM Computadores WHERE usuarios_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idUsuario);  // "i" = integer
        $stmt->execute();
    
        $result = $stmt->get_result();
        $computadores = [];
    
        while ($row = $result->fetch_assoc()) {
            $computador = new Computador(
                $row['id'],
                $row['marca'],
                $row['categoria'],
                $row['marcaCpu'],
                $row['velocidadCpu'],
                $row['tecnologiaRam'],
                $row['capacidadRam'],
                $row['tecnologiaDisco'],
                $row['capacidadDisco'],
                $row['numPuertosUSB'],
                $row['numPuertosHDMI'],
                $row['MarcaMonitor'],
                $row['pulgadas'],
                $row['precio'],
                $row['usuarios_id']
            );
            $computadores[] = $computador;
        }
    
        return $computadores;
    }
    
    /*public function findByUsuarioId($idUsuario) {
        $sql = "SELECT * FROM Computadores WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }*/
    
}
?>
