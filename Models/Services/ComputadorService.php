<?php
require_once __DIR__ . '/../Repositories/ComputadorRepository.php';

class ComputadorService {
    private $computadorRepository;

    public function __construct() {
        $this->computadorRepository = new ComputadorRepository();
    }

    public function crearComputador($datos) {
        $computador = new Computador(null, $datos['marca'], $datos['categoria'], $datos['marcaCpu'], $datos['velocidadCpu'],
                                     $datos['tecnologiaRam'], $datos['capacidadRam'], $datos['tecnologiaDisco'], $datos['capacidadDisco'],
                                     $datos['numPuertosUSB'], $datos['numPuertosHDMI'], $datos['marcaMonitor'], $datos['pulgadas'],
                                     $datos['precio'], $datos['usuarioId']);
        return $this->computadorRepository->save($computador);
    }

    public function buscarComputadorPorId($id) {
        return $this->computadorRepository->findById($id);
    }

    public function listarTodos() {
        return $this->computadorRepository->findAll();
    }

    public function obtenerComputadoresPorUsuario($idUsuario) {
        require_once __DIR__ . '/../Repositories/ComputadorRepository.php';
        $repo = new ComputadorRepository();
        return $repo->findByUsuarioId($idUsuario);
    }
    
    public function listarPersonalizado($criterio) {
        return $this->computadorRepository->findByCriteria($criterio);
    }

    
    public function actualizarComputador($id, $datos) {
        $computador = new Computador(
            $id,
            $datos['marca'],
            $datos['categoria'],
            $datos['marcaCpu'],
            $datos['velocidadCpu'],
            $datos['tecnologiaRam'],
            $datos['capacidadRam'],
            $datos['tecnologiaDisco'],
            $datos['capacidadDisco'],
            $datos['numPuertosUSB'],
            $datos['numPuertosHDMI'],
            $datos['marcaMonitor'],
            $datos['pulgadas'],
            $datos['precio'],
            $datos['usuarios_id']
        );
        return $this->computadorRepository->save($computador);
        //return $this->repo->save($computador);
    }
    /*public function actualizarComputador($id, $datos) {
        $computador = new Computador($id, $datos['marca'], $datos['categoria'], $datos['marcaCpu'], $datos['velocidadCpu'],
                                     $datos['tecnologiaRam'], $datos['capacidadRam'], $datos['tecnologiaDisco'], $datos['capacidadDisco'],
                                     $datos['numPuertosUSB'], $datos['numPuertosHDMI'], $datos['marcaMonitor'], $datos['pulgadas'],
                                     $datos['precio'], $datos['usuarioId']);
        return $this->computadorRepository->save($computador);
    }*/  

    public function eliminarComputadorPorId($id) {
        return $this->computadorRepository->eliminar($id);
    }  

}
?>
