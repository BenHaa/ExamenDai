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
include_once '../dto/MuestraDto.php';
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
            $stmt = $pdo->prepare("INSERT INTO MUESTRA (fechaRecepcion, temperaturaMuestra, cantidadMuestra, codigo_cliente) VALUES(now(),?,?,?)");

            $temperatura = $dto->getTemperaturaMuestra();
            $cantidad = $dto->getCantidadMuestra();
            $codigoCliente = $dto->getCodigoCliente();


            if ($temperatura > 10 & $temperatura < 100) {
                $stmt->bindParam(1, $temperatura);
            }
            if ($cantidad > 0) {
                $stmt->bindParam(2, $cantidad);
            }
            $stmt->bindParam(3, $codigoCliente);


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

    public static function listarMuestrasPorCodigoMuestra($codigo) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDMUESTRA, TEMPERATURAMUESTRA, CANTIDADMUESTRA FROM MUESTRA WHERE IDMUESTRA=?");
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
            $stmt = $pdo->prepare("SELECT IDMUESTRA, TEMPERATURAMUESTRA, CANTIDADMUESTRA FROM MUESTRA WHERE CODIGO_CLIENTE=?");
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

    public static function recuperarUltimaMuestra() {
        $id = 0;
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT MAX(IDMUESTRA) FROM MUESTRA;");
            $stmt->bindParam(1, $codigo);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {

                $id = ($value["MAX(IDMUESTRA)"]);
                return $id;
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $id;
    }

    public static function listarMuestrasParaAnalisis() {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM MUESTRA JOIN ANALISIS_MUESTRA ON MUESTRA.IDMUESTRA=ANALISIS_MUESTRA.IDANALISIS WHERE
            MUESTRA.IDMUESTRA=ANALISIS_MUESTRA.IDANALISIS");
            $stmt->bindParam(1, $codigo);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto = new MuestraDto();
                $dto->setCodigoCliente($value["codigo_cliente"]);
                $dto->setIdMuestra($value["idMuestra"]);
                $lista->append($dto);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }

}
