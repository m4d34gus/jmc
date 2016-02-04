<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
        parent::__construct();

        

        $this->load->model('users_model','user');
        $this->load->model('groups_model','group');
    }

    /**
    * index method
    */
    public function index(){
        if(!is_admin()){
            redirect(base_url());   
        }

    	$data['users'] = $this->user->get();
    	$this->load->template('user/index',$data);
    }

    /**
    * create method
    */
    public function create(){
        if(!is_admin()){
            redirect(base_url());   
        }

    	$data['username'] = '';
    	$data['action'] = 'create';
    	$data['id'] = '';
    	$data['group_id'] = '';
    	$data['groups'] = $this->group->get();
    	$this->load->template('user/create',$data);
    }

    /**
    * save method
    */
    public function save(){
        if(!is_logedin()){
            redirect(base_url());   
        }

    	$action = $this->input->post('action');
    	if($action == 'create'){
    		$this->user->create($this->input->post());
    	}else{
    		$this->user->update($this->input->post());
    	}

    	redirect(base_url('user'));
    }

    /**
    * edit method
    */
    public function edit($id){
        if(!is_admin() && current_id() != $id){
            redirect(base_url());   
        }
        $user = $this->user->get_by_id($id);
        $data['username'] = $user->username;
        $data['action'] = 'edit';
        $data['id'] = $user->id;
        $data['group_id'] = $user->group_id;
        $data['groups'] = $this->group->get();
        $this->load->template('user/create',$data);
    }

    /**
    * delete method
    */
    public function delete($id){
        $this->user->delete($id);

        redirect(base_url('user'));
    }

   
}