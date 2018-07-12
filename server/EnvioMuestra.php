<?php

include_once '../dto/MuestraDto.php';
include_once '../dao/MuestraDaoImpl.php';
session_start();

$temperatura = $_POST["txtTemperatura"];
$cantidad = $_POST["txtCantidad"];


$dto = new MuestraDto();

$dto->setCantidadMuestra($cantidad);
$dto->setCodigoCliente(3);
$dto->setTemperaturaMuestra($temperatura);

if(MuestraDaoImpl::agregarObjeto($dto)){
    $_SESSION["envioMsg"] = "Se ha enviado la muestra exitosamente";
    
}else{
    $_SESSION["envioMsg"] = "No se ha podido enviar la muestra";
}


header('Location: ../pages/EnvioMuestraCliente.php');
