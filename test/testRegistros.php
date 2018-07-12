<?php

include_once '../dto/EmpresaDto.php';
include_once '../dto/ContactoDto.php';
include_once '../dto/ParticularDto.php';
include_once '../dao/EmpresaDaoImp.php';
include_once '../dao/ParticularDaoImpl.php';
include_once '../dao/ContactoDaoImpl.php';

//$cto2 = new ContactoDto();
//
//$cto2->setNombreContacto("test2");
//$cto2->setRutContacto("22222222-2");
//$cto2->setEmailContacto("test2");
//$cto2->setTelefonoContacto("test2");
//$cto2->setRutEmpresa("11111111-1");
//

//$dto = new ContactoDto();
//$emp = new EmpresaDto;
//
//$emp->setNombre("test1");
//$emp->setPassword("test1");
//$emp->setRut("11111111-1");
//$emp->setDireccion("test1");

$dto = new ParticularDto();

$dto->setRutParticular("1111111111");
$dto->setNombre("111111111111");
$dto->setContrasena("111111111111");
$dto->setDireccion("111111111111");
$dto->setEmail("111111111111");

if(ParticularDaoImpl::agregarObjeto($dto)){
    echo"funciona";
}else{
    echo "no funciona";
}

