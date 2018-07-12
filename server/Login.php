<?php

include_once '../dto/EmpleadoDto.php';
include_once '../dao/EmpleadoDao.php';
include_once '../dto/ContactoDto.php';
include_once '../dao/ContactoDaoImpl.php';
include_once '../dto/ParticularDto.php';
include_once '../dao/ParticularDaoImpl.php';

session_start();

if (isset($_POST["txtUserName"]) & isset($_POST["txtPassword"])) {

    $contacto = ContactoDaoImpl::comprobarContacto($_POST["txtUserName"], $_POST["txtPassword"]);

    if (!empty($contacto->getRutContacto())) {
        header('Location: ../pages/HomeCliente.php');
    }
    
    $particular = ParticularDaoImpl::comprobarParticular($_POST["txtUserName"], $_POST["txtPassword"]);

    if (!empty($particular->getRutParticular())) {
        header('Location: ../pages/HomeCliente.php');
    }
    
    $empleado = EmpleadoDaoImpl::comprobarEmpleado($_POST["txtUserName"], $_POST["txtPassword"]);

    if (!empty($empleado->getRut())) {
        header('Location: ../pages/HomeCliente.php');
    }
}

