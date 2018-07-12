<?php

class ClienteDto {

    private $idCliente;
    private $rutParticular;
    private $rutEmpresa;

    function __construct() {
        
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function getRutParticular() {
        return $this->rutParticular;
    }

    function getRutEmpresa() {
        return $this->rutEmpresa;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setRutParticular($rutParticular) {
        $this->rutParticular = $rutParticular;
    }

    function setRutEmpresa($rutEmpresa) {
        $this->rutEmpresa = $rutEmpresa;
    }

}
