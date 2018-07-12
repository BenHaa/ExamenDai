<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoAnalisisDto
 *
 * @author Ignacio
 */
class AnalisisDto {

    private $idAnalisis;
    private $idTipoAnalisis;
    private $idMuestra;
    private $fechaRegistro;
    private $ppm;
    private $estado;
    private $rutEmpleado;

    function getIdAnalisis() {
        return $this->idAnalisis;
    }

    function getIdTipoAnalisis() {
        return $this->idTipoAnalisis;
    }
    
    function getRutEmpleado() {
        return $this->rutEmpleado;
    }

    function setRutEmpleado($rutEmpleado) {
        $this->rutEmpleado = $rutEmpleado;
    }

    
    function getIdMuestra() {
        return $this->idMuestra;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getPpm() {
        return $this->ppm;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdAnalisis($idAnalisis) {
        $this->idAnalisis = $idAnalisis;
    }

    function setIdTipoAnalisis($idTipoAnalisis) {
        $this->idTipoAnalisis = $idTipoAnalisis;
    }

    function setIdMuestra($idMuestra) {
        $this->idMuestra = $idMuestra;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setPpm($ppm) {
        $this->ppm = $ppm;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
