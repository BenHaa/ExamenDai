<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParticularDaoImpl
 *
 * @author Ignacio
 */
include_once '../dao/ParticularDao.php';
include_once '../dto/ParticularDto.php';
include_once '../sql/ClasePDO.php';

class ParticularDaoImpl implements ParticularDao {

    public static function LeerObjeto($dto) {


        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM PARTICULAR WHERE RUTPARTICULAR=?");
            $rut = $dto->getRutParticular();

            $stmt->bindParam(1, $rut);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                echo var_dump($dto);
                foreach ($resultado as $value) {
                    $dto = new ParticularDto();
                    $dto->setContrasena($value["passwordParticular"]);
                    $dto->setNombre($value["nombreParticular"]);
                    $dto->setEmail($value["emailParticular"]);
                    $dto->setRutParticular($value["rutParticular"]);
                    $dto->setDireccion($value["direccionParticular"]);

                    $pdo = null;
                    return $dto;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dto;
    }

    public static function actualizarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE PARTICULAR SET PASSWORDPARTICULAR=?, NOMBREPARTICULAR=?,
            DIRECCIONPARTICULAR=?, EMAILPARTICULAR=? WHERE RUTPARTICULAR=?");


            $rut = $dto->getRutParticular();
            $nombre = $dto->getNombre();
            $pass = $dto->getContrasena();
            $direccion = $dto->getDireccion();
            $email = $dto->getEmail();


            $stmt->bindParam(1, $pass);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $direccion);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $rut);

            if ($stmt->execute()) {
                $pdo = null;
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public static function agregarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO PARTICULAR(rutParticular, passwordParticular, nombreParticular, direccionParticular, emailParticular) VALUES(?, ?, ?, ?, ?)");


            $rut = $dto->getRutParticular();
            $nombre = $dto->getNombre();
            $pass = $dto->getContrasena();
            $direccion = $dto->getDireccion();
            $email = $dto->getEmail();

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $pass);
            $stmt->bindParam(3, $nombre);
            $stmt->bindParam(4, $direccion);
            $stmt->bindParam(5, $email);


             if ($stmt->execute()) {
                $pdo = null;
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        return false;
    }

    public static function eliminarrObjeto($dto) {
        
    }

    public static function listarTelefonosParticular($rut) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT TELEFONO.NUMERO FROM TELEFONO JOIN PARTICULAR ON TELEFONO.RUT_PARTICULAR = PARTICULAR.RUTPARTICULAR WHERE PARTICULAR.RUTPARTICULAR=?");
            $stmt->bindParam(1, $rut);

            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {

                $lista->append($value["NUMERO"]);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }

    public static function agregarTelefono($numero, $rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO TELEFONO(NUMERO, RUT_PARTICULAR) VALUES(?, ?)");

            $stmt->bindParam(1, $numero);
            $stmt->bindParam(2, $rut);

            if ($stmt->execute()) {
                $pdo = null;
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public static function eliminarTelefono($numero, $rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("DELETE FROM TELEFONO WHERE NUMERO=? AND RUT_PARTICULAR=?");

            $stmt->bindParam(1, $numero);
            $stmt->bindParam(2, $rut);
            if ($stmt->execute()) {
                $pdo = null;
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public static function comprobarParticular($nombre, $pass) {
        $dto = new ParticularDto();

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM PARTICULAR WHERE NOMBREPARTICULAR=? AND PASSWORDPARTICULAR=?");


            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $pass);
            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();

                foreach ($resultado as $value) {

                    $dto->setContrasena($value["passwordParticular"]);
                    $dto->setNombre($value["nombreParticular"]);
                    $dto->setEmail($value["emailParticular"]);
                    $dto->setRutParticular($value["rutParticular"]);
                    $dto->setDireccion($value["direccionParticular"]);

                    $pdo = null;
                    return $dto;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dto;
    }

    public static function buscarCodigoCliente($rutParticular) {
        $codigo = 0;

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDCLIENTE FROM CLIENTE JOIN PARTICULAR ON CLIENTE.RUT_PARTICULAR = PARTICULAR.RUTPARTICULAR
            WHERE PARTICULAR.RUTPARTICULAR=?");


            $stmt->bindParam(1, $rutParticular);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();

                foreach ($resultado as $value) {
                    $codigo = $value["IDCLIENTE"];
                    $pdo = null;
                    return $codigo;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $codigo;
    }
    
    public static function existeParticular($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM PARTICULAR WHERE RUTPARTICULAR=?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();
            $rs = $stmt->fetchAll();            
            foreach ($rs as $value){
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
            return false;
        }
        return false;
    }

}
