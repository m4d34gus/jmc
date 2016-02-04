<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	function __construct(){
        parent::__construct();

        if(!is_logedin()){
        	redirect(base_url());	
        }

        $this->load->model('reports_model','report');
         $this->load->model('provinsi_model','provinsi');
    }

    /**
    * generate report per provinsi
    */
    public function provinsi(){
    	$data['provinsi'] = $this->report->get_provinsi();
    	$this->load->template('reports/provinsi',$data);
    }

    /**
    * generate report per provinsi
    */
    public function kabupaten($prov_id=null){
    	$data['kabupaten'] = $this->report->get_kabupaten($prov_id);
    	$data['provinsi'] = $this->provinsi->get();
    	$data['prov_id'] = $prov_id;
    	$this->load->template('reports/kabupaten',$data);
    }
}