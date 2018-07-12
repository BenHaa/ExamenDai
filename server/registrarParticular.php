<?php

include_once '../dto/ParticularDto.php';
include_once '../dao/ParticularDaoImpl.php';
include_once '../dao/ClienteDaoImp.php';
include_once '../dto/ClienteDto.php';
session_start();

$dto = new ParticularDto();

$dto->setRutParticular($_POST["txtRut"]);
$dto->setNombre($_POST["txtNombre"]);
$dto->setContrasena($_POST["txtPassword"]);
$dto->setDireccion($_POST["txtDireccion"]);
$dto->setEmail($_POST["txtEmail"]);

$num1 = ($_POST["txtTel1"]);
$num2 = ($_POST["txtTel2"]);



if (!ParticularDaoImpl::existeParticular($dto->getRutParticular())) {
    if (ParticularDaoImpl::agregarObjeto($dto)) {
        $cli = new ClienteDto();
        $cli->setRutParticular($dto->getRutParticular());

        ClienteDaoImp::agregarObjeto($cli);

        $_SESSION["updateMsg"] = "Particular registrado con éxito";
    }
    ParticularDaoImpl::agregarTelefono($num1, $dto->getRutParticular());
    if ($num2 != null || isset($num2)) {
        ParticularDaoImpl::agregarTelefono($num2, $dto->getRutParticular());
    }
    header('Location: ../pages/RegistrarParticular.php');
} else {
    $_SESSION["updateMsg"] = "No se pudo registrar el particular";
    header('Location: ../pages/RegistrarParticular.php');
}