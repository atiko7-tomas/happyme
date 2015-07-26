<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mensaje
 *
 * @author Tommy
 */
class mensaje {
    public $id;
    public $emisor;
    public $destinatario;
    public $link;
    public $usuarios;
    public $fecha;
    
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
        $this->emisor = empty($arr['mensaje']['emisor'])?null: $arr['mensaje']['emisor'];
        $this->destinatario =empty($arr['mensaje']['destinatario']) ? null : $arr['mensaje']['destinatario'];
        $this->link = empty($arr['mensaje']['link'])?null: $arr['mensaje']['link'];
        $this->usuarios = empty($arr['mensaje']['usuarios'])?null: $arr['mensaje']['usuarios'];
        $this->fecha = empty($arr['mensaje']['fecha'])?null: $arr['mensaje']['fecha'];
    }
    
    function cargaPost($arr)
    {
        $this->id = $arr['mensaje'];
        $this->emisor = $arr['emisor'];
        $this->destinatario =$arr['destinatario'];
        $this->link = $arr['link'];
        $this->usuarios = $arr['usuario'];
    }
}
