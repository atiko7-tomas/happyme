<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'master.php';

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

if(isset($_GET['usuario']))
{
    $res = consultaSingle('taguirre');
    $usuario= new usuario("ARRAY", $res);
    echo $usuario;
}


if(isset($_GET['mensaje_randomico']))
{
    $res = consultaMensajeRandom();
    $mensaje= new mensaje("ARRAY", $res);
    echo $mensaje->link;
}

if(isset($_GET['mensaje_randomico']))
{
    $res = consultaMensajeRandom();
    $mensaje= new mensaje("ARRAY", $res);
    echo $mensaje->link;
}


if(isset($_POST['mensaje']))
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

?>
<!--
<form method="POST" >
    <input type="text" name="mensaje" value="mensaje"/>
    <input type="text" name="emisor"/>
    <input type="submit" value="Submit">
</form>-->