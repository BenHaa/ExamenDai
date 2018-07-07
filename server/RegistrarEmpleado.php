<?php

include_once '../dto/EmpleadoDto.php';
include_once '../dao/EmpleadoDaoImpl.php';
header('Content-Type: text/html; charset=utf-8');
$dto = new EmpleadoDto();
$dto->setNombre($_POST["txtNombre"]);
$dto->setContrasena($_POST["txtContrasena"]);
$dto->setIdTipoEmpleado(EmpleadoDaoImpl::DescTipoAId(utf8_decode($_POST["cmbTipo"])));
$dto->setRut($_POST["txtRut"]);
$dto->setEstado(1);



if(EmpleadoDaoImpl::agregarObjeto($dto)){
    echo '<script> alert("Se ingresó el empleado");</script>';
    
}else{
     echo '<script> alert("No se pudo ingresar el empleado");</script>';
}

header('Location: ../pages/GestionTrabajador.php');
