<?php
require_once 'db.php';
require_once 'masterB.php';
require_once 'entidades/usuario.php';

function usuarioConteoNuevos($id_usuario)
{
    $conexion = new conexion;
    $query = 'SELECT * WHERE mensaje.destinatario CONTAINS "'.$id_usuario.'" AND NOT mensaje.usuarios CONTAINS "'.$id_usuario.'"';
    $document = $conexion->cpsSimple->sql_search ($query, DOC_TYPE_SIMPLEXML);
    $array = json_decode(json_encode($document),TRUE);
    return  count($array);
}

function usuarioHistorial($id_usuario)
{
    $conexion = new conexion;
    $query = 'SELECT * WHERE mensaje.destinatario CONTAINS "'.$id_usuario.'" AND mensaje.usuarios CONTAINS "'.$id_usuario.'"';
    $document = $conexion->cpsSimple->sql_search ($query, DOC_TYPE_SIMPLEXML);
    $array = json_decode(json_encode($document),TRUE);
    $res = array();
    foreach($array as $item)
    {
        $mensaje = new mensaje("ARRAY", $item);
        array_push($res,$mensaje);
    }
    return  $res;
}