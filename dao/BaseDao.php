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
interface BaseDao {

    public static function agregarObjeto($dto);

    public static function eliminarrObjeto($dto);

    public static function actualizarObjeto($dto);

    public static function LeerrObjeto($dto);
}
