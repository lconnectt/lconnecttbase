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

    /*
     * Query records which matches specific WHERE clause
     * TODO - ORDER BY 
     */    
    public function queryWhere($queryString, $whereCondition) {
        $GLOBALS['$logger']->debug("Executing Query for table: ".$queryString);
        $result = $this->db->get_where($queryString, $whereCondition);
        $this->db->close();
        $GLOBALS['$logger']->debug("DB Connection closed successfully.. " . $result->num_rows());
        return $result;        
    }
    
    /*
     * Query all records from given table
     * TODO Order By
     */
    public function query($queryString) {
        $GLOBALS['$logger']->debug("Executing Query: ".$queryString);
        $result = $this->db->get($queryString);
        $this->db->close();
        $GLOBALS['$logger']->debug("DB Connection closed successfully.. ");
        return $result;        
    }
    
    /*
     * This function recieves direct query (as is)
     * TODO Order By
     */
    public function queryString($queryString) {
        $GLOBALS['$logger']->debug("Executing Query: ".$queryString);
        $result = $this->db->query($queryString);
        $this->db->close();
        $GLOBALS['$logger']->debug("DB Connection closed successfully.. ");
        return $result;        
    }
}
