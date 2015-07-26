<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'db.php';

function ingresar($tipo, $entidad)
{
    $entidad->id = uniqid();
    $conexion = new conexion;
    $document = array(
	"tipo" => $tipo,
	$tipo => json_decode(json_encode($entidad), true)
    );
    $conexion->cpsSimple->insertSingle($entidad->id, $document);
}

function actualizar($tipo, $id_entidad, $entidad)
{
    $conexion = new conexion;
    $document = array(
        "tipo" => $tipo,
	$tipo => json_decode(json_encode($entidad), true)
    );
    $conexion->cpsSimple->updateSingle($id_entidad, $document);
}

function consultaSingle($id_entidad)
{
    try
    {
    $conexion = new conexion;
    $document = $conexion->cpsSimple->retrieveSingle($id_entidad);
    return json_decode(json_encode($document),TRUE); 
    } catch (CPS_Exception $e) {
        foreach ($e->errors() as $error) {
            if($error['code'] != 2824)
            {
                throw $e;
            }
        }
        return null;
      }
}

function consultaMultiple($array)
{
    $conexion = new conexion;
    $document = $conexion->cpsSimple->retrieveMultiple($array);
    return json_decode(json_encode($document),TRUE); 
}

