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
    
    public function queryWhere($queryString, $whereCondition) {
        $GLOBALS['$logger']->debug("Executing Query: ");
        $result = $this->db->get_where($queryString, $whereCondition);
        $this->db->close();
        $GLOBALS['$logger']->debug("DB Connection closed successfully.. ");
        return $result;        
    }
    
    public function query($queryString) {
        $GLOBALS['$logger']->debug("Executing Query: ");
        $result = $this->db->get($queryString);
        $this->db->close();
        $GLOBALS['$logger']->debug("DB Connection closed successfully.. ");
        return $result;        
    }
}
