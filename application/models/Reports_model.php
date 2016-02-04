<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_model extends CI_Model {

    var $tablename = 'groups';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    /**
    * provinsi table name
    */
    public function provinsi(){
    	return 'provinsi';
    }

    /**
    * kabupaten table name
    */
    public function kabupaten(){
    	return 'kabupaten';
    }

    /**
    * get provinsi report
    */
    public function get_provinsi(){
    	$this->db->select('p.name,sum(k.penduduk) as jumlah');
    	$this->db->join($this->kabupaten()." as k","p.id=k.provinsi_id");
    	$this->db->group_by("p.id");
    	$this->db->order_by("p.name");
        $this->db->where("p.deleted",0);
        $this->db->where("k.deleted",0);
    	$query = $this->db->get($this->provinsi()." as p");

    	return $query->result();
    }

    /**
    * get kabupaten report
    */
    public function get_kabupaten($prov_id=null){
    	$this->db->select('p.id,p.name as prov_name,k.name as kab_name,sum(k.penduduk) as jumlah,k.id as k_id');
    	$this->db->join($this->kabupaten()." as k","p.id=k.provinsi_id");
        $this->db->where("p.deleted",0);
        $this->db->where("k.deleted",0);
    	$this->db->group_by("k.id");
    	$this->db->order_by("p.name");
    	if($prov_id){
    		$query = $this->db->get_where($this->provinsi()." as p",array("p.id"=>$prov_id));
    	}else{
    		$query = $this->db->get($this->provinsi()." as p");	
    	}
    	
    	$data = $query->result(); 
    	
    	$result = array();
    	if(!empty($data)){
    		foreach ($data as $d) {
    			if(!isset($result[$d->id])){
    				$result[$d->id]['name'] = $d->prov_name;
    			}
    			
    			$result[$d->id]['kabupaten'][$d->k_id]['kab_name'] = $d->kab_name;
    			$result[$d->id]['kabupaten'][$d->k_id]['jumlah'] = $d->jumlah;
    		}
    	}

    	return $result;
    }
}