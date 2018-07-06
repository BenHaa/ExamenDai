<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpleadoDto
 *
 * @author Ignacio
 */
class EmpleadoDto {

    private $rut;
    private $nombre;
    private $contrasena;
    private $categoria;
    
    function __construct() {
        
    }
    
    
    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }


    

    
    
}
