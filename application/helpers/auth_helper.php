<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  login process
*/

if ( ! function_exists('logon')){
   function logon($data)
   {
      $CI =& get_instance();
      $CI->load->model('users_model','users');
      $CI->load->library('session');

      $user = $CI->users->verifyUser($data['username'],$data['password']);

      if(!empty($user)){
         $userdata = array(
               'userid'    => $user->id,
               'username'  => $user->username,
               'group'     => $user->group
            );
         $CI->session->set_userdata($userdata);

         return true;
      }

      return false;
   }
 }


/**
* log out process
*
*/
if ( ! function_exists('log_out')){
   function log_out()
   {
      $CI =& get_instance();
      $CI->load->library('session');

      $CI->session->sess_destroy();

      return;
   }
}

 /**
 * is loged in
 */
 if ( ! function_exists('is_logedin')){
   function is_logedin()
   {
      $CI =& get_instance();
      $CI->load->library('session');

      if($CI->session->userdata('username'))
         return true;

      return false;
   }
 }

 /**
 * get current user id
 */
if ( ! function_exists('current_id')){
   function current_id(){
      $CI =& get_instance();
      $CI->load->library('session');
      
      if($CI->session->userdata('userid'))
         return $CI->session->userdata('userid');

      return null;
   }
}

/**
* is admin
*/
if ( ! function_exists('is_admin')){
   function is_admin(){
      $CI =& get_instance();
      $CI->load->library('session');
     
      if(strtolower($CI->session->userdata('group')) == 'admin')
         return true;

      return false;
   }
}
