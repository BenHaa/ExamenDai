<?php

include_once '../dto/EmpleadoDto.php';
include_once '../dao/EmpleadoDaoImpl.php';
header('Content-Type: text/html; charset=utf-8');
session_start();

$dto = new EmpleadoDto();
$dto->setNombre($_POST["txtNombre"]);
$dto->setContrasena($_POST["txtContrasena"]);
$dto->setIdTipoEmpleado(EmpleadoDaoImpl::DescTipoAId(utf8_decode($_POST["cmbTipo"])));
$dto->setRut($_POST["txtRut"]);
$dto->setEstado(1);




if (EmpleadoDaoImpl::agregarObjeto($dto)) {
    $_SESSION["addMsg"] = "Se agregó correctamente el empleado";
} else {
    $_SESSION["addMsg"] = "No se pudo agregar el empleado";
}

header('Location: ../pages/GestionTrabajador.php');
