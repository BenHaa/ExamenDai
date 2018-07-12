<?php

include_once '../dto/ContactoDto.php';
include_once '../dao/ContactoDaoImpl.php';
session_start();

if(!empty($_POST["updContacto"])) {

    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $email = $_POST["txtEmail"];

    $dto = new ContactoDto();

    $dto->setEmailContacto($email);
    $dto->setNombreContacto($nombre);
    $dto->setRutContacto($_SESSION["rutContacto"]);
    
    
    
    
    
}