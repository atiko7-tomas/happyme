<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'db.php';
require_once 'entidades/mensaje.php';

function ingresarMensaje($mensaje)
{
    $conexion = new conexion;
    $document = array(
	'mensaje' => json_decode(json_encode($mensaje), true)
    );

    $conexion->cpsSimple->insertSingle($mensaje->id, $document);
}

function actualizaMensaje($mensaje)
{
    $conexion = new conexion;
    $document = array(
	'mensaje' => json_decode(json_encode($mensaje), true)
    );

    $conexion->cpsSimple->updateSingle($mensaje->id, $document);
}

function a(){}