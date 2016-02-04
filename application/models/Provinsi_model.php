<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi_model extends CI_Model {
    var $name   	= '';
    var $created    	= '';


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

     /**
    * get table name
    */
    public function tablename(){
        return 'provinsi';
    }

    /**
    * create new data
    */
    public function create($data){
        $this->name = $data['provinsi'];
        $this->created = now();
        $this->user_id = current_id();

        $this->db->insert($this->tablename(),$this);

        return $this->db->insert_id();
    }

    /**
    * update data 
    */
    public function update($data){  
        $this->db->where('id', $data['id']);
        $this->db->update($this->tablename(), array("name"=>$data['provinsi']));

        return;
    }

    /**
    * get all data
    */
    public function get(){
        $query = $this->db->get_where($this->tablename(),array('deleted'=>0));

        return $query->result(); 
    }

    /**
    * get provnsi by id
    */
    public function get_by_id($id){
        $query = $this->db->get_where($this->tablename(), array('id' => $id,'deleted'=>0));

        return $query->row();
    }

    /**
    * delete kabupaten
    */
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->update($this->tablename(), array("deleted"=>1));
        return;
    }

   
}