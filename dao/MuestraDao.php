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
interface MuestraDao extends BaseDao {

    public static function listarMuestrasPorCodigoMuestra($codigo);
    
    public static function listarMuestrasPorCodigoCliente($codigo);
    
    public static function listarMuestrasPorRutCliente($rut);
    
    public static function recuperarUltimaMuestra();
    
    public static function listarMuestrasParaAnalisis();
    
}
