<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Ignacio
 */

include_once 'BaseDao.php';

interface EmpleadoDao extends BaseDao {
    
    //Lista todos los empleados que no sean administrador
    public static function listarEmpleados($id);
    
    public static function IdTipoADescripcion($id);
    
    public static function listarTipoEmpleado();
    
    //Cambia la descripción de tipo al id respectivo
    public static function DescTipoAId($desc);
    
}
