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
include '/../core/LConnectApplicationException.php';
$dataAccessObj = new LConnectDataAccess();
$GLOBALS['$logger'];

class AuthenticationAndAuthorization {
    //put your code here
    function __construct() {
       
   }
    public function performAaA($loginId, $pwd) {    
        $success = 'true';
        $GLOBALS['$logger'] = Logger::getLogger('AuthenticationAndAuthorization');
        $dataAccessObj = new LConnectDataAccess();
        
        $query = 'user_details';
        $where = $data = array(
                'LOGIN_ID' => $loginId,
                'LOGIN_PWD' => $pwd
            );
        $result = $dataAccessObj->queryWhere($query, $where);
        $GLOBALS['$logger']->debug('Fetched details for user: ' . $loginId . $result->num_rows());
        if ($result->num_rows() == 0)
        {
            $errorCode = '001';
            $GLOBALS['$logger']->error('Invalid user:  '. $loginId);
            $success = 'false';
            throw new LConnectApplicationException($errorCode, new Exception(), "Invalid  User");
        }
        else {
            $GLOBALS['$logger']->debug('Valid user:'. $loginId);
            foreach ($result->result_array() as $row)
                {
                    $GLOBALS['$logger']->debug($row['USER_NAME']);
                    $GLOBALS['$logger']->debug($row['LOGIN_ID']);
                    $GLOBALS['$logger']->debug($row['LOGIN_PWD']);
                    //echo "Successful login";
                }    
            }               
        return $success;    
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
