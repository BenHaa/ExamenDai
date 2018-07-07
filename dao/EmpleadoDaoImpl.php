<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpleadoDaoImpl
 *
 * @author Ignacio
 */
include_once '../dao/EmpleadoDao.php';
include_once '../dto/EmpleadoDto.php';
include_once '../sql/ClasePDO.php';
header('Content-Type: text/html; charset=utf-8');
class EmpleadoDaoImpl implements EmpleadoDao {

    //put your code here
    public static function LeerObjeto($dto) {
        
    }

    public static function actualizarObjeto($dto) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE EMPLEADO SET estado =? WHERE rutEmpleado =?");

            $estado = $dto->getEstado();
            $rut = $dto->getRut();


            $stmt->bindParam(1, $estado);
            $stmt->bindParam(2, $rut);

            $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function agregarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO EMPLEADO(rutEmpleado, nombreEmpleado, passwordEmpleado, id_tipoEmpleado, estado) VALUES(?,?,?,?,?);");


            $rut = $dto->getRut();
            $nombre = $dto->getNombre();
            $pass = $dto->getContrasena();
            $id = $dto->getIdTipoEmpleado();
            //empleado habilitado por defecto
            $estado = 1;

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $pass);
            $stmt->bindParam(4, $id);
            $stmt->bindParam(5, $estado);


            $stmt->execute();
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function eliminarrObjeto($dto) {
        
    }

    public static function listarEmpleados($id) {

        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM EMPLEADO WHERE ID_TIPOEMPLEADO!=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto = new EmpleadoDto();
                $dto->setIdTipoEmpleado($value["id_tipoEmpleado"]);
                $dto->setContrasena($value["passwordEmpleado"]);
                $dto->setNombre($value["nombreEmpleado"]);
                $dto->setRut($value["rutEmpleado"]);
                $dto->setEstado($value["estado"]);
                $lista->append($dto);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }

    public static function IdTipoADescripcion($id) {

        $descripcion = "";
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT descripcion FROM TIPO_EMPLEADO WHERE IDTIPO=?;");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {

                $descripcion = utf8_encode($value["descripcion"]);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $descripcion;
    }

    public static function listarTipoEmpleado() {
        $lista = new ArrayObject();

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DESCRIPCION FROM TIPO_EMPLEADO WHERE DESCRIPCION !='Administrador'");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {

                $descripcion = utf8_encode($value["DESCRIPCION"]);

                $lista->append($descripcion);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }

    public static function DescTipoAId($desc) {
        $id=0;
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDTIPO FROM TIPO_EMPLEADO WHERE DESCRIPCION=?;");
            $stmt->bindParam(1, $desc);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {

                $id = utf8_decode($value["IDTIPO"]);
            }

            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $id;
    }

}
