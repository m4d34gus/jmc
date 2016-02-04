<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index()
	{
		if(is_logedin()){
        	redirect('provinsi');	
        }

		$this->load->template('auth/index');
	}

	/**
	* login method
	*/
	public function login(){
		if(is_logedin()){
        	redirect('provinsi');	
        }

		$data = $this->input->post();

		if(logon($data))
			redirect('provinsi');

		redirect('auth');

	}

	/**
	* log out method
	*/
	public function logout(){
		log_out();
		redirect(base_url());
	}
}
