<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kabupaten_model extends CI_Model {
    var $name   		= '';
    var $user_id		= '';
    var $provinsi_id 	= '';
    var $created    	= '';
    var $penduduk		= 0;


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    /**
    * kabupaten table name
    */
    public function kabupaten(){
    	return 'kabupaten';
    }

    /**
    * provinsi table name
    */
    public function provinsi(){
    	return 'provinsi';
    }

    /**
    * get kabupaten
    * @param int $provinsi_id
    * @return array $data
    */
    public function get($provinsi_id=null){
    	$this->db->select('k.*');
    	$this->db->join($this->provinsi().' as p','k.provinsi_id=p.id','inner');
    	if($provinsi_id){
    		$query = $this->db->get_where($this->kabupaten().' as k', array('p.id' => $provinsi_id,"k.deleted"=>0,"p.deleted"=>0));
    	}else{
    		$query = $this->db->get_where($this->kabupaten()." as k",array("k.deleted"=>0,"p.deleted"=>0));
    	}

    	$data =$query->result();

    	return $data;
    }

    /**
    * create new kabupaten
    */
    public function create($data){
    	$this->name = $data['name'];
    	$this->user_id = current_id();
    	$this->provinsi_id = $data['provinsi_id'];
    	$this->created = date('Y-m-d H:i:s');
    	$this->penduduk = $data['penduduk'];
    	$this->db->insert($this->kabupaten(),$this);

    	return $this->db->insert_id();
    }

    /**
    * get kabupaten by id
    * @param int $id
    * @return array $data
    */
    public function get_by_id($id){
    	$query = $this->db->get_where($this->kabupaten(), array('id' => $id,"deleted"=>0));

    	$data = $query->row();

    	return $data;
    }

    /**
    * update kabupaten
    * @param array $data
    */
    public function update($data){
    	$this->db->where('id', $data['id']);
        $this->db->update($this->kabupaten(), array("name"=>$data['name'],"penduduk"=>$data['penduduk'],"provinsi_id"=>$data['provinsi_id']));
    	
    	return;
    }

    /**
    * delete kabupaten
    */
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->update($this->kabupaten(), array("deleted"=>1));
        return;
    }

}