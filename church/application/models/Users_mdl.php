<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_mdl extends CI_Model {
	
	function getRoles()
	{
		$sql = "SELECT * FROM rolestbl ";
		return $this->db->query($sql);
	}
}