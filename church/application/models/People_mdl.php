<?php defined('BASEPATH') OR exit('No direct script access allowed');

class People_mdl extends CI_Model {
	  
	function insert()
	{
		$data = [
			'firstname'  => $this->input->post('firstname'),
			'middlename' => $this->input->post('middlename'),
			'lastname'   => $this->input->post('lastname'),
			'birthday'   => $this->input->post('birthday'),
			'address'    => $this->input->post('address'),
			'contact'    => $this->input->post('contact'),
			'spouse'     => $this->input->post('spouse'),
			'date_added' =>  date('Y-m-d H:i:s', now()),
			'added_by'	 => $this->session->userdata('userid')
		]; 
		return	$this->db->insert('peopletbl', $data); 
	}
}