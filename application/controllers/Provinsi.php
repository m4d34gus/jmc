<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	function __construct(){
        parent::__construct();

        if(!is_logedin()){
        	redirect(base_url());	
        }

        $this->load->model('provinsi_model','provinsi');
    }

	public function index()
	{
		
		$data['provinsi'] = $this->provinsi->get();
		
		$this->load->template('provinsi/index',$data);
	}

	/**
	*	create new
	*/
	public function create(){
		$data['name'] = null;
		$data['id'] = null;
		$data['action'] = 'create';
		$this->load->template('provinsi/create',$data);
	}

	/**
	* save new data
	*/
	public function save(){
		$action = $this->input->post('action');
		if($action=='create'){
			$this->provinsi->create($this->input->post());
		}elseif($action=='edit'){
			$this->provinsi->update($this->input->post());
		}

		redirect('provinsi');
	}

	/**
	* edit data
	*/
	public function edit($id){
		$provinsi = $this->provinsi->get_by_id($id);

		$data['name'] = $provinsi->name;
		$data['id'] = $provinsi->id;
		$data['action'] = 'edit';
		$this->load->template('provinsi/create',$data);
	}

	/**
	* delete method
	*/
	public function delete($id){
		$this->provinsi->delete($id);

		redirect(base_url('provinsi'));
	}

}