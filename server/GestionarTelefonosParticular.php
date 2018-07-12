<?php

include_once '../dao/ParticularDaoImpl.php';

if (!empty($_POST["agregar"])) {
    if (!empty($_POST["txtTelefono"])) {
        ParticularDaoImpl::agregarTelefono($_POST["txtTelefono"], "14.273-871-3");
    }
}


if (!empty($_POST["eliminar"])) {
    echo $_POST["cmbTelefono"];
    if(ParticularDaoImpl::eliminarTelefono($_POST["cmbTelefono"], "14.273-871-3")){

        }else{

    }
    
}


header('Location: ../pages/DatosCliente.php');