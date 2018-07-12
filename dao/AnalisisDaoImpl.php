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
include_once '../dto/AnalisisDto.php';
include_once '../sql/ClasePDO.php';

class AnalisisDaoImpl implements AnalisisDao {

    public static function agregarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO ANALISIS_MUESTRA (id_tipo_analisis, id_muestra, fechaRegistro, ppm, estado, rut_empleado) VALUES(?,?, now(), null, ?, ?)");

            echo var_dump($dto);
            $tipo = $dto->getIdTipoAnalisis();
            $idMuestra = $dto->getIdMuestra();
            $estado = 0;
            $rut = $dto->getRutEmpleado();

            $stmt->bindParam(1, $tipo);
            $stmt->bindParam(2, $idMuestra);
            $stmt->bindParam(3, $estado);
            $stmt->bindParam(4, $rut);


            if ($stmt->execute()) {
                return true;
            }
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public static function actualizarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE ANALISIS_MUESTRA SET PPM=?, ESTADO=? WHERE IDANALISIS=?");

            
            $ppm =$dto->getPpm();
             $id = $dto->getIdAnalisis();
            $estado = 1;
            
            $stmt->bindParam(1, $ppm);
            $stmt->bindParam(2, $estado);
            $stmt->bindParam(3, $id);



            if ($stmt->execute()) {
                return true;
            }
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
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
                if ($value != "") {
                    $estado = true;
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
