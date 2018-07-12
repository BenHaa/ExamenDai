<?php
include_once 'BaseDao.php';
include_once '../sql/ClasePDO.php';

class EmpresaDaoImp implements BaseDao {

    //put your code here
    public static function LeerObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM EMPRESA WHERE RUTEMPRESA=?");

            $rut = $dto->getRut();

            $stmt->bindParam(1, $rut);

            $stmt->execute();
            $rs = $stmt->fetchAll();
            $dto = new EmpresaDto();
            foreach ($rs as $value){
                $dto->setRut($value["rutEmpresa"]);
                $dto->setNombre($value["nombreEmpresa"]);
                $dto->setPassword($value["passwordEmpresa"]);
                $dto->setDireccion($value["direccionEmpresa"]);
                break;
            }
            return $dto;
        } catch (Exception $exc) {
//            echo $exc->getTraceAsString();
            return null;
        }
    }

    public static function actualizarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE EMPRESA SET NOMBREEMPRESA =?, passwordEmpresa=?, DIRECCIONEMPRESA=? WHERE RUTEMPRESA=?");

            $rut = $dto->getRut();
            $nombre = $dto->getNombre();
            $password = $dto->getPassword();
            $direccion = $dto->getDireccion();
            

            $stmt->bindParam(4, $rut);
            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $password);
            $stmt->bindParam(3, $direccion);

            $stmt->execute();
            return ($stmt->rowCount()>0);
        } catch (Exception $exc) {
            echo $exc->getMessage();
            return false;
        }
    }

    //Registrar empresa
    public static function agregarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO EMPRESA (RUTEMPRESA, NOMBREEMPRESA, passwordEmpresa, DIRECCIONEMPRESA) VALUES (?,?,?,?)");

            $rut = $dto->getRut();
            $nombre = $dto->getNombre();
            $password = $dto->getPassword();
            $direccion = $dto->getDireccion();

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $password);
            $stmt->bindParam(4, $direccion);

            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (Exception $exc) {
//            echo $exc->getTraceAsString();
            return false;
        }
        
    }
    public static function existeEmpresa($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM EMPRESA WHERE RUTEMPRESA=?");

            $rute = $rut;

            $stmt->bindParam(1, $rute);

            $stmt->execute();
            $rs = $stmt->fetchAll();            
            foreach ($rs as $value){
                return true;
            }
        } catch (Exception $exc) {
//            echo $exc->getTraceAsString();
            return false;
        }
    }
    

    public static function eliminarrObjeto($dto) {
        
    }

}
