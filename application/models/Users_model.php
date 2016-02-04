<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
    var $username   	= '';
    var $password 		= '';
    var $created    	= '';


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    /**
    * table name
    */
    public function tablename(){
        return 'users';
    }

     /**
    * user group table name
    */
    public function user_group(){
        return 'user_group';
    }

    /**
    * get all user
    */
    public function get(){
    	$query = $this->db->get_where($this->tablename(),array('deleted'=>0));

        return $query->result();
    }

    /**
    * verify user
    * @param var $user
    * @param var $password
    * @result array $data
    */
    public function verifyUser($username,$password){
    	$this->db->select('users.id,users.username,groups.name as group');
    	$this->db->from('users as u');
    	$this->db->join('user_group','users.id=user_group.user_id');
    	$this->db->join('groups','user_group.group_id=groups.id');
    	$user = $this->db->get_where($this->tablename(), array('users.username' => $username, 'users.password' => md5($password),'users.deleted'=>0));

    	return $user->row();
    }

    /**
    * create new user
    * 
    */
    public function create($data){
        $save_data['username'] = $data['username'];
        $save_data['password'] = md5($data['password']);
        $save_data['created'] = date('Y-m-d H:i:s');
        $this->db->insert($this->tablename(),$save_data);

        $user_id = $this->db->insert_id();

        $this->create_user_group($user_id,$data['group']);

        return;
    }

    /**
    * create user group
    */
    public function create_user_group($user_id,$group_id){
        $this->db->insert($this->user_group(),array("user_id"=>$user_id,"group_id"=>$group_id,"created"=>date('Y-m-d H:i:s')));

        return;
    }

    /**
    * update user data
    */
    public function update($data){
        $this->db->where('id', $data['id']);
        $save_data['username'] = $data['username'];
        if(!empty($data['password']))
            $save_data['password'] = md5($data['password']);

        $this->db->update($this->tablename(), $save_data);

        if(!empty($data['group']))
            $this->update_user_group($data['id'],$data['group']);

        return;

    }

    /**
    * update user group
    */
    public function update_user_group($user_id,$group_id){
        $this->db->where('user_id', $user_id);
        $this->db->update($this->user_group(), array('group_id'=>$group_id));

        return;
    }

    /**
    * get user by id
    */
    public function get_by_id($id){
        $this->db->select('u.id,u.username,ug.group_id');
        $this->db->join($this->user_group()." as ug ","u.id=ug.user_id","inner");
        $user = $this->db->get_where($this->tablename().' as u', array('u.id' => $id,'u.deleted'=>0));

        return $user->row();
    }

    /**
    * delete user
    */
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->update($this->tablename(), array("deleted"=>1));
        return;
    }
}