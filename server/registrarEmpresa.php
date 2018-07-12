<?php

include_once '../dto/EmpresaDto.php';
include_once '../dao/EmpresaDaoImp.php';
include_once '../dao/ContactoDaoImpl.php';
include_once '../dto/ContactoDto.php';
include_once '../dao/ClienteDaoImp.php';
include_once '../dto/ClienteDto.php';

session_start();

$emp = new EmpresaDto;
$cto1 = new ContactoDto();
$cto2 = new ContactoDto();

$emp->setNombre($_POST["txtNombre"]);
$emp->setPassword($_POST["txtPassword"]);
$emp->setRut($_POST["txtRut"]);
$emp->setDireccion($_POST["txtDireccion"]);



$cto1->setNombreContacto($_POST["txtN1"]);
$cto1->setRutContacto($_POST["txtR1"]);
$cto1->setEmailContacto($_POST["txtE1"]);
$cto1->setTelefonoContacto($_POST["txtT1"]);
$cto1->setRutEmpresa($_POST["txtRut"]);

$cto2->setNombreContacto($_POST["txtN2"]);
$cto2->setRutContacto($_POST["txtR2"]);
$cto2->setEmailContacto($_POST["txtE2"]);
$cto2->setTelefonoContacto($_POST["txtT2"]);
$cto2->setRutEmpresa($_POST["txtRut"]);


if (!EmpresaDaoImp::existeEmpresaReg($emp->getRut())) {
    if (EmpresaDaoImp::agregarObjeto($emp) && ContactoDaoImpl::agregarObjeto($cto1) && ContactoDaoImpl::agregarObjeto($cto2)) {

        $cli = new ClienteDto();
        $cli->setRutEmpresa($emp->getRut());

        ClienteDaoImp::agregarObjeto($cli);


        $_SESSION["updateMsg"] = "Empresa registrada con exito";
        header('Location: ../pages/registrarEmpresa.php');
    } else {
        $_SESSION["updateMsg"] = "No se ha podido registrar la empresa";
        header('Location: ../pages/registrarEmpresa.php');
    }
} else {
    $_SESSION["updateMsg"] = "NLa empresa ya se encuentra registrada";
    header('Location: ../pages/registrarEmpresa.php');
}