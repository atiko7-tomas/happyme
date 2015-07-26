<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'db.php';
require_once 'masterB.php';
require_once 'entidades/mensaje.php';

function consultaMensajeRandom($id_usuario)
{
    $conexion = new conexion;
    
    $query = 'SELECT * WHERE tipo CONTAINS "mensaje" AND mensaje.destinatario CONTAINS "'.$id_usuario.'" AND NOT mensaje.usuarios CONTAINS "'.$id_usuario.'"';
    $document = $conexion->cpsSimple->sql_search ($query, DOC_TYPE_SIMPLEXML);
    if(count($document)==0)
    {    
        $query = 'SELECT * WHERE tipo CONTAINS "mensaje" AND NOT mensaje.usuarios CONTAINS "'.$id_usuario.'"';
        $document = $conexion->cpsSimple->sql_search ($query, DOC_TYPE_SIMPLEXML);
    }
    $idMensaje = array_rand ($document);
    
    $mensaje = $document[$idMensaje];
    return json_decode(json_encode($mensaje),TRUE); 
}

function agregaUsuarioMensaje($id, $nuevoUsuario)
{
    $res = consultaSingle($id);
    $mensaje = new mensaje("ARRAY", $res);
    
    $mensaje->usuarios .= ",".$nuevoUsuario;    
    
    actualizar('mensaje', $id, $mensaje);
}
