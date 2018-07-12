<?php

class ClienteDto {
    private $id_cliente;
    private $rutCliente;
    private $tipoDeCliente;
    
    function __construct() {
        
    }
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getRutCliente() {
        return $this->rutCliente;
    }

    function getTipoDeCliente() {
        return $this->tipoDeCliente;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setRutCliente($rutCliente) {
        $this->rutCliente = $rutCliente;
    }

    function setTipoDeCliente($tipoDeCliente) {
        $this->tipoDeCliente = $tipoDeCliente;
    }


    
}
