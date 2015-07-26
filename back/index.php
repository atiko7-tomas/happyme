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
    echo $usuario;
}

if(isset($_GET['mensaje_randomico']) && isset($_GET[mensaje_randomico_usuario]))
{
    $res = consultaMensajeRandom($_GET[mensaje_randomico_usuario]);
    $mensaje= new mensaje("ARRAY", $res);
    echo $mensaje->link;
}

if(isset($_GET['conteo_nuevos_usuario']))
{
    $res = usuarioConteoNuevos($_GET['conteo_nuevos_usuario']);
    var_dump($res);
}
if(isset($_GET['usuario_historial']))
{
    $res = usuarioHistorial($_GET['usuario_historial']);
    var_dump($res);
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

        if($mensaje->id != "")
        {
            $resultado = consultaSingle($_POST['mensaje']);
            if(isset($resultado))
            {
                actualizar('mensaje', $_POST['mensaje'], $mensaje);
            }
            else
            {
                ingresar('mensaje', $mensaje);
            }
        }
        else
        {
            ingresar('mensaje', $mensaje);
        }
    }
}


?>

<form method="POST" >
    mensaje<input type="text" name="mensaje" value="mensaje"/><br/>    
    emisor<input type="text" name="emisor"/><br>
    mensaje_usuario<input type="text" name="mensaje_usuario"/><br>
    <input type="submit" value="Submit">
</form>