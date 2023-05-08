<?php
class Persona {

    private $idSalida;
    private $idBarco;
    private $nombre;
    private $direccion;
    private $telefono;
    private $contacto;
    private $capturas;

    public function __construct($idSalida, $idBarco, $nombre, $direccion, $telefono, $contacto, $capturas) {
        $this->idSalida = $idSalida;
        $this->idBarco = $idBarco;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->contacto = $contacto;
        $this->capturas = $capturas;
    }

    public function getIdSalida() {
        return $this->idSalida;
    }

    public function setIdSalida($idSalida) {
        $this->idSalida = $idSalida;
    }

    public function getIdBarco() {
        return $this->idBarco;
    }

    public function setIdBarco($idBarco) {
        $this->idBarco = $idBarco;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getContacto() {
        return $this->contacto;
    }

    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    public function getCapturas() {
        return $this->capturas;
    }

    public function setCapturas($capturas) {
        $this->capturas = $capturas;
    }
}
