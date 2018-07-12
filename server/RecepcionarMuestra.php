<?php

include_once '../dto/AnalisisDto.php';
include_once '../dao/AnalisisDaoImpl.php';
include_once '../dto/MuestraDto.php';
include_once '../dao/MuestraDaoImpl.php';
include_once '../dto/EmpleadoDto.php';
session_start();

$temperatura = $_POST["txtTemperatura"];
$cantidad = $_POST["txtCantidadMuestra"];
$fecha = $_POST["txtFecha"];
$rut = $_POST["txtRut"];
$codigo = $_POST["txtCodigo"];
$nombre = $_POST["txtNombre"];




$dto = new MuestraDto();

$dtoEmp = $_SESSION["dtoEmpleado"];


$dto->setCantidadMuestra($cantidad);
$dto->setCodigoCliente($codigo);
$dto->setTemperaturaMuestra($temperatura);

if (MuestraDaoImpl::agregarObjeto($dto)) {
    $id = MuestraDaoImpl::recuperarUltimaMuestra();

    if (isset($_POST["chkMicotoxina"])) {
        $dtoAnalisis = new AnalisisDto();
        $dtoAnalisis->setEstado(0);
        $dtoAnalisis->setIdMuestra($id);
        $dtoAnalisis->setRutEmpleado($dtoEmp->getRut());
        $dtoAnalisis->setIdTipoAnalisis(1);
        AnalisisDaoImpl::agregarObjeto($dtoAnalisis);
        $_SESSION["envioMsg"] = "Se ha recepcionado la muestra exitosamente";
    }
    if (isset($_POST["chkMetalesPesados"])) {
        $dtoAnalisis = new AnalisisDto();
        $dtoAnalisis->setEstado(0);
        $dtoAnalisis->setIdMuestra($id);
        $dtoAnalisis->setRutEmpleado($dtoEmp->getRut());
        $dtoAnalisis->setIdTipoAnalisis(2);
        AnalisisDaoImpl::agregarObjeto($dtoAnalisis);
        $_SESSION["envioMsg"] = "Se ha recepcionado la muestra exitosamente";
    }
    if (isset($_POST["chkPlaguicida"])) {
        $dtoAnalisis = new AnalisisDto();
        $dtoAnalisis->setEstado(0);
        $dtoAnalisis->setIdMuestra($id);
        $dtoAnalisis->setRutEmpleado($dtoEmp->getRut());
        $dtoAnalisis->setIdTipoAnalisis(3);
        AnalisisDaoImpl::agregarObjeto($dtoAnalisis);
        $_SESSION["envioMsg"] = "Se ha recepcionado la muestra exitosamente";
    }
    if (isset($_POST["chkMareaRoja"])) {
        $dtoAnalisis = new AnalisisDto();
        $dtoAnalisis->setEstado(0);
        $dtoAnalisis->setIdMuestra($id);
        $dtoAnalisis->setRutEmpleado($dtoEmp->getRut());
        $dtoAnalisis->setIdTipoAnalisis(4);
        AnalisisDaoImpl::agregarObjeto($dtoAnalisis);
        $_SESSION["envioMsg"] = "Se ha recepcionado la muestra exitosamente";
    }
    if (isset($_POST["chkBacteriasNocivas"])) {
        $dtoAnalisis = new AnalisisDto();
        $dtoAnalisis->setEstado(0);
        $dtoAnalisis->setIdMuestra($id);
        $dtoAnalisis->setRutEmpleado($dtoEmp->getRut());
        $dtoAnalisis->setIdTipoAnalisis(5);
        AnalisisDaoImpl::agregarObjeto($dtoAnalisis);
        $_SESSION["envioMsg"] = "Se ha recepcionado la muestra exitosamente";
    }
} else {
    $_SESSION["envioMsg"] = "No se ha podido rececpionar la muestra";
}


header('Location: ../pages/RecepcionDeMuestra.php');
