<?php

include_once '../dto/ParticularDto.php';
include_once '../dao/ParticularDaoImpl.php';

$dto = new ParticularDto();

$dto->setRutParticular($_POST["txtRut"]);
$dto->setNombre($_POST["txtNombre"]);
$dto->setContrasena($_POST["txtPassword"]);
$dto->setDireccion($_POST["txtDireccion"]);
$dto->setEmail($_POST["txtEmail"]);

$num1=($_POST["txtTel1"]);
$num2=($_POST["txtTel2"]);



if (!ParticularDaoImpl::existeParticular($dto->getRutParticular())) {
    ParticularDaoImpl::agregarObjeto($dto);
    ParticularDaoImpl::agregarTelefono($num1, $dto->getRutParticular());
    if($num2!=null || isset($num2)){
        ParticularDaoImpl::agregarTelefono($num2, $dto->getRutParticular());
    }
    echo "<script>alert('Particular registrado, redireccionando al Login...')</script>;";
    header('Location: ../pages/LoginUser.php');
} else {
    echo"<script>alert('La empresa ya está registrada')</script>";
    header('Location: ../pages/registrarEmpresa.php');
}