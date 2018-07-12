<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactoDaoImpl
 *
 * @author Ignacio
 */
include_once '../dto/ContactoDto.php';
include_once '../dao/ContactoDao.php';
include_once '../sql/ClasePDO.php';

class ContactoDaoImpl implements ContactoDao {

    public static function LeerObjeto($dto) {
        
    }

    public static function actualizarObjeto($dto) {
        
    }

    public static function agregarObjeto($dto) {
        
    }

    public static function eliminarrObjeto($dto) {
        
    }

    public static function comprobarContacto($nombre, $pass) {
        $dto = new ContactoDto();

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM CONTACTO WHERE NOMBRECONTACTO=? AND PASSWORDCONTACTO=?");


            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $pass);
            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();

                foreach ($resultado as $value) {
                    $dto->setContrasenaContacto($value["passwordContacto"]);
                    $dto->setNombreContacto($value["nombreContacto"]);
                    $dto->setEmailContacto($value["emailContacto"]);
                    $dto->setRutContacto($value["rutContacto"]);
                    $dto->setRutEmpresa($value["rut_empresa"]);
                    $dto->setTelefonoContacto($value["telefonoContacto"]);

                    $pdo = null;
                    return $dto;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dto;
    }

}
