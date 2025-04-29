<?php
class Computador {
    public $id;
    public $marca;
    public $categoria;
    public $marcaCpu;
    public $velocidadCpu;
    public $tecnologiaRam;
    public $capacidadRam;
    public $tecnologiaDisco;
    public $capacidadDisco;
    public $numPuertosUSB;
    public $numPuertosHDMI;
    public $marcaMonitor;
    public $pulgadas;
    public $precio;
    public $usuarios_id;
    public $nombreUsuario;

    public function __construct($id = null, $marca = '', $categoria = '', $marcaCpu = '', $velocidadCpu = '',
                                $tecnologiaRam = '', $capacidadRam = '', $tecnologiaDisco = '', $capacidadDisco = '',
                                $numPuertosUSB = 0, $numPuertosHDMI = 0, $marcaMonitor = '', $pulgadas = 0, $precio = 0, $usuarios_id = null) {
        $this->id = $id;
        $this->marca = $marca;
        $this->categoria = $categoria;
        $this->marcaCpu = $marcaCpu;
        $this->velocidadCpu = $velocidadCpu;
        $this->tecnologiaRam = $tecnologiaRam;
        $this->capacidadRam = $capacidadRam;
        $this->tecnologiaDisco = $tecnologiaDisco;
        $this->capacidadDisco = $capacidadDisco;
        $this->numPuertosUSB = $numPuertosUSB;
        $this->numPuertosHDMI = $numPuertosHDMI;
        $this->marcaMonitor = $marcaMonitor;
        $this->pulgadas = $pulgadas;
        $this->precio = $precio;
        $this->usuarios_id = $usuarios_id;
    }
}
?>
