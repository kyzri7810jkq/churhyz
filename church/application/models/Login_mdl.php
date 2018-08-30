<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_mdl extends CI_Model {
	 
	function check_login()
	{   
		$username = $this->db->escape_str($this->input->post('username'));
		$pwd   = md5($this->db->escape_str($this->input->post('password')));
		$sql = "SELECT * from userstbl WHERE username = '{$username}' AND password = '{$pwd}' ";  
		return $this->db->query($sql);
	} 
}