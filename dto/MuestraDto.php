<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnalisisDto
 *
 * @author Ignacio
 */
class MuestraDto {
    private $idMuestra;
    private $fechaRecepcion;
    private $temperaturaMuestra;
    private $cantidadMuestra;
    private $codigoCliente;
    
    
    function getIdMuestra() {
        return $this->idMuestra;
    }

    function getFechaRecepcion() {
        return $this->fechaRecepcion;
    }

    function getTemperaturaMuestra() {
        return $this->temperaturaMuestra;
    }

    function getCantidadMuestra() {
        return $this->cantidadMuestra;
    }

    function getCodigoCliente() {
        return $this->codigoCliente;
    }

    function setIdMuestra($idMuestra) {
        $this->idMuestra = $idMuestra;
    }

    function setFechaRecepcion($fechaRecepcion) {
        $this->fechaRecepcion = $fechaRecepcion;
    }

    function setTemperaturaMuestra($temperaturaMuestra) {
        $this->temperaturaMuestra = $temperaturaMuestra;
    }

    function setCantidadMuestra($cantidadMuestra) {
        $this->cantidadMuestra = $cantidadMuestra;
    }

    function setCodigoCliente($codigoCliente) {
        $this->codigoCliente = $codigoCliente;
    }


    
    
    
}
