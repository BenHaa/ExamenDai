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

interface ParticularDao extends BaseDao {

    public static function listarTelefonosParticular($rut);

    public static function comprobarParticular($nombre, $pass);

    public static function buscarCodigoCliente($rutParticular);
}
