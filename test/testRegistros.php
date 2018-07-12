<?php

include_once '../dto/EmpresaDto.php';
include_once '../dto/ContactoDto.php';
include_once '../dao/EmpresaDaoImp.php';
include_once '../dao/ContactoDaoImpl.php';

//$cto2 = new ContactoDto();
//
//$cto2->setNombreContacto("test2");
//$cto2->setRutContacto("22222222-2");
//$cto2->setEmailContacto("test2");
//$cto2->setTelefonoContacto("test2");
//$cto2->setRutEmpresa("11111111-1");
//

$dto = new ContactoDto();
$emp = new EmpresaDto;

$emp->setNombre("test1");
$emp->setPassword("test1");
$emp->setRut("11111111-1");
$emp->setDireccion("test1");

if(EmpresaDaoImp::actualizarObjeto($emp)){
    echo"funciona";
}else{
    echo "no funciona";
}

