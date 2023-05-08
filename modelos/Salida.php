<?php
class Salida
{
    private $nombreSalida;
    private $idBarco;
    private $fechaSalida;
    private $totalTripulantes;
    private $longitud;
    private $latitud;
    private $peces;

    public function __construct($nombreSalida, $idBarco, $fechaSalida, $totalTripulantes, $longitud, $latitud, $peces)
    {
        $this->nombreSalida = $nombreSalida;
        $this->idBarco = $idBarco;
        $this->fechaSalida = $fechaSalida;
        $this->totalTripulantes = $totalTripulantes;
        $this->longitud = $longitud;
        $this->latitud = $latitud;
        $this->peces = $peces;
    }

    // $nombreSalida
    public function getNombreSalida()
    {
        return $this->nombreSalida;
    }

    public function setNombreSalida($nombreSalida)
    {
        $this->nombreSalida = $nombreSalida;
    }

    // $idBarco
    public function getIdBarco()
    {
        return $this->idBarco;
    }

    public function setIdBarco($idBarco)
    {
        $this->idBarco = $idBarco;
    }

    // $fechaSalida
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    }

    // $totalTripulantes
    public function getTotalTripulantes()
    {
        return $this->totalTripulantes;
    }
    
    public function setTotalTripulantes($totalTripulantes)
    {
        $this->totalTripulantes = $totalTripulantes;
    }

    // $longitud
    public function getLongitud()
    {
        return $this->longitud;
    }

    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    // $latitud
    public function getLatitud()
    {
        return $this->latitud;
    }
    
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    // $peces
    public function getPeces()
    {
        return $this->peces;
    }

    public function setPeces($peces)
    {
        $this->peces = $peces;
    }
    
}
