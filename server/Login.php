<?php

include_once '../dto/EmpleadoDto.php';
include_once '../dao/EmpleadoDaoImpl.php';
include_once '../dto/ContactoDto.php';
include_once '../dao/ContactoDaoImpl.php';
include_once '../dao/EmpresaDaoImp.php';
include_once '../dto/EmpresaDto.php';
include_once '../dto/ParticularDto.php';
include_once '../dao/ParticularDaoImpl.php';

session_start();

if (isset($_POST["txtUserName"]) & isset($_POST["txtPassword"])) {

    $empresa = EmpresaDaoImp::recuperarEmpresa($_POST["txtUserName"], $_POST["txtPassword"]);
    echo var_dump($empresa);
    if (!empty($empresa->getRut())) {

        $contacto = ContactoDaoImpl::buscarPorRutEmpresa($empresa->getRut());

        $_SESSION["dtoEmpresa"] = $empresa;
        $_SESSION["dtoContacto"] = $contacto;
        header('Location: ../pages/DatosClienteEmpresa.php');
    }

    $particular = ParticularDaoImpl::comprobarParticular($_POST["txtUserName"], $_POST["txtPassword"]);

    if (!empty($particular->getRutParticular())) {
        $_SESSION["dtoParticular"] = $particular;
        header('Location: ../pages/DatosCliente.php');
    }

    $empleado = EmpleadoDaoImpl::comprobarEmpleado($_POST["txtUserName"], $_POST["txtPassword"]);

    if (!empty($empleado->getRut())) {
        $_SESSION["dtoEmpleado"] = $empleado;

        if ($empleado->getIdTipoEmpleado() == 1) {
            header('Location: ../pages/HomeAdmin.php');
        }
        if ($empleado->getIdTipoEmpleado() == 2) {
            header('Location: ../pages/HomeReceptor.php');
        }
        if ($empleado->getIdTipoEmpleado() == 3) {
            header('Location: ../pages/HomeTecnico.php');
        }
    }
}

