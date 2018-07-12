<?php

include_once 'BaseDao.php';
include_once '../sql/ClasePDO.php';
include_once '../dto/EmpresaDto.php';

class EmpresaDaoImp implements BaseDao {

    //put your code here
    public static function LeerObjeto($dto) {
        $dtoN = new EmpresaDto();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM EMPRESA WHERE RUTEMPRESA=?");

            $rut = $dto->getRut();

            $stmt->bindParam(1, $rut);

            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $value) {
                $dtoN->setRut($value["rutEmpresa"]);
                $dtoN->setNombre($value["nombreEmpresa"]);
                $dtoN->setPassword($value["passwordEmpresa"]);
                $dtoN->setDireccion($value["direccionEmpresa"]);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dtoN;
    }

    public static function actualizarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE EMPRESA SET NOMBREEMPRESA=?, PASSWORDEMPRESA=?, DIRECCIONEMPRESA=? WHERE RUTEMPRESA=?");

            $rut = $dto->getRut();
            $nombre = $dto->getNombre();
            $password = $dto->getPassword();
            $direccion = $dto->getDireccion();


            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $password);
            $stmt->bindParam(3, $direccion);
            $stmt->bindParam(4, $rut);

            $stmt->execute();
            $pdo = null;
            return $stmt->rowCount() > 0;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }

    public static function recuperarEmpresa($nombre, $pass) {
        $dto = new EmpresaDto();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM EMPRESA WHERE NOMBREEMPRESA=? AND PASSWORDEMPRESA=?");


            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $pass);

            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $value) {
                $dto->setRut($value["rutEmpresa"]);
                $dto->setNombre($value["nombreEmpresa"]);
                $dto->setPassword($value["passwordEmpresa"]);
                $dto->setDireccion($value["direccionEmpresa"]);
                $pdo = null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dto;
    }

//Registrar empresa
    public static function agregarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO EMPRESA (RUTEMPRESA, NOMBREEMPRESA, PASSWORD, DIRECCIONEMPRESA) VALUES (?,?,?,?)");

            $rut = $dto->getRut();
            $nombre = $dto->getNombre();
            $password = $dto->getPassword();
            $direccion = $dto->getDireccion();

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $password);
            $stmt->bindParam(4, $direccion);

            $stmt->execute();
            $pdo = null;
            return $stmt->rowCount() > 0;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }

    public static function existeEmpresa($nombre, $pass) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM EMPRESA WHERE NOMBREEMPRESA=? AND PASSWORDEMPRESA=?");

            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(1, $pass);

            $stmt->execute();
            $rs = $stmt->fetchAll();
            foreach ($rs as $value) {
                $pdo = null;
                return true;
            }
        } catch (Exception $exc) {
//            echo $exc->getTraceAsString();
            return false;
        }
    }

    public static function eliminarrObjeto($dto) {
        
    }

    public static function buscarCodigoCliente($rut) {
        $codigo = 0;
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDCLIENTE FROM CLIENTE JOIN CONTACTO ON CLIENTE.RUT_CONTACTOEMPRESA=CONTACTO.RUT_EMPRESA
            WHERE CONTACTO.RUT_EMPRESA=?");


            $stmt->bindParam(1, $rut);


            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $value) {
                $codigo = $value["IDCLIENTE"];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $codigo;
    }

}
