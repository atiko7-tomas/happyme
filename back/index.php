<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'master.php';

if(isset($_GET['usuario']))
{
    $res = consultaSingle('taguirre');
    $usuario= new usuario("ARRAY", $res);
    echo json_encode($usuario);
}

if(isset($_GET['mensaje_randomico']) && isset($_GET[mensaje_randomico_usuario]))
{
    $res = consultaMensajeRandom($_GET[mensaje_randomico_usuario]);
    $mensaje= new mensaje("ARRAY", $res);
    echo json_encode($mensaje);
}

if(isset($_GET['conteo_nuevos_usuario']))
{
    $res = usuarioConteoNuevos($_GET['conteo_nuevos_usuario']);
    echo json_encode($res);
}
if(isset($_GET['usuario_historial']))
{
    $res = usuarioHistorial($_GET['usuario_historial']);
    echo json_encode($res);
}

if(isset($_POST['usuario']))
{
    $usuario= new usuario("POST",$_POST);
    $resultado = consultaSingle($_POST['usuario']);
    if(isset($resultado))
    {
        actualizar('usuario', $_POST['usuario'], $entidad);
    }
    else
    {
        ingresar('usuario', $_POST['usuario'], $entidad);
    }
}

if(isset($_POST['mensaje']))
{
    if(isset($_POST['mensaje_usuario']))
    {
        agregaUsuarioMensaje($_POST['mensaje'], $_POST['mensaje_usuario']);
    }
    else
    {
        $mensaje= new mensaje("POST",$_POST);
        $mensaje->fecha = date("Y-m-d H:i:s"); 
        
        ingresar('mensaje', $mensaje);
        
//        if($mensaje->id != "")
//        {
//            $resultado = consultaSingle($_POST['mensaje']);
//            if(isset($resultado))
//            {
//                actualizar('mensaje', $_POST['mensaje'], $mensaje);
//            }
//            else
//            {
//                ingresar('mensaje', $mensaje);
//            }
//        }
//        else
//        {
//            ingresar('mensaje', $mensaje);
//        }
    }
}


?>
