<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../dao/MuestraDaoImpl.php';
session_start();




if (!empty($_SESSION["lista"])) {
    unset($_SESSION["lista"]);
}




if (!empty($_POST["btnBuscarPorCodCliente"])) {


    if (!empty($_POST["txtCodigoCliente"])) {

        $lista = MuestraDaoImpl::listarMuestrasPorCodigoCliente($_POST["txtCodigoCliente"]);

        if (!empty($lista)) {
            $_SESSION["lista"] = $lista;
        } 
    }
    header('Location: ../pages/EstadoMuestraCliente.php');
}



if (!empty($_POST["btnBuscarPorCodMuestra"])) {


    if (!empty($_POST["txtCodigoMuestra"])) {

        $lista = new ArrayObject();

        $lista = MuestraDaoImpl::listarMuestrasPorCodigoMuestra($_POST["txtCodigoMuestra"]);

        if (!empty($lista)) {
            $_SESSION["lista"] = $lista;
        }
    }
    header('Location: ../pages/EstadoMuestraCliente.php');
}
