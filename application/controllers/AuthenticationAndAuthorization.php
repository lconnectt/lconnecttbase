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
//require_once dirname(__FILE__).'/../log4php/src/main/php/Logger.php';

//include '/../log4php/src/main/php/Logger.php'; 
//Logger::configure(dirname(__FILE__).'/../log4php/src/test/resources/configs/config1.xml');
// Fetch a logger, it will inherit settings from the root logger

include 'LConnectDataAccess.php';
$dataAccessObj = new LConnectDataAccess();

class AuthenticationAndAuthorization {
    //put your code here
    function __construct() {
       
       //$logger = Logger::getLogger("main");
       print "In BaseClass constructor\n";
   }
    public function performAaA() {    
        $logger = Logger::getLogger('myLogger');
        $dataAccessObj = new LConnectDataAccess();
        
        //$logger = Logger::getRootLogger();
        $logger->debug("Hello World performAaA1!");

        $logger->info("This is an informational message performAaA1.");
        $logger->warn("I'm not feeling so good...");
        $dataAccessObj->connect();
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
