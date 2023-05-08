<?php
class Barco
{
    private $nombreBarco;

    public function __construct($nombreBarco)
    {
        $this->nombreBarco = $nombreBarco;
    }

    public function getNombreBarco()
    {
        return $this->nombreBarco;
    }

    public function setNombreBarco($nombreBarco)
    {
        $this->nombre = $nombreBarco;
    }
}

