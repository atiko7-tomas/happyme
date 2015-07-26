<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('cps/cps_simple.php');


class conexion
{
    public $cpsSimple;
    
    function __construct()
    {
        $connectionStrings = array(	
          'tcp://cloud-us-0.clusterpoint.com:9007',	
          'tcp://cloud-us-1.clusterpoint.com:9007',	
          'tcp://cloud-us-2.clusterpoint.com:9007',	
          'tcp://cloud-us-3.clusterpoint.com:9007',	
        );
        $cpsConn = new CPS_Connection(new CPS_LoadBalancer($connectionStrings), 'happyme', 'tomas@atiko7.com', 'taguirre', 'document', '//document/id', array('account' => 100954));	
        //$cpsConn->setDebug(true);	
        $this->cpsSimple = new CPS_Simple($cpsConn);
    }
}