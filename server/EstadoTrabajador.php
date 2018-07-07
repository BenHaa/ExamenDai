<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../dto/EmpresaDto.php';
include_once '../dao/EmpleadoDaoImpl.php';
session_start();


$rut = $_POST["rutHabilitar"];
$dto = new EmpleadoDto();

if (!empty($rut)) {
    $dto->setRut($rut);
}




if (isset($_POST["habilitar"])) {
    $dto->setEstado(1);
    EmpleadoDaoImpl::actualizarObjeto($dto);
    echo "Se ha habilitado el trabajador";
} elseif (isset($_POST["inhabilitar"])) {

    $dto->setEstado(0);
    EmpleadoDaoImpl::actualizarObjeto($dto);
    echo "Se ha inhabilitado el trabajador";
}





