<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactoDto
 *
 * @author Ignacio
 */
class ContactoDto {

    private $rutContacto;
    private $nombreContacto;
    private $emailContacto;
    private $telefonoContacto;
    private $rutEmpresa;
    
    function getRutContacto() {
        return $this->rutContacto;
    }

    function getNombreContacto() {
        return $this->nombreContacto;
    }

    function getEmailContacto() {
        return $this->emailContacto;
    }

    function getTelefonoContacto() {
        return $this->telefonoContacto;
    }

    function getRutEmpresa() {
        return $this->rutEmpresa;
    }

    function setRutContacto($rutContacto) {
        $this->rutContacto = $rutContacto;
    }

    function setNombreContacto($nombreContacto) {
        $this->nombreContacto = $nombreContacto;
    }

    function setEmailContacto($emailContacto) {
        $this->emailContacto = $emailContacto;
    }

    function setTelefonoContacto($telefonoContacto) {
        $this->telefonoContacto = $telefonoContacto;
    }

    function setRutEmpresa($rutEmpresa) {
        $this->rutEmpresa = $rutEmpresa;
    }


    
    
}
