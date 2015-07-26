<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'db.php';
require_once 'entidades/mensaje.php';

function consultaMensajeRandom()
{
    $conexion = new conexion;
    $document = $conexion->cpsSimple->sql_search ('SELECT * WHERE tipo contains "mensaje"', DOC_TYPE_SIMPLEXML);
    $idMensaje = array_rand ($document);
    
    $mensaje = $document[$idMensaje];
    return json_decode(json_encode($mensaje),TRUE); 
}

