<?php

include_once '../dto/MuestraDto.php';
include_once '../dao/MuestraDaoImpl.php';

$temperatura = $_POST["txtTemperatura"];
$cantidad = $_POST["txtCantidad"];


$dto = new MuestraDto();

$dto->setCantidadMuestra($cantidad);
$dto->setCodigoCliente(3);
$dto->setTemperaturaMuestra($temperatura);

MuestraDaoImpl::agregarObjeto($dto);

