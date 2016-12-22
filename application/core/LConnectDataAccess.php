<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LConnectDataAccess
 *
 * @author deepak.srikantaiah
 */
$GLOBALS['$logger'] = Logger::getLogger("LConnectDataAccess");

class LConnectDataAccess extends CI_Controller {
    
    //put your code here
    function __construct() {
       parent::__construct();
       $this->load->database(); //load database
    } 
    
    function connect() {
        $GLOBALS['$logger']->debug("LConnectDataAccess..Connecting to Database.");
    }
}
