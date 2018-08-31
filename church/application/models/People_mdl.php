<?php defined('BASEPATH') OR exit('No direct script access allowed');

class People_mdl extends CI_Model {
	  
	var $offset    = 0;
	var $per_page  = 10;
	var $limit     = '';

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

	function update()
	{
		$data = [
			'firstname'  => $this->input->post('firstname'),
			'middlename' => $this->input->post('middlename'),
			'lastname'   => $this->input->post('lastname'),
			'birthday'   => $this->input->post('birthday'),
			'address'    => $this->input->post('address'),
			'contact'    => $this->input->post('contact'),
			'spouse'     => $this->input->post('spouse'),
			'date_added' =>  date('Y-m-d H:i:s', now()) 
		]; 
		$this->db->where('people_id', $this->input->post('hidid'));
		return	$this->db->update('peopletbl', $data); 
	}

	function listAll()
	{ 
		$search = '';
		if($this->input->get('s')){
			$name = $this->db->escape_str($this->input->get('s'));
			$search = " WHERE firstname LIKE '%$name%' OR lastname LIKE '%$name%' ";
		}

		$limit  = ($this->limit==TRUE) ? " LIMIT {$this->offset} , {$this->per_page}" : "";  
		$sql = "SELECT * FROM peopletbl {$search} Order by people_id DESC {$limit}";
		return $this->db->query($sql);
	}

	function remove()
	{	 
		return $this->db->delete('peopletbl', ['people_id' => $this->input->post('hidid') ]);
	}

	function getPerson()
	{
		return $this->db->select('*')
                ->where('people_id', $this->input->get('pid')) 
                ->get('peopletbl');
	}
}

/* end of file */