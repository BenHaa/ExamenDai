<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParticularDto
 *
 * @author Ignacio
 */
class ParticularDto {
    private $codigoParticular;
    private $rutParticular;
    private $contrasena;
    private $nombre;
    private $direccion;
    private $email;
    private $telefono;
    
    function getCodigoParticular() {
        return $this->codigoParticular;
    }

    function getRutParticular() {
        return $this->rutParticular;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function setCodigoParticular($codigoParticular) {
        $this->codigoParticular = $codigoParticular;
    }

    function setRutParticular($rutParticular) {
        $this->rutParticular = $rutParticular;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }



    
    
    
    
    
}
