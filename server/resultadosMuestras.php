<?php

include_once '../dao/AnalisisDaoImpl.php';
include_once '../dto/AnalisisDto.php';

$listado = AnalisisDaoImpl::listarAnalisis($_POST["txtCod"]);

session_start();

$_SESSION["id_muestra"] = $_POST["txtCod"];
foreach ($listado as $value) {
    if ($value instanceof AnalisisDto) {
        if ($value->getIdTipoAnalisis() == 1) {
            $_SESSION["Micotoxinas"]=$value->getPpm();
        }
        if ($value->getIdTipoAnalisis() == 2) {
            $_SESSION["Metales"]=$value->getPpm();
        }
        if ($value->getIdTipoAnalisis() == 3) {
            $_SESSION["Plaguicidas"]=$value->getPpm();
        }
        if ($value->getIdTipoAnalisis() == 4) {
            $_SESSION["Marea"]=$value->getPpm();
        }
        if ($value->getIdTipoAnalisis() == 5) {
            $_SESSION["Bacterias"]=$value->getPpm();
        }
    }
}
session_commit();
header('Location: ../pages/GraficosReportes.php');