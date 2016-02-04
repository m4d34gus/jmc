<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends CI_Model {

    var $tablename = 'groups';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    /**
    * get group
    */
    public function get(){
        $query = $this->db->get($this->tablename);

        return $query->result();
    }
}