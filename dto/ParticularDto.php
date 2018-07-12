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

    private $rutParticular;
    private $contrasena;
    private $nombre;
    private $direccion;
    private $email;

    
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

}
