<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include '/../log4php/src/main/php/Logger.php'; 
Logger::configure(dirname(__FILE__).'/../log4php/src/test/resources/configs/config1.xml');

include('AuthenticationAndAuthorization.php');

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
               // $andaObj->performAaA();
		//$this->load->view('login');
            
            //include '/../log4php/src/main/php/Logger.php'; 
            //Logger::configure(dirname(__FILE__).'/../log4php/src/test/resources/configs/config1.xml');
            // Fetch a logger, it will inherit settings from the root logger
            $log = Logger::getLogger('myLogger');

            //$logger = Logger::getRootLogger();
            $log->trace("My first message.");   // Not logged because TRACE < WARN
            $log->debug("My second message.");  // Not logged because DEBUG < WARN
            $log->info("My third message.");    // Not logged because INFO < WARN
            $log->warn("My fourth message.");   // Logged because WARN >= WARN
            $log->error("My fifth message.");   // Logged because ERROR >= WARN
            $log->fatal("My sixth message.");   // Logged because FATAL >= WARN
            
            $andaObj = new AuthenticationAndAuthorization();
            $andaObj->performAaA();
	}
}
