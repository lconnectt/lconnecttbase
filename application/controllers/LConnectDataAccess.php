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
$GLOBALS['a'] = 'localhost';

class LConnectDataAccess {
    
    //put your code here
    function __construct() {
      echo $GLOBALS['a'];
       $GLOBALS['$logger']->debug("performAaA..This is Constructor.");
       print "In BaseClass constructor\n";
   }    
    function connect() {
        //$logger = Logger::getLogger("LConnectDataAccess");
        $GLOBALS['$logger']->debug("LConnectDataAccess..This is an informational message.");
             
    }
}
