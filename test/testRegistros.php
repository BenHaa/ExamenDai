<?php

include_once '../dto/EmpresaDto.php';
include_once '../dto/ContactoDto.php';
include_once '../dao/EmpresaDaoImp.php';


$dto = new ContactoDto();
$emp = new EmpresaDto;

$emp->setNombre("test1");
$emp->setPassword("test1");
$emp->setRut("11111111-1");
$emp->setDireccion("test1");

if(EmpresaDaoImp::existeEmpresa("11111111-1")){
    echo"funciona";
}else{
    echo "no funciona";
}

