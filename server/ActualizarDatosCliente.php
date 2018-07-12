<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../dto/ParticularDto.php';
include_once '../dao/ParticularDaoImpl.php';
session_start();
$dto = new ParticularDto();



$nombre = $_POST["txtNombre"];
$contrasena = $_POST["txtContrasena"];
$correo = $_POST["txtEmail"];
$direccion = $_POST["txtDireccion"];

$dto->setRutParticular($_SESSION["rutParticular"]);
$dto->setDireccion($direccion);
$dto->setNombre($nombre);
$dto->setContrasena($contrasena);
$dto->setEmail($correo);



if (ParticularDaoImpl::actualizarObjeto($dto)) {
    $_SESSION["updateMsg"] = "Se actualizaron los datos del cliente exitosamente";
    $_SESSION["dtoParticular"] = ParticularDaoImpl::LeerObjeto($dto);
} else {
    $_SESSION["updateMsg"] = "No se pudieron actualizar los datos del cliente";
}


 header('Location: ../pages/DatosCliente.php');
