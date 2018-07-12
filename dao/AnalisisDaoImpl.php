<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnalisisDaoImpl
 *
 * @author Ignacio
 */
include_once 'AnalisisDao.php';

class AnalisisDaoImpl implements AnalisisDao {

    public static function agregarObjeto($dto) {
        
    }

    public static function actualizarObjeto($dto) {
        
    }

    public static function eliminarrObjeto($dto) {
        
    }

    public static function listarEstadoResultadoMuestra($idMuestra) {

        $estado = false;
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT ANALISIS_MUESTRA.ESTADO FROM ANALISIS_MUESTRA JOIN MUESTRA ON 
            MUESTRA.IDMUESTRA = ANALISIS_MUESTRA.ID_MUESTRA
            WHERE MUESTRA.IDMUESTRA=?");
            $stmt->bindParam(1, $idMuestra);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                if($value!=""){
                    $estado=true;
               
                }
            }
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $estado;
    }

    public static function LeerObjeto($dto) {
        
    }

}
