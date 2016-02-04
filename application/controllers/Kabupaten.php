<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {

	function __construct(){
        parent::__construct();

        if(!is_logedin()){
        	redirect(base_url());	
        }

        $this->load->model('provinsi_model','provinsi');
        $this->load->model('kabupaten_model','kabupaten');
    }

    /**
	* index method
	*/
	public function index($provinsi_id=null){
		$provinsi = $this->provinsi->get();
		$data['provinsi'] = $provinsi;
		$data['kabupaten'] = $this->kabupaten->get($provinsi_id);
		$data['provinsi_id'] = $provinsi_id;
		$this->load->template('kabupaten/index',$data);
	}

	/**
	* create method
	*/
	public function create(){
		$data['action'] = 'create';
		$data['provinsi'] = $this->provinsi->get();
		$data['name'] = '';
		$data['penduduk'] = '';
		$data['provinsi_id'] = '';
		$data['id'] = '';
		$this->load->template('kabupaten/create',$data);
	}

	/**
	* edit method
	*/
	public function edit($id){
		$kabupaten = $this->kabupaten->get_by_id($id);
		$data['action'] = 'edit';
		$data['provinsi'] = $this->provinsi->get();
		$data['name'] = $kabupaten->name;
		$data['penduduk'] = $kabupaten->penduduk;
		$data['provinsi_id'] = $kabupaten->provinsi_id;
		$data['id'] = $kabupaten->id;
		$this->load->template('kabupaten/create',$data);
	}

	/**
	* save method
	*/
	public function save(){
		$action = $this->input->post('action');

		if($action=='create'){
			$this->kabupaten->create($this->input->post());
		}else{
			$this->kabupaten->update($this->input->post());
		}

		redirect(base_url('kabupaten'));
	}

	/**
	* delete method
	*/
	public function delete($id){
		$this->kabupaten->delete($id);

		redirect(base_url('kabupaten'));
	}
}
