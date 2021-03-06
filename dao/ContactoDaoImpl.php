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

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM CONTACTO WHERE RUTCONTACTO=?");

            $rut = $dto->getRutContacto();

            $stmt->bindParam(1, $rut);

            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dtoN = new ContactoDto();
                $dtoN->setNombreContacto($value["nombreContacto"]);
                $dtoN->setEmailContacto($value["emailContacto"]);
                $dtoN->setRutContacto($value["rutContacto"]);
                $dtoN->setRutEmpresa($value["rut_empresa"]);
                $dtoN->setTelefonoContacto($value["telefonoContacto"]);
                $pdo = null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dtoN;
    }

    public static function actualizarObjeto($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE CONTACTO SET nombreContacto=?, emailContacto=?, telefonoContacto=?
            WHERE rutContacto=?");

            $nombre = $dto->getNombreContacto();
            $email = $dto->getEmailContacto();
            $telefono = $dto->getTelefonoContacto();
            $rut = $dto->getRutContacto();



            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $telefono);
            $stmt->bindParam(4, $rut);

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
            $stmt = $pdo->prepare("INSERT INTO CONTACTO (RUTCONTACTO, NOMBRECONTACTO, EMAILCONTACTO, TELEFONOCONTACTO, RUT_EMPRESA) VALUES (?,?,?,?,?)");

            $rut = $dto->getRutContacto();
            $nombre = $dto->getNombreContacto();
            $email = $dto->getEmailContacto();
            $telefono = $dto->getTelefonoContacto();
            $empresa = $dto->getRutEmpresa();

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $empresa);

            $stmt->execute();
            return ($stmt->rowCount()>0);
        } catch (Exception $exc) {
            echo $exc->getMessage();
            return false;
            $stmt = $pdo->prepare("INSERT INTO CONTACTO(rutContacto, nombreContacto, emailContacto, telefonoContacto, rut_empresa) 
            VALUES(?,?,?,?,?)");


            $rut = $dto->getRutContacto();
            $nombre = $dto->getNombreContacto();
            $email = $dto->getEmailContacto();
            $telefono = $dto->getTelefonoContacto();
            $rutEmp = $dto->getRutEmpresa();

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $telefono);
            $stmt->bindParam(5, $rutEmp);


            $stmt->execute();
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
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

    public static function buscarCodigoCliente($rutContacto) {
        $codigo = 0;

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT IDCLIENTE FROM CLIENTE JOIN CONTACTO ON CLIENTE.RUT_CONTACTOEMPRESA = CONTACTO.RUTCONTACTO
            WHERE CONTACTO.RUTCONTACTO=?");


            $stmt->bindParam(1, $rutContacto);

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

    public static function buscarPorRutEmpresa($rutEmpresa) {
        $dto = new ContactoDto();

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM CONTACTO WHERE RUT_EMPRESA=?");


            $stmt->bindParam(1, $rutEmpresa);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();

                foreach ($resultado as $value) {

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
