<?php

include_once '../dto/ContactoDto.php';
include_once '../dao/ContactoDaoImpl.php';
include_once '../dto/EmpresaDto.php';
include_once '../dao/EmpresaDaoImp.php';
session_start();



if (!empty($_POST["updContacto"])) {

    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $email = $_POST["txtEmail"];

    $dto = new ContactoDto();
    $dto->setNombreContacto($nombre);
    $dto->setTelefonoContacto($telefono);
    $dto->setEmailContacto($email);
    $dto->setRutContacto($_SESSION["rutContacto"]);

    if (ContactoDaoImpl::actualizarObjeto($dto)) {
        $_SESSION["updateMsg"] = "Se actualizaron los datos del contacto exitosamente";
        $_SESSION["dtoContacto"] = ContactoDaoImpl::LeerObjeto($dto);
    } else {
        $_SESSION["updateMsg"] = "No se pudieron actualizar los datos del contacto";
    }

   header('Location: ../pages/DatosClienteEmpresa.php');
}



if (!empty($_POST["updEmpresa"])) {

    $nombre = $_POST["txtNombre"];
    $direccion = $_POST["txtDireccion"];
    $contrasena = $_POST["txtContrasena"];

    $dto = new EmpresaDto();
    $dto->setNombre($nombre);
    $dto->setDireccion($direccion);
    $dto->setPassword($contrasena);
    $dto->setRut($_SESSION["rutEmpresa"]);

    if (EmpresaDaoImp::actualizarObjeto($dto)) {
        $_SESSION["updateMsg"] = "Se actualizaron los datos de la empresa exitosamente";
        $_SESSION["dtoEmpresa"] = EmpresaDaoImp::LeerObjeto($dto);
    } else {
        $_SESSION["updateMsg"] = "No se pudieron actualizar los datos de la empresa";
    }





    header('Location: ../pages/DatosClienteEmpresa.php');
}

