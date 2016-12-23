<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthenticationAndAuthorization
 *
 * @author deepak.srikantaiah
 */

include '/../core/LConnectDataAccess.php';
$dataAccessObj = new LConnectDataAccess();

class AuthenticationAndAuthorization {
    //put your code here
    function __construct() {
       
       //$logger = Logger::getLogger("main");
       //print "In BaseClass constructor\n";
   }
    public function performAaA() {    
        $logger = Logger::getLogger('AuthenticationAndAuthorization');
        $dataAccessObj = new LConnectDataAccess();
        
        //$logger = Logger::getRootLogger();
        $logger->debug("Hello World performAaA1!");

        $logger->info("This is an informational message performAaA1.");
        $logger->warn("I'm not feeling so good...");
        $query = 'employee';
        $where = $data = array(
                'EMP_ID' => '2',
            );
        $result = $dataAccessObj->queryWhere($query, $where);
        
        foreach ($result->result_array() as $row)
        {
            echo $row['EMP_NAME'];
            echo $row['EMP_DEPT'];
            echo $row['EMP_ADDRESS'];
        }
        $result1 = $dataAccessObj->query($query);
        echo '*************';
        foreach ($result1->result_array() as $row)
        {
            echo $row['EMP_NAME'];
            echo $row['EMP_DEPT'];
            echo $row['EMP_ADDRESS'];
        }
    }
    
    public function authenticate() {
        
    }
    
    public function authorize() {
        
    }
    
    public function loadAandAToSession() {
        
    }
    
    public function getAaAObject() {
        
    }
}
