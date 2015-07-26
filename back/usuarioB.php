<?php
require_once 'db.php';
require_once 'entidades/usuario.php';


function ingresaUsuario($usuario)
{
    $conexion = new conexion;
    $document = array(
	'usuario' => json_decode(json_encode($usuario), true)
    );
    $conexion->cpsSimple->insertSingle("aaa", $document);
}

function actualizaUsuario($usuario)
{
    $conexion = new conexion;
    $document = array(
	'usuario' => json_decode(json_encode($usuario), true)
    );

    
    $conexion->cpsSimple->updateSingle($usuario->id, $document);
}
