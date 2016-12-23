<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include '/../log4php/src/main/php/Logger.php';
include('AuthenticationAndAuthorization.php');
Logger::configure(dirname(__FILE__).'/../log4php/src/test/resources/configs/config1.xml');

class lconnectWelcome extends CI_Controller {
    
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
          
        public $log;
        
	public function index()
	{
            $GLOBALS['$log'] = Logger::getLogger('LconnectWelcome..Test..1');
            $GLOBALS['$log']->info("Initializing Logger");
            $GLOBALS['$log']->debug("Authenticate user and load Authorization object to Session");  // Not logged because DEBUG < WARN                      
            $andaObj = new AuthenticationAndAuthorization();
            $andaObj->performAaA();
	}
}
