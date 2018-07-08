<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MuestraDaoImpl
 *
 * @author Ignacio
 */
include_once '../dao/MuestraDao.php';
include_once '../sql/ClasePDO.php';

class MuestraDaoImpl implements MuestraDao {

    //put your code here
    public static function LeerObjeto($dto) {
        
    }

    public static function actualizarObjeto($dto) {
        
    }

    public static function agregarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO MUESTRA (fechaRecepcion, temperaturaMuestra, cantidadMuestra, codigo_cliente) VALUES(now(),?,?,?);");

            $temperatura = $dto->getTemperaturaMuestra();
            $cantidad = $dto->getCantidadMuestra();
            $codigoCliente = $dto->getCodigoCliente();



            $stmt->bindParam(1, $temperatura);
            $stmt->bindParam(2, $cantidad);
            $stmt->bindParam(3, $codigoCliente);


            $stmt->execute();
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function eliminarrObjeto($dto) {
        
    }

    public static function listarMuestrasPorCodigoMuestra($codigo) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDMUESTRA, TEMPERATURAMUESTRA, CANTIDADMUESTRA FROM MUESTRA WHERE IDMUESTRA=?;");
            $stmt->bindParam(1, $codigo);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto = new MuestraDto();
                $dto->setIdMuestra($value["IDMUESTRA"]);
                $dto->setTemperaturaMuestra($value["TEMPERATURAMUESTRA"]);
                $dto->setCantidadMuestra($value["CANTIDADMUESTRA"]);
                $lista->append($dto);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }

    public static function listarMuestrasPorCodigoCliente($codigo) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDMUESTRA, TEMPERATURAMUESTRA, CANTIDADMUESTRA FROM MUESTRA WHERE CODIGO_CLIENTE=?;");
            $stmt->bindParam(1, $codigo);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto = new MuestraDto();
                $dto->setIdMuestra($value["IDMUESTRA"]);
                $dto->setTemperaturaMuestra($value["TEMPERATURAMUESTRA"]);
                $dto->setCantidadMuestra($value["CANTIDADMUESTRA"]);
                $lista->append($dto);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }
//Falta implementar
    public static function listarMuestrasPorRutCliente($rut) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDMUESTRA, TEMPERATURAMUESTRA, CANTIDADMUESTRA FROM MUESTRA WHERE CODIGO_CLIENTE=?;");
            $stmt->bindParam(1, $codigo);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto = new MuestraDto();
                $dto->setIdMuestra($value["IDMUESTRA"]);
                $dto->setTemperaturaMuestra($value["TEMPERATURAMUESTRA"]);
                $dto->setCantidadMuestra($value["CANTIDADMUESTRA"]);
                $lista->append($dto);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }

}
