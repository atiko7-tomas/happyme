<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Tommy
 */
class usuario  {
    public $id;
    public $fb_usuario;
    public $fb_token;
    public $nombre;
    public $pais;
    public $mensajes;
    
    function __construct($tipo, $arr)
    {
        switch($tipo)
        {
            case "POST":
                $this->cargaPost($arr);
                break;
            case "ARRAY":
                $this->carga($arr);
                break;
        }
            
    }
    
    function carga($arr)
    {
        $this->id = $arr['id'];
        $this->nombre =empty($arr['usuario']['nombre']) ? null : $arr['usuario']['nombre'];
        $this->fb_usuario = empty($arr['usuario']['fb_usuario'])?null: $arr['usuario']['fb_usuario'];
        $this->fb_token = empty($arr['usuario']['fb_token'])?null: $arr['usuario']['fb_token'];
        $this->pais = empty($arr['usuario']['pais'])?null: $arr['usuario']['pais'];
    }
    
    function cargaPost($arr)
    {
        $this->id = $arr['id'];
        $this->nombre = $arr['nombre'];
        $this->fb_usuario = $arr['fb_usuario'];
        $this->fb_token = $arr['fb_token'];
        $this->pais = $arr['pais'];
    }
    
}
