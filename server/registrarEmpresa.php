<?php

include_once '../dto/EmpresaDto.php';
include_once '../dao/EmpresaDaoImp.php';
include_once '../dao/ContactoDaoImpl.php';
include_once '../dto/ContactoDto.php';

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

$cto2->setNombreContacto($_POST["txtN1"]);
$cto2->setRutContacto($_POST["txtR1"]);
$cto2->setEmailContacto($_POST["txtE1"]);
$cto2->setTelefonoContacto($_POST["txtT1"]);
$cto2->setRutEmpresa($_POST["txtRut"]);
        

if(EmpresaDaoImp::agregarObjeto($emp)&& ContactoDaoImpl::agregarObjeto($cto1)&& ContactoDaoImpl::agregarObjeto($cto2)){


echo"<script>alert('Empresa registrada')</script>;";
header('Location: ../pages/LoginUser.php');
}else {
    echo"<script>alert('La empresa ya está registrada')</script>";
    header('Location: ../pages/registrarEmpresa.php');
}